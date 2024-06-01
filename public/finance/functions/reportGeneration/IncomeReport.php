<?php
require_once 'public\finance\functions\generalFunctions.php';

// used for getting the accountbalance
// problems:
// must consider date
// must consider closing balance table(ledgerstatement)


//calculate net sales
//returns negative if d kumita; positive if kumita
function calculateNetSalesOrLoss($year, $month) {
    if ($year === null || $month === null) {
        throw new Exception("Year and month must not be null.");
    }
    $INCOME = "IC";
    $EXPENSE = "EP";

    // income - expense = netsales or loss
    return abs(getGroupInRetainedAccount($INCOME, $year, $month)) - abs(getGroupInRetainedAccount($EXPENSE, $year, $month));
}

//close an account - responsible for inserting the retained earnings/loss
function closeAccount($ledgerCode, $amount, $year, $month){
    $retainedCode = getLedgerCode("Retained Earnings/Loss");
    
    //expenses default
    $debitLedger = $retainedCode;
    $creditLedger = $ledgerCode;
    //if amount is 0 dont insert
    if($amount == 0){
        return;
    }
    // if amount 0 interchange -- sales
    if($amount < 0){
        $debitLedger = $ledgerCode;
        $creditLedger = $retainedCode;
    }
    $amount = abs($amount);
    insertLedgerXact($debitLedger, $creditLedger, $amount, "closing of account", $year, $month);
}

// close all the accounts
function closeAllAccounts($year, $month) {
    $db = Database::getInstance();
    $conn = $db->connect();
    // get the all of the ledger(code) that has a group type of IC or EP
    $sql = "SELECT l.ledgerno, l.name
        FROM Ledger l 
        INNER JOIN AccountType a ON l.AccountType = a.AccountType 
        WHERE a.grouptype IN ('IC', 'EP')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $ledgers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($ledgers as $ledger) {
        // get the balance of each ledger - foreach loop through the map
        $balance = getAccountBalance($ledger['ledgerno'], true, $year, $month);
        // close the accounts by transfering it through retained earnings/loss
        closeAccount($ledger['ledgerno'], $balance, $year, $month);
    }
}

// read the retained earnings/loss
function getAccountBalanceInRetainedAccount($ledger, $year, $month){
    $retained = getLedgerCode("Retained Earnings/Loss");
    $ledger = getLedgerCode($ledger);

    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT SUM(amount) as TotalDebit 
    FROM LedgerTransaction 
    WHERE LedgerNo = :retained AND LedgerNo_Dr = :ledger AND YEAR(DateTime) = :year AND MONTH(DateTime) = :month";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':retained', $retained);
    $stmt->bindParam(':ledger', $ledger);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':month', $month);
    $stmt->execute();
    $debitAmount = $stmt->fetch(PDO::FETCH_ASSOC)['TotalDebit'];

    $sql = "SELECT SUM(amount) as TotalCredit 
    FROM LedgerTransaction
    WHERE LedgerNo_Dr = :retained AND LedgerNo = :ledger AND YEAR(DateTime) = :year AND MONTH(DateTime) = :month";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':retained', $retained);
    $stmt->bindParam(':ledger', $ledger);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':month', $month);
    $stmt->execute();
    $creditAmount = $stmt->fetch(PDO::FETCH_ASSOC)['TotalCredit'];

    $total = $debitAmount - $creditAmount;
    return $total;
}

// get the total of a group in retained earnings
function getGroupInRetainedAccount($groupType, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();
    $retained = getLedgerCode("Retained Earnings/Loss");
    $groupType = getGroupCode($groupType);

    if ($groupType === false) {
        throw new Exception("Account not found in grouptype table.");
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType AND lt.ledgerNo_dr = :retained";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    $stmt->bindParam(':retained', $retained);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();

    $netAmount = 0;

    while ($row = $stmt->fetch()) {
        $netAmount += $row['amount'];
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo_dr = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType AND lt.ledgerNo = :retained";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    $stmt->bindParam(':retained', $retained);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return $netAmount;
}

function generateIncomeReport($year, $month) {
    closeAllAccounts($year, $month);
    $income = getGroupCode("Income");
    $expense = getGroupCode("Expenses");

    $db = Database::getInstance();
    $conn = $db->connect();

    // Query data
    $grouptype_data = $conn->query('SELECT * FROM grouptype')->fetchAll();
    $accounttype_data = $conn->query('SELECT * FROM accounttype')->fetchAll();
    $ledger_data = $conn->query('SELECT * FROM ledger')->fetchAll();

    // Sort grouptype_data(in descending order -- needed)
    usort($grouptype_data, function($a, $b) {
        return strcmp($b['grouptype'], $a['grouptype']);
    });

    $html = "<section>";
    foreach ($grouptype_data as $group) {
        if ($group['grouptype'] != $income && $group['grouptype'] != $expense) {
            continue;
        }
        $html .= "<table>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th colspan='2' class='text-left'>{$group['description']}</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        foreach ($accounttype_data as $account) {
            if ($account['grouptype'] == $group['grouptype']) {
                $html .= "<tr class='table-classifier'>";
                $html .= "<td class='classifier'>{$account['Description']}</td>";
                $html .= "</tr>";
                foreach ($ledger_data as $ledger) {
                    if ($ledger['AccountType'] == $account['AccountType']) {
                        $balance = abs(getAccountBalanceInRetainedAccount($ledger['ledgerno'], $year, $month));
                        // dont show ledger if balance is 0
                        if($balance == 0){
                            continue;
                        }
                        $balance = abs($balance);
                        $html .= "<tr class='table-content'>";
                        $html .= "<td class='content'>{$ledger['name']}</td>";
                        $html .= "<td class='content-amount'>{$balance}</td>";
                        $html .= "</tr>";
                    }
                }
            }
        }
        $html .= "</tbody>";

        //result of group
        $total = abs(getGroupInRetainedAccount($group['grouptype'], $year, $month));
        $resultText = $group['grouptype'] == "IC" ? "Gross Profit" : "Total Expense";
        $html .= "<tfoot>";
        $html .= "<tr>";
        $html .= "<td>{$resultText}</td>";
        $html .= "<td class='content-amount'>{$total}</td>";
        $html .= "</tr>";
        $html .= "</tfoot>";
        $html .= "</table>";
    }

    $html .= "</section>";
    // net sales or loss section
    $netSalesOrLoss = calculateNetSalesOrLoss($year, $month);
    $textSalesOrLoss = $netSalesOrLoss > 0 ? "Net Sales" : "Net Loss";
    $netSalesOrLoss = abs($netSalesOrLoss);
    $html .= "<section>";
    $html .= "<table>";
    $html .= "<tfoot>";
    $html .= "<tr>";
    $html .= "<td>{$textSalesOrLoss}</td>";
    $html .= "<td class='content-amount'>{$netSalesOrLoss}</td>";
    $html .= "</tr>";
    $html .= "</tfoot>";
    $html .= "</table>";
    $html .= "</section>";
    return $html;
}
?>