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
    addTransactionPondo($inventory, $paymentMethod, $amount);

    return;
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
?>