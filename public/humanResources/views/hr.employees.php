<?php
$db = Database::getInstance();
$conn = $db->connect();

$search = $_POST['search'] ?? '';
$query = "SELECT * FROM employees";
$countQuery = "SELECT COUNT(*) FROM employees";
$params = [];

if (!empty($search)) {
    $query .= " WHERE first_name = :search OR last_name = :search OR position = :search OR department = :search OR id = :search";
    $countQuery .= " WHERE first_name = :search OR last_name = :search OR position = :search OR department = :search OR id = :search";
    $params[':search'] = $search;
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$displayPerPage = 7;
$offset = ($page - 1) * $displayPerPage;

$query .= " LIMIT $displayPerPage OFFSET $offset";

$stmt = $conn->prepare($query);
if (!empty($search)) {
    $stmt->bindValue(':search', $search, PDO::PARAM_STR);
}
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare($countQuery);
if (!empty($search)) {
    $stmt->bindValue(':search', $search, PDO::PARAM_STR);
}
$stmt->execute();
$totalRecords = $stmt->fetchColumn();

$totalPages = ceil( $totalRecords / $displayPerPage) ;

$pdo = null;
$stmt = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title>List of Employees</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
  include 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- Start Main Bar -->
<main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
  <!-- Top Bar -->
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600 sidebar-toggle">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a route="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Employees</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->

  <!-- Employees -->
  <div class="flex items-center flex-wrap">
    <!-- <h3 class="ml-6 mt-8 text-xl font-bold">All Employees</h3> -->
    <button route="/hr/employees/add" class="mt-9 mr-4 flex ml-6 bg-blue-500 font-medium text-white px-2 py-1 rounded-md hover:bg-blue-600"><i class="ri-add-line"></i>Add New</button>
    
    <form action="/hr/employees/page=1" method="POST" class="mt-6 ml-auto mr-4 flex">
      <input type="text" id="search" name="search" placeholder="Search..." class="w-40 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600"><i class="ri-search-line"></i></button>
    </form>
  </div> 
  <?php 
    if (empty($employees)) {
        require_once 'inc/noResult.php';
    } 
    else {
        require_once 'inc/employees.table.php';
    } 
  ?>
  
            <!-- pages -->
            <?php 
            // PUT YOUR LINK HERE
            $link = "/hr/employees/page=";
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
<!-- END Employees -->

</main>
<!-- End Main Bar -->
<script src="./../../src/route.js"></script>
<script src="./../../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html> 