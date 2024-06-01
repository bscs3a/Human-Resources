<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Request Order</title>

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
      <div class="flex items-center justify-between h-16 bg-white shadow-md px-4">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Request Order</label>
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

      <!-- new layout of table -->
      <div class="px-10 py-4 mt-4">
        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-left mx-auto bg-white">
            <thead class="bg-gray-200 border-b border-gray-400 text-sm">
              <tr>
                <th class="px-4 py-2 font-semibold">Product ID</th>
                <th class="px-4 py-2 font-semibold">Product Name</th>
                <th class="px-4 py-2 font-semibold">Supplier</th>
                <th class="px-4 py-2 font-semibold">Category</th>
                <th class="px-4 py-2 font-semibold">Price</th>
                <th class="px-4 py-2 font-semibold">Weight</th>
                <th class="px-4 py-2 font-semibold">Total</th>
                <th class="px-4 py-2 font-semibold">Status</th>
                <th class="px-4 py-2 font-semibold"></th>
              </tr>
            </thead>
            <tbody>

              <?php
              try {
                require_once 'dbconn.php';
                // Query to retrieve all requests
                $query = "SELECT * FROM requests WHERE request_Status = 'pending' OR request_Status = 'Ready to order'";
                $statement = $conn->prepare($query);
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                  $requestID = $row['Request_ID'];
                  $productID = $row['Product_ID']; // Assuming Product_ID is the correct column
                  $productDetails = getProductDetails($productID, $conn);
                  // Displaying the fetched data
                  echo '<tr>';
                  echo '<td class="px-4 py-10">' . $productID . '</td>';
                  echo '<td>';
                  echo '<div class="font-medium text-gray-700 text-sm flex items-center">';
                  echo '<img src="../' . $productDetails['ProductImage'] . '" alt="Product Image" class="w-8 h-8 mr-2">';
                  echo '<a>' . $productDetails['ProductName'] . '</a>';
                  echo '</div>';
                  echo '</td>';
                  echo '<td class="px-4 py-10">' . $productDetails['Supplier'] . '</td>';
                  echo '<td class="px-4 py-10">' . $productDetails['Category'] . '</td>';
                  echo '<td class="px-4 py-10">' . $productDetails['Price'] . '</td>';
                  echo '<td class="px-4 py-10">' . $row["Product_Quantity"] . '</td>';
                  echo '<td class="px-4 py-10">' . $row["Product_Total_Price"] . '</td>';
                  echo '<td class="px-4 py-10">' . $row["request_Status"] . '</td>';
                  echo '<td class="px-4 py-10">';
                  echo '<form action="/master/delete/requestOrder" method="POST" enctype="multipart/form-data">';
                  echo '<input type="hidden" name="requestID" value="' . $requestID . '">';
                  echo '<input type="submit" value="Delete"class="px-4 py-2 border border-red-600 text-red-600 rounded-md font-semibold tracking-wide cursor-pointer">';
                  echo '</form>';
                  echo '</td>';
                  echo '</tr>';
                }
              } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }

              ?>
            </tbody>
            <?php
            try {
              // Query to retrieve all requests and calculate total quantity and total price
              $query = "SELECT SUM(Product_Quantity) AS total_quantity, SUM(Product_Total_Price) AS total_price FROM requests WHERE request_Status = 'pending'";
              $statement = $conn->prepare($query);
              $statement->execute();
              $totals = $statement->fetch(PDO::FETCH_ASSOC);

              // Display total quantity and total price
              $totalQuantity = $totals['total_quantity'];
              $totalPrice = $totals['total_price'];

              echo '<tfoot class="text-left bg-gray-200">';
              echo '<tr class="border-b border-y-gray-300">';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900">';
              echo '<div class="flex flex-col font-medium text-gray-700 gap-3">';
              echo '<a>Items Subtotal: ' . $totalQuantity . '</a>';
              echo '<a>Total Amount: Php ' . $totalPrice . '</a>';
              echo '</div>';
              echo '</th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '<th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>';
              echo '</tr>';
              echo '</tfoot>';
            } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
            }
            ?>

          </table>
        </div>
        <!-- View All Button -->
        <div class="flex justify-end border-none">
          <form action="/master/accept/requestOrder" method="POST" enctype="multipart/form-data">
            <button type="submit" class="mr-5 py-3 px-4 border-2 border-black text-sm rounded-md bg-[#FFC955]">
              Accept Request(For Finance)
            </button>
          </form>

          <form action="/master/update/requestOrder" method="POST" enctype="multipart/form-data">
            <button type="submit" class="mr-5 py-3 px-4 border-2 border-black text-sm rounded-md bg-[#FFC955]">
              Order now
            </button>
          </form>

        </div>
      </div>
    </div>
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>
</body>

</html>