<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Order Details</title>

  <link href="../../src/tailwind.css" rel="stylesheet">
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
      <div class="flex items-center justify-between h-16 shadow-md px-4 py-2">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Transaction / View</label>
        </div>

        <!-- dropdown -->
        <?php require_once "public/productOrder/views/po.logout.php"?>

      </div>

      <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
          var sidebar = document.getElementById('sidebar');
          sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
        });
      </script>

      <div class="container mx-auto py-8 px-5">
        <div class="max-w-6xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
          <?php
          // Include your database connection file
          include 'dbconn.php';

          // Check if the ID parameter is set in the URL
          if (isset($_GET['id'])) {
            // Get the ID from the URL parameter
            $id = $_GET['id'];

            // Prepare and execute a SQL query to fetch data based on the ID
            $stmt = $conn->prepare("
        SELECT b.*, s.Supplier_Name, s.Status, s.Address, s.Contact_Name, s.Contact_Number, s.Estimated_Delivery, s.Shipping_fee, s.Working_days
        FROM batch_orders b
        JOIN suppliers s ON b.Supplier_ID = s.Supplier_ID
        WHERE b.Batch_ID = :id
    ");
            $stmt->execute(['id' => $id]);
            // Fetch the data
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if data was found
            if ($data) {
              // Initialize variables for subtotal and total amount
              $subtotal = 0;
              $totalAmount = 0;

              // Display the data
              ?>
              <div class="p-10">
                <div class="flex justify-between pb-3">
                  <div class="font-bold text-3xl">
                    <?= $data['Supplier_Name'] ?>
                  </div>
                  <div class="font-bold text-xl">
                    #<?= $data['Supplier_ID'] ?>
                  </div>
                </div>

                <!-- Supplier Information -->
                <div class="flex item-center gap-60 px-4">
                  <ul class="text-gray-900">
                    <li class="flex py-1">
                      <span class="font-semibold w-40">Contact Name:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Contact_Name'] ?>
                      </span>
                    </li>
                    <li class="flex">
                      <span class="font-semibold w-40">Order Date:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Date_Ordered'] ?>
                      </span>
                    </li>
                    <li class="flex py-1">
                      <span class="font-semibold w-40">Order Time:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Time_Ordered'] ?>
                      </span>
                    </li>
                    <li class="flex py-1">
                      <span class="font-semibold w-40">Shipping Fee:</span>
                      <span class="font-medium text-gray-900">
                       <?= $data['Shipping_fee'] ?> 
                      </span>
                    </li>
                  </ul>

                  <ul class=" text-gray-900 ">
                    <li class="flex py-1">
                      <span class="font-semibold w-44">Location:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Address'] ?>
                      </span>
                    </li>
                    <li class="flex">
                      <span class="font-semibold w-44">Estimate Delivery:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Estimated_Delivery'] ?>
                      </span>
                    </li>
                    <li class="flex py-1">
                      <span class="font-semibold w-44">Status:</span>
                      <span class="font-medium text-green-900">
                        <?= $data['Status'] ?>
                      </span>
                    </li>
                    <li class="flex py-1">
                      <span class="font-semibold w-44">Working Days:</span>
                      <span class="font-medium text-gray-900">
                        <?= $data['Working_days'] ?> 
                      </span>
                    </li>
                  </ul>
                </div>

                <!-- Table for products -->
                <div class="py-4">
                  <div class="overflow-x-auto overflow-auto rounded-lg border border-gray-400">
                    <table class="min-w-full text-left mx-auto bg-white">
                      <thead class="bg-gray-200 border-b border-gray-400 text-xs">
                        <tr>
                          <th class="px-6 py-2 font-semibold">ProductName</th>
                          <th class="px-6 py-2 font-semibold">ProductID</th>
                          <th class="px-6 py-2 font-semibold">Category</th>
                          <th class="px-6 py-2 font-semibold">Supplier Price</th>
                          <th class="px-6 py-2 font-semibold">Quantity</th>
                          <th class="px-20 py-2 text-center font-semibold">Status</th>
                          <th class="px-6 py-2 font-semibold"></th>
                        </tr>
                      </thead>

                      <?php
                      // Call the function to display product data for the specific order
                      displayProductData($id, $conn);
                      ?>
                    </table>
                  </div>
                </div>
              </div>

              <?php
            } else {
              echo "No data found for Supplier ID: $id";
            }
          } else {
            echo "ID parameter is missing.";
          }

          // Function to fetch and display product data based on Batch_ID
          function displayProductData($batchId, $conn)
          {
            // Prepare and execute SQL query to fetch data
            $stmt = $conn->prepare("
        SELECT p.*, bo.Items_Subtotal, bo.Total_Amount, bo.Order_Status, od.Product_Quantity, bo.Pay_Using
        FROM batch_orders bo
        JOIN order_details od ON bo.Batch_ID = od.Batch_ID
        JOIN products p ON od.Product_ID = p.ProductID
        WHERE od.Batch_ID = :batchId
    ");
            $stmt->execute(['batchId' => $batchId]);

            // Fetch data
            $productData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Initialize variables for subtotal and total amount
            $subtotal = 0;
            $totalAmount = 0;

            // Check if data was found
            if ($productData) {
              // Display the fetched data
              foreach ($productData as $data) {
                ?>
                <tr>
                  <td class="px-6 py-2 flex flex-col items-center justify-center">
                    <?php
                    // Display product image or placeholder
                    echo '<img src="../../' . $data['ProductImage'] . '" alt="Product Image" class="w-16 h-16 object-cover mr-4">'; ?>
                    <div>
                      <?= $data['ProductName'] ?>
                    </div> <!-- Display product name -->
                  </td>
                  <td class="px-6 py-2">
                    <?= $data['ProductID'] ?>
                  </td> <!-- Display product ID -->
                  <td class="px-6 py-2">
                    <?= $data['Category'] ?>
                  </td> <!-- Display category -->
                  <td class="px-6 py-2">
                    <?= $data['Supplier_Price'] ?>
                  </td> <!-- Display price -->
                  <td class="px-6 py-2">
                    <?= $data['Product_Quantity'] ?>
                  </td> <!-- Display status -->
                  <td class="px-6 py-2 <?= ($data['Order_Status'] === "Cancelled" || $data['Order_Status'] === "Cancelled + Delayed") ? 'text-red-700 font-bold' : 'text-green-900' ?>">
                      <?= $data['Order_Status'] ?>
                  </td> 
                </tr>
                <?php

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
                  <th scope="col" class="px-0 py-4 ml-3 font-medium text-gray-900">
                  <div class="flex flex-col text-sm gap-3">
                                            <a class="font-bold">Items Subtotal: Php <?= $data['Items_Subtotal'] ?>
                                                
                                            </a>
                                            <a class="font-bold">Total Amount: Php  <?= $data['Total_Amount'] ?>
                                                
                                            </a>
                                            <a class="font-bold">Payment Method: <?= $data['Pay_Using'] ?>
                                                
                                            </a>
                                        </div>
                  </th>
                  <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
              </tfoot>
              <?php
            } else {
              // No data found for the given Batch_ID
              echo "<tr><td colspan='6'>No data found for Order# $batchId</td></tr>";
            }
          }
          ?>

          </table>
          <!-- Feedback area -->
          <form action="/master/addfeedback/viewtransaction" method="post" enctype="multipart/form-data" class="px-8">
            <input type="hidden" name="supplierID" value="<?= $data['Supplier_ID'] ?>">
            <!--get the supplier ID in the query -->
            <input type="hidden" name="user" value="<?= $_SESSION['user']['username'] ?>"> <!--get the employeein th seeiony -->
            <input type="hidden" name="batchID" value="<?= $_GET['id'] ?>"> <!--get the batchID in the $GET -->
            <h2 class="font-bold text-lg pb-2">Feedback</h2>
            <?php
            // Check if the Feedback column in transaction_history is "done"
            $feedbackStatus = ''; // Assume the default value is empty
            $stmt = $conn->prepare("SELECT Feedback FROM transaction_history WHERE Batch_ID = :batchID");
            $stmt->bindParam(':batchID', $data['Batch_ID']);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result['Feedback'] == 'Done') {
              // Feedback has been added, so retrieve existing feedback
              $stmtFeedback = $conn->prepare("SELECT reviews FROM feedbacks WHERE batch_ID = :batchID");
              $stmtFeedback->bindParam(':batchID', $data['Batch_ID']);
              $stmtFeedback->execute();
              $existingFeedback = $stmtFeedback->fetch(PDO::FETCH_ASSOC);
              if ($existingFeedback) {
                $feedbackStatus = $existingFeedback['reviews'];
              }
            }
            ?>
            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
              <div class="px-2 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <?php if ($feedbackStatus): ?>
                  <!-- Display existing feedback in a read-only textarea -->
                  <textarea id="reviews" name="reviews" rows="4"
                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    readonly><?= $feedbackStatus ?></textarea>
                <?php else: ?>
                  <!-- Display an empty textarea for adding new feedback -->
                  <textarea id="reviews" name="reviews" rows="4"
                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="Write a feedback..." required></textarea>
                <?php endif; ?>
              </div>
            </div>
            <!-- Display the Back button -->
            <div class="flex justify-end gap-2">
              <a href='/master/po/transactionHistory' class="py-2 px-6 border border-gray-600 font-bold rounded-md">
                Back
                </a>
              <!-- Display the Save button only if feedback is not "done" -->
              <?php if (!$feedbackStatus): ?>
                <button type="submit" class="py-2 px-6 border border-gray-600 bg-yellow-500 font-bold rounded-md">
                  Save
                </button>
              <?php endif; ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="./../../src/form.js"></script>
  <script src="./../../src/route.js"></script>
</body>

</html>