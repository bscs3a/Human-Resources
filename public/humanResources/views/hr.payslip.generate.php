<?php
// Get database instance and establish connection
$db = Database::getInstance();
$conn = $db->connect();

$query = "SELECT e.id, e.first_name, e.last_name, e.middle_name, e.department, e.position, s.total_salary, s.monthly_salary, s.total_deductions
          FROM employees e
          JOIN salary_info s ON e.id = s.employees_id";

$countQuery = "SELECT COUNT(*) FROM employees";
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$displayPerPage = 7;
$offset = ($page - 1) * $displayPerPage;
$query .= " LIMIT $displayPerPage OFFSET $offset";

$stmt = $conn->prepare($query);
// Execute the query
$stmt = $conn->query($query);

$stmtCount = $conn->prepare($countQuery);
$stmtCount->execute();
$totalRecords = $stmtCount->fetchColumn();

$totalPages = ceil( $totalRecords / $displayPerPage) ;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title>Payroll</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php include 'inc/sidenav.php'; ?>
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
    <!-- require_once 'inc/logout.php' ?> -->
    <ul class="ml-auto flex items-center">
        <div class="relative inline-block text-left ml-4">
                <div>
                <a class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-black bg-white rounded-md shadow-sm border-b-2 transition-all hover:bg-gray-200 focus:outline-none hover:cursor-pointer" id="options-menu" aria-haspopup="true" aria-expanded="true">
                    <div class="text-black font-medium mr-4 ">
                    <i class="ri-user-3-fill mx-1"></i> <?= $_SESSION['user']['username']; ?>
                    </div>
                    <i class="ri-arrow-down-s-line"></i>
                </a>
            </div>

            <div class="z-50 origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <div class="py-1" role="none">
                <form action="/logout" method="post">
                    <button type="submit" class="w-full block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        <i class="ri-logout-box-line"></i>
                        Logout
                    </button>
                </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('options-menu').addEventListener('click', function() {
                var dropdownMenu = document.getElementById('dropdown-menu');
                if (dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            });
        </script>
    </ul>
    <!--  -->
  </div>
  <!-- End Top Bar -->

  <div class="mt-4 py-2 ml-4 mr-4">
    <div class="relative shadow-md sm:rounded-lg h-screen" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
      <h1 class="text-center w-full p-4 border-b-2 border-gray-200 text-4xl">Generate Payslip</h1>
      
      <form id="filterForm" method="POST" action="/hr/generate-payslip">
        <div class="px-4 py-2">
          <select id="department" onchange="filterEmployees()" name="department" class="hidden mt-1 block w-33 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="">All Departments</option>
            <?php
            $department_query = "SELECT DISTINCT department FROM employees";
            $department_stmt = $conn->query($department_query);

            while($dept_row = $department_stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $dept_row['department'] . "'>" . $dept_row['department'] . "</option>";
            }
            ?>
          </select>
        </div>
      </form>

      <!-- Payroll table -->
      <table class="table-auto w-full mt-4">
        <thead>
          <tr>
            <th class="px-4 py-2 text-center">Name</th>
            <th class="px-4 py-2 text-center">Department</th>
            <th class="px-4 py-2 text-center">Position</th>
            <th class="px-4 py-2 text-center">Total Salary</th>
            <th class="px-4 py-2 text-center">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          // Check if any rows are returned
          if($stmt->rowCount() > 0) {
            // Loop through each row and populate the table
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              $fullName = $row['first_name'] . ' ';
              if (!empty($row['middle_name'])) {
                  $fullName .= substr($row['middle_name'], 0, 1) . '. ';
              }
              $fullName .= $row['last_name'];

              echo "<td class='px-4 py-2 text-center'>" . $fullName . "</td>";
              echo "<td class='px-4 py-2 text-center'>" . $row['department'] . "</td>";
              echo "<td class='px-4 py-2 text-center'>" . $row['position'] . "</td>";
              echo "<td class='px-4 py-2 text-center'> ₱" . $row['total_salary'] . "</td>";
              $fullName = $row['first_name'] . ' ';
              if (!empty($row['middle_name'])) {
                  $fullName .= substr($row['middle_name'], 0, 1) . '. ';
              }
              $fullName .= $row['last_name'];

              echo "<td class='px-4 py-2 text-center'><button class='bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded' onclick='showModal(\"" . $row['id'] . "\", \"" . $fullName . "\", \"" . $row['department'] . "\", \"" . $row['position'] . "\", \"" . $row['total_salary'] . "\", \"" . $row['monthly_salary'] . "\", \"" . $row['total_deductions'] . "\")'>Generate</button></td>";

              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No record/s found</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <hr class="border-gray-200 my-4 mx-0">
      
<!-- PAGINATION -->
<?php 
            // PUT YOUR LINK HERE
            $link = "/hr/generate-payslip/page=";
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
  <!-- END of Generate Payslip Form -->

<!-- Modal -->
<div id="modal" class="fixed z-50 inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-md max-w-3xl shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Payslip Details</h2>
        <form action="/create/payslip" id="createPayslip" method="POST">
          
          <!-- Hidden input for employee ID -->
          <input type="hidden" id="employee_id" name="employee_id">

            <!-- Employee -->
            <p id="full_name" class="mb-2"></p>
            <p id="position" class="mb-2"></p>
            <p id="total_salary" class="mb-2"></p>
            <p id="monthly_salary" class="mb-2"></p>
            <p id="total_deductions" class="mb-4"></p>

            <!-- Input Grid -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Month -->
                <div class="flex items-center">
                    <label for="month" class="block font-bold mr-4">Month:</label>
                    <select id="month" name="month" class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <!-- Pay Date -->
                <div class="flex items-center">
                    <label for="pay_date" class="block font-bold mr-4">Pay Date:</label>
                    <input type="date" id="pay_date" name="pay_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <!-- Status and Paid Type -->
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="flex items-center">
                    <label class="block font-bold mr-4">Status:</label>
                    <div class="flex items-center">
                        <input type="radio" id="status_paid" name="status" value="paid" class="mr-2">
                        <label for="status_paid" class="mr-4">Paid</label>
                        <input type="radio" id="status_pending" name="status" value="pending" class="mr-2">
                        <label for="status_pending" class="mr-4">Pending</label>
                    </div>
                </div>
                <div class="flex items-center">
                    <label class="block font-bold mr-4">Paid Type:</label>
                    <div class="flex items-center">
                        <input type="radio" id="paid_type_cash" name="paid_type" value="Cash on hand" class="mr-2">
                        <label for="paid_type_cash" class="mr-4">Hand Cash</label>
                        <input type="radio" id="paid_type_bank" name="paid_type" value="Cash on bank" class="mr-2">
                        <label for="paid_type_bank">Bank</label>
                    </div>
                </div>
            </div>
            <input type="hidden" id="monthlySalaryInput">

            <!-- Button Group -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Pay</button>
                <button id = "generatePayslipCloseButton" type="button" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">Close</button>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->
<script>
function showModal(id, fullName, department, position, totalSalary, monthlySalary, totalDeductions) {
    document.getElementById('employee_id').value = id; // Set the value of the hidden input field for employee ID
    let labels = ['Employee: ', 'Department: ', 'Position: ', 'Total Salary: ', 'Monthly Salary: ', 'Total Deductions: '];
    let values = [fullName, department, position, totalSalary, monthlySalary, totalDeductions];
    let ids = ['full_name', 'department', 'position', 'total_salary', 'monthly_salary', 'total_deductions'];
    document.getElementById('monthlySalaryInput').value = monthlySalary;

    for (let i = 0; i < labels.length; i++) {
        let boldText = document.createElement('span');
        boldText.className = 'font-bold';
        boldText.textContent = labels[i];

        let valueText = document.createTextNode(' ' + values[i]);

        document.getElementById(ids[i]).innerHTML = '';
        document.getElementById(ids[i]).appendChild(boldText);
        document.getElementById(ids[i]).appendChild(valueText);
    }

    document.getElementById('modal').classList.remove('hidden');
}

document.getElementById('generatePayslipCloseButton').addEventListener('click', function() {
    // Hide the Employee Details modal
    document.getElementById('modal').classList.add('hidden');
});
  
document.getElementById('createPayslip').addEventListener('submit', function(event) {
  var statusPaid = document.getElementById('status_paid').checked;
  var statusPending = document.getElementById('status_pending').checked;
  var paidTypeCash = document.getElementById('paid_type_cash').checked;
  var paidTypeBank = document.getElementById('paid_type_bank').checked;

    if (!statusPaid && !statusPending) {
        alert('Please select a status.');
        event.preventDefault();
    } else if (!paidTypeCash && !paidTypeBank) {
        alert('Please select a paid type.');
        event.preventDefault();
    }
    
    var payDate = document.getElementById('pay_date').value;

    if (!payDate) {
        alert('Please fill out the pay date before submitting.');
        event.preventDefault();
    }

    var cashOnHand = <?php echo json_encode(getRemainingHRPondo('Cash on hand')); ?>;
    var cashOnBank = <?php echo json_encode(getRemainingHRPondo('Cash on bank')); ?>;

    let monthlySalary = document.getElementById('monthlySalaryInput').value;
    // console.log(monthlySalary);
    if (statusPaid == true && paidTypeCash == true && cashOnHand < monthlySalary) {
      alert('Not enough funds. Cash on Hand: ' + cashOnHand);
        event.preventDefault();
    }

    if (statusPaid == true &&  paidTypeBank == true && cashOnBank < monthlySalary) {
      alert('Not enough funds. Cash in the Bank: ' + cashOnBank);
        event.preventDefault();
    }
});
  </script>

</main>
<!-- End Main Bar -->
<script src="./../../src/route.js"></script>
<script src="./../../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html>
