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

?>

<div class="px-3 pt-5 border-solid border-2 border-gray-200 shadow-md rounded-lg">

    <div class="flex justify-between">
        <h2 class="font-sans font-bold text-xl">Income Statement</h2>
        <!-- elipsis -->
        <div class = "flex gap-1 items-center elipsis-report-button cursor-pointer" id="income_report_button">
            <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
            </div>
            <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
            </div>
            <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
            </div>
        </div>
    </div>
    

    <p class="text-gray-600 my-3 text-lg ">Current Net Sales: <?= number_format($netSales,2)?></p>
    <p class="text-gray-600 my-3 text-lg ">Previous Net Sales: <?= number_format($prevNetSales,2)?></p>
    <canvas id="incomeBarChart"></canvas>

</div>


<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // get the canvas id of incomeBarChart
    var incomeBar = document.getElementById('incomeBarChart').getContext('2d');

    // Configure the chart
    var myChart = new Chart(incomeBar, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [
                {
                label: 'Currnet Year',
                // data: [12000, 19000, 3000, 5000, 2000, 3000, 7000, 8000, 9000, 10000, 11000, 12000], // Replace with your income data
                data: [<?= $netIncome?>], // Replace with your income data
                backgroundColor: ['#F8B721'],

                borderColor: 'rgba(255, 165, 0, 1)',
                // borderColor: 'rgba(248, 183, 33, 1)',

                // rgba(255, 165, 0, 0.2),
                //F8B721 orange
                // F6D95D pale orange
                borderWidth: 1
            }, 
            {
                label: 'Last Year',
                // data: [12000, 19000, 3000, 5000, 2000, 3000, 7000, 8000, 9000, 10000, 11000, 12000], // Replace with your income data
                data: [<?= $prevNetIncome?>], // Replace with your income data
                
                backgroundColor: ['#F6D95D'],
                // backgroundColor: ['#F8B721', '#F6D95D'],

                // borderColor: 'rgba(255, 165, 0, 1)',
                borderColor: 'rgba(248, 183, 33, 1)',

                // rgba(255, 165, 0, 0.2),
                //F8B721 orange
                // F6D95D pale orange
                borderWidth: 1
            }
        ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 20,
                            weight: 'bold'
                        }
                    }
                }
            },

            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 50,
                    bottom: 0
                }

            }
        }
    });


    myChart.data.datasets.data
</script>