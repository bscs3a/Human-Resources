<?php
// require_once "../pondo/insertPondo.php";
// require_once "../generalFunctions.php";
require_once "public/finance/functions/generalFunctions.php";
require_once "public/finance/functions/pondo/insertPondo.php";

//for accounts payable
function getAllPayable()
{
    $db = Database::getInstance();
    $conn = $db->connect();

    $AP = getAccountCode("Accounts Payable");
    $sql = "SELECT * FROM ledger WHERE accounttype = :AP";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':AP', $AP);
    $stmt->execute();
    $ledgers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $results = [];
    foreach ($ledgers as $ledger) {
        $ledgerNo = $ledger['ledgerno'];
        $name = $ledger['name'];
        $results[] = [
            'ledgerno' => $ledgerNo,
            'name' => $name,
            'contact_name' => $ledger['contactName'],
            'contact' => $ledger['contactIfLE'],
            'total_amount' => getValueOfInvestor($ledgerNo)
        ];
    }
    return $results;
}

// for tax payable
function getAllTaxPayable()
{
    $db = Database::getInstance();
    $conn = $db->connect();

    $TP = getAccountCode("Tax Payable");
    $sql = "SELECT * FROM ledger WHERE accounttype = :TP";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':TP', $TP);
    $stmt->execute();
    $ledgers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $results = [];
    foreach ($ledgers as $ledger) {
        $ledgerNo = $ledger['ledgerno'];
        $name = $ledger['name'];
        $results[] = [
            'ledgerno' => $ledgerNo,
            'name' => $name,
            'contact_name' => $ledger['contactName'],
            'contact' => $ledger['contactIfLE'],
            'total_amount' => getValueOfInvestor($ledgerNo)
        ];
    }
    return $results;
}

// get total value of payble minus the paid amount
function getValueOfPayable($accountNumber)
{
    return abs(getAccountBalanceV2($accountNumber));
}


// add loan to account
function borrowPayable($accountNumber, $assetCode, $amount)
{
    $accountNumber = getLedgerCode($accountNumber);
    $assetCode = getLedgerCode($assetCode);

    if ($amount <= 0) {
        throw new Exception("Amount must be greater than 0");
    }
    if (!$accountNumber) {
        throw new Exception("Account number not found");
    }
    if (!$assetCode) {
        throw new Exception("Asset code not found");
    }

    insertLedgerXact($assetCode, $accountNumber, $amount, "Boroww on $accountNumber with $assetCode");
    return;
}

//withdraw investment 
function payPayable($accountNumber, $assetCode, $amount)
{
    $accountNumber = getLedgerCode($accountNumber);
    $assetCode = getLedgerCode($assetCode);

    $currentPayable = getValueOfPayable($accountNumber);

    if ($amount <= 0) {
        throw new Exception("Amount must be greater than 0");
    }
    if ($amount > $currentPayable) {
        throw new Exception("Amount is greater than current payable");
    }
    if (!$accountNumber) {
        throw new Exception("Account number not found");
    }
    if (!$assetCode) {
        throw new Exception("Asset code not found");
    }
    
    $SALARY = getLedgerCode("Salary Payable");
    $WITHHOLDING_TAX = getLedgerCode("Withholding Tax Payable");

    if ($accountNumber == $SALARY || $accountNumber == $WITHHOLDING_TAX) {
        $HUMAN_RESOURCES = "Human Resources";
        echo addTransactionPondo($accountNumber, $assetCode, $amount, $HUMAN_RESOURCES);
        return;
    }
    insertLedgerXact($accountNumber, $assetCode, $amount, "Paid $accountNumber using $assetCode");
    return;
}

function addPayable($name, $contact, $contactName, $accountType)
{
    $accountType = getAccountCode($accountType);

    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "INSERT INTO Ledger (name, contactIfLE, contactName, accounttype) VALUES (:name, :contact, :contactName, :accounttype)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':contactName', $contactName);
    $stmt->bindParam(':accounttype', $accountType);
    $stmt->execute();
    return;
}

