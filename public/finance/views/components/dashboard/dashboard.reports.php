
<div id="report_generation_modal" class="hidden modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50" aria-labelledby="modal-title"
    role="dialog" aria-modal="true">
    <div class=" pt-4 px-4 pb-20 sm::block sm:p-0 bg-white rounded shadow-lg ">
       
        <form action="/reportGeneration" method="post" class="font-sans p-10 border-2 border-black rounded-md]" id="requestReportForm" target="_blank">
            <h2 class="font-semibold text-lg m-1">
                Generate Report
            </h2>
            <p class="italic opacity-50 m-1">
                To generate your report, please choose the type of financial report and specify the date
            </p>
            <div class = "my-10">
                <label for="written" 
                class = "font-bold border-2 border[#F8B721] rounded-md px-4 py-2 text-[#F8B721] has-[:checked]:text-white has-[:checked]:bg-[#F8B721] me-2">
                    Written Report
                    <input type="radio" id = "written" name="writtenOrChart" value = "written" checked class="hidden">
                </label>

                <label for="chart" 
                class = "font-bold border-2 border[#F8B721] rounded-md px-4 py-2 text-[#F8B721] has-[:checked]:text-white has-[:checked]:bg-[#F8B721] ">
                    Chart Report
                    <input type="radio" id = "chart" name="writtenOrChart" value = "chart" class="hidden">
                </label>
            </div>

            <label for="report" class="font-medium m-1">
                Type of Report
            </label>
            <select name="file" id="report" 
                class="m-1 bg-gray-50 border-2 border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                required>
                <option selected value = "">Choose a report</option>
                <option value="Income">Income Report</option>
                <option value="OwnerEquity">Owners' Equity</option>
                <option value="TrialBalance">Trial Balance</option>
                <option value="CashFlow">Cash Flow</option>
            </select>
            <!-- select one date -->
            <label for="monthYear" class="font-medium m-1">
                Date
            </label>
            
            <div id = "oneMonthSelector" class = "flex items-center border-2 bg-gray-50 border-black rounded-lg cursor-pointer date-selector-inputs">
                <span class = "border-r-2 border-black p-2">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="33" height="33" fill="url(#pattern0_5815_1498)"/>
                        <defs>
                            <pattern id="pattern0_5815_1498" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_5815_1498" transform="scale(0.0104167)"/>
                            </pattern>
                        <image id="image0_5815_1498" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAC+ElEQVR4nO2dz04UQRDGPyI3RuUdBA+aiPIaSngYhUTlZkg4EAkPoRCuRmUlAk/hnydwOcLu1bRpaRIOdu8w7XZVT32/pI7b3fV9PTUz6U0NQAghhBBCCCGEEEJId+4DWAdwBOA7gDEAV2mMQw4+lzUAi5o3xkMAHxSI5qYc3oxlKGIWwC6A3wrEcYXC57oTchdlPuwIZzQGAO5KiX8LwCcFIjjh+CJ1JewqSN4pibelxV+eUPN/AXgJYAnAHOplLuTwCsAwka/X4nHJhaXq/vvKRY/RANhL5H2Igs/5sUW8AzCD/jIzwYSFEotYT5Qdv0v6TpMoRy8ky4+v+VZ4nXgsnTo/I5M/gh2WIhr8KDH5KDK5hfJzRRPRwGszdWI3IGs4KR1owCU0QBh1BjBAA5yCjcArADRAfBc6XgHyQjiWIHkxnKV7gDUcDZCFBghDA4ShAcLQAGFogDA0QJhqDVgFcBr+eTwGcAJg5YZr0DBGlQZsJX6/WdkY1Rmw2uI1/lklY+TokE3XiU9bJH5cyRg5OmTTdeLYvynctbioZIwcHVQbcF7JGDk6ZNN14pMWiX+tZIwcHbLpOvFKi8SfVjJGjg7Z5Ey8mfj9m8rGqNIAhEe841CLR+Fyb7PjtI1RrQF9wdEAWWiAMDRAGBogDA0QhgYIQwOEqdYADadZZg3Qcppl0gBNp1kmDdB0mmXSAE2nWf+DXhpwXmAMswZoOs0yaYCm0yyTBmg6zTJrgJbTLNMG9AUnpcNFZGJL7WruSD6BsWET/nZI/JcBvs+0WMsy39rRChuSLcvWIpMPjZSh2wDOIho8L7GAxcQNaM9A28r9RP73Si1kMMGEpqc7fz+R9+fSN6FU6+JhaO34pHIzmpDDRqLsuKBF8a6RO4kFWYttCLWv/6ggeWe1fT3CxwtS94O+x2F4KRNlNvTPt/YJk+1QBdTwAMCBAnHclOOo9LcCbspC6CLuS9O3lqdYTmmMQg6D8JJV7DmfEEIIIYQQQgghhKB3/AFCDqueoOvDcAAAAABJRU5ErkJggg=="/>
                        </defs>
                    </svg>
                </span>
                <input type="text" id="monthYear" name="monthYear"
                    class="  bg-gray-50 p-2.5 flex-1 focus:outline-none cursor-pointer" required readonly placeholder="Month-year">
            </div>
            <!-- end -->
            <!-- for from a date to a date -->
            <div id = "twoMonthSelector" class = "hidden flex items-center justify-between gap-5">
                <div class = "flex-1 flex items-center border-2 bg-gray-50 border-black rounded-lg cursor-pointer date-selector-inputs">
                    <input type="text" id="fromMonthYear" name="fromMonthYear"
                        class=" rounded-lg bg-gray-50 p-2.5 flex-1 focus:outline-none cursor-pointer" required readonly placeholder="From month-year">
                </div>
                <div class = "flex-1 flex items-center border-2 bg-gray-50 border-black rounded-lg cursor-pointer date-selector-inputs">
                    <input type="text" id="toMonthYear" name="toMonthYear"
                        class=" rounded-lg bg-gray-50 p-2.5 flex-1 focus:outline-none cursor-pointer" required readonly placeholder="To month-year">
                </div>
            </div>
            <!-- end -->

            <!-- modal for date selection -->
            <div id = "dateSelector" class = "z-50 hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 grid grid-cols-4 gap-4 bg-white p-6 border-2 text-center">
                <!-- for header year -->
                <div class = "col-span-3 text-left font-bold text-[#F8B721]" id="yearDate"><?= date('Y'); ?></div>
                <div>
                    <button type="button" class="year-mover" id = "minusYear">
                        <span class="sr-only">Previous year</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button type="button" class = "year-mover" id="addYear">
                        <span class="sr-only">Next Year</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <!-- from month -->
                <div class = "hidden col-span-2 p-2 date-to-and-from-dateselector data-[focus=true]:border-[#F8B721] data-[focus=true]:border-2 rounded-md" data-focus="true">
                    <label for="startDateInsideSelector" class="block font-medium">
                        Start Date
                    </label>
                    <input type="text" id = "startDateInsideSelector" value="" class="font-bold text-center border-2 border-[#B5B5B5] drop-shadow-md rounded-md" readonly>
                </div>
                <!-- to month -->
                <div class = "hidden col-span-2 p-2 date-to-and-from-dateselector data-[focus=true]:border-[#F8B721] data-[focus=true]:border-2 rounded-md" data-focus="false">
                    <label for="endDateInsideSelector" class="block font-medium">
                        End Date
                    </label>
                    <input type="text" id = "endDateInsideSelector" value="" class="font-bold text-center border-2 border-[#B5B5B5] drop-shadow-md rounded-md" readonly>
                </div>
                <!-- end header year -->

            </div>
            <input type="hidden" name="hiddenDate" id="hiddenDate" value = "">

            <!-- for generating the month selector -->
            <script>
                // for creating months
                function monthSelector() {
                // Create the container div
                let container = document.querySelector('#dateSelector');
                
                // Array of month names
                let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                let now = new Date();
                let lastMonth = new Date(now.getFullYear(), now.getMonth() - 1, 1);
                let selectedMonth = lastMonth.getMonth() + 1;
                selectedMonth =  lastMonth.getFullYear() + "-" + selectedMonth;

                let hiddenInputDate = document.querySelector('#hiddenDate');
                hiddenInputDate.value = selectedMonth;
                // Create a radio button for each month
                months.forEach(function(month, index) {
                    // Create the radio input
                    let radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'month';
                    radio.id = 'month' + (index + 1);
                    radio.value = index + 1;
                    radio.className = 'hidden absolute monthsInSelector';

                    // Create the label
                    let label = document.createElement('label');
                    label.htmlFor = radio.id;
                    label.textContent = month;
                    label.className = 'text-[#7B8199] has-[:checked]:text-white has-[:checked]:bg-[#F8B721] rounded-md p-3 cursor-pointer has-[:disabled]:cursor-no-drop';

                    // Create a div for each month
                    let monthDiv = document.createElement('div');
                    monthDiv.appendChild(label);
                    label.appendChild(radio);

                    // Add the div to the container
                    container.appendChild(monthDiv);

                    radio.addEventListener('click', function() {
                        applyButton.disabled = false;
                        // Get the name of the radio button group
                        let name = 'writtenOrChart';
                        // Get the selected radio button
                        let selected = document.querySelector('input[name="' + name + '"]:checked');
                        // Get the value of the selected radio button
                        let radioValue = selected.value;

                        let dateValue = document.querySelector('#yearDate').textContent + "-" + (index + 1);

                        let hiddenInputDate = document.querySelector('#hiddenDate');
                        hiddenInputDate.value = dateValue;
                        // startDateInsideSelector.value = dateValue;
                        // endDateInsideSelector.value = dateValue;

                        if(radioValue =="chart"){
                            let startDateInsideSelector = document.querySelector('#startDateInsideSelector');
                            let endDateInsideSelector = document.querySelector('#endDateInsideSelector');

                            let focusDate = startDateInsideSelector.parentElement.dataset.focus;
                            if(focusDate == 'true'){
                                startDateInsideSelector.value = dateValue;
                            }
                            else{
                                endDateInsideSelector.value = dateValue;
                            }
                        }

                        if(radioValue == "chart"){
                            let startDateInsideSelector = document.querySelector('#startDateInsideSelector');
                            let endDateInsideSelector = document.querySelector('#endDateInsideSelector');
    
                            let fromMonthYearInDateFormat = new Date(startDateInsideSelector.value);
                            let toMonthYearInDateFormat = new Date(endDateInsideSelector.value);
                            let applyButton = document.querySelector('#applyButton');
                            if (isNaN(fromMonthYearInDateFormat.getTime()) || isNaN(toMonthYearInDateFormat.getTime()) || fromMonthYearInDateFormat > toMonthYearInDateFormat) {
                                applyButton.disabled = true;
                            }
                        }
                    });
                });

                let formReport = document.querySelector('#requestReportForm');

                //cancel
                let cancel =document.createElement('button');
                cancel.textContent = 'Cancel';
                cancel.className = 'bg-white text-black rounded-md p-3 border-2 border-black col-span-2';
                cancel.type = 'button';
                cancel.addEventListener('click', function() {
                    let dateSelector = document.querySelector('#dateSelector');
                    dateSelector.classList.add('hidden');
                });
                container.appendChild(cancel);

                //apply
                let apply = document.createElement('button');
                apply.textContent = 'Apply';
                apply.className = 'bg-[#F8B721] text-white rounded-md p-3 border-2 border-black col-span-2 disabled:bg-gray-300 disabled:cursor-not-allowed';
                apply.type = 'button';
                apply.id = "applyButton"
                apply.addEventListener('click', function() {
                    // Get the name of the radio button group
                    let name = 'writtenOrChart';
                    // Get the selected radio button
                    let selected = document.querySelector('input[name="' + name + '"]:checked');
                    // Get the value of the selected radio button
                    let radioValue = selected.value;


                    let hiddenInputDate = document.querySelector('#hiddenDate');
                    let monthYear = document.querySelector('#monthYear');
                    let fromMonthYear =document.querySelector('#fromMonthYear');
                    let toMonthYear = document.querySelector('#toMonthYear');
                    if (radioValue == 'written'){
                        monthYear.value = hiddenInputDate.value;

                        // just for the sake of filling it up
                        fromMonthYear.value = hiddenInputDate.value;
                        toMonthYear.value = hiddenInputDate.value;
                    }
                    else{
                        let startDateInsideSelector = document.querySelector('#startDateInsideSelector');
                        let endDateInsideSelector = document.querySelector('#endDateInsideSelector');

                        fromMonthYear.value = startDateInsideSelector.value;
                        toMonthYear.value = endDateInsideSelector.value;
                        // just for the sake of filling it up
                        monthYear.value =startDateInsideSelector.value;
                    }

                    //hide the modal
                    let dateSelector = document.querySelector('#dateSelector');
                    dateSelector.classList.add('hidden');
                    
                });
                container.appendChild(apply);

                
                // Add the container to the form
                formReport.appendChild(container);
                disabledOrChecked();
            }
                monthSelector();

                // event listener for adding the date to the input/and adding years
                window.addEventListener("DOMContentLoaded", function(){
                    // Get the yearDate element
                    let yearDate = document.querySelector('#yearDate');

                    // Get the addYear and minusYear buttons
                    let addYear = document.querySelector('#addYear');
                    let minusYear = document.querySelector('#minusYear');

                    // Add event listener to the addYear button
                    addYear.addEventListener('click', function() {
                        // Increment the year in the yearDate element
                        yearDate.textContent = parseInt(yearDate.textContent) + 1;
                        disabledOrChecked();
                    });

                    // Add event listener to the minusYear button
                    minusYear.addEventListener('click', function() {
                        // Decrement the year in the yearDate element
                        yearDate.textContent = parseInt(yearDate.textContent) - 1;
                        disabledOrChecked();
                    });
                    window.addEventListener("click", function(event){
                        let dateSelector = document.querySelector('#dateSelector');
                        if (!dateSelector.contains(event.target)){
                            dateSelector.classList.add('hidden');
                        }
                    });
                    let buttonDateSelectors = document.querySelectorAll('.date-selector-inputs');

                    buttonDateSelectors.forEach(function(buttonDateSelector) {
                        buttonDateSelector.addEventListener('click', function(event){
                            event.stopPropagation();
                            let dateSelector = document.querySelector('#dateSelector');
                            dateSelector.classList.remove('hidden');
                            applyButton.disabled = false;
                        });
                    });
                });
                
                // disable or checked the selected month
                function disabledOrChecked(){
                    let selected = document.querySelector('#hiddenDate').value;
                    let year = document.querySelector('#yearDate').textContent;
                    
                    let months = document.querySelectorAll('.monthsInSelector');
                    let now = new Date();
                    let currentYear = now.getFullYear();
                    let currentMonth = now.getMonth() + 1; // getMonth() returns 0-11, so add 1

                    let currentMonthYear = currentYear + '-' + currentMonth;
                    months.forEach(function(month){
                        let monthValue = year + "-" + month.value;
                        if(monthValue== selected){
                            month.checked = true;
                        }
                        else{
                            month.checked = false;
                        }
                        if(year > currentYear || (year == currentYear && month.value >= currentMonth)){
                            month.disabled = true;
                        }
                        else{
                            month.disabled = false;
                        }
                    });
                }
                
                // Get the radio buttons
                let radios = document.getElementsByName('writtenOrChart');

                let writtenDate = document.querySelector('#oneMonthSelector');
                let chartDate = document.querySelector('#twoMonthSelector');
                // Add a change event listener to each radio button
                for (var i = 0; i < radios.length; i++) {
                    radios[i].addEventListener('change', function() {
                        // If the "written" option is selected, hide the part of the page
                        if (this.value === 'written') {
                            writtenDate.classList.remove('hidden');
                            chartDate.classList.add('hidden');
                            let dateFromToSelectors = document.querySelectorAll('.date-to-and-from-dateselector');
                            dateFromToSelectors.forEach(function(dateFromToSelector){
                                dateFromToSelector.classList.add('hidden');
                            });
                        }
                        // If the "chart" option is selected, show the part of the page
                        else if (this.value === 'chart') {
                            writtenDate.classList.add('hidden');
                            chartDate.classList.remove('hidden');
                            let dateFromToSelectors = document.querySelectorAll('.date-to-and-from-dateselector');
                            dateFromToSelectors.forEach(function(dateFromToSelector){
                                dateFromToSelector.classList.remove('hidden');
                            });
                        }
                    });
                }

                // for focus on start to from in dateselector
                let dateFromToSelectors = document.querySelectorAll('.date-to-and-from-dateselector');
                dateFromToSelectors.forEach(function(dateFromToSelector){
                    dateFromToSelector.addEventListener('click', function(){
                        let dateFromToSelectors = document.querySelectorAll('.date-to-and-from-dateselector');
                        dateFromToSelectors.forEach(function(dateFromToSelector){
                            dateFromToSelector.dataset.focus = 'false';
                        });
                        dateFromToSelector.dataset.focus = 'true';
                    });
                });

                // submit the form
                let formReport = document.querySelector('#requestReportForm');
                formReport.addEventListener("submit", function(){
                    let submitButton = document.querySelector('#submit_btn');
                    submitButton.disabled = true;

                    event.preventDefault();
                    let monthYearInput = document.querySelector('#monthYear');
                    let fromMonthYearInput = document.querySelector('#fromMonthYear');
                    let toMonthYearInput = document.querySelector('#toMonthYear');
                    let isChart = document.querySelector('#chart').checked;
                    if(isChart){
                        fromMonthYearInput.readOnly = false;
                        toMonthYearInput.readOnly = false;
                        let fromMonthYear = fromMonthYearInput.value;
                        let toMonthYear = toMonthYearInput.value;
                        if (fromMonthYear === '' || toMonthYear === '') {
                            fromMonthYearInput.setCustomValidity('From and To Month and Year is required');
                            toMonthYearInput.setCustomValidity('From and To Month and Year is required');
                        } else {
                            fromMonthYearInput.setCustomValidity('');
                            toMonthYearInput.setCustomValidity('');
                        }
                        
                    }else{
                        
                        monthYearInput.readOnly = false;
                        let monthYear = monthYearInput.value;
                        if (monthYear === '') {
                            monthYearInput.setCustomValidity('Month and Year is required');
                        } else {
                            monthYearInput.setCustomValidity('');
                        }
                    }
                    if (formReport.checkValidity()) {
                        let typeFile = document.querySelector('#report').value;
                        let fromDate = fromMonthYearInput.value;
                        let toDate = toMonthYearInput.value;
                        recordChartAsAnImage(typeFile, fromDate, toDate).then(() => {
                            formReport.submit();
                            window.location.reload();
                        });
                    }
                    monthYearInput.readOnly = true;
                    fromMonthYearInput.readOnly = true;
                    toMonthYearInput.readOnly = true;
                    submitButton.disabled = true;
                });
                window.addEventListener("DOMContentLoaded", function(){
                    var ctx = document.getElementById('emptyCanvas');
                    if (ctx) {
                        ctx.style.display = 'none';
                    }
                });

                
            </script>
            <script src="./../public/finance/javascript\chartReports.js"></script>
            <br>
            <canvas id="emptyCanvas" class="hidden"> </canvas>
            <div class="m-1 gap-3 flex justify-end">
                <button id="cancel_btn" class="border-2 rounded-md border-black font-bold py-2.5 px-4 drop-shadow-md" type="button">
                    Cancel
                </button>
                <button class="border-2 rounded-md border-black bg-[#F8B721] font-bold py-2.5 px-4 drop-shadow-md"
                    type="submit" id = "submit_btn">
                    Generate
                </button>
            </div>
        </form>
    </div>
</div>

<!-- for balance and income report -->
<div class="mt-10  h-2/4">
    <!-- for button clicks in the form above(generate report) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Generate Report Modal
        var report_generation_modal = document.getElementById('report_generation_modal');
        
        // Get the cancel button
        var cancel_btn =document.getElementById('cancel_btn');

        // Get the buttons that open the modal
        let generate_modal_btns = document.querySelectorAll('.elipsis-report-button');

        // When the user clicks a button, open the modal
        generate_modal_btns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                let selectReport = document.querySelector('#report');
                
                // Get the id of the clicked button
                let btnId = btn.id;

                // Map the button id to the corresponding option value
                let optionValueMap = {
                    'income_report_button': 'Income',
                    'balance_sheet_button': 'TrialBalance',
                    'equity_button': 'OwnerEquity',
                    'cash_flow_button': 'CashFlow'
                };

                // Set the selected option of the select element
                selectReport.value = optionValueMap[btnId];

                report_generation_modal.classList.remove('hidden');
            });
        });

        // When the user clicks the cancel button, close the modal
        cancel_btn.onclick = function () {
            report_generation_modal.classList.add('hidden');
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == report_generation_modal) {
                report_generation_modal.classList.add('hidden');
            }
        }
    });
    </script>

    <div class="grid grid-co
    ls-1 md:grid-cols-2 gap-4">
        <?php include_once 'dashboard.reports.income.php' ?>


        <div class="px-5 pt-5 border-solid border-2 border-gray-200 shadow-md rounded-lg">
            <div class="flex justify-between">
                <h2 class="font-sans font-bold text-xl">Balance Sheet</h2>
                <!-- elipsis -->
                <div class = "flex gap-1 items-center elipsis-report-button cursor-pointer" id="balance_sheet_button">
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                </div>
            </div>
            <!-- Balance Sheet in Pie Graph -->
            <div class="w-full h-3/4 flex justify-center">

                <canvas id="balancePie" class="px-3 py-3"></canvas>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Get the context of the canvas element we want to select
        var balancePie = document.getElementById('balancePie').getContext('2d');

        var myBalancePieChart = new Chart(balancePie, {
            type: 'pie',
            data: {
                labels: ['Assets', 'Liabilities'],
                datasets: [{
                    data: [],
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

        fetch('http://localhost/master/fin/getBalanceReport', {
            method: 'POST',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateBalanceChart(myBalancePieChart, data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
        //function to update equity Chart
        function updateBalanceChart(chart, paramData) {
            let data = [];

            data.push(paramData.asset);
            data.push(paramData.liability);

            chart.data.datasets[0].data = data;
            chart.update();
        }
    </script>
</div>

<!-- Start: Second Section -- for cashflow and equity-->
<div class=" mt-10">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="col-span-1 px-5 pt-5 border-solid border-2 border-gray-200 shadow-md rounded-lg">
            <div class="flex justify-between">
                <h2 class="font-sans font-bold text-xl">Equity</h2>
                <!-- elipsis -->
                <div class = "flex gap-1 items-center elipsis-report-button cursor-pointer" id="equity_button">
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                </div>
            </div>
            <?php 
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

                $CAPITAL = "Capital Accounts";
                $totalCapitalAccount = getTotalOfAccountTypeV2($CAPITAL);
            ?>
            <p class="text-gray-600 my-3 text-lg">Total: <?php echo'₱' . number_format($totalCapitalAccount,2) ?></p>
            <!-- Donut Chart for Equity -->
            <div class="flex justify-center p-5 ">
                <canvas id="equityDonutChart"></canvas>
            </div>
        </div>
        <div class="col-span-2 px-5 pt-5 border-solid border-2 border-gray-200 shadow-md rounded-lg min-h-15">
            <div class="flex justify-between">

                <h2 class=" font-sans  font-bold text-xl">Cash Flow</h2>
                <!-- elipsis -->
                <div class = "flex gap-1 items-center elipsis-report-button cursor-pointer" id="cash_flow_button">
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                    <div class="rounded-full h-2.5 w-2.5 bg-white border-[#F19C00] border-2">
                    </div>
                </div>
            </div>
            <div>
                <!-- Create a canvas element -->
                <canvas id="cashFlowChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Donut Chart Equity
        var equityDonut = document.getElementById('equityDonutChart').getContext('2d');

        var equityChart = new Chart(equityDonut, {
            type: 'doughnut',
            data: {
                labels: [], // Initialize with empty array
                datasets: [{
                    data: [], // Initialize with empty array
                    backgroundColor: [],
                    borderWidth: 2
                }]
            },
            options: {
                cutout: '70%',
                responsive: false,
                maintainAspectRatio: true,

                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 15,
                                weight: 'bold'
                            }

                        }
                    }
                },

                layout: {
                    padding: {
                        left: 20,
                        right: 50,
                        top: 50,
                        bottom: 0
                    }
                }

            }
        });
        //ajax for equityChart
        fetch('http://localhost/master/fin/getEquityReport', {
            method: 'POST',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            updateEquityChart(equityChart, data.owners);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
        //function to update equity Chart
        function updateEquityChart(chart, owners) {
            let labels = [];
            let data = [];
            let colors = [];
            for (let key in owners) {
                if (owners[key].dividedShare !== 0) {
                    labels.push(owners[key].name);
                    data.push(owners[key].dividedShare);
                    colors.push(generateRandomColor());
                }
            }
            chart.data.labels = labels;
            chart.data.datasets[0].data = data;
            chart.data.datasets[0].backgroundColor = colors;
            chart.update();
        }

        // generate random color
        function generateRandomColor () {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }


        // Initialize a new Chart.js instance
        var cashFlowCanvas = document.getElementById('cashFlowChart').getContext('2d');

        // Configure the chart
        var cashFlowChart = new Chart(cashFlowCanvas, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Cash Flow',
                    data: [], // Replace with your data
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
                    }
                }
            }
        });
        //ajax for equityChart
        fetch('http://localhost/master/fin/getCashFlowReport', {
            method: 'POST',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log("what" . data);
            updateCashFlowChart(cashFlowChart, data);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
        //function to update equity Chart
        function updateCashFlowChart(chart, balances) {
            let labels = [];
            let data = [];
            for (let key in balances) {
                if (balances[key].amount !== 0) {
                    labels.push(getMonthName(key));
                    data.push(balances[key]);
                }
            }
            chart.data.labels = labels;
            chart.data.datasets[0].data = data;
            chart.update();
        }

        function getMonthName(monthNumber) {
            monthNumber = monthNumber - 1; // 0-based index
            var date = new Date(2000, monthNumber); // year doesn't matter
            return date.toLocaleString('default', { month: 'long' });
        }
    </script>

</div>
<!-- End: Second Section -->
