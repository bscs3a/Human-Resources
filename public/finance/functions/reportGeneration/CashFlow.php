<?php
require_once 'public\finance\functions\generalFunctions.php';
// get account balanced(ledger) depending on cash
// favors debit(returns positive if the value is debit, returns negative if the value is credit)
function getAccountBalanceBasedOnCash($ledgerNo, $year, $month){
    $cashOnHand = getLedgerCode("Cash on Hand");
    $cashInBank = getLedgerCode("Cash on Bank");
    $ledgerNo = getLedgerCode($ledgerNo);
    if(!$cashInBank || !$cashOnHand || !$ledgerNo){
        throw new Exception("Ledgers accounts not found");
    }
    if(!is_numeric($year) && !is_numeric($month) && $month < 1 && $month > 12){
        throw new Exception("Year and month are wrong");
    }

    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT 
    (SUM(
        CASE 
            WHEN LedgerNo_Dr = :cashOnHand OR LedgerNo_Dr = :cashInBank THEN amount 
            ELSE 0 
        END) 
    -
    SUM(
        CASE 
            WHEN LedgerNo = :cashOnHand OR LedgerNo = :cashInBank THEN amount 
            ELSE 0 
        END)) 
    as balance
    FROM ledgertransaction
    WHERE YEAR(datetime) = :year AND MONTH(datetime) = :month AND (ledgerNo = :ledgerNo OR ledgerNo_dr = :ledgerNo)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'cashOnHand' => $cashOnHand,
        'cashInBank' => $cashInBank,
        'year' => $year,
        'month' => $month,
        'ledgerNo' => $ledgerNo
    ]);

    $row = $stmt->fetch();
    return $row['balance'];
}
// get account type balance based on cash
function getAccountTypeBalanceBasedOnCash($accounttype, $year, $month){
    $cashOnHand = getLedgerCode("Cash on Hand");
    $cashInBank = getLedgerCode("Cash on Bank");
    $accounttype = getAccountCode($accounttype);
    if(!$cashInBank || !$cashOnHand || !$accounttype){
        throw new Exception("Ledgers accounts not found");
    }
    if(!is_numeric($year) && !is_numeric($month) && $month < 1 && $month > 12){
        throw new Exception("Year and month are wrong");
    }

    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT 
    (SUM(
        CASE 
            WHEN lt.LedgerNo_Dr = :cashOnHand OR lt.LedgerNo_Dr = :cashInBank THEN amount 
            ELSE 0 
        END) 
    -
    SUM(
        CASE 
            WHEN lt.LedgerNo = :cashOnHand OR lt.LedgerNo = :cashInBank THEN amount 
            ELSE 0 
        END)) 
    as balance
    FROM ledgertransaction as lt
    JOIN ledger as cr ON lt.LedgerNo = cr.LedgerNo
    JOIN ledger as dr ON lt.LedgerNo_Dr = dr.LedgerNo
    WHERE YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month AND (dr.accounttype = :accounttype OR cr.accounttype = :accounttype)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'cashOnHand' => $cashOnHand,
        'cashInBank' => $cashInBank,
        'year' => $year,
        'month' => $month,
        'accounttype' => $accounttype
    ]);

    $row = $stmt->fetch();
    return $row['balance'];
}
function getGroupTypeBalanceBasedOnCash($grouptype, $year, $month){
    $cashOnHand = getLedgerCode("Cash on Hand");
    $cashInBank = getLedgerCode("Cash on Bank");
    $grouptype = getGroupCode($grouptype);
    if(!$cashInBank || !$cashOnHand || !$grouptype){
        throw new Exception("Ledgers accounts not found");
    }
    if(!is_numeric($year) && !is_numeric($month) && $month < 1 && $month > 12){
        throw new Exception("Year and month are wrong");
    }

    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT 
    (SUM(
        CASE 
            WHEN lt.LedgerNo_Dr = :cashOnHand OR lt.LedgerNo_Dr = :cashInBank THEN amount 
            ELSE 0 
        END) 
    -
    SUM(
        CASE 
            WHEN lt.LedgerNo = :cashOnHand OR lt.LedgerNo = :cashInBank THEN amount 
            ELSE 0 
        END)) 
    as balance
    FROM ledgertransaction as lt
    JOIN ledger as cr ON lt.LedgerNo = cr.LedgerNo
    JOIN ledger as dr ON lt.LedgerNo_Dr = dr.LedgerNo
    JOIN accounttype as cr_at ON cr.accounttype = cr_at.accounttype
    JOIN accounttype as dr_at ON dr.accounttype = dr_at.accounttype
    WHERE YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month AND (cr_at.grouptype = :grouptype OR dr_at.grouptype = :grouptype)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'cashOnHand' => $cashOnHand,
        'cashInBank' => $cashInBank,
        'year' => $year,
        'month' => $month,
        'grouptype' => $grouptype
    ]);

    $row = $stmt->fetch();
    return $row['balance'];
}
//generate cash flow report
// cash from operations, cash flow from investing
function generateCashFlowReport($year, $month){
    
    $assets = getGroupCode("Asset");
    $liabilitiesAndOE = getGroupCode("liabilities and owner's equity");
    $income = getGroupCode("Income");
    $expense = getGroupCode("Expenses");

    if(!$assets || !$liabilitiesAndOE || !$income || !$expense){
        throw new Exception("Group Codes not found");
    }

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
    $html .= generateCashFlowOperations($year, $month);
    $html .= generateCashFlowInvesting($year, $month);
    $html .= "</section>";
    $html .= generateEndingCashFlow($year, $month);
    return $html;
}

function generateCashFlowOperations($year, $month){
    $incomeCode = getGroupCode("Income");
    $expenseCode = getGroupCode("Expenses");
    
    
    $html = "<table>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th colspan='2' class='text-left'>Cash Flow from Operations</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";

    //net earnings from cash
    $netEarnings = abs(getGroupTypeBalanceBasedOnCash($incomeCode, $year, $month)) - abs(getGroupTypeBalanceBasedOnCash($expenseCode, $year, $month));
    $html .= "<tr class='table-content'>";
        $html .= "<td class='content'>Net Earnings</td>";
        $html .= "<td class='content-amount'>".$netEarnings."</td>";
    $html .= "</tr>";

    //get all accounts balance except fixed assets
    $allLedgerAccounts = getAllLedgerAccounts();
    $notIncludedAccounts = getAllLedgerAccounts(getAccountCode("Fixed assets"));

    $incomeAccountsType = getAllAccountTypes("Income");
    foreach ($incomeAccountsType as $account) {
        $notIncludedAccounts = array_merge(getAllLedgerAccounts($account['AccountType']), $notIncludedAccounts);
    }
    $expenseAccountsType = getAllAccountTypes("Expenses");
    foreach ($expenseAccountsType as $account) {
        $notIncludedAccounts = array_merge(getAllLedgerAccounts($account['AccountType']), $notIncludedAccounts);
    }

    $notIncludedAccounts = array_column($notIncludedAccounts, 'ledgerno');

    $cashOnHand = getLedgerCode("Cash on hand");
    $cashOnBank = getLedgerCode("Cash on bank");

    array_push($notIncludedAccounts, $cashOnHand, $cashOnBank);

    $allLedgerAccounts = array_filter($allLedgerAccounts, function($ledger) use ($notIncludedAccounts){
        return !in_array($ledger['ledgerno'], $notIncludedAccounts);
    });
    foreach ($allLedgerAccounts as $key => $ledger) {
        $balance = getAccountBalanceBasedOnCash($ledger['ledgerno'], $year, $month);
        $allLedgerAccounts[$key]["balance"] = $balance;
    }
    $positiveAccounts = array_filter($allLedgerAccounts, function($ledger) {
        return $ledger['balance'] > 0;
    });
    
    $negativeAccounts = array_filter($allLedgerAccounts, function($ledger) {
        return $ledger['balance'] < 0;
    });

    //additions
    $html .= "<tr class='table-classifier'>";
    $html .= "<td colspan='2' class='classifier'>Additions</td>";
    $html .= "</tr>";
    foreach ($positiveAccounts as $ledger) {
        $html .= "<tr class='table-content'>";
        $html .= "<td class='content'>".$ledger['name']."</td>";
        $html .= "<td class='content-amount'>".$ledger['balance']."</td>";
        $html .= "</tr>";
    }

    //subtractions
    $html .= "<tr class='table-classifier'>";
    $html .= "<td colspan='2' class='classifier'>Subtractions</td>";
    $html .= "</tr>";
    foreach ($negativeAccounts as $ledger) {
        $html .= "<tr class='table-content'>";
        $html .= "<td class='content'>".$ledger['name']."</td>";
        $html .= "<td class='content-amount'>(".abs($ledger['balance']).")</td>";
        $html .= "</tr>";
    }

    $html .= "</tbody>";

    // total section
    $total = 0 + getAccountBalance("Cash on Hand",true, $year, $month) + getAccountBalance("Cash on Bank",true, $year, $month) - getAccountTypeBalanceBasedOnCash(getAccountCode("Fixed assets"), $year, $month);
    $html .= "<tfoot>";
    $html .= "<tr>";
    $html .= "<td>Net Total Cash from Operations</td>";
    $html .= "<td class ='content-amount'>".$total."</td>";
    $html .= "</tr>";
    $html .= "</tfoot>";
    $html .= "</table>";

    return $html;
}   

function generateCashFlowInvesting($year, $month){
    //all fixed assets
    $fixedAssetsCode = getAccountCode("Fixed assets");
    $allFixedAssets = getAllLedgerAccounts($fixedAssetsCode);

    $html = "<section>";
    $html .= "<table>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th colspan='2' class='text-left'>Cash Flow from Investing</th>";
    $html .= "</tr>";
    $html .= "</thead>";
    $html .= "<tbody>";
    foreach ($allFixedAssets as $ledger) {
        $balance = getAccountBalanceBasedOnCash($ledger['ledgerno'], $year, $month);
        // dont show ledger if balance is 0
        if($balance == 0){
            continue;
        }
        $html .= "<tr class='table-content'>";
        $html .= "<td class='content'>{$ledger['name']}</td>";
        $html .= "<td class='content-amount'>{$balance}</td>";
        $html .= "</tr>";
    }
    $html .= "</tbody>";

    // total section
    $total = 0 + getAccountTypeBalanceBasedOnCash($fixedAssetsCode, $year, $month);
    $html .= "<tfoot>";
    $html .= "<tr>";
    $html .= "<td>Net Total Cash from Investing</td>";
    $html .= "<td  class ='content-amount'>".$total."</td>";
    $html .= "</tr>";
    $html .= "</tfoot>";
    $html .= "</table>";
    $html .= "</section>";

    return $html;
}

//generate end result
function generateEndingCashFlow($year, $month){
    if(!is_numeric($year) && !is_numeric($month) && $month < 1 && $month > 12){
        throw new Exception("Year and month are wrong");
    }
    $monthName = getMonthName($month);
    $total = getAccountBalance("Cash on Hand",true, $year, $month) + getAccountBalance("Cash on Bank",true, $year, $month);
    $html = "<section>";
    $html .= "<table>";
    $html .= "<tfoot>";
    $html .= "<tr>";
    $html .= "<td>Cash Flow for Month Ended ".$monthName." ". $year."</td>";
    $html .= "<td class = 'content-amount'>{$total}</td>";
    $html .= "</tr>";
    $html .= "</tfoot>";
    $html .= "</table>";
    $html .= "</section>";

    return $html;
}

function getMonthName($month){
    if ($month < 1 || $month > 12) {
        throw new Exception("Invalid month");
    }
    return date('F', mktime(0, 0, 0, $month, 10)); 
}