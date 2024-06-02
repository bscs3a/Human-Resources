<?php
require_once 'public/finance/functions/generalFunctions.php';
require_once 'public\finance\functions\pondo\insertPondo.php';
require_once 'public\finance\functions\pondo\generalPondo.php';
function recordBuyingInventory($amount, $paymentMethod){
    $inventory = getLedgerCode('Inventory');
    $department = "Product Order";

    if ($amount <= 0) {
        throw new Exception("Amount is less than or equal to 0");
    }
    if($paymentMethod !== "Cash on hand" && $paymentMethod !== "Cash on bank" ){
        throw new Exception("Payment must be cash on hand or cash on bank");
    }

    $remValue = getRemainingProductOrderPondo($paymentMethod);

    if($amount > $remValue){
        throw new Exception("Amount to be bought is greater than the remaining pondo of the department");
    }

    // divide it to the 2; to avoid error
    return addTransactionPondo($inventory, $paymentMethod, $amount);
}

// only use when you want to get your remaining pondo
function getRemainingProductOrderPondo($paymentMethod){

    $department = "Product Order";

    if($paymentMethod !== "Cash on hand" && $paymentMethod !== "Cash on bank" ){
        throw new Exception("Payment must be cash on hand or cash on bank");
    }

    $remValue = getRemainingPondo($department, $paymentMethod);
    return $remValue;
}
function cancelOrder($id){
    $db = Database::getInstance();
    $conn = $db->connect();

    $sql = "SELECT lt_id FROM funds_transaction WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    $sql = "DELETE FROM funds_transaction WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    $sql = "DELETE FROM ledgertransaction WHERE LedgerXactID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$result]);

    return;
}


?>