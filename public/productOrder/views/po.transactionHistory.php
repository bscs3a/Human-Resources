<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaction History</title>

  <link href="./../src/tailwind.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
  <div class="flex h-screen bg-white">
    <!-- sidebar -->
    <div id="sidebar" class="flex h-screen">
      <?php include "components/po.sidebar.php" ?>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
      <!-- header -->
      <div class="flex items-center justify-between h-16 bg-gray-200 shadow-md px-4">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Transaction History / View</label>
        </div>

         <!-- dropdown -->
         <div x-data="{ dropdownOpen: false }" class="relative my-32">
          <button @click="dropdownOpen = !dropdownOpen"
            class="relative z-10 border border-gray-400 rounded-md bg-gray-100 p-2 focus:outline-none">
            <div class="flex items-center gap-4">
            <a class="flex-none text-sm dark:text-white" href="#"><?php echo $_SESSION['user']['username']; ?></a>
              <i class="ri-arrow-down-s-line"></i>
            </div>
          </button>

          <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

          <form id="logout-form" action="/logout/user" method="POST">
            <div x-show="dropdownOpen"
              class="absolute right-0 mt-2 py-2 w-40 bg-gray-100 border border-gray-200 rounded-md shadow-lg z-20">
              <button type="submit" class="block px-8 py-1 text-sm capitalize text-gray-700">Log out</button>
            </div>
          </form>
        </div>

      </div>

      <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
          var sidebar = document.getElementById('sidebar');
          sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
        });
      </script>

      <!-- Main Content -->
      <div class="h-screen px-10">
        <div class="flex flex-row gap-10 drop-shadow-md my-8">

          <!-- //PHP FUNCTION TO SHOW THE TOTAL OF DELIVERED ITEMS -->
          <?php
          // Include your database connection file
          require_once 'dbconn.php';

          // Function to count the number of unique suppliers
          function countDelivered($conn)
          {
            try {
              // Query to count the number of unique suppliers
              $query = "SELECT COUNT(DISTINCT Transaction_ID) AS DeliveredCount FROM transaction_history WHERE Order_Status = 'Completed' OR Order_Status = 'Completed + Delayed'";
              $statement = $conn->prepare($query);
              $statement->execute();

              // Fetch the count
              $row = $statement->fetch(PDO::FETCH_ASSOC);
              $deliveredCount = $row['DeliveredCount'];

              return $deliveredCount;
            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
          }

          // Call the countSuppliers function to get the count
          $db = Database::getInstance();
          $conn = $db->connect();
          $deliveredCount = countDelivered($conn);
          ?>

          <div class="flex flex-col pl-8 border border-gray-700 bg-white rounded-lg w-64 h-40 justify-center">
            <a class="text-6xl ">
              <?php echo $deliveredCount; ?>
            </a>
            <a class="text-lg">Total Delivery</a>
          </div>

          <?php
          //PHP FUNCTION TO SHOW MANY ORDERS TO RECEIVE
          // Include your database connection file
          require_once 'dbconn.php';

          // Function to count the number of unique suppliers
          function countOrders($conn)
          {
            try {
              // Query to count the number of ordered items
              $query = "SELECT COUNT(DISTINCT Batch_ID) AS OrderCount FROM batch_orders WHERE Order_Status = 'to receive' OR Order_Status = 'to receive + Delayed'";
              $statement = $conn->prepare($query);
              $statement->execute();

              // Fetch the count
              $row = $statement->fetch(PDO::FETCH_ASSOC);
              $orderCount = $row['OrderCount'];

              return $orderCount;
            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
          }

          // Call the countSuppliers function to get the count
          $db = Database::getInstance();
          $conn = $db->connect();
          $orderCount = countOrders($conn);
          ?>
          <div class="flex flex-col pl-8 border border-gray-700 bg-white rounded-lg w-64 h-40 justify-center">
            <a class="text-6xl">
              <?php echo $orderCount; ?>
            </a>
            <a class="text-lg">To Receive</a>
          </div>
          
          <?php
          // Include your database connection file
          require_once 'dbconn.php';

          // Function to count the number of cancelled orders
          function countCancelled($conn)
          {
            try {
              // Query to count the number of unique suppliers
              $query = "SELECT COUNT(DISTINCT Batch_ID) AS OrderCount FROM batch_orders WHERE Order_Status = 'Cancelled' OR Order_Status = 'Cancelled + Delayed'";
              $statement = $conn->prepare($query);
              $statement->execute();

              // Fetch the count
              $row = $statement->fetch(PDO::FETCH_ASSOC);
              $cancelCount = $row['OrderCount'];

              return $cancelCount;
            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
          }

          // Call the countSuppliers function to get the count
          $db = Database::getInstance();
          $conn = $db->connect();
          $cancelCount = countCancelled($conn);
          ?>
          <div class="flex flex-col pl-8 border border-gray-700 bg-white rounded-lg w-64 h-40 justify-center">
            <a class="text-6xl">
              <?php echo $cancelCount; ?>
            </a>
            <a class="text-lg">Cancelled</a>
          </div>

          


        </div>

        <!-- NEW Table -->
        <div class="overflow-x-auto overflow-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-left mx-auto bg-white">
            <thead class="bg-gray-200 border-b border-gray-400 text-sm">
              <tr>
                <th class="px-4 py-2 font-semibold">Order #</th>
                <th class="px-4 py-2 font-semibold">Supplier Name</th>
                <th class="px-4 py-2 font-semibold">Date Received</th>
                <th class="px-4 py-2 font-semibold">Time Received</th>
                <th class="px-4 py-2 font-semibold">Status</th>
                <th class="px-4 py-2 font-semibold"></th>
              </tr>
            </thead>

            <?php
            function displayTransactionHistory()
            {
              try {
                $db = Database::getInstance();
                $conn = $db->connect();
                // Query to retrieve data from transaction_history table
                $query = "SELECT th.Transaction_ID, s.Supplier_Name, th.Date_Delivered, th.Time_Delivered, th.Order_Status, th.Batch_ID
              FROM transaction_history th
              JOIN suppliers s ON th.Supplier_ID = s.Supplier_ID
              ORDER BY th.Batch_ID ASC";
                $statement = $conn->prepare($query);
                $statement->execute();
                $transactions = $statement->fetchAll(PDO::FETCH_ASSOC);

                // Loop through each transaction and display data in HTML table format
                foreach ($transactions as $transaction) {
                  echo '<tbody>';
                  echo '<tr>';
                  echo '<td class="px-4 py-4">' . $transaction['Batch_ID'] . '</td>';
                  echo '<td class="px-4 py-4">' . $transaction['Supplier_Name'] . '</td>';
                  if ($transaction['Order_Status'] == 'Cancelled' || $transaction['Order_Status'] == 'Cancelled + Delayed') {
                    echo '<td class="px-4 py-4">n/a</td>';
                  echo '<td class="px-4 py-4">n/a</td>';
                  } else {
                  echo '<td class="px-4 py-4">' . $transaction['Date_Delivered'] . '</td>';
                  echo '<td class="px-4 py-4">' . $transaction['Time_Delivered'] . '</td>';
                  }
                  echo '<td class="px-4 py-4">' . $transaction['Order_Status'] . '</td>';
                  // for VIEW order
                  echo '<td class="px-4 py-4">';
                  echo '<a href="/master/po/viewtransaction/Batch=' . $transaction['Batch_ID'] . '">View</a>';
                  echo '</td>';
                  echo '</tr>';
                  echo '</tbody>';
                }
              } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
            }

            // Call the function to display transaction history
            displayTransactionHistory();
            ?>





          </table>
        </div>
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>

</html>