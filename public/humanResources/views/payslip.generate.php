<?php
// Get database instance and establish connection
$db = Database::getInstance();
$conn = $db->connect();

$query = "SELECT e.id, CONCAT(e.first_name, ' ', e.last_name) AS full_name, e.department, e.position, s.total_salary, s.monthly_salary, s.total_deductions
          FROM employees e
          JOIN salary_info s ON e.id = s.employees_id";

// Execute the query
$stmt = $conn->query($query);
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

  <!-- Generate Payslip Form -->
  <div class="mt-4 py-2 ml-4 mr-4">
    <div class="relative shadow-md sm:rounded-lg h-screen" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
      <h1 class="text-center w-full p-4 border-b-2 border-gray-200 text-4xl">Generate Payslip</h1>

      <!-- Department Filter Dropdown -->
      <div class="px-4 py-2">
        <select id="department" name="department" class="mt-1 block w-33 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="">All Departments</option>
          <?php
          // Fetch distinct departments from the database
          $department_query = "SELECT DISTINCT department FROM employees";
          $department_stmt = $conn->query($department_query);

          // Populate dropdown with department options
          while($dept_row = $department_stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='" . $dept_row['department'] . "'>" . $dept_row['department'] . "</option>";
          }
          ?>
        </select>
      </div>
      <!-- End Department Filter Dropdown -->

      <!-- Payroll table -->
      <table class="table-auto w-full mt-4">
        <thead>
          <tr>
            <th class="px-4 py-2 text-center">Full name</th>
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
              echo "<td class='px-4 py-2 text-center'>" . $row['full_name'] . "</td>";
              echo "<td class='px-4 py-2 text-center'>" . $row['department'] . "</td>";
              echo "<td class='px-4 py-2 text-center'>" . $row['position'] . "</td>";
              echo "<td class='px-4 py-2 text-center'>" . $row['total_salary'] . "</td>";
              echo "<td class='px-4 py-2 text-center'><button class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded' onclick='showModal(\"" . $row['id'] . "\", \"" . $row['full_name'] . "\", \"" . $row['department'] . "\", \"" . $row['position'] . "\", \"" . $row['total_salary'] . "\", \"" . $row['monthly_salary'] . "\", \"" . $row['total_deductions'] . "\")'>Generate</button></td>";


              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <hr class="border-gray-200 my-4 mx-0">
    </div>
  </div>
  <!-- END of Generate Payslip Form -->

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
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
                    <label for="month" class="block font-medium mr-4">Month:</label>
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
                        <!-- Add more months here -->
                    </select>
                </div>
                <!-- Pay Date -->
                <div class="flex items-center">
                    <label for="pay_date" class="block font-medium mr-4">Pay Date:</label>
                    <input type="date" id="pay_date" name="pay_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <!-- Status and Paid Type -->
            <div class="grid grid-cols-2 gap-4 mt-4">
                <!-- Status -->
                <div class="flex items-center">
                    <label class="block font-medium mr-4">Status:</label>
                    <div class="flex items-center">
                        <input type="radio" id="status_paid" name="status" value="paid" class="mr-2">
                        <label for="status_paid" class="mr-4">Paid</label>
                        <input type="radio" id="status_pending" name="status" value="pending" class="mr-2">
                        <label for="status_pending" class="mr-4">Pending</label>
                    </div>
                </div>
                <!-- Paid Type -->
                <div class="flex items-center">
                    <label class="block font-medium mr-4">Paid Type:</label>
                    <div class="flex items-center">
                        <input type="radio" id="paid_type_cash" name="paid_type" value="cash" class="mr-2">
                        <label for="paid_type_cash" class="mr-4">Hand Cash</label>
                        <input type="radio" id="paid_type_bank" name="paid_type" value="bank" class="mr-2">
                        <label for="paid_type_bank">Bank</label>
                    </div>
                </div>
            </div>

            <!-- Button Group -->
            <div class="flex justify-end mt-4">
                <!-- Close Button -->
                <button onclick="hideModal()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2">Close</button>
                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- End Modal -->

















<script>
function showModal(id, fullName, department, position, totalSalary, monthlySalary, totalDeductions) {
    document.getElementById('employee_id').value = id; // Set the value of the hidden input field for employee ID
    document.getElementById('full_name').innerText = 'Employee: ' + fullName;
    document.getElementById('department').innerText = 'Department: ' + department;
    document.getElementById('position').innerText = 'Position: ' + position;
    document.getElementById('total_salary').innerText = 'Total Salary: ' + totalSalary;
    document.getElementById('monthly_salary').innerText = 'Monthly Salary: ' + monthlySalary;
    document.getElementById('total_deductions').innerText = 'Total Deductions: ' + totalDeductions;
    document.getElementById('modal').classList.remove('hidden');
}



  function hideModal() {
    document.getElementById('modal').classList.add('hidden');
  }
  </script>

  <script>
  function filterEmployees() {
    var department = document.getElementById('department').value;
    var url = './filter.php?department=' + department;
    window.location.href = url;
  }
  </script>

</main>
<!-- End Main Bar -->
<script src="./../src/route.js"></script>
<script src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html>
