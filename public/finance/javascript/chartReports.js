function recordChartAsAnImage(typeFile){
    // Create the chart
    var ctx = document.getElementById('emptyCanvas').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Assets', 'Liabilities'],
            datasets: [{
                data: [0.93,0.07],
                backgroundColor: ['rgb(255, 165, 0)', 'rgb(255, 205, 86)']
            }]
        },
        options: {
            responsive: true,

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
                    top: 0,
                    bottom: 0
                }
            }
        }     
    });
    myChart.options.animation.onComplete = function() {
        // Convert the chart to a data URL
        var url = myChart.toBase64Image();
        // Send the image data to the server
        fetch('http://localhost/master/chartGenerator', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                imageData: url,
            }),
        });
    };
}

function generateIncomeChart(){

}

function generateBalanceChart(){
    return {
        labels: ['Assets', 'Liabilities'],
        datasets: [{
            data: [0.93,0.07],
            backgroundColor: ['rgb(255, 165, 0)', 'rgb(255, 205, 86)']
        }],
        options: {
            responsive: true,
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
                    top: 0,
                    bottom: 0
                }
            }
        }
    };
}

function generateEquityChart(){

}

function generateCashFlowChart(){

}
