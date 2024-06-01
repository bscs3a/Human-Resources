<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Details</title>

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
      <div class="flex items-center justify-between h-16 bg-gray-200 shadow-md px-4 py-1">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Order Detail</label>
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
          <div class="flex flex-col pl-8 border border-gray-700 bg-white rounded-lg w-64 h-40 justify-center">
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
            <a class="text-6xl "> <?php echo $deliveredCount; ?></a>
            <a class="text-lg">Total Delivery</a>
          </div>


          <div class="flex flex-col pl-8 border border-gray-700 bg-white rounded-lg w-64 h-40 justify-center">
            <?php
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
            <a class="text-6xl"><?php echo $orderCount; ?></a>
            <a class="text-lg">To Receive</a>
          </div>
        </div>

        <!-- NEW Table -->
        <div class="overflow-x-auto overflow-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-left mx-auto bg-white px-6">
            <thead class="bg-gray-200 border-b border-gray-400 text-xs">
              <tr>
                <th class="px-4 py-2 font-semibold">Order #</th>
                <th class="px-4 py-2 font-semibold">Supplier Name</th>
                <th class="px-4 py-2 font-semibold">Date Order</th>
                <th class="px-4 py-2 font-semibold">Time</th>
                <th class="px-4 py-2 font-semibold">Location</th>
                <th class="px-4 py-2 font-semibold">Estimated Delivery</th>
                <th class="px-4 py-2 font-semibold">Actions</th>
                <th class="px-4 py-2 font-semibold"></th>
                <th class="px-4 py-2 font-semibold"></th>

              </tr>
            </thead>

            <?php
function displayPendingOrders()
{
    try {
        // require_once 'dbconn.php'; // Include your database connection file
        $conn = Database::getInstance()->connect(); // Assuming this is how you establish a database connection

        $query = "SELECT bo.*, s.Supplier_Name, s.Address, s.Estimated_Delivery
                  FROM batch_orders bo
                  JOIN suppliers s ON bo.Supplier_ID = s.Supplier_ID
                  WHERE bo.Order_Status LIKE 'to receive%';";

        $statement = $conn->prepare($query);
        $statement->execute();

        // Fetch all rows as associative array
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Loop through each row and display data in HTML table format
        foreach ($rows as $row) {
            echo '<tbody>';
            echo '<tr>';
            echo '<td class="px-4 py-7">' . $row['Batch_ID'] . '</td>';
            echo '<td class="px-4 py-7">' . $row['Supplier_Name'] . '</td>';
            echo '<td class="px-4 py-7">' . $row['Date_Ordered'] . '</td>';
            echo '<td class="px-4 py-7">' . $row['Time_Ordered'] . '</td>';
            echo '<td class="px-4 py-7">' . $row['Address'] . '</td>';
            echo '<td class="px-4 py-7">' . $row['Estimated_Delivery'] . '</td>';

            echo '<td class="px-4 py-6">';
            // Form for Completed status
            echo '<form action="/master/complete/orderDetail" method="POST" enctype="multipart/form-data" class="pb-2 pt-2" onsubmit="return confirm(\'Are you sure you want to mark this order as complete?\');">';
            echo '<input type="hidden" name="Batch_ID" value="' . $row['Batch_ID'] . '">';
            echo '<button type="submit" class="rounded-full border border-green-600 hover:bg-green-600 bg-green-200 border-b block px-4 py-1 text-sm font-semibold text-green-900 hover:text-white focus:outline-none">Complete</button>';
            echo '</form>';

            // Form for Cancel status
            echo '<form action="/master/cancel/orderDetail" method="POST" enctype="multipart/form-data" class="pb-2" onsubmit="return confirm(\'Are you sure you want to cancel this order?\');">';
            echo '<input type="hidden" name="Batch_ID" value="' . $row['Batch_ID'] . '">';
            echo '<button type="submit" class="rounded-full border border-red-600 hover:bg-red-600 bg-red-200 border-b block px-7 py-1 text-sm font-semibold text-red-900 hover:text-white focus:outline-none">Cancel</button>';
            echo '</form>';

            // Form for Delayed status
            if ($row['Order_Status'] == 'to receive + Delayed') {
                // If status is already 'to receive + Delayed', set button color to purple
                echo '<button type="button" class="rounded-full border border-purple-600 bg-purple-600 block px-7 py-1 text-sm font-semibold text-white focus:outline-none" disabled style="background-color: #8A2BE2;">Delayed</button>';
              } else {
                // If status is not 'to receive + Delayed', render the button with blue color
                echo '<form action="/master/delay/orderDetail" method="POST" enctype="multipart/form-data" class="pb-2" onsubmit="return confirm(\'Are you sure you want to mark this order as delayed?\');">';
                echo '<input type="hidden" name="Batch_ID" value="' . $row['Batch_ID'] . '">';
                echo '<button type="submit" class="rounded-full border border-blue-600 hover:bg-blue-600 bg-blue-200 border-b block px-7 py-1 text-sm font-semibold text-blue-900 hover:text-white focus:outline-none">Delayed</button>';
                echo '</form>';
            }
            echo '</td>';

            // for VIEW order
            echo '<td class="px-4 py-4">';
            echo '<a href="/master/po/viewdetails/Batch=' . $row['Batch_ID'] . '">View</a>';
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// Call the function to display pending orders
displayPendingOrders();
?>



          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>

</html>