<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    
</head>

<body class="flex">

    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main class="flex-1 transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle" id = 'toggleSidebar'>
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Ledger/General</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <div class="w-full px-6 py-3 bg-white">

            <div class="justify-between items-start">
                <!-- Button -->
                <div class="flex justify-between">
                    <div class="items-start mb-1">
                        <div class="relative">
                            <div class="inline-flex items-center overflow-hidden rounded-lg  border border-gray-500">
                                <form action="/fin/genSearch" method="post" class="flex items-center">
                                    <?php 
                                        $selected = isset($_SESSION['postdata']['generalLedgerSelected']) ? $_SESSION['postdata']['generalLedgerSelected'] : null;
                                        $recent = (isset($_SESSION['postdata']) && array_key_exists('recent', $_SESSION['postdata'])) ? $_SESSION['postdata']['recent'] : true;
                                    ?>
                                    <label for="recent" id="recentLabel" class="border-r-5 border-black px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 min-w-12">
                                        <span id="labelText"><?php echo $recent ? "Recent" : "Old"?></span>
                                        <input type="checkbox" name="recent" id="recent" class="hidden" <?php echo $recent ? "selected" : "" ?>>
                                    </label>
                                    <script>
                                        document.getElementById('recent').addEventListener('change', function() {
                                            var labelText = document.getElementById('labelText');
                                            if (this.checked) {
                                                labelText.textContent = 'Recent';
                                            } else {
                                                labelText.textContent = 'Old';
                                            }
                                        });
                                    </script>
                                    <!-- bg-gray-200 hover:bg-gray-300 text-gray-900 font-medium text-sm  -->
                                    <select class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 border-gray-500" name="generalLedgerSelected">
                                        <option value="" <?php echo is_null($selected) ? "selected" : ""?>>Select</option>
                                        <?php 
                                        $select = getAllLedgerAccounts();
                                        foreach ($select as $row) {
                                            $option = $row['ledgerno'] == $selected ? "selected" : "";
                                            echo "<option value=\"{$row['ledgerno']}\" "."$option".">{$row['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="pageNumber" value = "<?php echo isset ($_GET['page']) ? (int) $_GET['page'] : 1?>">
                                    <button
                                        type ="submit"
                                        class="px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900">
                                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                        <svg fill="#000000" height="15px" width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            viewBox="0 0 488.4 488.4" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6
                                                    s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2
                                                    S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7
                                                    S381.9,104.65,381.9,203.25z"/>
                                            </g>
                                        </g>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="items-start mb-2">
                        <button id="openModal"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-medium text-sm py-1 px-3 rounded-lg border border-gray-500">
                            <i class="ri-add-box-line"></i>
                            New Transactions
                        </button>
                    </div>
                </div>


                <!-- Modal -->
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

                <!-- JavaScript -->

                <script>
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

                <!-- Table -->
                <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="divide-y-2 divide-gray-400 min-w-full bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right bg-gray-200">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-1 font-medium text-gray-900">Date</th>
                                <th class="whitespace-nowrap px-4 py-1 font-medium text-gray-900">Account</th>
                                <th class="whitespace-nowrap px-4 py-1 font-medium text-gray-900">Debit</th>
                                <th class="whitespace-nowrap px-4 py-1 font-medium text-gray-900">Credit</th>
                            </tr>
                        </thead>

                        <tbody class=" text-center">
                            <?php
                            $db = Database::getInstance();
                            $conn = $db->connect();

                            // Function to get ledger name
                            function getLedgerName($conn, $ledgerNo)
                            {
                                $stmt = $conn->prepare("SELECT name FROM ledger WHERE ledgerno = :ledgerno");
                                $stmt->bindParam(':ledgerno', $ledgerNo);
                                $stmt->execute();
                                return $stmt->fetchColumn();
                            }

                            // Get the current page number from the route
                            $page = isset ($_GET['page']) ? (int) $_GET['page'] : 1;
                            $perPage = 8; // Number of items per page
                            $offset = ($page - 1) * $perPage;

                            // Execute SQL query to get total records
                            if ($selected === null) {
                                $stmt = $conn->prepare("SELECT COUNT(*) FROM ledgertransaction");
                            } else {
                                $stmt = $conn->prepare("SELECT COUNT(*) FROM ledgertransaction WHERE ledgerno = :ledgerno OR ledgerno_dr = :ledgerno");
                                $stmt->bindParam(':ledgerno', $selected);
                            }
                            $stmt->execute();
                            $totalRecords = $stmt->fetchColumn();

                            // Calculate total pages
                            $totalPages = ceil($totalRecords / $perPage);

                            // Execute SQL query to fetch all data from ledgertransaction table
                            $order = $recent ? 'DESC' : 'ASC';
                            if ($selected === null) {
                                $stmt = $conn->prepare("SELECT * FROM ledgertransaction ORDER BY DateTime $order LIMIT :perPage OFFSET :offset");
                            } else {
                                $stmt = $conn->prepare("SELECT * FROM ledgertransaction WHERE ledgerno = :ledgerno OR ledgerno_dr = :ledgerno ORDER BY DateTime $order LIMIT :perPage OFFSET :offset");
                                $stmt->bindParam(':ledgerno', $selected);
                            }
                            $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
                            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                            $stmt->execute();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <div>
                                <!-- Get All Records from ledgertransaction -->
                                <?php foreach ($rows as $row): ?>
                                    <tr class="">
                                        <td class="whitespace-nowrap px-4  text-gray-900">
                                            <?= (new DateTime($row['DateTime']))->format('F d, Y') ?>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-1 text-gray-700">
                                            <?= getLedgerName($conn, $row['LedgerNo_Dr']) ?>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-1 text-gray-700">&#8369;
                                            <?= $row['amount'] ?>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-1 text-gray-700"></td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-1  text-gray-700"></td>
                                        <td class="whitespace-nowrap px-4 py-1 text-gray-700">
                                            <?= getLedgerName($conn, $row['LedgerNo']) ?>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-1 text-gray-700"></td>
                                        <td class="whitespace-nowrap px-4 py-1 text-gray-700">&#8369;
                                            <?= $row['amount'] ?>
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td colspan="4" class="italic whitespace-nowrap px-4 py-1 text-gray-700">
                                            <?= $row['details'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <!-- Pagination links -->
        <?php $link = "/fin/ledger/page="?>
        <ol class="flex justify-end mr-8 gap-1 text-xs font-medium mt-5">
                <!-- Next & Previous -->
                <?php if ($page > 1): ?>
                    <li>
                        <!-- CHANGE THE ROUTE -->
                        <a route="<?php echo $link . $page - 1 ?>"
                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                            <span class="sr-only">Prev Page</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
                <!-- links for pages -->
                <?php 
                    $start = max(1, $page - 2);
                    $end = min($totalPages, $page + 2);

                    for ($i = $start; $i <= $end; $i++): 
                ?>
                    <li>
                        <a route="<?php echo $link . $i ?>"
                            class="block size-8 rounded border <?= $i == $page ? 'border-blue-600 bg-blue-600 text-white' : 'border-gray-100 bg-white text-gray-900' ?> text-center leading-8">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <li>
                        <a route="<?php echo $link . $page + 1 ?>"
                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                            <span class="sr-only">Next Page</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
            </ol>
    </main>
    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const form = document.querySelector('form');
            console.log(form); // Check if form is found

            const pathSegments = window.location.pathname.split('/');
            console.log(pathSegments); // Check path segments

            const rootFolder = pathSegments.length > 1 ? pathSegments[1] : '';
            console.log(rootFolder); // Check root folder

            const existingAction = form.getAttribute('action');
            console.log(existingAction); // Check existing action

            form.action = `/${rootFolder}${existingAction}`;
            console.log(form.action); // Check final form action
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        import Swal from 'sweetalert2'

        const Swal = require('sweetalert2')
    </script>
    <script>
            
    function isDebit(value){
        let debit = <?php echo json_encode(getTransactionTypes('dr'))?>;
        console.log(debit);
        return debit.some(obj => obj.ledgerno === value || obj.name === value);
    }
    function getValue(account){
        let url = "http://localhost/master/fin/getBalanceAccount";
        let data = { account: account };

        return fetch(url, {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            return data; // return the data from the fetch operation
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        let form =document.querySelector('#ledger-insert-form')

        form.addEventListener('submit', function(event){
            event.preventDefault()
            let debitSelectAccount = document.querySelector('#debit').value
            let creditSelectAccount = document.querySelector('#credit').value
            let amount = document.querySelector('#amount').value
            getValue(debitSelectAccount)
                .then(drVal => {
                    // console.log(drVal); // log the data from the fetch operation


                    if (!isDebit(debitSelectAccount)) {
                        drVal = drVal * -1;
                    }
                    
                    
                    if(!isDebit(debitSelectAccount)){
                        drVal = drVal - amount;
                        if (drVal < 0){
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Amount',
                                text: 'Selected Debit account will become negative'
                            });
                            return;
                        }
                    }

                    getValue(creditSelectAccount)
                        .then(crVal => {
                            if (!isDebit(creditSelectAccount)) {
                                crVal = crVal * -1;
                            }
                            if(isDebit(creditSelectAccount) ){
                                crVal = crVal - amount;
                                if (crVal < 0){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Invalid Amount',
                                        text: 'Selected Credit account will become negative'
                                    });
                                    return;
                                }
                            }
                            console.log(crVal);
                            if (crVal < 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid Amount',
                                    text: 'Credit account will become negative'
                                });
                                return;
                            }

                        //    If validation passes, check HTML5 validation and submit the form
                            if (form.checkValidity()) {
                                form.submit();
                            } else {
                                form.reportValidity();
                            }
                        })
                });
        })
    })
    </script>

    <!-- Start: Sidebar -->
    <!-- End: Dashboard -->
</body>

</html>