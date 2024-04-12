<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Order Details</title>

  <link href="./../../src/tailwind.css" rel="stylesheet">
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
      <div class="flex items-center justify-between h-20 bg-white shadow-md px-4 py-2">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Order Detail / View</label>
        </div>

        <!-- dropdown -->
        <div x-data="{ dropdownOpen: false }" class="relative my-32">
          <button @click="dropdownOpen = !dropdownOpen"
            class="relative z-10 border border-gray-50 rounded-md bg-white p-2 focus:outline-none">
            <div class="flex items-center gap-4">
              <a class="flex-none text-sm dark:text-white" href="#">David, Marc</a>
              <i class="ri-arrow-down-s-line"></i>
            </div>
          </button>

          <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

          <div x-show="dropdownOpen"
            class="absolute right-0 mt-2 py-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-20">
            <a href="#" class="block px-8 py-1 text-sm capitalize text-gray-700">Log out</a>
          </div>
        </div>
      </div>

      <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
          var sidebar = document.getElementById('sidebar');
          sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
        });
      </script>

      <!-- New Form for add product -->
      <div class="container mx-auto py-10 px-5">
        <div class="max-w-4xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
          <?php
          // Include your database connection file
          include 'dbconn.php';

          // Check if the ID parameter is set in the URL
          if (isset($_GET['id'])) {
            // Get the ID from the URL parameter
            $id = $_GET['id'];

            // Prepare and execute a SQL query to fetch data based on the ID
            $stmt = $conn->prepare("
        SELECT od.*, s.Supplier_Name, s.Status, s.Location
        FROM order_details od
        JOIN suppliers s ON od.Supplier_ID = s.Supplier_ID
        WHERE od.Order_ID = :id
    ");
            $stmt->execute(['id' => $id]);
            // Fetch the data
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if data was found
            if ($data) {
              // Display the data
              ?>
              <div class="p-10">
                <div class="flex item-center justify-between px-10">
                  <ul class="text-gray-900">
                    <li class="flex py-2">
                      <span class="font-bold w-40">Supplier ID:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Supplier_ID'] ?>
                      </span>
                    </li>
                    <li class="flex py-2">
                      <span class="font-bold w-40">Supplier Name:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Supplier_Name'] ?>
                      </span>
                    </li>
                  </ul>
                  <ul class=" text-gray-900 ">
                    <li class="flex py-2">
                      <span class="font-bold w-20">Status:</span>
                      <span class="font-medium text-green-900">
                        <?= $data['Status'] ?>
                      </span>
                    </li>
                    <li class="flex py-2">
                      <span class="font-bold w-24">Location:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Location'] ?>
                      </span>
                    </li>
                  </ul>
                </div>
                <!-- Table -->
                <div class="py-4">
                  <div class="overflow-x-auto rounded-lg border border-gray-400">
                    <table class="min-w-full text-left mx-auto bg-white">
                      <thead class="bg-gray-200 border-b border-gray-400 text-sm">
                        <tr>
                          <th class="px-4 py-2 font-semibold">Product</th>
                          <th class="px-4 py-2 font-semibold">Product ID</th>
                          <th class="px-4 py-2 font-semibold">Category</th>
                          <th class="px-4 py-2 font-semibold">Price</th>
                          <th class="px-4 py-2 font-semibold">Weight</th>
                          <th class="px-4 py-2 font-semibold">Status</th>
                        </tr>
                      </thead>

                      <?php
                      // Call the function to display request data for the specific order
                      displayRequestData($id, $conn);
            } else {
              echo "No data found for Supplier ID: $id";
            }
          } else {
            echo "ID parameter is missing.";
          }
          // Function to fetch and display data from the requests table based on Order_ID
          
          function displayRequestData($orderId, $conn)
          {
            // Prepare and execute SQL query to fetch data from requests and products table based on Order_ID
            $stmt = $conn->prepare("
        SELECT r.*, p.ProductImage, p.ProductName, p.ProductID, p.Category, p.Price, p.ProductWeight, od.Order_Status
        FROM requests r
        JOIN products p ON r.Product_ID = p.ProductID
        JOIN order_details od ON r.Request_ID = od.Request_ID
        WHERE od.Order_ID = :orderId
    ");
            $stmt->execute(['orderId' => $orderId]);

            // Fetch data
            $requestData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if data was found
            if ($requestData) {
              // Initialize variables for subtotal and total amount
              $subtotal = 0;
              $totalAmount = 0;

              // Display the fetched data
              foreach ($requestData as $data) {
                ?>
                        <tr>
                          <td class="px-4 py-2 flex items-center justify-center">
                            <?php
                            // <!-- Display product image or placeholder -->
                            echo '<img src="../../' . $data['ProductImage'] . '" alt="Product Image" class="w-20 h-20 object-cover mr-4">'; ?>
                            <div>
                              <?= $data['ProductName'] ?>
                            </div> <!-- Display product name -->
                          </td>
                          <td class="px-4 py-2">
                            <?= $data['ProductID'] ?>
                          </td> <!-- Display product ID -->
                          <td class="px-4 py-2">
                            <?= $data['Category'] ?>
                          </td> <!-- Display category -->
                          <td class="px-4 py-2">
                            <?= $data['Price'] ?>
                          </td> <!-- Display price -->
                          <td class="px-4 py-2">
                            <?= $data['ProductWeight'] ?>
                          </td> <!-- Display weight -->
                          <td class="px-4 py-2">
                            <?= $data['Order_Status'] ?>
                          </td> <!-- Display status -->
                        </tr>
                        <?php
                        // Calculate subtotal and total amount
                        $subtotal += $data['Product_Quantity'];
                        $totalAmount += $data['Product_Total_Price'];
              }

              // Display items subtotal and total amount
              ?>
                      <tfoot class="text-left bg-gray-200">
                        <tr class="border-b border-y-gray-300">
                          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                          <th scope="col" class="px-6 py-4 ml-3 font-medium text-gray-900">
                            <div class="flex flex-col font-medium text-gray-700 gap-3">
                              <a>Items Subtotal:
                                <?= $subtotal ?>
                              </a>
                              <a>Total Amount: Php
                                <?= $totalAmount ?>
                              </a>
                            </div>
                          </th>
                        </tr>
                      </tfoot>

                      <?php
            } else {
              // No data found for the given Order_ID
              echo "<tr><td colspan='6'>No data found for Order ID: $orderId</td></tr>";
            }
          } ?>
                </table>
              </div>

            </div>

            <div class="flex justify-end">
              <button route='/po/orderDetail'
                class="py-2 px-6 border border-gray-600 font-bold rounded-md">Back</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="./../../src/form.js"></script>
    <script src="./../../src/route.js"></script>
</body>

</html>