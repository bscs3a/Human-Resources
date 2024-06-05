<!-- Start: Request Section -->
<div class="mt-10  grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Start: general ledger -->
    <div class="px-5 border-2 border-solid border-gray-300 shadow-lg flex flex-col rounded-md">
        <!-- Start: Header -->
        <div class="flex justify-between mt-5 ">
            <div>
                <h1 class="font-sans text-xl font-bold">
                    <a route="/fin/ledger/page=1">General Ledger</a>
                </h1>
            </div>
        </div>
        <!-- End: Header -->
        <div class="h-full">
            <table class="table-fixed my-5 w-full text-center border-spacing-y-4" id="general_ledger">
                <thead class="text-xl font-semibold">
                    <td>Date</td>
                    <td>Amount</td>
                    <td>Debit</td>
                    <td>Credit</td>
                </thead>
                <tbody>                
                <?php $transaction = getLedgerTransactions(10); ?>                
                <?php
                $counter = 0;
                foreach ($transaction as $trans){
                    if ($counter == 3) break; ?>
                    <tr class="text-md font-medium">
                        <td><?php echo $trans['DateTime']?></td>
                        <td><?php echo $trans['amount']?></td>
                        <td><?php echo $trans['dr_name']?></td>
                        <td><?php echo $trans['cr_name']?></td>
                    </tr>
                <?php $counter++;
                } ?>
                </tbody>
            </table>
        </div>


        <div class="text-center mb-5">
            <button id = "openModal" class="border-2 border-[#F8B721] w-full text-[#F8B721] py-2 px-2 font-bold text-xl hover:text-slate-100 hover:bg-[#F8B721] transition-colors">
                <p> <i class="ri-add-line"> </i> New Transaction</p>
            </button>
        </div>
    </div>
    <!-- End: general ledger  -->
    
    <!-- Start: Account Ledger -->
    <div class="px-5 border-2 border-solid shadow-lg flex flex-col rounded-md bg-gradient-to-b from-[#F8B721] to-[#FBCF68]">
        <!-- Start: Header -->
        <div class="flex justify-between mt-5 ">
            <div>
                <h1 class="font-sans text-xl font-semibold text-white">
                    <a route="/fin/ledger/accounts/investors">Account Ledger</a>
                </h1>
            </div>
        </div>
        <!-- End: Header -->

        <!-- Start: Tab -->
        <div class="flex justify-stretch overflow-x-auto hide-scrollbar">
            <button
                class="btn btn_dept btn_active flex-grow px-10 py-2 font-xl text-white font-extrabold" id="btn1">Investor</button>
            <button
                class="btn btn_dept flex-grow px-10 py-2 font-xl font-semibold text-white opacity-75" id="btn2">Payable</button>
                <button
                class="btn btn_dept flex-grow px-10 py-2 font-xl font-semibold text-white opacity-75" id="btn3">Tax</button>
        </div>
        <!-- End: Tab -->

        <!-- body of account ledger -->
        <!-- investor -->
        <div class="h-full text-white" id="investorAccounts">
            <table class="table-fixed my-5 w-full text-center border-spacing-y-4" id="general_ledger">
                <thead class="text-xl font-bold">
                    <td>Account Name</td>
                    <td>Amount Remaining</td>
                </thead>
                <tbody>                
                <?php $transaction = getAllInvestors(); ?>                
                <?php
                $counter = 0;
                foreach ($transaction as $trans){
                    if ($counter == 6) break; ?>
                    <tr class="text-md text-white font-medium">
                        <td class = "font-semibold"><?php echo $trans['name']?></td>
                        <td>₱<?php echo $trans['total_amount']?></td>
                    </tr>
                <?php $counter++;
                } ?>
                </tbody>
            </table>
        </div>
        <!-- payable -->
        <div class="h-full hidden text-white" id="payableAccounts">
            <table class="table-fixed my-5 w-full text-center border-spacing-y-4" id="general_ledger">
                <thead class="text-xl font-bold">
                    <td>Account Name</td>
                    <td>Amount Remaining</td>
                </thead>
                <tbody>                
                <?php $transaction = getAllPayable(); ?>                
                <?php
                $counter = 0;
                foreach ($transaction as $trans){
                    if ($counter == 6) break; ?>
                    <tr class="text-md text-white font-medium">
                        <td class = "font-semibold"><?php echo $trans['name']?></td>
                        <td>₱<?php echo $trans['total_amount']?></td>
                    </tr>
                <?php $counter++;
                } ?>
                </tbody>
            </table>
        </div>
        <!-- tax -->
        <div class="h-full hidden text-white" id="taxAccounts">
            <table class="table-fixed my-5 w-full text-center border-spacing-y-4" id="general_ledger">
                <thead class="text-xl font-bold">
                    <td>Account Name</td>
                    <td>Amount Remaining</td>
                </thead>
                <tbody>                
                <?php $transaction = getAllTaxPayable(); ?>                
                <?php
                $counter = 0;
                foreach ($transaction as $trans){
                    if ($counter == 6) break; ?>
                    <tr class="text-md text-white font-medium">
                        <td class = "font-semibold"><?php echo $trans['name']?></td>
                        <td>₱<?php echo $trans['total_amount']?></td>
                    </tr>
                <?php $counter++;
                } ?>
                </tbody>
            </table>
        </div>
        <!-- end body -->
    </div>
    <!-- End: Account Ledger -->
</div>
<!-- End: Request Section -->
<div id="myModal"
    class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded shadow-lg w-1/3">
        <div class="border-b pl-3 pr-3 pt-3 flex">
            <h5 class="font-bold uppercase text-gray-600">New Transactions</h5>
            <!-- <button id="closeModal" class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                <i class="ri-close-line"></i>
            </button> -->
        </div>
        <!-- form -->
        <?php $rootFolder = dirname($_SERVER['PHP_SELF']); ?>
        <div class="p-5">
            <!-- <form action="<?= $rootFolder . '/fin/ledger' ?>" method="POST"> -->
            <form action="/test" method="POST" id="ledger-insert-form">
                <div class="mb-4 relative">
                    <label for="date" class="block text-xs font-medium text-gray-900"> Date </label>
                    <input type="text" id="date" name="date" required readonly
                        class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md  sm:text-sm" />
                    <i
                        class="ri-calendar-fill absolute left-2 top-6 transform -translate-y-0.5 h-6 w-6 text-gray-400"></i>
                </div>

                <script>
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
                    var mm = monthNames[today.getMonth()]; //January is 0!
                    var yyyy = today.getFullYear();

                    today = mm + ' ' + dd + ', ' + yyyy;
                    document.getElementById('date').value = today;
                </script>
                <div class="mb-4 relative">
                    <label for="description" class="block text-xs font-medium text-gray-900">
                        Description
                    </label>
                    <input type="text" id="description" name="description" required
                        class="mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm" />

                </div>
                <div class="mb-4 relative">
                    <label for="amount" class="block text-xs font-medium text-gray-900"> Amount
                    </label>
                    <input type="text" id="amount" name="amount" placeholder="0.00" required
                        class="mt-1 py-1 px-7 w-full rounded-md border border-gray-400 shadow-md sm:text-sm"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                    <span
                        class="absolute left-2 top-6 transform -translate-y-0.5 text-gray-400">&#8369;</span>
                </div>
                <div class="flex justify-between">
                    <?php
                    function generateSelect($id, $name, $onchange, $sql)
                    {
                        $db = Database::getInstance();
                        $conn = $db->connect();

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        echo "<div class=\"mb-4 relative p-1\">";
                        echo "<label for=\"$id\" class=\"block text-xs font-medium text-gray-900\"> $name </label>";
                        echo "<select id=\"$id\" name=\"$id\" required class=\"mt-1 py-1 px-3 w-full rounded-md border border-gray-400 shadow-md sm:text-sm\" onchange=\"$onchange\">";
                        echo "<option value=\"\" selected=\"selected\">...</option>";

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $value = abs(getAccountBalanceV2($row['name']));
                                echo "<option value=\"{$row['name']}\">{$row['name']} - {$value}</option>";
                            }
                        } else {
                            echo "0 results";
                        }

                        echo "</select>";
                        echo "</div>";
                    }

                    generateSelect('debit', 'Debit', "updateOptions(event, 'credit')", "SELECT name FROM ledger");
                    generateSelect('credit', 'Credit', "updateOptions(event, 'debit')", "SELECT name FROM ledger");
                    ?>
                </div>

                <div class="flex justify-end items-start mb-2">
                    <button id="cancelModal" type="button"
                        class="border border-gray-700 bg-gray-200 hover:bg-gray-100 text-gray-800 text-sm font-bold py-1 px-5 rounded-md ml-4 ">Cancel</button>
                    <button type="submit"
                        class="border border-gray-700 bg-amber-400 hover:bg-amber-300 text-gray-800 text-sm font-bold py-1 px-7 rounded-md ml-4 ">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn1').addEventListener('click', function() {
        document.getElementById('investorAccounts').style.display = 'block';
        document.getElementById('payableAccounts').style.display = 'none';
        document.getElementById('taxAccounts').style.display = 'none';
    });

    document.getElementById('btn2').addEventListener('click', function() {
        document.getElementById('investorAccounts').style.display = 'none';
        document.getElementById('payableAccounts').style.display = 'block';
        document.getElementById('taxAccounts').style.display = 'none';
    });
    document.getElementById('btn3').addEventListener('click', function() {
        document.getElementById('investorAccounts').style.display = 'none';
        document.getElementById('payableAccounts').style.display = 'none';
        document.getElementById('taxAccounts').style.display = 'block';
    });
    var buttons = document.getElementsByClassName('btn_dept');

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            var activeButton = document.querySelector('.btn_active');
            if (activeButton) {
                swapClasses(this, activeButton);
            }
        });
    }
    });

    function swapClasses(btn1, btn2) {
        var btn1Classes = btn1.className;
        var btn2Classes = btn2.className;

        btn1.className = btn2Classes;
        btn2.className = btn1Classes;
    }
    function closeModalAndClearInputs() {
        document.getElementById('myModal').classList.add('hidden');
        ['description', 'credit', 'debit', 'amount'].forEach(id => document.getElementById(id).value = '');
    }

    document.getElementById('openModal').addEventListener('click', function () {
        document.getElementById('myModal').classList.remove('hidden');
    });
    //'closeModal',
    ['cancelModal'].forEach(id => {
        document.getElementById(id).addEventListener('click', function (event) {
            event.stopPropagation();
            closeModalAndClearInputs();
        });
    });
</script>