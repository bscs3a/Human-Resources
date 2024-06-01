async function recordChartAsAnImage(typeFile, fromDate, toDate) {
    return new Promise(async (resolve, reject) => {
        // Create the chart
        var ctx = document.getElementById('emptyCanvas').getContext('2d');
        // ctx.style.display = 'none';
        let chartValue = {};
        if (typeFile == 'Income'){
            chartValue = await generateIncomeChart(fromDate, toDate);
        }
        else if (typeFile == 'OwnerEquity'){
            chartValue = await generateEquityChart(fromDate, toDate);
        }
        else if (typeFile == 'TrialBalance'){
            chartValue = await generateBalanceChart(fromDate, toDate);
        }
        else if (typeFile == 'CashFlow'){
            chartValue = await generateCashFlowChart(fromDate, toDate);
        }
        var myChart = new Chart(ctx, chartValue);
        myChart.options.animation.onComplete = function() {
            // Convert the chart to a data URL
            var url = myChart.toBase64Image();
            // Send the image data to the server
            fetch('http://localhost/Master/chartGenerator', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },  
                body: JSON.stringify({
                    imageData: url,
                }),
            }).then(() => resolve());
        };
    });
}

function generateIncomeChart(fromDate, toDate){
    let dataToSend = {
        fromDate : fromDate,
        toDate : toDate,
    };
    return fetch('http://localhost/Master/chartGeneration/getIncomeReport', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataToSend)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Populate labels and data arrays with data from the server
            let labels = [];
            let datasetData = [];
            for (let key in data) {
                labels.push(key);
                datasetData.push(data[key]);
            }
            // Return the chart configuration object
            return {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                        data: datasetData,
                        backgroundColor: ['#F8B721'],
                        borderColor: 'rgba(255, 165, 0, 1)',
                        borderWidth: 1
                        },
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
                                display: false
                            },
                            title: {
                                display: true,
                                text: fromDate + ' - ' + toDate,
                                font: {
                                    size: 20
                                },
                                padding: {
                                    bottom: 30
                                }
                            },
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
                };
        })
        .catch((error) => {
            console.error('Error:', error);
        });
};


function generateBalanceChart(fromDate, toDate){
    let dataToSend = {
        fromDate : fromDate,
        toDate : toDate,
    };
    // Return the fetch Promise
    return fetch('http://localhost/Master/chartGeneration/getBalanceReport', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataToSend)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Initialize labels and data arrays
            let labels = [];
            let datasetData = [];
            
            // Populate labels and data arrays with data from the server
            for (let key in data) {
                if (data[key] == 0){
                    continue;
                }
                labels.push(key);
                datasetData.push(data[key]);
            }
            // Return the chart configuration object
            return {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: datasetData,
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
                        },
                        title: {
                            display: true,
                            text: fromDate + ' - ' + toDate,
                            font: {
                                size: 20
                            },
                            padding: {
                                bottom: 30
                            }

                        },
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
        })
        .catch((error) => {
            console.error('Error:', error);
        });
};

function generateEquityChart(fromDate, toDate){
    let dataToSend = {
        fromDate : fromDate,
        toDate : toDate,
    };
    return fetch('http://localhost/Master/chartGeneration/getEquityReport', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataToSend)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Initialize labels and data arrays
            let labels = [];
            let datasetData = [];
            let colors = [];
            
            // Populate labels and data arrays with data from the server
            for (let key in data.owners) {
                console.log(data.owners[key]);
                if (data.owners[key].dividedShare == 0){
                    continue;
                }
                labels.push(data.owners[key].name);
                datasetData.push(data.owners[key].dividedShare);
                colors.push(generateRandomColor());
            }
            // Return the chart configuration object
            return {
                type: 'pie',
                data: {
                    labels: labels, // Use the labels array
                    datasets: [{
                        data: datasetData, // Use the datasetData array
                        backgroundColor: colors
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
                        },
                        title: {
                            display: true,
                            text: fromDate + ' - ' + toDate,
                            font: {
                                size: 20
                            },
                            padding: {
                                bottom: 30
                            }

                        },
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
        })
        .catch((error) => {
            console.error('Error:', error);
        });
};

function generateCashFlowChart(fromDate, toDate){
    let dataToSend = {
        fromDate : fromDate,
        toDate : toDate,
    };
    return fetch('http://localhost/Master/chartGeneration/getCashFlowReport', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataToSend)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Populate labels and data arrays with data from the server
            let labels = [];
            let datasetData = [];
            for (let key in data) {
                labels.push(key);
                datasetData.push(data[key]);
            }
            // Return the chart configuration object
            return {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cash Flow',
                        data: datasetData, // Replace with your data
                        backgroundColor: 'rgba(255, 165, 0, 0.4)',
                        fill: true,
                        borderColor: 'rgba(255, 165, 0, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: fromDate + ' - ' + toDate,
                            font: {
                                size: 20
                            },
                            padding: {
                                bottom: 30
                            }

                        },
                    }
                }
            };
        })
        .catch((error) => {
            console.error('Error:', error);
        });
};
