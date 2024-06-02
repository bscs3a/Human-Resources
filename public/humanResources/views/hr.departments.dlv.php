<?php
  $db = Database::getInstance();
  $conn = $db->connect();

  $search = $_POST['search'] ?? '';
  $query = "SELECT * FROM employees WHERE department = 'Delivery'";
  $countQuery = "SELECT COUNT(*) FROM employees WHERE department = 'Delivery'";
  $params = [];

  if (!empty($search)) {
      $query .= " AND (first_name = :search OR last_name = :search OR position = :search OR id = :search OR department = :search);";
      $countQuery .= " AND (first_name = :search OR last_name = :search OR position = :search OR department = :search OR id = :search)";
      $params[':search'] = $search;
  }

  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
  $displayPerPage = 5;
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
    <link href="./../../../src/tailwind.css" rel="stylesheet">
  <title>Departments | Delivery</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
  require_once 'inc/sidenav.php';
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
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Departments</a>
  <!-- test -->
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Delivery</a>
  <!-- end test -->
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->
<!-- department tabs -->
<div class="mt-4 ml-4 mb-4">
    <div class="hidden sm:block">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex flex-wrap gap-6" aria-label="Tabs">
                <a route="/hr/departments/product-order"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Product Order
                </a>
                <a route="/hr/departments/inventory/page=1"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Inventory
                </a>
                <a route="/hr/departments/sales/page=1"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Point of Sales
                </a>
                <a route="/hr/departments/finance/page=1"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Finance
                </a>
                <a route="/hr/departments/delivery/page=1"
                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                    aria-current="page">
                    Delivery
                </a>
                <a route="/hr/departments/human-resources/page=1"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Human Resources
                </a>
            </nav>
        </div>
    </div>
</div>
<!-- end department tabs -->

<div class="flex flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">Employees</h3>
    <form action="/hr/departments/delivery/page=1" method="POST" class="mt-6 ml-auto mr-4 flex">
      <input type="search" id="search" name="search" placeholder="Search" class="w-40 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600"><i class="ri-search-line"></i></button>
    </form>
  </div> 
  <!-- Employees -->
  <?php 
      if (empty($employees)) {
        require_once 'inc/noResult.php';
    } else {
        require_once 'inc/employees.table.php';
    } 
  ?>
<!-- End Employees -->
<!-- PAGINATION -->
<?php 
// PUT YOUR LINK HERE
$link = "/hr/departments/delivery/page=";
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
<!-- END PAGINATION -->
</main>
<!-- End Main Bar -->
<script  src="./../../../src/route.js"></script>
<script  src="./../../../src/form.js"></script>

<!-- Sidebar active/inactive -->
<script>
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });
</script>
</body>
</html> 