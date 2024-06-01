<?php 
require_once 'public/finance/functions/generalFunctions.php';

// pag may nanakaw
function recordStolen($amount){

    $amount = floatval($amount);
    if (is_numeric($amount) && $amount <= 0){
        throw new Exception("Amount must be a number or greater than 0");
    }

    $theftExpense = getLedgerCode('Theft Expense');
    $inventory = getLedgerCode('Inventory');

    $valueInventory = getAccountBalanceV2($inventory);


    if($amount > $valueInventory){
        throw new Exception("Amount to be stolen is greater than the value of the inventory");
    }
    return insertLedgerXact($theftExpense,$inventory, $amount, "Missing Inventory");
}

// recounting every end of mon th
function recountInventory($amount){
    if ($amount <= 0){
        throw new Exception("Amount must be a number or greater than 0");
    }

    $costOfGoodsSold = getLedgerCode('Cost of Goods Sold');
    $inventory = getLedgerCode('Inventory');

    $valueInventory = getAccountBalanceV2($inventory);

    if($amount > $valueInventory){
        throw new Exception("Amount to be recounted is greater than the value of the inventory");
    }

    return insertLedgerXact($costOfGoodsSold,$inventory, $amount, "Recount Inventory");
}

// ONLY USE IF YOU WANT THE GENERAL VALUE OF INVENTORY - ASK PO IF NOT
function getFinanceInventoryValue(){
    $inventory = getLedgerCode('Inventory');
    return getAccountBalanceV2($inventory);
}



?>