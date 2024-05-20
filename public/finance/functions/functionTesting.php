<?php
require_once "otherGroups\inventory.php";
require_once "otherGroups\productOrder.php";
require_once "otherGroups\salary.php";
require_once "otherGroups\sales.php";
session_start();
session_destroy();
$department = "Human Resources";


$totalExpenses = getExpensesPondo($department, 'Cash on hand') + getExpensesPondo($department, 'Cash on bank');

$cashOnHand = getRemainingPondo($department, "Cash on hand");
$cashOnBank = getRemainingPondo($department, "Cash on bank");
$remainingPondo = $cashOnHand + $cashOnBank;

echo $totalExpenses;
echo $remainingPondo;
echo $cashOnHand;
echo $cashOnBank;