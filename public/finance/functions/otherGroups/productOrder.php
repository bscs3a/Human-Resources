<?php
require_once 'public/finance/functions/generalFunctions.php';
require_once 'public\finance\functions\pondo\insertPondo.php';
require_once 'public\finance\functions\pondo\generalPondo.php';
function recordBuyingInventory($amount){
    $inventory = getLedgerCode('Inventory');
    $department = "Product Order";

    if ($amount <= 0) {
        throw new Exception("Amount is less than or equal to 0");
    }
    

    $cashOnHand = 'Cash on hand';
    $cashOnBank = 'Cash on bank';


    $handValue = getRemainingPondo($department, $cashOnHand);
    $bankValue = getRemainingPondo($department, $cashOnBank);
    $total = $handValue + $bankValue;

    if($amount > $total){
        throw new Exception("Amount to be bought is greater than the remaining pondo of the department");
    }

    //get percentage
    $handPercentage = $handValue / $total;
    $bankPercentage = $bankValue / $total;

    //gets the value to insert
    $insertHand = $amount * $handPercentage;
    $insertBank = $amount * $bankPercentage;
    // fraction error handling
    if($insertHand + $insertBank != $amount){
        if($handValue > $bankValue){
            $insertHand += $amount - ($insertHand + $insertBank);
        }else{
            $insertBank += $amount - ($insertHand + $insertBank);
        }
    }

    // divide it to the 2; to avoid error
    addTransactionPondo($inventory, $cashOnHand, $insertHand);
    addTransactionPondo($inventory, $cashOnBank, $insertBank);

    return;
}

// only use when you want to get your remaining pondo
function getRemainingProductOrderPondo(){

    $department = "Product Order";

    $cashOnHand = 'Cash on hand';
    $cashOnBank = 'Cash on bank';

    $handValue = getRemainingPondo($department, $cashOnHand);
    $bankValue = getRemainingPondo($department, $cashOnBank);
    return $handValue + $bankValue;
}
?>