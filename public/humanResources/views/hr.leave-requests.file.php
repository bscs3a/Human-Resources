<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title>File a Leave</title>
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
  <a route="/hr/leave-requests" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Leave Requests</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">File a Leave</a>
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

  <!-- Request For Leave -->
  <div class="flex ml-20 mt-8 font-bold text-xl ">
    <h1>Details of Request for Leave</h1>
   </div>

   <div class="flex flex-col ml-20">
    <!-- Column 1-->
<form action= "/hr/leave-requests/file-leave" method="POST" enctype="multipart/form-data">
  <div class="flex flex-col">
  <div class="mb-4 mt-8">
    <div class="flex">
      <div class="mr-2">
        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="employee">
          Employee
        </label>
        <select
        class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
        name="employee" id="employee" required>
            <option value="">Select Employee</option>
            <?php
              $db = Database::getInstance();
              $conn = $db->connect();
              $query = "SELECT id, first_name, middle_name, last_name FROM employees";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $fullName = $row['first_name'];
                  if (!empty($row['middle_name'])) {
                      $fullName .= ' ' . substr($row['middle_name'], 0, 1) . '.';
                  }
                  $fullName .= ' ' . $row['last_name'];
                  echo "<option value='{$row['id']}'>{$fullName}</option>";
              }
            ?>
        </select>
      </div>
      <div class="mr-2">
        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="type">
          Type of Leave       
        </label>
        <select
        class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
        name="type" id="type" required>
        <option value="">Select Type of Leave</option>
        <option value="Sick Leave">Sick Leave</option>
        <option value="Vacation Leave">Vacation Leave</option>
        <option value="5 Days Forced Leave">5 Days Forced Leave</option>
        <option value="Special Privilege Leave">Special Privilege Leave</option>
        <option value="Maternity Leave">Maternity Leave</option>
        <option value="Paternity Leave">Paternity Leave</option>
        <option value="Parental Leave">Parental Leave</option>
        <option value="Rehabilitation Leave">Rehabilitation Leave</option>
        <option value="Special Leave (For Women)">Special Leave (for women)</option>
        <option value="Study Leave">Study Leave</option>
        <option value="Terminal Leave">Terminal Leave</option>
        <option value="Special Emergency Leave">Special Emergency Leave</option>
        </select>
      </div>
      <div class="mr-2">
        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="date_submitted">
          Date of Submission
        </label>
        <input
          class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
          id="date_submitted"
          name="date_submitted"
          type="date"
          value="<?php echo date('Y-m-d'); ?>"
          readonly
        />
      </div>
  </div>
  <!-- Column 2 -->
      <div class="flex flex-col">
      <div class="mb-4 mt-8">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="start_date">
              Start Date
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="start_date"
              name="start_date"
              type="date"
              required
            />
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="end_date">
              End Date
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="end_date"
              name="end_date"
              type="date"
              required
            />
          </div>
          <div id="date_diff" class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="numberOfDays">
              Total No. of Days
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="numberOfDays"
              name="numberOfDays"
              type="text"
              readonly
            />
          </div>
        </div>
      </div>

      <!-- Description-->
      <div class="mt-4">
    <label for="details" class="block mb-2 text-sm font-bold text-gray-900">Description</label>
    <textarea id="details" name="details" rows="8" style="resize: none;" class="mr-7 mt-4 block px-4 py-4 p-2.5 w-full sm:w-[780px] text-sm text-gray-700 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:focus:ring-blue-500 dark:focus:border-blue-500" maxlength="255"></textarea>
    <div id="charCount" class="text-sm text-gray-500">255 characters left</div>
</div>
<script>
  // Details 255 CHARACTERS
  document.getElementById('details').addEventListener('input', function() {
      var remaining = 255 - this.value.length;
      document.getElementById('charCount').textContent = remaining + ' characters left';
  });
</script>

  <!-- BUTTONS -->
  <span class="mt-4">   
    <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Submit</button>
    <button route="/hr/leave-requests" type="button" class="focus:outline-none text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</button>
  </span>
  </div>
  </div>
</form>
</main>
<!-- End Main Bar -->
<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>

<script>
  // Sidebar Toggle
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });

  // Calculate Date Difference
  document.getElementById('start_date').addEventListener('change', calculateDateDiff);
  document.getElementById('end_date').addEventListener('change', calculateDateDiff);

  function calculateDateDiff() {
    var startDate = new Date(document.getElementById('start_date').value);
    var endDate = new Date(document.getElementById('end_date').value);
    var diffInTime = endDate.getTime() - startDate.getTime();
    var diffInDays = diffInTime / (1000 * 3600 * 24);
    document.getElementById('numberOfDays').value = diffInDays;
  }

</script>
</body>
</html> 