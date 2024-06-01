<?php 
define('YEAR', date('Y'));
define('MONTH', date('m'));

require_once "public/finance/functions/reportGeneration/TrialBalance.php";
require_once "components/dashboard/dashboard.performFunctions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- for calendar, cant render if not here -->
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <!-- Start: Sidebar -->
    <?php include "components/sidebar.php" ?>
    <?php
    // require_once './../functions/auditLog.php';
    // echo __DIR__ . './../functions/auditLog.php';
    // addAccountantAuditLog('Log in'); 
    if (session_status() === PHP_SESSION_ACTIVE) {
        if (isset($_SESSION['employee_name'])) {

            $db = Database::getInstance();
            $pdo = $db->connect();

            $logAction = "Log in";

            $sql = "INSERT INTO tbl_fin_audit (employee_name, log_action) VALUES (:employee_name, :log_action)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":employee_name", $_SESSION['employee_name']);
            $stmt->bindParam(":log_action", $logAction);
            $stmt->execute();
        }
    }
    ?>
    <!-- End: Sidebar -->
    <!-- Start: Dashboard -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main font-sans">


        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Dashboard</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <!-- Start: Inner Dashboard Analytics-->
        <div class="w-full h-1/4 p-6 bg-white">
            <!-- Start: Top Section -->
            <div class=" mb-6">
                <!-- Start: Top Left-Side Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 ">
                    <div class="col-span-1 border-solid border-gray-400 shadow-md rounded-xl px-5 py-10 bg-[url('../public/finance/img/wave.png')] bg-[center_top_6rem] bg-[length:100%_70%] bg-no-repeat">
                        <!-- Start: Welcome Message -->
                        <div class="flex justify-between mb-5">
                            <div>

                                <h1 class="font-sans font-bold  text-5xl">Hello, <?= $_SESSION['user']['username']; ?>!</h1>
                                <p class=" w-3/4 text wrap mt-3 font-sans text-md text-gray-400 ">Welcome back! Ready to
                                    gear
                                    up for another productive day?</p>
                                <!-- End: Welcome Message -->
                            </div>


                            <div class="text-right">
                                <p class="font-sans font-bold text-xl text-gray-500">Today,</p>
                                <!-- Expected format: March 04, 2024 -->
                                <p class="font-sans font-bold text-xl text-gray-500">
                                    <?= date('F j, Y'); ?>
                                </p>
                            </div>
                        </div>

                        <!-- End: Welcome Message -->
                        <!-- Start: Mini-Dashboard Analytics -->
                        <div id="mini-dashboard" class="mt-10 grid grid-cols-1  md:grid-cols-2  gap-4">
                            <!-- Start: Dashboard Analytics: Total Sales -->
                            <div class="bg-white rounded-md border border-gray-300 p-4 shadow-lg">
                                <div class="flex justify-between mb-4">
                                    <div>
                                        <div class="flex items-center mb-1">
                                            <p class="text-4xl sm:text-md font-semibold text-[#F8B721]">
                                                <?php
                                                $income = getGroupCode('Income');
                                                $incomeAmount = getTotalOfGroupV2($income);
                                                echo '₱'.number_format($incomeAmount, 2);
                                                ?>
                                            </p>
                                        </div>
                                        <div class="text-sm font-medium text-gray-400">Total Sales</div>
                                    </div>
                                    <div class="sm:block hidden">
                                        <img src="../public/finance/img/Profit.png" alt="Profit.png"
                                            class="bg-radial-gradient from-[#FFEB95] to-[#FECE01] py-2 px-2 rounded-full">
                                    </div>
                                </div>
                            </div>
                            <!-- End: Dashboard Analytics: Total Sales -->
                            <!-- Start: Dashboard Analytics: Total Expense -->
                            <div class="bg-white rounded-md border border-gray-300 p-4 shadow-lg">
                                <div class="flex justify-between mb-4">
                                    <div>
                                        <div class="flex items-center mb-1">
                                            <div class="text-4xl font-semibold text-[#F8B721]">
                                                <?php
                                                $expense = getGroupCode('Expenses');
                                                $expenseAmount = getTotalOfGroupV2($expense);
                                                echo '₱' . number_format($expenseAmount, 2);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="text-sm font-medium text-gray-400">Total Expense</div>
                                    </div>
                                    <div>
                                        <img src="../public/finance/img/RequestMoney.png" alt="request-money.png"
                                            class="bg-radial-gradient from-[#FFEB95] to-[#FECE01] max-w-full h-auto py-2 px-1 rounded-full">
                                    </div>
                                </div>
                            </div>
                            <!-- End: Dashboard Analytics: Total Expense -->
                        </div>
                        <!-- End: Mini-Dashboard Analytics -->
                    </div>
                    <!-- start funds -->
                    <?php include_once "components/dashboard/dashboard.funds.php"?>
                    <!-- end funds -->
                </div>
                <!-- End: Top Left-Side Section -->
            </div>
            <!-- End: Top Section -->

            <!-- Start: Request Section -->
            <?php include "components/dashboard/dashboard.request.php" ?>
            <!-- End: Request Section -->

            <!-- Start: Report Section -->
            <?php include "components/dashboard/dashboard.reports.php" ?>
            <!-- End: Report Section -->

            
        </div>
        <!-- End: Inner Dashboard Analytics-->
    </main>
    <!-- End: Dashboard -->
    <script src="./../src/route.js"></script>
    <script  src="./../src/form.js"></script>
    
</body>

</html>