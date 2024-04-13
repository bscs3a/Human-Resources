<?php
$db = Database::getInstance();
$conn = $db->connect();

$search = $_POST['search'] ?? '';
$query = "SELECT payroll.*, salary_info.*, employees.* FROM payroll";
$query .= " 
LEFT JOIN employees ON payroll.employees_id = employees.id
LEFT JOIN salary_info ON salary_info.employees_id = employees.id AND payroll.salary_id = salary_info.id";

$params = [];

if (!empty($search)) {
  $query .= " WHERE (employees.first_name = :search OR employees.last_name = :search OR employees.position = :search OR employees.department = :search OR payroll.id = :search OR payroll.status = :search OR payroll.month = :search) AND";
  $params[':search'] = $search;
}

$stmt = $conn->prepare($query);
$stmt->execute($params);
$payroll = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
  <title>Payroll</title>
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
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Payroll</a>
   </ul>
   <ul class="ml-auto flex items-center">
  <li class="mr-1">
    <a href="#" class="text-[#151313] hover:text-gray-600 text-sm font-medium">Sample User</a>
  </li>
  <li class="mr-1">
    <button type="button" class="w-8 h-8 rounded justify-center hover:bg-gray-300"><i class="ri-arrow-down-s-line"></i></button> 
  </li>
   </ul>
  </div>
  <!-- End Top Bar -->


<div class="mt-4 py-2 ml-4 mr-4">
  <div class="relative shadow-md sm:rounded-lg h-screen" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
    <h1 class="text-left w-full p-4 border-b-2 border-gray-200">Generate Payslip</h1>
    <div id="myDiv" class="flex flex-col justify-center items-center h-full">

      <form action="process.php" method="POST" class="p-4 w-full pt-16 pb-16">
        <div class="flex justify-center mb-4">
          <select class="w-1/3 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="department" id="Department" placeholder="Department">
            <option value="">Select Department</option>
            <option value="Product Order">Product Order</option>
            <option value="Inventory">Inventory</option>
            <option value="Delivery">Delivery</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Point of Sales">Point of Sales</option>
            <option value="Finance">Finance/Accounting</option>
          </select>
          <input type="month" class="w-1/3 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="date" id="Date" placeholder="Select Month">
            <button type="submit" class="w-1/4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-2 rounded">Submit</button>
        </div>
        <hr class="border-gray-200 my-4 mx-0">
      </form>

              <table class="table-auto w-full mt-4">
          <thead>
            <tr>
              <th class="px-4 py-2 text-center">PIN</th>
              <th class="px-4 py-2 text-center">Full name</th>
              <th class="px-4 py-2 text-center">Total Salary</th>
              <th class="px-4 py-2 text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border px-4 py-2 text-center">1234</td>
              <td class="border px-4 py-2 text-center">John Doe</td>
              <td class="border px-4 py-2 text-center">$5000</td>
              <td class="border px-4 py-2 text-center">
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Generate Salary</button>
              </td>
            </tr>
          </tbody>
        </table>

    </div>

  </div>
</div>
  
<!-- END of Payroll -->
</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html> 