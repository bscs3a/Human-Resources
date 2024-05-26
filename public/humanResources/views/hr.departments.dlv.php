<?php
  $db = Database::getInstance();
  $conn = $db->connect();

  $search = $_POST['search'] ?? '';
  $query = "SELECT * FROM employees WHERE department = 'Delivery'";
  $params = [];

  if (!empty($search)) {
      $query .= " AND (first_name = :search OR last_name = :search OR position = :search OR id = :search OR department = :search);";
      $params[':search'] = $search;
  }

  $stmt = $conn->prepare($query);
  $stmt->execute($params);
  $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <a href="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
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
                <a route="/hr/departments/inventory"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Inventory
                </a>
                <a route="/hr/departments/sales"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Point of Sales
                </a>
                <a route="/hr/departments/finance"
                    class="cursor-pointer shrink-0 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                    Finance
                </a>
                <a route="/hr/departments/delivery"
                    class="cursor-pointer shrink-0 border-b-2 border-sidebar px-1 pb-4 text-sm font-medium text-sidebar"
                    aria-current="page">
                    Delivery
                </a>
                <a route="/hr/departments/human-resources"
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
    <form action="/hr/departments/delivery" method="POST" class="mt-6 ml-auto mr-4 flex">
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

</main>
<!-- End Main Bar -->
<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>

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