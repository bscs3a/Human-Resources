<?php
require_once 'generalFunctions.php';


$year = 2024;
$bool = true;
$month = 4;
$retained = getLedgerCode("Retained Earnings/Loss");


echo getAccountBalance($retained,$bool,$year,$month);