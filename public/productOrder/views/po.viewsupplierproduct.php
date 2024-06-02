<?php
require_once "public/finance/functions/otherGroups/productOrder.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Suppliers Product List</title>

  <link href="./../../src/tailwind.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>
  <div class="flex h-screen bg-white">
    <!-- sidebar -->
    <div id="sidebar" class="flex h-screen">
      <?php include "<public/productOrder/views/components/po.sidebar.php" ?>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
      <!-- header -->
      <div class="flex items-center justify-between h-16 bg-white shadow-md px-4 py-2">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Suppliers / Product List</label>

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
      <!-- new layout of table -->
      <div class="px-10 py-4">
        <div class="justify-between items-start mt-4">
          <!-- Button -->
          <div class="flex justify-between">
            <div class="items-start">
              <div class="relative">
                <div class="inline-flex items-center overflow-hidden rounded-lg border border-gray-500">
                  <div class="flex flex-row">
                    <select id="filterSelect"
                      class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 border-gray-500">
                      <option value="">Filter</option>
                      <option value="id">ID</option>
                      <option value="name">Product Name</option>
                      <option value="supplier">Supplier</option>
                      <option value="category">Category</option>
                      <option value="price">Price</option>
                      <option value="description">Description</option>
                    </select>
                    <input id="searchInput" placeholder="Search"
                      class="w-full rounded-md rounded-l-md p-1 border-gray-200 pe-10-0 shadow-sm sm:text-sm outline-none pl-4" />
                  </div>
                </div>
              </div>
            </div>

            <!-- add bulk products button -->
            <div class="flex place-content-end mt-2 m-3">
              <?php
              // Fetch data from the database
              // Assuming $conn is your database connection
              $db = Database::getInstance();
              $conn = $db->connect();

              // Check if $_GET['supplier_ID'] is set and not empty
              if (isset($_GET['Supplier_ID']) && !empty($_GET['Supplier_ID'])) {
                // Sanitize and store the supplier ID from the GET parameter
                $supplierID = htmlspecialchars($_GET['Supplier_ID']);

                // Prepare the SQL statement to select data from the suppliers table based on supplier_ID
                $query = "SELECT * FROM suppliers WHERE Supplier_ID = :supplierID";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':supplierID', $supplierID, PDO::PARAM_INT);

                // Execute the query
                if ($stmt->execute()) {
                  // Check if there are any rows returned
                  if ($stmt->rowCount() > 0) {
                    // Fetch each row as an associative array
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      // Now $row contains the data for each row
                      // You can use $row here
                      // For example:

                      echo '<a route="/po/addbulk/Supplier=' . $row['Supplier_ID'] . '" class="items-end rounded-full px-3 py-2 bg-violet-950 text-white">';

                      echo '<i class="ri-add-circle-line mr-3"></i>';
                      echo '<span>Add Product</span>';
                      echo '</a>';
                    }
                  } else {
                    echo "No data found for the specified supplier ID.";
                  }
                } else {
                  echo "Error executing the query.";
                }
              } else {
                echo "Supplier ID not provided.";
              }

              // Close the database connection
              $conn = null;
              ?>
            </div>
          </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-left mx-auto bg-white">
            <thead class="bg-gray-200 border-b border-gray-400 text-sm">
              <tr>
                <th class="px-4 py-2 font-semibold">Product Image</th>
                <th class="px-4 py-2 font-semibold">Product ID</th>
                <th class="px-4 py-2 font-semibold">Supplier</th>
                <th class="px-4 py-2 font-semibold">Category</th>
                <th class="px-4 py-2 font-semibold">Product Price</th>
                <th class="px-4 py-2 font-semibold">Supplier Price</th>
                <th class="px-4 py-2 font-semibold">Availability</th>
                <th class="px-4 py-2 font-semibold">Description</th>
                <th class="px-4 py-2 font-semibold">Product Weight (KG)</th>
                <th class="px-4 py-2 font-semibold">Unit of Measurement</th>
                <th class="px-10 py-2 font-semibold text-center">Quantity</th>
              </tr>
            </thead>

            <tbody class="text-sm">
              <?php
              function displayProductsBySupplierID($supplierID)
              {
                try {
                  require_once 'dbconn.php';
                  // Query to retrieve products based on Supplier_ID
                  $query = "SELECT p.*, s.Supplier_Name 
                  FROM products p 
                  INNER JOIN suppliers s ON p.Supplier_ID = s.Supplier_ID
                  WHERE p.Supplier_ID = :supplierID";
                  $statement = $conn->prepare($query);
                  $statement->bindParam(':supplierID', $supplierID, PDO::PARAM_INT);
                  $statement->execute();

                  // Check if there are any rows or results
                  if ($statement->rowCount() > 0) {
                    echo '<form method="post" action="/placeorder/supplier/" id="orderform">';

                    // Add hidden input for Supplier_ID
                    echo '<input type="hidden" name="supplierID" value="' . $supplierID . '">';

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                      // Debugging statement to print image path
                      $imagePath = '../../' . $row['ProductImage'];
                      echo '<tr class="data-row" data-id="' . $row['ProductID'] . '" data-name="' . $row['ProductName'] . '" data-supplier="' . $row['Supplier'] . '" data-category="' . $row['Category'] . '" data-price="' . $row['Price'] . '" data-description="' . $row['Description'] . '">';
                      echo '<td class="flex flex-col justify-center items-center text-sm gap-3 px-6 py-4 font-normal text-gray-900">';
                      echo '<img src="' . $imagePath . '" alt="" class="w-20 h-20 object-cover">';
                      echo '<div>' . $row['ProductName'] . '</div>';
                      echo '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['ProductID'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['Supplier'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['Category'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">Php ' . $row['Price'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">Php ' . $row['Supplier_Price'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['Availability'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['Description'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['ProductWeight'] . '</td>';
                      echo '<td class="px-4 py-4 text-center">' . $row['UnitOfMeasurement'] . '</td>';
                      echo '<td class="px-3 py-4"><input type="number" name="quantity_' . $row['ProductID'] . '" value="0" class="quantity-input w-full border-b-2 border-black text-center" data-price="' . $row['Supplier_Price'] . '"></td>';
                      echo '</tr>';
                      echo '<input type="hidden" name="products[]" value="' . $row['ProductID'] . '">';
                    }
                    
                    echo '<div class="flex flex-row justify-between">';
                    echo '<div class="flex flex-row">';
                    echo '<a route=\'/po/suppliers\' class="border-2 border-black font-bold py-2.5 px-4 ml-3 my-3 rounded">Back</a>';
                    echo '<button type="submit" class="ml-3 bg-blue-500 hover:bg-blue-700 border-2 border-black text-white font-bold py-2 px-4 my-3 rounded">Order</button>';
                    echo '</div>';

                    // Add the "Pay Using" dropdown with a larger label
                    echo '<div class="flex flex-row items-center gap-3 mr-3 my-auto">';
                    echo '<label for="payment-method" class="ml-3 mt-3 text-lg font-bold">Pay Using:</label>';
                    echo '<select id="payment-method" name="paymentmethod" class="ml-3 px-3 py-2 mt-1 border-2 border-black rounded">';
                    echo '<option value="Cash on hand">Cash on hand: ' . getRemainingProductOrderPondo('Cash on hand') . '</option>';
                    echo '<option value="Cash on bank">Cash on bank: ' . getRemainingProductOrderPondo('Cash on bank') . '</option>';
                    echo '</div>';
                    echo '</div>';
                    // Add the "Pay Using" dropdown
                    // echo '<label for="payment-method" class="ml-3 mt-3">Pay Using:</label>';
                    // echo '<select id="payment-method" name="paymentmethod" class="ml-3 mt-1 px-2 py-1 border-2 border-black rounded">';
                    // echo '<option value="Cash on hand">Cash on hand</option>';
                    // echo '<option value="Cash on bank">Cash on bank</option>';
                    // echo '</select>';



                    echo '</form>';
                  } else {
                    echo "No products found for this supplier.";
                  }
                } catch (PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
                }
                // Close the database connection
                $conn = null;
              }
              
              // Check if Supplier_ID is provided via GET method
              if (isset($_GET['Supplier_ID'])) {
                $supplierID = $_GET['Supplier_ID'];
                displayProductsBySupplierID($supplierID);
              } else {
                echo "Supplier ID not provided.";
              }
              ?>

            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>

  <script>
    // Filter and search functionality
    function filterAndSearch() {
      var filterValue = document.getElementById("filterSelect").value.toLowerCase();
      var searchValue = document.getElementById("searchInput").value.toLowerCase();
      var rows = document.querySelectorAll(".data-row");

      rows.forEach(row => {
        var display = "none";

        switch (filterValue) {
          case "id":
            display = row.dataset.id.toLowerCase().includes(searchValue) ? "" : "none";
            break;
          case "name":
            display = row.dataset.name.toLowerCase().includes(searchValue) ? "" : "none";
            break;
          case "supplier":
            display = row.dataset.supplier.toLowerCase().includes(searchValue) ? "" : "none";
            break;
          case "category":
            display = row.dataset.category.toLowerCase().includes(searchValue) ? "" : "none";
            break;
          case "price":
            display = row.dataset.price.toLowerCase().includes(searchValue) ? "" : "none";
            break;
          case "description":
            display = row.dataset.description.toLowerCase().includes(searchValue) ? "" : "none";
            break;
          default:
            display = "";
        }

        row.style.display = display;
      });
    }

    // Event listeners for filter and search
    document.getElementById("filterSelect").addEventListener("change", filterAndSearch);
    document.getElementById("searchInput").addEventListener("input", filterAndSearch);
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Define the remaining funds for each payment method
      var remainingFundsForMethods = {
        'Cash on hand': <?php echo json_encode(getRemainingProductOrderPondo("Cash on hand")); ?> // Example value for cash on hand
        'Cash on bank': <?php echo json_encode(getRemainingProductOrderPondo("Cash on bank")); ?>  // Example value for cash on bank
      };

      var orderForm = document.getElementById("orderform");
      var paymentMethodSelect = document.getElementById("payment-method");

      // Function to get remaining funds based on the selected payment method
      function getRemainingFunds(paymentMethod) {
        return remainingFundsForMethods[paymentMethod] || 0;
      }

      orderForm.addEventListener("submit", function (event) {
        var totalAmount = 0;
        event.preventDefault();
        var quantityInputs = document.querySelectorAll(".quantity-input");
        var paymentMethod = paymentMethodSelect.value;
        var remainingFunds = getRemainingFunds(paymentMethod);
        console.log(remainingFunds);
        quantityInputs.forEach(function (input) {
          var quantity = parseFloat(input.value);
          var price = parseFloat(input.getAttribute('data-price'));

          if (isNaN(quantity) || quantity < 0) {
            alert("Please enter a valid number for the quantity of all products.");
            event.preventDefault();
            return;
          }

          totalAmount += quantity * price;
        });

        if (totalAmount > remainingFunds) {
          alert("The total amount (" + totalAmount + ") exceeds the remaining funds for the department.");
          event.preventDefault();
        }

        console.log("Selected Payment Method: " + paymentMethod);
      });
    });
  </script>
  <script src="./../../src/form.js"></script>
  <script src="./../../src/route.js"></script>
</body>


</html>