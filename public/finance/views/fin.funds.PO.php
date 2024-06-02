
<?php 
$department = "Product Order";
$db = Database::getInstance();
$conn = $db->connect();
$searchQuery = isset($_SESSION['postdata']['generalLedgerSelected']) ? $_SESSION['postdata']['generalLedgerSelected'] : null;

$sql = "SELECT COUNT(*) FROM funds_transaction as ft JOIN employees as e ON ft.employee_id = e.id JOIN ledgertransaction as lt ON ft.lt_id = lt.ledgerxactid WHERE department = :department";
if ($searchQuery) {
    $sql .= " AND (lt.LedgerNo_Dr = :searchQuery)";
}
$stmt = $conn->prepare($sql);
$stmt->bindParam(':department', $department);
if ($searchQuery) {
    $stmt->bindParam(':searchQuery', $searchQuery);
}
$stmt->execute();
$totalRecords = $stmt->fetchColumn();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$displayPerPage = 10;
$totalPages = ceil( $totalRecords / $displayPerPage) ;

// changes here
$totalExpenses = getExpensesPondo($department, 'Cash on hand') + getExpensesPondo($department, 'Cash on bank');

$cashOnHand = getRemainingPondo($department, "Cash on hand");
$cashOnBank = getRemainingPondo($department, "Cash on bank");
$remainingPondo = $cashOnHand + $cashOnBank;
// upto here
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Fund Expenses</title>
    <link href="./../../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body class="flex">

    <?php require_once "components/sidebar.php" ?>

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
                    <p class="text-black font-medium">Department Fund Expenses</p>
                </li>
            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once __DIR__ . "/components/logout/logout.php"?>
            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        
        <div class="w-full p-6 bg-white">
            <!-- department choice header -->
            <div class="justify-between items-start mb-4">
                <!-- Tabs -->
                <div class="mb-4">


                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                                <a route='/fin/funds/HR/page=1'
                                class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Human Resources
                                </a>
                                <a route='/fin/funds/PO/page=1'
                                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                                    aria-current="page"
                                   >
                                    Product Order
                                </a>
                                <a route='/fin/funds/Sales/page=1'
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Sales
                                </a>
                                <a route='/fin/funds/Inventory/page=1'
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                                >
                                    Inventory
                                </a>
                                <a route='/fin/funds/Delivery/page=1'
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Delivery
                                </a>
                                <a route='/fin/funds/finance/page=1'
                                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                                    Finance
                                </a>


                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- for adding transaction -->
            <div class="w-full px-6 py-3 bg-white">
                <div class="justify-between items-start">
                    <!-- Button -->
                    <div class="flex justify-between">
                        <div class="items-start mb-1">
                            <div class="relative">
                                <div class="inline-flex items-center overflow-hidden rounded-lg  border border-gray-500">
                                    <form action="/fin/fundSearch" method="post" class="flex items-center">
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
                        </div>
                    </div>


                    <!-- Modal -->
                    <div id="myModal"
                        class="modal hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white rounded shadow-lg w-1/3">
                            <div class="border-b pl-3 pr-3 pt-3 flex">
                                <h5 class="font-bold uppercase text-gray-600">New Transactions</h5>
                            </div>
                            <!-- form -->
                            <div class="p-5">
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
                </div>
            </div>

            <!-- allowance info -->
            <!-- changes here -->
            <div class=" mb-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 gap-6 ">
                    <div class=" col-span-1 bg-gradient-to-b from-[#F8B721] to-[#FBCF68] rounded-xl">
                        <div class="mx-5 my-5 py-3 px-3 text-white">
                            <h1 class="text-2xl font-bold">Given Allowance This Month</h1>
                            <p class="mt-5 text-4xl font-medium"><?php echo pondoForEveryone($department)['total'];?></p>
                        </div>
                    </div>
                    <div class=" col-span-1 bg-gradient-to-b from-[#F8B721] to-[#FBCF68] rounded-xl">
                        <div class="mx-5 my-5 py-3 px-3 text-white">
                            <h1 class="text-2xl font-bold">Total Expenses This Month</h1>
                            <p class="mt-5 text-4xl font-medium"><?php echo $totalExpenses;?></p>
                        </div>
                    </div>
                    <div class=" col-span-1 bg-gradient-to-b from-[#F8B721] to-[#FBCF68] rounded-xl">
                        <div class="mx-5 my-5 py-3 px-3 text-white">
                            <h1 class="text-2xl font-bold">Remaining Funds This Month</h1>
                            <p class="mt-5 text-4xl font-medium"><?php echo $remainingPondo;?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- upto here -->

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg border border-gray-400">
                <table class="min-w-full divide-y-2 divide-gray-400 bg-white text-sm">
                    
                    <thead class="ltr:text-left rtl:text-right bg-gray-200">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Details</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Amount</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Department</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 text-center">
                        <?php 
                        $searchQuery = isset($_SESSION['postdata']['generalLedgerSelected']) ? $_SESSION['postdata']['generalLedgerSelected'] : null;

                        $pondoTable = getAllTransactions($department,$searchQuery, $recent,$page, $displayPerPage);
                        foreach($pondoTable as $row){
                        ?>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['id'];?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['details']?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo "₱". number_format($row['amount'], 2)?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['department']?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['datetime']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- pages -->
            <?php 
            $link = "";
            switch ($department) {
                case 'Delivery':
                    $link = "/fin/funds/Delivery/page=";
                    break;
                case 'Finance':
                    $link = "/fin/funds/finance/page=";
                    break;
                case 'Point of Sales':
                    $link = "/fin/funds/Sales/page=";
                    break;
                case 'Product Order':
                    $link = "/fin/funds/PO/page=";
                    break;
                case 'Inventory':
                    $link = "/fin/funds/Inventory/page=";
                    break;
                case 'Human Resources':
                    $link = "/fin/funds/HR/page=";
                    break;
            } ?>
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
        </div>

            
    </main>
    <script src="./../../../src/route.js"></script>
    <script src="./../../../src/form.js"></script>
    <!-- Start: Sidebar -->
    <!-- End: Dashboard -->
</body>

</html>