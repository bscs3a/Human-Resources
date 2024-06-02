<?php
require_once 'otherGroups/salary.php';
require_once 'pondo/generalPondo.php';
// require_once 'ponod/insertPondo.php';

$department = 'Product Order';
$cashAccount = 'Cash on hand';


var_dump(pondoForEveryone($department));

echo getExpensesPondo($department, $cashAccount);

echo getRemainingPondo($department, "Cash on hand") + getRemainingPondo($department, "Cash on bank");
// echo getRemainingHRPondo($paymentMethod);