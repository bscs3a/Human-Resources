<?php
    $db = Database::getInstance();
    $conn = $db->connect();

    $query = "SELECT COUNT(*) as count FROM leave_requests WHERE CURDATE() BETWEEN start_date AND end_date AND status = 'Approved'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $onLeave = $result['count'];

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
  <title>Schedule</title>
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
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Schedule</a>
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
  <br>

<!-- component -->
<div class="lg:flex lg:h-auto lg:flex-col">
  <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
    <h1 class="text-base font-semibold leading-6 text-gray-900">
        <time datetime="<?php echo date('Y-m'); ?>"><?php echo date('F Y'); ?></time>
    </h1>
    <div class="flex items-center">
        <!-- The Add Event button -->
        <button id="addEventButton" type="button" class="ml-6 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><i class="ri-add-line"></i>Add event</button>

        <!-- The Add Event modal -->
        <div id="addEventModal" class="hidden fixed top-0 left-0 w-full h-full z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded">
                <h2 class="text-lg font-bold mb-2"><i class="ri-add-line"></i>Add Event</h2>
                <hr>
                <form action="/create/schedule" id="addEventForm" method="POST">

                <div class="mb-4 mt-2">
                  <label for="eventName" class="block mb-2 mt-0 text-sm font-bold text-gray-700">Name of the Event</label>
                  <input id="event_name" name="event_name" type="text" class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                </div>
              
                <div class="mb-4">
                  <label for="eventDate" class="block mb-2 mt-0 text-sm font-bold text-gray-700">Date</label>
                  <input id="date" name="date" type="date" class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                  <label for="eventDay" class="block mb-2 mt-0 text-sm font-bold text-gray-700">Day</label>
                  <input id="day" name="day" type="text" class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" readonly>
                </div>

                  <div class="flex justify-center items-center">
                    <button type="submit" class="ml-3 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                    <button id="cancelAddButton" type="button" class="ml-3 rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Cancel</button>
                  </div>
                </form>
            </div>
        </div>
        <script>
          document.getElementById('addEventButton').addEventListener('click', function() {
              // Show the Add Event modal
              document.getElementById('addEventModal').classList.remove('hidden');
          });

          document.getElementById('cancelAddButton').addEventListener('click', function() {
              // Hide the Add Event modal
              document.getElementById('addEventModal').classList.add('hidden');
          });

          document.getElementById('date').addEventListener('change', function() {
              // When the date is picked, automatically check which day it is
              var date = new Date(this.value);
              document.getElementById('day').value = date.toLocaleDateString('en-US', { weekday: 'long' });
          });
        </script>

        <div class="ml-3 h-6 w-px bg-gray-300"></div>

        <!-- The Remove Event button -->
        <button id="removeEventButton" type="button" class="ml-3 rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"><i class="ri-subtract-line"></i>Remove event</button>

        <!-- The Remove Event modal -->
        <div id="removeEventModal" class="hidden fixed top-0 left-0 w-full h-full z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded">
                <h2 class="text-lg font-bold mb-2"><i class="ri-subtract-line"></i>Remove Event</h2>
                <hr>
                <form action="/master/remove/schedule" id="removeEventForm" method="POST">
                <div class="mb-4 mt-2">
                  <label for="eventDay" class="block mb-2 mt-0 text-sm font-bold text-gray-700">Event</label>
                    <select id="event" name="event" class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                    <option value="">Select Event to Remove</option>
                    <?php
                      $db = Database::getInstance();
                      $conn = $db->connect();
                      $query = "SELECT id, event_name, date FROM calendar";
                      $stmt = $conn->prepare($query);
                      $stmt->execute();
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          $event = $row['event_name'];
                          $date = date('F d, Y', strtotime($row['date']));
                          $event .= ' — ' . $date;
                          echo "<option value='{$row['id']}'>{$event}</option>";
                      }
                    ?>
                    </select>
                </div>
                    <div class="flex justify-center items-center">
                      <button type="submit" class="ml-3 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Remove</button>
                      <button id="cancelRemoveButton" type="button" class="ml-3 rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Cancel</button>
                  </div>
                </form>
            </div>
        </div>
      <script>
      document.getElementById('removeEventButton').addEventListener('click', function() {
          // Show the Remove Event modal
          document.getElementById('removeEventModal').classList.remove('hidden');
      });
      document.getElementById('cancelRemoveButton').addEventListener('click', function() {
          // Hide the Remove Event modal
          document.getElementById('removeEventModal').classList.add('hidden');
      });
      </script>

      </div>
    </div>
  </header>
  
<div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
<!-- DAYS OF THE WEEK -->
<div class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
  <div class="flex justify-center bg-blue-200 py-2">
    <span>M</span>
    <span class="sr-only sm:not-sr-only">on</span>
  </div>
  <div class="flex justify-center bg-blue-200 py-2">
    <span>T</span>
    <span class="sr-only sm:not-sr-only">ue</span>
  </div>
  <div class="flex justify-center bg-blue-200 py-2">
    <span>W</span>
    <span class="sr-only sm:not-sr-only">ed</span>
  </div>
  <div class="flex justify-center bg-blue-200 py-2">
    <span>T</span>
    <span class="sr-only sm:not-sr-only">hu</span>
  </div>
  <div class="flex justify-center bg-blue-200 py-2">
    <span>F</span>
    <span class="sr-only sm:not-sr-only">ri</span>
  </div>
  <div class="flex justify-center bg-blue-200 py-2">
    <span>S</span>
    <span class="sr-only sm:not-sr-only">at</span>
  </div>
  <div class="flex justify-center bg-blue-200 py-2">
    <span>S</span>
    <span class="sr-only sm:not-sr-only">un</span>
  </div>
</div>
<!-- END DAYS OF THE WEEK -->

<div class="flex bg-gray-50 text-xs leading-6 text-gray-700 lg:flex-auto">
<!-- CALENDAR DAYS -->
<div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">
<?php
    date_default_timezone_set('Asia/Manila');

    // Get the current month and year
    $month = date('m');
    $year = date('Y');

    // Get the number of days in the month
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Find out what day of the week the first day of the month is
    $firstDayOfMonth = date('N', strtotime("$year-$month-01"));

    // Calculate how many days to go back to the previous month
    $daysToGoBack = $firstDayOfMonth - 1;

    // Get the timestamp for the day to start from in the previous month
    $startDayOfPrevMonth = strtotime("$year-$month-01 - $daysToGoBack day");
    
    $query = $conn->query("SELECT * FROM calendar");
    $holidays = $query->fetchAll(PDO::FETCH_ASSOC);

    // Loop through each day of the month
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // Format the date
        $date = $year . '-' . $month . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);

        // Find out what day of the week this day is
        $dayOfWeek = date('N', strtotime($date));

        // If this is the first day of the loop, add divs for the last few days of the previous month
        if ($day == 1) {
            for ($i = 0; $i < $daysToGoBack; $i++) {
                // Get the date for this day of the previous month
                $prevMonthDate = date('Y-m-d', $startDayOfPrevMonth + ($i * 24 * 60 * 60));

                // Output the div for this day
                echo '<div class="relative bg-gray-100 px-3 py-2 text-gray-500">';
                echo '<time datetime="' . $prevMonthDate . '">' . date('j', strtotime($prevMonthDate)) . '</time>';
                echo '</div>';
            }
        }
?>
<div class="relative bg-white px-3 py-2">
    <?php
    $currentDate = date('Y-m-d');
    $timeClass = $date == $currentDate ? 'flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 font-semibold text-white' : '';

    // Check if this day is a holiday
    $holidaysToday = [];
    foreach ($holidays as $holiday) {
        if ($holiday['date'] == $date) {
            $holidaysToday[] = $holiday;
        }
    }
    ?>
    <time datetime="<?php echo $date; ?>" class="<?php echo $timeClass; ?>"><?php echo $day; ?></time>
    <?php foreach ($holidaysToday as $holiday): ?>
      <p class="flex-auto mt-2 mb-2 truncate text-sm italic text-blue-600"><?php echo $holiday['event_name']; ?></p>
    <?php endforeach; ?>
    <?php if ($date == $currentDate && $onLeave > 0): ?>
      <ol class="mt-2">
    <li>
        <a href="#" class="group flex">
        <p class="flex-auto mt-2 mb-2 truncate text-sm font-medium text-gray-900">Employees</p>
        </a>
    </li>
    <li>
        <a href="#" class="group flex" id="onLeaveButton">
        <p class="flex-auto mb-4 truncate text-sm font-medium text-gray-900">On Leave</p>
        <p class="ml-3 hidden flex-none text-sm font-bold text-blue-500 xl:block"><?php echo $onLeave; ?></p>
        </a>
    </li>
</ol>

<!-- The Employee Details modal -->
<div id="employeeDetailsModal" class="hidden fixed top-0 left-0 w-full h-full z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-4 rounded">
        <h2 class="text-lg font-bold mb-2">On Leave</h2>
        <hr>
        <?php
          $db = Database::getInstance();
          $conn = $db->connect();

          $query = "SELECT leave_requests.*, employees.image_url, employees.first_name, employees.middle_name, employees.last_name, employees.position, employees.department FROM leave_requests";
          $query .= " LEFT JOIN employees ON leave_requests.employees_id = employees.id";
          $query .= " WHERE leave_requests.status = 'approved' AND CURDATE() BETWEEN leave_requests.start_date AND leave_requests.end_date";

          $stmt = $conn->prepare($query);
          $stmt->execute(); // Execute the prepared statement
          $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $pdo = null;
          $stmt = null;
          ?>
        <div class="ml-6 flex flex-col mt-2 mr-6 mb-4">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow-md sm:rounded-lg">
          <table class="min-w-full">
            <!-- START HEADER -->
            <thead>
              <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Name</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Department</th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  Type of Leave</th>
              </tr>
            </thead>
            <!-- END HEADER -->
            <?php foreach ($employees as $employee): ?>
              <tbody class="bg-white">
                <tr>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 w-10 h-10">
                        <img class="w-10 h-10 rounded-full object-cover object-center"
                          src="<?php echo $employee['image_url']; ?>"
                          alt="">
                      </div>
                      <div class="ml-4">
                      <div class="text-sm font-medium leading-5 text-gray-900">
                          <?php 
                              echo $employee['first_name'] . ' ';
                              if (!empty($employee['middle_name'])) {
                                  echo substr($employee['middle_name'], 0, 1) . '. ';
                              }
                              echo $employee['last_name']; 
                          ?>
                      </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900"><?php echo $employee['position']; ?></div>
                    <div class="text-sm leading-5 text-gray-500"><?php echo $employee['department']; ?></div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-900"><?php echo $employee['type']; ?></div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="flex justify-end items-center mr-6">
          <button id="closeEmployeeDetailsButton" type="button" class="ml-3 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Close</button>
        </div>
    </div>
</div>

<script>
document.getElementById('onLeaveButton').addEventListener('click', function() {
    // Show the Employee Details modal
    document.getElementById('employeeDetailsModal').classList.remove('hidden');
});

document.getElementById('closeEmployeeDetailsButton').addEventListener('click', function() {
    // Hide the Employee Details modal
    document.getElementById('employeeDetailsModal').classList.add('hidden');
});
</script>
    <?php endif; ?>
</div>
<?php
    // If this is the last day of the loop and it's not a Sunday, add divs for the first few days of the next month
    if ($day == $daysInMonth) {
        // Get the timestamp for the first day of the next month
        $firstDayOfNextMonth = strtotime("$year-$month-$day + 1 day");

        for ($i = $dayOfWeek; $i < 7; $i++) {
            // Get the date for this day of the next month
            $nextMonthDate = date('Y-m-d', $firstDayOfNextMonth);

            // Output the div for this day
            echo '<div class="relative bg-gray-200 px-3 py-2 text-gray-500">';
            echo '<time datetime="' . $nextMonthDate . '">' . date('j', $firstDayOfNextMonth) . '</time>';
            echo '</div>';

            // Add one day to the timestamp
            $firstDayOfNextMonth += 24 * 60 * 60;
        }
    }
    }
?>
</div>
<!-- END OF CALENDAR DAYS -->
</div>
</div>
</div>
  <!-- component -->
</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</script>
</body>
</html>