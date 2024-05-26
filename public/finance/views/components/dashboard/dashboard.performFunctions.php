<?php 
//income report
//year
$curr_year = date('Y');
$prev_year = $curr_year - 1;

//month
$curr_month = date('m');
$prev_month = $curr_month - 1;


$num_months = 12;
$monthlyData = [];
$prevMonthlyData = [];
for ($i=1; $i <= $num_months ; $i++) { 
    closeAllAccounts($prev_year, $i);
    if($curr_month > $i){
        closeAllAccounts($curr_year, $i);
    }
    array_push($monthlyData, calculateNetSalesOrLoss($curr_year, $i));
    array_push($prevMonthlyData, calculateNetSalesOrLoss($prev_year, $i));
}

$netIncome = implode(', ', $monthlyData);
$prevNetIncome = implode(',', $prevMonthlyData);


if($prev_month == 0){
    $prev_month = 12;
}
$netSales = calculateNetSalesOrLoss($curr_year, $curr_month);
$prevNetSales = calculateNetSalesOrLoss($curr_year, $prev_month);


//equity report sharings
//year
$curr_year = date('Y');
$prev_year = $curr_year - 1;

//month
$curr_month = date('m');


$num_months = 12;
for ($i=1; $i <= $num_months ; $i++) { 
    insertAllShares($prev_year, $i);
    if($curr_month > $i){
        insertAllShares($curr_year, $i);
    }
}

?>