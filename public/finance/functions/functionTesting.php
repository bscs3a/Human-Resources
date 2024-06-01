<?php
require_once 'otherGroups/salary.php';
require_once 'pondo/generalPondo.php';
// require_once 'ponod/insertPondo.php';

$monthlySalary = 10000;
$withHoldingTax = 1000;
$isPending = true;
$paymentMethod = "Cash on bank";



echo inputSalary($monthlySalary, $withHoldingTax, $isPending, $paymentMethod);
// echo getRemainingHRPondo($paymentMethod);