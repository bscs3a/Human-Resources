<?php


// Get database instance and establish connection
$db = Database::getInstance();
$conn = $db->connect();

// Prepare the SQL query
$query = "SELECT CONCAT(e.first_name, ' ', e.last_name) AS full_name, e.department, e.position, s.total_salary
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
                        echo "<td class='px-4 py-2 text-center'><button class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'>Generate</button></td>";
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

</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>
</html>