<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Logs</title>
    <link href="./../../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <!-- Start: Sidebar -->
    <?php include "components/sidebar.php" ?>
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
                    <p class="text-black font-medium">Audit Logs</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <?php require_once "components/logout/logout.php"?>

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Audit Logs</h2>
                </div>
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <form action="/auditlogSearch" method="post" class="flex">
                                <input type="text" id="search" placeholder="Search.." name="searchQueryAudit"
                                    value = "<?php echo isset($_SESSION['postdata']['searchQueryAudit']) ? $_SESSION['postdata']['searchQueryAudit'] : '';?>"
                                    class="shadow appearance-none border rounded-l-lg w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline p-2">
                                <input type="hidden" name="pageNumber" value = "<?php echo isset($_GET['page']) ? $_GET['page'] : 1?>">
                                <button
                                    type ="submit"
                                    class="px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 rounded-r-lg">
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
                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Audit ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    User
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Employee Name
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Date-Time
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Action
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Replace this with your actual data
                            // require_once './../../../src/dbconn.php';
                            $db = Database::getInstance();
                            $pdo = $db->connect();
                            $numberPerPage = 10;
                            $offset = isset($_GET['page']) ? ($_GET['page'] - 1) * $numberPerPage : 0;
                            $department = $_SESSION['user']['role'];
                            $searchQuery = isset($_SESSION['postdata']['searchQueryAudit']) ? $_SESSION['postdata']['searchQueryAudit'] : '';
                            $searchQuery = "%$searchQuery%";
                            $sql = "SELECT al.id as id, ai.username as user, CONCAT(e.first_name, ' ', e.last_name) as fullname, al.datetime as datetime, al.action as action FROM audit_log as al 
                                    INNER JOIN account_info as ai ON ai.id = al.account_id
                                    INNER JOIN employees as e ON e.id = ai.employees_id
                                    WHERE e.department = :department AND (ai.username LIKE :searchQuery OR CONCAT(e.first_name, ' ', e.last_name) LIKE :searchQuery OR al.action LIKE :searchQuery OR CAST(al.id AS CHAR) LIKE :searchQuery OR CAST(al.datetime AS CHAR) LIKE :searchQuery)
                                    Order by id DESC LIMIT :numberPerPage OFFSET :offset";

                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':numberPerPage', $numberPerPage, PDO::PARAM_INT);
                            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                            $stmt->bindParam(':searchQuery', $searchQuery);
                            $stmt->bindParam(':department', $department, PDO::PARAM_STR);

                            $stmt->execute();
                            // $stmt->fetchColumn();
                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>{$row['id']}</td>";
                                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>{$row['user']}</td>";
                                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>{$row['fullname']}</td>";
                                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>{$row['datetime']}</td>";
                                    echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>{$row['action']}</td>";
                                    echo "</tr>";
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM audit_log as al 
                       INNER JOIN account_info as ai ON ai.id = al.account_id
                       INNER JOIN employees as e ON e.id = ai.employees_id
                       WHERE ai.username LIKE :searchQuery OR CONCAT(e.first_name, ' ', e.last_name) LIKE :searchQuery OR al.action LIKE :searchQuery OR CAST(al.id AS CHAR) LIKE :searchQuery OR CAST(al.datetime AS CHAR) LIKE :searchQuery");
                $stmt->bindParam(':searchQuery', $searchQuery);
                $stmt->execute();
                $totalPages = $stmt->fetchColumn();
                
                // PUT YOUR LINK HERE
                $link = "/fin/logs/page=";
                ?>
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
        </div>

    </main>
    <!-- End: Dashboard -->
    <script src="./../../src/route.js"></script>
    <script src="./../../src/form.js"></script>
</body>

</html>