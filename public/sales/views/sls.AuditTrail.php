
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Trail</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Sales / Audit Trail</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->
        <div class="flex flex-col items-center min-h-screen">
            <!-- Start: Audit Trail Table -->
            <div class="w-full max-w-6xl mt-10">
                <h1 class="mb-3 text-xl font-bold text-black">Audit Trail</h1>
                <table class="table-auto w-full mx-auto text-left rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 font-semibold">ID</th>
                            <th class="px-4 py-2 font-semibold">Employee Name</th>
                            <th class="px-4 py-2 font-semibold">Action</th>
                            <th class="px-4 py-2 font-semibold">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once './src/dbconn.php';
                        $database = Database::getInstance();
                        $pdo = $database->connect();

                        // Query for the audit trail
                        $sqlAuditTrail = "SELECT * FROM tbl_sls_audit ORDER BY log_date DESC";
                        $stmtAuditTrail = $pdo->query($sqlAuditTrail);
                        $auditTrails = $stmtAuditTrail->fetchAll(PDO::FETCH_ASSOC);

                        // Display the audit trail in the table
                        foreach ($auditTrails as $trail) {
                            echo "<tr class='border border-gray-200 bg-white'>";
                            echo "<td class='px-4 py-2'>" . $trail['id'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $trail['employee_name'] . "</td>";
                            echo "<td class='px-4 py-2'>" . $trail['log_action'] . "</td>";
                            echo "<td class='px-4 py-2'>" . date("F j, Y, g:i a", strtotime($trail['log_date'])) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- End: Audit Trail Table -->
        </div>
    </main>
    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>
</body>

</html>