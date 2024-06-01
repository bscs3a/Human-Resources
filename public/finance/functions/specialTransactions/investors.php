<?php
// require_once "../generalFunctions.php";
require_once "public/finance/functions/generalFunctions.php";

function getAllInvestors(){
    $db = Database::getInstance();
    $conn = $db->connect();  

    $CAPITAL = getAccountCode("Capital Accounts");
    $sql = "SELECT * FROM Ledger WHERE accounttype = :capital";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':capital', $CAPITAL);
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
function getValueOfInvestor($accountNumber){
    return abs(getAccountBalanceV2($accountNumber));
}

// add investment
function investAsset($accountNumber, $assetCode, $amount){
    $accountNumber = getLedgerCode($accountNumber);
    $assetCode = getLedgerCode($assetCode);

    if ($amount <= 0){
        throw new Exception("Amount must be greater than 0");
    }
    if(!$accountNumber){
        throw new Exception("Account number not found");
    }
    if(!$assetCode){
        throw new Exception("Asset code not found");
    }

    insertLedgerXact($assetCode,$accountNumber,$amount,"Investment of $accountNumber in $assetCode with $amount");
    return;
}

//withdraw investment
function withdrawAsset($accountNumber, $assetCode, $amount){
    $accountNumber = getLedgerCode($accountNumber);
    $assetCode = getLedgerCode($assetCode);

    $currentInvestment = getValueOfInvestor($accountNumber);

    if ($amount <= 0){
        throw new Exception("Amount must be greater than 0");
    }
    if($amount > $currentInvestment){
        throw new Exception("Amount is greater than current investment");
    }
    if(!$accountNumber){
        throw new Exception("Account number not found");
    }
    if(!$assetCode){
        throw new Exception("Asset code not found");
    }

    insertLedgerXact($accountNumber,$assetCode,$amount,"Investment of $accountNumber in $assetCode");
    return;
}

function addInvestor($name, $contact, $contactName){
    $CAPITAL = getAccountCode("Capital Accounts");

    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "INSERT INTO Ledger (name, contactIfLE, contactName, accounttype) VALUES (:name, :contact, :contactName, :CAPITAL)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':contactName', $contactName);
    $stmt->bindParam(':CAPITAL', $CAPITAL);
    $stmt->execute();
    return;
}
?>