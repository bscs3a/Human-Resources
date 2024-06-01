<?php
$db = Database::getInstance();
$conn = $db->connect();

$search = $_POST['search'] ?? '';
$query = "SELECT payroll.*, salary_info.total_deductions, salary_info.monthly_salary, salary_info.total_salary, tax_info.withholding_tax, employees.first_name, employees.last_name, employees.middle_name, employees.position FROM payroll";
$query .= " 
LEFT JOIN employees ON payroll.employees_id = employees.id
LEFT JOIN salary_info ON payroll.salary_id = salary_info.id AND salary_info.employees_id = employees.id
LEFT JOIN tax_info ON tax_info.salary_id = salary_info.id";

$params = [];

if (!empty($search)) {
    $query .= " WHERE (employees.first_name LIKE :search OR employees.last_name LIKE :search OR employees.middle_name LIKE :search OR employees.position LIKE :search OR payroll.month LIKE :month)";
    $params[':search'] = '%' . $search . '%';
    $params[':month'] = $search;
}

$query .= " ORDER BY payroll.id DESC";
$stmt = $conn->prepare($query);
$stmt->execute($params);

$cashOnHand = getRemainingHRPondo('Cash on hand');
$cashOnBank = getRemainingHRPondo('Cash on bank');
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
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->

  <!-- Payroll-->
<div class="flex flex-wrap">
  <h1 class="mt-6 ml-6 font-semibold text-m"><i class="ri-coin-line"></i> Funds on Hand: ₱<?php echo getRemainingHRPondo('Cash on hand') ?></h1>
  <div class="ml-6 mt-4 w-px bg-gray-300"></div>
  <h1 class="mt-6 ml-6 font-semibold text-m"><i class="ri-bank-line"></i> Funds in the Bank : ₱<?php echo getRemainingHRPondo('Cash on bank') ?></h1>
    <form action="/hr/payroll" method="POST" class="mt-6 ml-auto mr-4 flex">
      <input type="search" id="search" name="search" placeholder="Search" class="w-40 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600"><i class="ri-search-line"></i></button>
    </form>
</div> 
<hr class="mt-4">
<div class="flex flex-wrap">
</div>

    <?php 
    if (empty($payroll)) {
        require_once 'inc/noResult.php';
    } 
    else {
        require_once 'inc/payroll-list.table.php';
    } 
    ?>

<div id="payEmployeeModal" class="hidden fixed flex top-0 left-0 w-full h-full items-center justify-center bg-black bg-opacity-50">
    <form action="/pay-salary" method="POST" id="paySalary" class="bg-white p-5 rounded-lg text-center">
        <h2 class="mb-4">Give salary?</h2>
        <input type="hidden" name="id" id="idToPay">
        <input type="hidden" name="monthly_salary" id="monthlySalaryInput">
        <input type="hidden" name="withholding_tax" id="withholdingTaxInput">
        <input type="hidden" name="paid_type" id="paidTypeInput">
        <input type="submit" value="Yes" id="confirmPay" class="mr-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
        <input type="button" value="No" id="cancelPay" class="px-4 py-2 bg-gray-300 text-black rounded">

    </form>
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

<script>
  function showPayModal(monthlySalary, withholdingTax, paidType, element) {
    var id = element.getAttribute('data-id');
    document.getElementById('idToPay').value = id;
    
    let values = [monthlySalary, withholdingTax, paidType];
    let ids = ['monthly_salary', 'withholding_tax', 'paid_type'];
    document.getElementById('monthlySalaryInput').value = monthlySalary;
    document.getElementById('withholdingTaxInput').value = withholdingTax;
    document.getElementById('paidTypeInput').value = paidType;

    document.getElementById('payEmployeeModal').classList.remove('hidden');
}

  document.getElementById('cancelPay').addEventListener('click', function() {
      document.getElementById('payEmployeeModal').classList.add('hidden');
  });

  document.getElementById('confirmPay').addEventListener('click', function() {
    document.getElementById('payEmployeeModal').submit();
  });

  document.getElementById('paySalary').addEventListener('submit', function(event) {
    var cashOnHand = <?php echo json_encode(getRemainingHRPondo('Cash on hand')); ?>;
    var cashOnBank = <?php echo json_encode(getRemainingHRPondo('Cash on bank')); ?>;

    let monthlySalary = document.getElementById('monthlySalaryInput').value;
    let paidType = document.getElementById('paidTypeInput').value;
    if (paidType == 'Cash on hand' && cashOnHand < monthlySalary) {
      alert('Not enough funds. Remaining funds on Hand: ₱' + cashOnHand);
        event.preventDefault();
    }

    if (paidType == 'Cash on bank' && cashOnBank < monthlySalary) {
      alert('Not enough funds. Remaining funds in the Bank: ₱' + cashOnBank);
        event.preventDefault();
    }
  });
</script>
</body>
</html> 