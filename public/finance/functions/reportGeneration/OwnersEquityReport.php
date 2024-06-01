<?php
require_once "public\\finance\\functions\\reportGeneration\IncomeReport.php";
//get all account in owner's equity
//designate the percentage
//distribute the loss/profit in the owner's equity
//display in html


function calculateShare($accountNumber,$year,$month){
    $CAPITAL = "Capital Accounts";

    $accountNumber = getLedgerCode($accountNumber);

    if ($accountNumber === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    //get share
    $accountBalance = abs(getAccountBalanceV2($accountNumber, true, $year, $month));
    $allBalance = abs(getTotalOfAccountTypeV2($CAPITAL,$year,$month));
    //divide it by total share
    if($allBalance == 0){
        $allBalance = 1;
    }
    return round($accountBalance/$allBalance,3);
}

function divideTheGainLoss($accountNumber, $year, $month){
    return round(calculateNetSalesOrLoss($year, $month) * calculateShare($accountNumber, $year, $month), 3);
}

function insertShare($accountNumber, $year, $month){
    $retained = getLedgerCode("Retained Earnings/Loss");
    // if retained is 0 for the month, that means its already been processed

    //credit is negative, debit is positive(but in income its the opposite so * -1)
    $retainedValue = getAccountBalance($retained, true, $year, $month) * -1;
    if($retainedValue == 0){
        return;
    }

    //check account if its 0
    //credit is negative, debit is positive(but in capital accounts its the opposite so * -1)
    $accountValue = getAccountBalanceV2($accountNumber, true, $year, $month) * -1;
    if($accountValue <= 0)
    {
        return;
    }

    $accountNumber = getLedgerCode($accountNumber);

    if ($accountNumber === false) {
        throw new Exception("Account not found in Ledger table.");
    }
    // default is earnings
    $debitLedger = $retained;
    $creditLedger = $accountNumber;
    
    if($retainedValue < 0){
        $debitLedger = $accountNumber;
        $creditLedger = $retained;
    }

    $amount = divideTheGainLoss($accountNumber, $year, $month);
    insertLedgerXact($debitLedger, $creditLedger, $amount, "Dividing Earnings or Loss", $year, $month);
}

function insertAllShares($year, $month){
    $db = Database::getInstance();
    $conn = $db->connect();
    // get the all of the ledger(code) that has a group type of IC or EP
    $CAPITAL = getAccountCode("Capital Accounts");
    $sql = "SELECT *
        FROM Ledger l 
        INNER JOIN AccountType a ON l.AccountType = a.AccountType 
        WHERE a.accounttype = :capital";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':capital', $CAPITAL);
    $stmt->execute();
    $ledgers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($ledgers as $ledger) {
        // close the accounts by transfering it through retained earnings/loss
        insertShare($ledger['ledgerno'], $year, $month);
    }


    //declare owner (the purpose of code below is to put the rest of the earnings or loss to the first owner)
    $OWNER_LEDGER = getLedgerCode("A account");
    $retainedCode = getLedgerCode("Retained Earnings/Loss");
    // debit is positive, credit is negative(but in retained, its the opposite)
    $remainingRetainedValue = getAccountBalance($retainedCode, true, $year, $month) * -1;
    if($remainingRetainedValue == 0){
        return;
    }
    // insert the remaining to the owner
    $debitLedger = $retainedCode;
    $creditLedger = $OWNER_LEDGER;
    
    if($remainingRetainedValue < 0){
        $debitLedger = $OWNER_LEDGER;
        $creditLedger = $retainedCode;
    }

    insertLedgerXact($debitLedger, $creditLedger, $remainingRetainedValue, "giving the remaining to the owner", $year, $month);
}

function generateOEReport($year, $month){
    $db = Database::getInstance();
    $conn = $db->connect();
    insertAllShares($year, $month);
    
    $CAPITAL = getAccountCode("Capital Accounts");
    $stmt = $conn->prepare('SELECT * FROM ledger l 
    INNER JOIN accounttype at ON at.accounttype = l.accounttype 
    WHERE l.accounttype = :condition ');
    $stmt->bindParam(':condition', $CAPITAL);
    $stmt->execute();
    
    $ledger_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Sort grouptype_data(in descending order -- needed)
    usort($ledger_data, function($a, $b) {
        return strcmp($b['grouptype'], $a['grouptype']);
    });
    
    $html = "<tbody>";
    $pastYear = $year;
    $pastMonth = $month - 1;
    if($month == 1){
        $pastYear = $year - 1;
        $pastMonth = 12;
    }
    
    foreach ($ledger_data as $ledger) {
        if(getAccountBalanceV2($ledger['ledgerno'], true, $year, $month) == 0){
            continue;
        }
        $pastValue = getAccountBalanceV2($ledger["ledgerno"], true, $pastYear, $pastMonth) * -1;
        $investment = getInvestment($ledger['ledgerno'], $year, $month);
        $withdrawals = getWithdrawals($ledger['ledgerno'], $year, $month);
        $accountSharing = getAccountBalanceInRetainedAccount($ledger['ledgerno'], $year, $month) * -1;
        $finalValue = $pastValue + $investment - $withdrawals + $accountSharing;
        $html .= "<tr>";
        $html .= "<td>".$ledger["name"]."</td>"; //name
        $html .= "<td>".$pastValue."</td>"; //account balance last month
        $html .= "<td>".$investment."</td>"; // additional investment
        $html .= "<td>".$withdrawals."</td>"; //withdrawals
        $html .= "<td>".$accountSharing."</td>"; // net income/loss divided
        $html .= "<td>".$finalValue."</td>"; // get the current total
        $html .= "</tr>";
    }
    
    $html .= "</tbody>";
    $html .= "<tfoot>";
    $html .= "<tr>";
    $html .= "<td>Total</td>"; //place holder for name
    $totalPastValue = getTotalOfAccountTypeV2($CAPITAL,$pastYear,$pastMonth);
    $totalInvestment = getWholeInvestment($year,$month);
    $totalWithdrawals = getWholeWithdrawals($year,$month);
    $totalNet= calculateNetSalesOrLoss($year, $month);
    $endingValue = $totalPastValue + $totalInvestment - $totalWithdrawals + $totalNet;
    $html .= "<td>".$totalPastValue."</td>"; //total investment last month
    $html .= "<td>".$totalInvestment."</td>"; // total additional investment this month
    $html .= "<td>".$totalWithdrawals."</td>"; // total withdrawals this month
    $html .= "<td>".$totalNet."</td>";// total net income/loss this month
    $html .= "<td>".$endingValue."</td>"; // ending value this month
    $html .= "</tr>";
    $html .= "</tfoot>";
    
    return $html;
}
// get the investment of the account holder total - excluding retained earnings
function getInvestment($accountNumber, $year = null, $month=null){
    $accountNumber = getLedgerCode($accountNumber);
    $retained = getLedgerCode("Retained Earnings/Loss");

    if ($accountNumber === false) {
        throw new Exception("Account not found in Ledger table.");
    }
    
    $db = Database::getInstance();
    $conn = $db->connect();
    // get everything that credited the investment account no; excluding retained earnings
    $sql = "SELECT * FROM LedgerTransaction WHERE LedgerNo = :accountNumber AND LedgerNo_Dr != :retained";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(datetime) = :year AND MONTH(datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountNumber', $accountNumber);
    $stmt->bindParam(':retained', $retained);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $balance = 0;
    foreach ($result as $row) {
        $balance += $row['amount'];
    }
    return $balance;
}

// get the withdrawals of the account holder total - excluding retained earnings
function getWithdrawals($accountNumber, $year = null, $month=null){
    $accountNumber = getLedgerCode($accountNumber);
    $retained = getLedgerCode("Retained Earnings/Loss");

    if ($accountNumber === false) {
        throw new Exception("Account not found in Ledger table.");
    }
    
    $db = Database::getInstance();
    $conn = $db->connect();
    // get everything that debited the investment account no; excluding retained earnings
    $sql = "SELECT * FROM LedgerTransaction WHERE LedgerNo_dr = :accountNumber AND LedgerNo != :retained";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(datetime) = :year AND MONTH(datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountNumber', $accountNumber);
    $stmt->bindParam(':retained', $retained);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $balance = 0;
    foreach ($result as $row) {
        $balance += $row['amount'];
    }
    return $balance;
}

function getWholeInvestment($year,$month){
    $retained = getLedgerCode("Retained Earnings/Loss");
    $accountTypeCode = getAccountCode("Capital Accounts");

    $db = Database::getInstance();
    $conn = $db->connect();
    // get everything that credited the investment account no; excluding retained earnings
    $sql = "SELECT * FROM LedgerTransaction lt
    JOIN Ledger l ON lt.LedgerNo = l.LedgerNo
    WHERE l.accounttype = :accountTypeCode 
    AND lt.LedgerNo_Dr != :retained";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountTypeCode', $accountTypeCode);
    $stmt->bindParam(':retained', $retained);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $balance = 0;
    foreach ($result as $row) {
        $balance += $row['amount'];
    }
    return $balance;
}

function getWholeWithdrawals($year, $month){
    $retained = getLedgerCode("Retained Earnings/Loss");
    $accountTypeCode = getAccountCode("Capital Accounts");

    $db = Database::getInstance();
    $conn = $db->connect();
    // get everything that credited the investment account no; excluding retained earnings
    $sql = "SELECT * FROM LedgerTransaction lt
    JOIN Ledger l ON lt.LedgerNo_Dr = l.LedgerNo
    WHERE l.accounttype = :accountTypeCode 
    AND lt.LedgerNo != :retained";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountTypeCode', $accountTypeCode);
    $stmt->bindParam(':retained', $retained);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $balance = 0;
    foreach ($result as $row) {
        $balance += $row['amount'];
    }
    return $balance;
}

//returns false if its not added, return true if its added
function checkShareIfAdded($accountNumber, $year, $month){
    $db = Database::getInstance();
    $conn = $db->connect();

    $RETAINED = getLedgerCode("Retained Earnings/Loss");

    $sql = "SELECT * FROM LedgerTransaction WHERE LedgerNo = :accountNumber AND LedgerNo_Dr = :retained AND YEAR(datetime) = :year AND MONTH(datetime) = :month";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountNumber', $accountNumber);
    $stmt->bindParam(':retained', $RETAINED);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':month', $month);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($result)) {
        return true;
    } 

    $sql = "SELECT * FROM LedgerTransaction WHERE LedgerNo_Dr = :accountNumber AND LedgerNo = :retained AND YEAR(datetime) = :year AND MONTH(datetime) = :month";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountNumber', $accountNumber);
    $stmt->bindParam(':retained', $RETAINED);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':month', $month);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($result)) {
        return true;
    } 

    return false;
}

function calculateShareV2($accountNumber,$fromYear,$fromMonth,$toYear,$toMonth){
    $CAPITAL = "Capital Accounts";

    $accountNumber = getLedgerCode($accountNumber);

    if ($accountNumber === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    //get share
    $accountBalance = abs(getAccountBalanceV3($accountNumber, $fromYear, $fromMonth, $toYear, $toMonth));

    $allBalance = abs(getTotalOfAccountTypeV3($CAPITAL,$fromYear,$fromMonth,$toYear,$toMonth));
    //divide it by total share
    if($allBalance == 0){
        $allBalance = 1;
    }
    return round($accountBalance/$allBalance,3);
}
?>