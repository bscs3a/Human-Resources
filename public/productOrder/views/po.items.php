<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Items</title>

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
      <div class="flex items-center justify-between h-20 bg-white shadow-md px-4 py-2">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Product List</label>

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
                      <option value="name">Name</option>
                      <option value="supplier">Supplier</option>
                      <option value="category">Category</option>
                      <option value="quality">Quality</option>
                      <option value="price">Price</option>
                      <option value="description">Description</option>
                    </select>
                    <input id="searchInput" placeholder="Search"
                      class="w-full rounded-md rounded-l-md p-1 border-gray-200 pe-10-0 shadow-sm sm:text-sm outline-none pl-4" />
                  </div>
                </div>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button route='/po/addItem' class="items-end rounded-full px-2 py-1 bg-violet-950 text-white">
                <i class="ri-add-circle-line"></i>
                <span>Add Product</span>
              </button>
            </div>
          </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-left mx-auto bg-white">
            <thead class="bg-gray-200 border-b border-gray-400 text-sm">
              <tr>
                <th class="px-4 py-2 font-semibold">Product</th>
                <th class="px-4 py-2 font-semibold">Product ID</th>
                <th class="px-4 py-2 font-semibold">Supplier</th>
                <th class="px-4 py-2 font-semibold">Category</th>
                <th class="px-4 py-2 font-semibold">Weight</th>
                <th class="px-4 py-2 font-semibold">Price</th>
                <th class="px-4 py-2 font-semibold">Description</th>
                <th class="px-4 py-2 font-semibold"></th>
              </tr>
            </thead>

            <tbody>

              <?php
              try {
                require_once 'dbconn.php';
                // Query to retrieve all products
                $query = "SELECT * FROM products";
                $statement = $conn->prepare($query);
                $statement->execute();
                // Check if there are any rows or results
                if ($statement->rowCount() > 0) {
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    // Debugging statement to print image path
                    $imagePath = '../' . $row['ProductImage'];
                    echo '<tr>';
                    echo '<tr class="hover:bg-gray-50 data-row" data-id="' . $row['ProductID'] . '" data-name="' . $row['ProductName'] . '" data-supplier="' . $row['Supplier'] . '" data-category="' . $row['Category'] . '" data-quality="5 stars..." data-price="' . $row['Price'] . '" data-description="' . $row['Description'] . '">';
                    echo '<td class="flex gap-3 px-6 py-4 font-normal text-gray-900">';
                    echo '<img src="' . $imagePath . '" alt="" class="w-20 h-20 object-cover mr-4">';
                    echo '<div>' . $row['ProductName'] . '</div>';
                    echo '</td>';
                    echo '<td class="px-4 py-4">' . $row['ProductID'] . '</td>';
                    echo '<td class="px-4 py-4">' . $row['Supplier'] . '</td>';
                    echo '<td class="px-4 py-4">' . $row['Category'] . '</td>';
                    echo '<td class="px-4 py-4">' . $row['ProductWeight'] . ' kg</td>';
                    echo '<td class="px-4 py-4">Php ' . $row['Price'] . '</td>';
                    echo '<td class="px-4 py-4">' . $row['Description'] . '</td>';
                    echo '<td class="px-4 py-4">View(currently not functioning)</td>';
                    echo '</tr>';

                  }
                } else {
                  echo "No products found.";
                }
              } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
              // Close the database connection
              $conn = null;
              ?>
              <!-- //end -->
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
          case "quality":
            display = row.dataset.quality.toLowerCase().includes(searchValue) ? "" : "none";
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
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>


</html>