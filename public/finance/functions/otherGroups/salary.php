<?php 
require_once "public/finance/functions/generalFunctions.php";
require_once "public/finance/functions\pondo\generalPondo.php";
require_once "public/finance/functions\pondo\insertPondo.php";
// get payment method
//check pending
function inputSalary($monthlySalary, $withHoldingTax, $isPending, $paymentMethod){
    $SALARY = getLedgerCode("Payroll");
    $SALARY_PAYABLE = getLedgerCode("Salary Payable");
    $WITHHOLDING_TAX_PAYABLE = getLedgerCode("Withholding Tax Payable");

    $totalSalary = $monthlySalary - $withHoldingTax;
    if($totalSalary <= 0){
        throw new Exception("Total Salary is less than 0");
    }

    if($paymentMethod !== "Cash on hand" && $paymentMethod !== "Cash on bank" ){
        throw new Exception("Payment must be cash on hand or cash on bank");
    }

    $hrRemainingPondo = getRemainingHRPondo($paymentMethod);

    if(!is_bool($isPending)){
        throw new Exception("isPending must be a boolean");
    }
    if(!$isPending && $hrRemainingPondo < $totalSalary){
        throw new Exception("HR Pondo is greater than the total salary");
    }
    if(!$isPending){
        addSalaryPondoHR($SALARY, $totalSalary, $paymentMethod);
    }
    else{
        insertLedgerXact($SALARY, $SALARY_PAYABLE, $totalSalary);
    }
    if($withHoldingTax > 0){
        insertLedgerXact($SALARY, $WITHHOLDING_TAX_PAYABLE, $withHoldingTax);
    }
    return;
}

function getRemainingHRPondo($paymentMethod){
    return getRemainingPondo("Human Resources", $paymentMethod);
}



// DO NOT TOUCH THIS FUNCTION
function addSalaryPondoHR($account, $amount, $paymentMethod){
    $department = "Human Resources";
    $remValue = getRemainingPondo($department, $paymentMethod);
    if($amount > $remValue){
        throw new Exception("Amount to be bought is greater than the remaining pondo of the department");
    }
    // divide it to the 2; to avoid error
    addTransactionPondo($account, $paymentMethod, $amount, $department);
    return;
}

function paySalaryPayable($monthlySalary, $withHoldingTax, $paymentMethod){
    $SALARY_PAYABLE = getLedgerCode("Salary Payable");
    // $WITHHOLDING_TAX_PAYABLE = getLedgerCode("Withholding Tax Payable");

    $totalSalary = $monthlySalary - $withHoldingTax;

    $remValue = getRemainingHRPondo($paymentMethod);
    if($totalSalary <= 0){
        throw new Exception("Total Salary is less than 0");
    }

    if($paymentMethod !== "Cash on hand" && $paymentMethod !== "Cash on bank" ){
        throw new Exception("Payment must be cash on hand or cash on bank");
    }
    if($remValue < $totalSalary){
        throw new Exception("HR Pondo is greater than the total salary");
    }
    addTransactionPondo($SALARY_PAYABLE, $paymentMethod, $totalSalary);
    if($withHoldingTax > 0){
        // addTransactionPondo($WITHHOLDING_TAX_PAYABLE, $paymentMethod, $withHoldingTax);
    }
}
?>