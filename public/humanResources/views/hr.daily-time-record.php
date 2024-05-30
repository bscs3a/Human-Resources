<?php
$db = Database::getInstance();
$conn = $db->connect();

$search = $_POST['search'] ?? '';
$query = "SELECT attendance.*, employees.image_url, employees.first_name, employees.middle_name, employees.last_name, employees.email, employees.position, employees.department FROM attendance";
$query .= " LEFT JOIN employees ON attendance.employees_id = employees.id";

$params = [];

if (!empty($search)) {
  $query .= " WHERE employees.first_name = :search OR employees.last_name = :search OR employees.position = :search OR employees.department = :search OR attendance.id = :search OR attendance.employees_id = :search;";
  $params[':search'] = $search;
}

$stmt = $conn->prepare($query);
$stmt->execute($params);
$dailyTimeRecord = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
$stmt = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Daily Time Record</title>
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
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Daily Time Record</a>
   </ul>
   <?php require_once 'inc/logout.php' ?>
  </div>
  <!-- End Top Bar -->


  <!-- Daily Time Record -->
<div class="flex flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">Daily Time Record</h3>
    <form action="/hr/dtr" method="post" class="mt-6 ml-auto mr-4 flex">
      <input type="search" id="search" name="search" placeholder="Search" class="w-40 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600"><i class="ri-search-line"></i></button>
    </form>
  </div> 

  <!-- UNCOMMENT THIS AFTER FINISHING THE BACKEND FOR DTR -->
  <?php 
    if (empty($dailyTimeRecord)) {
        require_once 'inc/noResult.php';
    } 
    else {
        require_once 'inc/dtr.table.php';
    } 
  ?>

  <!-- Sample: DELETE THIS WHEN BACKEND IS DONE -->
  <!-- <div class="ml-6 flex flex-col mt-8 mr-6">
  <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow-md sm:rounded-lg">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Name</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Department</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Date</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            In</th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Out</th>
        </tr>
      </thead>
        <tbody class="bg-white">
          <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                  <img class="w-10 h-10 rounded-full object-cover object-center"
                    src="https://pbs.twimg.com/profile_images/1775969848239009792/z8Ab_XEM_400x400.jpg"
                    alt="">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">Ike Eveland
                  </div>
                  <div class="text-sm leading-5 text-gray-500">ikey@example.com</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <div class="text-sm leading-5 text-gray-900">Inventory</div>
              <div class="text-sm leading-5 text-gray-500">Inventory Manager</div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">YYYY-MM-DD</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">YYYY-MM-DD HH-MM-SS</span>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
              <span class="text-sm leading-5 text-gray-900">YYYY-MM-DD HH-MM-SS</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div> -->
<!-- END Daily Time Record -->

</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html> 