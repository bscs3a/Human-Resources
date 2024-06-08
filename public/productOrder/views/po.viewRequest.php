<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Requested Orders</title>

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
          <label class="text-black font-medium">Requested Orders</label>
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

      <!-- new layout of table -->
      <div class="px-10 py-4 mt-4">
        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-left mx-auto bg-white">
            <thead class="bg-gray-200 border-b border-gray-400 text-sm">
              <tr>
                <th class="px-4 py-2 font-semibold">Order ID</th>
                <th class="px-4 py-2 font-semibold">Product ID</th>
                <th class="px-4 py-2 font-semibold">Product Name</th>
                <th class="px-4 py-2 font-semibold">Quantity</th>
                <th class="px-4 py-2 font-semibold">Status</th>
                <th class="px-4 py-2 font-semibold">Date Requested</th>
              
                <th class="px-4 py-2 font-semibold"></th>
              </tr>
            </thead>
            <tbody>

            <?php

function getAllInventoryOrders($conn) {
    try {
        // SQL query to retrieve all records from inventoryorders table
        $query = "SELECT io.order_id, io.product_id, io.product_name, io.quantity, io.status, io.date_ordered, s.Supplier_ID
                  FROM inventoryorders io
                  JOIN products p ON io.product_id = p.ProductID
                  JOIN suppliers s ON p.Supplier_ID = s.Supplier_ID";
        $statement = $conn->prepare($query);
        $statement->execute();

        // Fetch and display the results
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='border-b'>";

            echo "<td class='px-4 py-2'>" . $row['order_id'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['product_id'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['product_name'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['quantity'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['status'] . "</td>";
            echo "<td class='px-4 py-2'>" . $row['date_ordered'] . "</td>";
            echo '<td class="px-4 py-2">';
            echo '<a route="/po/viewsupplierproduct/Supplier=' . $row['Supplier_ID'] . '" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Go</a>';
            echo "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Assuming $conn is your PDO connection
$db = Database::getInstance();
$conn = $db->connect();
// Call the function to display all inventory orders
getAllInventoryOrders($conn);

?>


            </tbody>
            
          </table>
        </div>
        <!-- View All Button -->
      
      </div>
    </div>
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>
</body>

</html>