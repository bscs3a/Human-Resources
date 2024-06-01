<?php
require_once 'src\dbconn.php';
//get the value of 1 t-account - can return negative or positive
// debit is positive, credit is negative
function getAccountBalance($ledger, $considerDate = false, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $ledgerNo = getLedgerCode($ledger);

    if ($ledgerNo === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    if ($considerDate && is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql = "SELECT * FROM LedgerTransaction WHERE (ledgerno = ? OR ledgerNo_Dr = ?) AND YEAR(datetime) = ? AND MONTH(datetime) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ledgerNo, $ledgerNo, $year, $month]);
    } else {
        $sql = "SELECT * FROM LedgerTransaction WHERE ledgerno = ? OR ledgerNo_Dr = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ledgerNo, $ledgerNo]);
    }

    $balance = 0;
    
    while ($row = $stmt->fetch()) {
        if ($row['LedgerNo_Dr'] == $ledgerNo) {
            $balance += $row['amount'];
        } else if ($row['LedgerNo'] == $ledgerNo) {
            $balance -= $row['amount'];
        }
    }
    return $balance;
}

// used for getting the ledger code
function getLedgerCode($ledger){
    if($ledger === null){
        return false;
    }

    $db = Database::getInstance();
    $conn = $db->connect();

    // Check if the account exists in the Ledger table
    $sql = "SELECT ledgerno FROM Ledger WHERE ledgerno = ? OR name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ledger, $ledger]);
    $ledgerNo = $stmt->fetchColumn();

    return $ledgerNo;

}

//get the value of 1 group type - always returns positve
function getTotalOfGroup($groupType, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $groupType = getGroupCode($groupType);

    if ($groupType === false) {
        throw new Exception("Account not found in grouptype table.");
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
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
            WHERE at.groupType = :groupType";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return abs($netAmount);
}

function getGroupCode($groupType){
    if($groupType === null){
        return false;
    }
    $db = Database::getInstance();
    $conn = $db->connect();

    // Check if the account exists in the Ledger table
    $sql = "SELECT grouptype FROM grouptype WHERE grouptype = ? OR description = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$groupType, $groupType]);
    $groupCode = $stmt->fetchColumn();

    return $groupCode;

}

function getTotalOfAccountType($accountType, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $accountType = getAccountCode($accountType);

    if ($accountType === false) {
        throw new Exception("Account not found in accounttype table.");
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.accountType = :accountType";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountType', $accountType);
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
            WHERE at.accountType = :accountType";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountType', $accountType);
    if ($year !== null && $month !== null) {
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return abs($netAmount);
}

function getAccountCode($accountType){
    if($accountType === null){
        return false;
    }

    $db = Database::getInstance();
    $conn = $db->connect();

    // Check if the account exists in the Ledger table
    $sql = "SELECT accountType FROM accounttype WHERE accountType = ? OR Description = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$accountType, $accountType]);
    $accountCode = $stmt->fetchColumn();

    return $accountCode;

}
//insert into ledger transaction
function insertLedgerXact($debitLedger, $creditLedger, $amount, $details = null, $year = null, $month = null){
    $db = Database::getInstance();
    $conn = $db->connect();

    //get code and validate
    $debitLedger = getLedgerCode($debitLedger);
    if ($debitLedger === false) {
        throw new Exception("Account not found in debit ledger parameter.");
    }

    $creditLedger = getLedgerCode($creditLedger);
    if ($creditLedger === false) {
        throw new Exception("Account not found in credit ledger parameter");
    }

    if($amount === null || !is_numeric($amount)){
        throw new Exception("Amount must be a number.");
    }
    if($year !== null && !is_numeric($year)){
        throw new Exception("Year must be a number.");
    }
    if($month !== null && $month <= 1 && $month >= 12){
        throw new Exception("Month must be a number.");
    }
    if ($year !== null && $month !== null && ($month < 1 || $month > 12)) {
        throw new Exception("Month must be between 1 and 12.");
    }
    if (!$year && !$month){
        $datetime = new DateTime();
        $datetime = $datetime->format('Y-m-d H:i:s');
    }
    else {
        // when you need to consider the last avaiable date time of a month/year
        // Create a DateTime object for the first day of the next month
        $datetime = new DateTime("{$year}-{$month}-01");
        $datetime->modify('+1 month');
        // Subtract one second to get the last moment of the previous month
        $datetime->modify('-1 second');
        $datetime = $datetime->format('Y-m-d H:i:s');
    }
    
    
    $amount = abs($amount);
    $sql = "INSERT INTO ledgertransaction (details, amount, LedgerNo_Dr, LedgerNo, DateTime) VALUES (:details, :amount, :ledgerNo_Dr, :ledgerNo, :datetime)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':ledgerNo_Dr', $debitLedger);
    $stmt->bindParam(':ledgerNo', $creditLedger);
    $stmt->bindParam(':datetime', $datetime);

    try {
        if ($stmt->execute()) {
            $lastInsertedId = $conn->lastInsertId();
            return $lastInsertedId;
        } else {
            throw new Exception("Transaction failed.");
        }
    } catch (PDOException $e) {
        throw new Exception("Error: " . $e->getMessage());
    }

}

// GET account balance upto a date
function getAccountBalanceV2($ledger, $considerDate = false, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $ledgerNo = getLedgerCode($ledger);

    if ($ledgerNo === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    if ($considerDate && is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $date = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-31 23:59:59';
        $sql = "SELECT * FROM LedgerTransaction WHERE (ledgerno = ? OR ledgerNo_Dr = ?) AND datetime <= ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ledgerNo, $ledgerNo, $date]);
    } else {
        $sql = "SELECT * FROM LedgerTransaction WHERE ledgerno = ? OR ledgerNo_Dr = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ledgerNo, $ledgerNo]);
    }

    $balance = 0;

    while ($row = $stmt->fetch()) {
        if ($row['LedgerNo_Dr'] == $ledgerNo) {
            $balance += $row['amount'];
        } else if ($row['LedgerNo'] == $ledgerNo) {
            $balance -= $row['amount'];
        }
    }
    return $balance;
}

//get account type balance upto a date
// debit is negative, credit is positive
function getTotalOfAccountTypeV2($accountType, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();
    
    $accountType = getAccountCode($accountType);
    
    if ($accountType === false) {
        throw new Exception("Account not found in accounttype table.");
    }
    
    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.accountType = :accountType";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $sql .= " AND YEAR(lt.datetime) <= :year AND MONTH(lt.datetime) <= :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountType', $accountType);
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
    WHERE at.accountType = :accountType";
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
    $sql .= " AND YEAR(lt.datetime) = :year AND MONTH(lt.datetime) = :month";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountType', $accountType);
    if ($year !== null && $month !== null) {
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    }
    $stmt->execute();
    
    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }
    
    return abs($netAmount);
}

//get account type balance upto a date
function getTotalOfGroupV2($groupType, $year = null, $month = null) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $groupType = getGroupCode($groupType);

    if ($groupType === false) {
        throw new Exception("Group not found in grouptype table.");
    }

    $date = null;
    if (is_numeric($year) && is_numeric($month) && $month >= 1 && $month <= 12) {
        $date = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-31 23:59:59';
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType";
    if ($date !== null) {
        $sql .= " AND lt.datetime <= :date";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    if ($date !== null) {
        $stmt->bindParam(':date', $date);
    }
    $stmt->execute();

    $netAmount = 0;

    while ($row = $stmt->fetch()) {
        $netAmount += $row['amount'];
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo_dr = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType";
    if ($date !== null) {
        $sql .= " AND lt.datetime <= :date";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    if ($date !== null) {
        $stmt->bindParam(':date', $date);
    }
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return abs($netAmount);
}


//get all ledger transaction with limit
function getLedgerTransactions($limit = null){  
    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT *, cr.name AS cr_name, dr.name AS dr_name FROM LedgerTransaction lt
    JOIN Ledger cr ON lt.ledgerNo = cr.ledgerNo
    JOIN Ledger dr ON lt.ledgerNo_Dr = dr.ledgerNo
    ORDER BY lt.datetime DESC";
    if (is_numeric($limit)) {
        $sql .= " LIMIT " . (int)$limit;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result; 
}

//get all ledger accounts
function getAllLedgerAccounts($accountType = null){
    $db = Database::getInstance();
    $conn = $db->connect();
    if($accountType !== null)
    {
        $accountType = getAccountCode($accountType);
        if ($accountType === false) {
            throw new Exception("Account not found in accountype table.");
        }
    }
    if($accountType === null){
        $sql = "SELECT * FROM Ledger";
        $stmt = $conn->prepare($sql);
    }else{
        $sql = "SELECT * FROM Ledger WHERE accountType = :accountType";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':accountType', $accountType);
    }
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
//get all account type
function getAllAccountTypes($groupType = null){
    $db = Database::getInstance();
    $conn = $db->connect();

    if($groupType !== null)
    {
        $groupType = getGroupCode($groupType);
        if ($groupType === false) {
            throw new Exception("Account not found in grouptype table.");
        }
    }

    
    if($groupType === null){
        $sql = "SELECT * FROM AccountType";
        $stmt = $conn->prepare($sql);
    }else{
        $sql = "SELECT * FROM AccountType WHERE grouptype = :grouptype";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':grouptype', $groupType);
    }
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

//get all group type
function getAllGroupTypes(){
    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT * FROM GroupType";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


//v3 have special functions to get FROM A DATE --- TO A DATE
function getAccountBalanceV3($ledger, $fromYear, $fromMonth, $toYear, $toMonth) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $ledgerNo = getLedgerCode($ledger);

    if ($ledgerNo === false) {
        throw new Exception("Account not found in Ledger table.");
    }

    // Format the dates
    $fromDate = sprintf('%04d-%02d-01', $fromYear, $fromMonth);
    $toDate = new DateTime(sprintf('%04d-%02d-01', $toYear, $toMonth));
    $toDate->modify('last day of this month');
    $toDate = $toDate->format('Y-m-d');

    $sql = "SELECT * FROM LedgerTransaction WHERE (ledgerno = ? OR ledgerNo_Dr = ?) AND datetime BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$ledgerNo, $ledgerNo, $fromDate, $toDate]);

    $balance = 0;

    while ($row = $stmt->fetch()) {
        if ($row['LedgerNo_Dr'] == $ledgerNo) {
            $balance += $row['amount'];
        } else if ($row['LedgerNo'] == $ledgerNo) {
            $balance -= $row['amount'];
        }
    }
    return $balance;
}

function getTotalOfAccountTypeV3($accountType, $fromYear, $fromMonth, $toYear, $toMonth) {
    $db = Database::getInstance();
    $conn = $db->connect();
    
    $accountType = getAccountCode($accountType);
    
    if ($accountType === false) {
        throw new Exception("Account not found in accounttype table.");
    }
    
    $fromDate = "{$fromYear}-{$fromMonth}-01";
    $toDate = date("Y-m-t", strtotime("{$toYear}-{$toMonth}-01"));

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.accountType = :accountType AND lt.datetime BETWEEN :fromDate AND :toDate";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountType', $accountType);
    $stmt->bindParam(':fromDate', $fromDate);
    $stmt->bindParam(':toDate', $toDate);
    $stmt->execute();
    
    $netAmount = 0;
    
    while ($row = $stmt->fetch()) {
        $netAmount += $row['amount'];
    }
    
    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo_dr = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.accountType = :accountType AND lt.datetime BETWEEN :fromDate AND :toDate";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':accountType', $accountType);
    $stmt->bindParam(':fromDate', $fromDate);
    $stmt->bindParam(':toDate', $toDate);
    $stmt->execute();
    
    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }
    
    return abs($netAmount);
}

function getTotalOfGroupV3($groupType, $fromYear, $fromMonth, $toYear, $toMonth) {
    $db = Database::getInstance();
    $conn = $db->connect();

    $groupType = getGroupCode($groupType);

    if ($groupType === false) {
        throw new Exception("Group not found in grouptype table.");
    }

    $fromDate = "{$fromYear}-{$fromMonth}-01";
    $toDate = date("Y-m-t", strtotime("{$toYear}-{$toMonth}-01"));

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType AND lt.datetime BETWEEN :fromDate AND :toDate";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    $stmt->bindParam(':fromDate', $fromDate);
    $stmt->bindParam(':toDate', $toDate);
    $stmt->execute();

    $netAmount = 0;

    while ($row = $stmt->fetch()) {
        $netAmount += $row['amount'];
    }

    $sql = "SELECT lt.* FROM LedgerTransaction lt
            JOIN Ledger l ON lt.ledgerNo_dr = l.ledgerNo
            JOIN AccountType at ON l.accountType = at.accountType
            WHERE at.groupType = :groupType AND lt.datetime BETWEEN :fromDate AND :toDate";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':groupType', $groupType);
    $stmt->bindParam(':fromDate', $fromDate);
    $stmt->bindParam(':toDate', $toDate);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $netAmount -= $row['amount'];
    }

    return abs($netAmount);
}

?>
