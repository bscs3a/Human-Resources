<?php 
require_once 'public/finance/functions/generalFunctions.php';



function addTransactionPondo($debitLedger, $creditLedger, $amount){
    $e_id = $_SESSION['user']['employee_id'];
    $department = $_SESSION['user']['role'];
    
    
    $db = Database::getInstance();
    $conn = $db->connect();
    
    $details = "Pondo expense for $department";
    $lt_id = insertLedgerXact($debitLedger, $creditLedger, $amount, $details);

    $sql = "INSERT INTO funds_transaction (lt_id, employee_id) VALUES (:lt_id, :e_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':lt_id', $lt_id);
    $stmt->bindParam(':e_id', $e_id);
    try{
        $stmt->execute();
    }catch(Exception $e){
        throw new Exception("Transaction failed");
    }

    return $conn->lastInsertId();
}

function validDebit(){
    $assetCode = getGroupCode('Asset');
    $expenseCode = getGroupCode('Expenses');


    $inventoryCode = getLedgerCode('Inventory');
    $payrollCode = getLedgerCode('Payroll');
    $interestExpense = getLedgerCode('Interest Expense');
    $incomeTax = getLedgerCode('Income Tax');
    $cashOnHand = getLedgerCode('Cash on Hand');
    $cashOnBank = getLedgerCode('Cash on Bank');


    $sql = "SELECT l.name, l.ledgerno, at.AccountType, gt.grouptype FROM Ledger as l
    JOIN accounttype as at ON l.AccountType = at.AccountType
    JOIN grouptype as gt ON at.grouptype = gt.grouptype
    WHERE (gt.grouptype = :assetCode OR gt.grouptype = :expenseCode)
    AND l.ledgerno != :inventoryCode AND l.ledgerno != :payrollCode AND l.ledgerno != :interestExpense
    AND l.ledgerno != :cashOnHand AND l.ledgerno != :cashOnBank 
    AND l.ledgerno != :incomeTax";
    $db = Database::getInstance();
    $conn = $db->connect();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':assetCode', $assetCode);
    $stmt->bindParam(':expenseCode', $expenseCode);
    $stmt->bindParam(':inventoryCode', $inventoryCode);
    $stmt->bindParam(':payrollCode', $payrollCode);
    $stmt->bindParam(':interestExpense', $interestExpense);
    $stmt->bindParam(':incomeTax', $incomeTax);
    $stmt->bindParam(':cashOnHand', $cashOnHand);
    $stmt->bindParam(':cashOnBank', $cashOnBank);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}

function validCredit(){
    $inventory = getLedgerCode('Inventory');
    $insurance = getLedgerCode('Insurance');

    $allLedgerAccounts = getAllLedgerAccounts("Current assets");

    $filteredLedgerAccounts = array_filter($allLedgerAccounts, function($ledgerAccount) use ($inventory, $insurance) {
        return $ledgerAccount['ledgerno'] !== $inventory && $ledgerAccount['ledgerno'] !== $insurance;
    });
    return $filteredLedgerAccounts;
}

