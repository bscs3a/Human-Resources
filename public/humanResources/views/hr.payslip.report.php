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

  <!-- Payroll-->
<div class="mt-4 ml-6 font-bold text-lg">
  <h1><i class="ri-hourglass-line"></i>Payroll List </h1>
</div>
<hr class="mt-4">
    <div class="mt-4 ml-6 mr-4">
        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 mt-4 dark:focus:ring-yellow-900">Print</button> 
        <input type="search" id="search" name="search" placeholder="Search..." class="mt-[16px] mr-3 w-50 float-right px-2 py-2 border text-sm font-medium border-gray-300 rounded-md focus:outline-none focus:ring-2  focus:ring-blue-500 focus:border-transparent"> 
    </div>

  <!--Table-->
<div class="mt-4 py-2 ml-4 mr-4">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<table class="w-full text-sm text-left text-gray-500">
<thead class="text-xs text-gray-700 uppercase bg-gray-50">
  <tr>
    <th scope="col" class="px-6 py-3">
      Employee 
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Month
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Salary
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Deduction
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Total Paid
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Pay Date
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <div class="flex items-center">
        Status
      </div>
    </th>
    <th scope="col" class="px-6 py-3">
      <span class="sr-only">Action</span> 
    </th>
  </tr>
</thead>
<?php foreach ($payroll as $pay): ?>
<tbody>
  <tr class="bg-white border-b">
    <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap">
      <?php 
        echo $pay['first_name'] . ' ';
        if (!empty($pay['middle_name'])) {
            echo substr($pay['middle_name'], 0, 1) . '. ';
        }
        echo $pay['last_name']; 
      ?>
    </th>
    <td class="px-6 py-4">
      <?php echo $pay['month']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['monthly_salary']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['deductions']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['net_pay']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['pay_date']; ?>
    </td>
    <td class="px-6 py-4">
      <?php echo $pay['status']; ?>
    </td>
    <td class="px-6 py-4 text-right">
      <button type="button" class="text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 rounded-lg text-sm px-4 py-2"><i class="ri-bank-card-line"></i></button>
    </td>
  </tr>
</tbody>
<?php endforeach; ?>   
</table>
</div>
</div>

<!-- END of Payroll -->

<!-- Chart -->
<!-- <div>
  <div class="flex items-center min-h-full max-w-full">
    <canvas id="myChart" style="height:400px;"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
          datasets: [{
            label: '# Employees Payroll',
            data: [25, 50, 10, 24, 100, 95, 85],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>   -->
  </div>
</div>
<!-- End Chart -->
</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html> 