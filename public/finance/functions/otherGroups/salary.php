<?php 
require_once "public/finance/functions/generalFunctions.php";
require_once "public/finance/functions\pondo\generalPondo.php";

function inputSalary($monthlySalary, $withHoldingTax){
    $SALARY = getLedgerCode("Payroll");
    $SALARY_PAYABLE = getLedgerCode("Salary Payable");
    $WITHHOLDING_TAX_PAYABLE = getLedgerCode("Withholding Tax Payable");

    $totalSalary = $monthlySalary - $withHoldingTax;
    if($totalSalary <= 0){
        throw new Exception("Total Salary is less than 0");
    }
    $hrRemainingPondo = getRemainingHRPondo();
    if($hrRemainingPondo > $totalSalary){
        addSalaryPondoHR($SALARY, $totalSalary);
    }
    else{
        insertLedgerXact($SALARY, $SALARY_PAYABLE, $totalSalary);
    }
    if($withHoldingTax > 0){
        insertLedgerXact($SALARY, $WITHHOLDING_TAX_PAYABLE, $withHoldingTax);
    }
    return;
}

function getRemainingHRPondo(){

    $department = "Human Resources";

    $cashOnHand = 'Cash on hand';
    $cashOnBank = 'Cash on bank';

    $handValue = getRemainingPondo($department, $cashOnHand);
    $bankValue = getRemainingPondo($department, $cashOnBank);
    return $handValue + $bankValue;
}

// DO NOT TOUCH THIS FUNCTION
function addSalaryPondoHR($account, $amount){
    $department = "Human Resources";

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
    addTransactionPondo($account, $cashOnHand, $insertHand);
    addTransactionPondo($account, $cashOnBank, $insertBank);

    return;
}
?>