<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Suppliers</title>

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
      <div class="flex items-center justify-between h-16 bg-white shadow-md px-4 py-1">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-500 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Suppliers</label>
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
      <div class="py-4 px-10">
        <div class="justify-between items-start mt-4">

          <div class="flex justify-between">



            <!-- Search -->
            <div class="items-start">
              <div class="relative">
                <div class="inline-flex items-center overflow-hidden rounded-lg border border-gray-500">
                  <div class="flex flex-row">
                    <select id="filterSelect"
                      class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 border-gray-500">
                      <option value="">Filter</option>
                      <option value="Supplier_Name">Supplier Name</option>
                      <option value="Status">Status</option>
                    </select>
                    <input id="searchInput" placeholder="Search"
                      class="w-full rounded-md rounded-l-md p-1 border-gray-200 pe-10-0 shadow-sm sm:text-sm outline-none pl-4" />
                  </div>
                </div>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button route='/po/addsupplier' class="items-end rounded-full px-3 py-2 bg-violet-950 text-white">
                <i class="ri-add-circle-line mr-3"></i>
                <span>Add Supplier</span>
              </button>
            </div>

          </div>
        </div>


        <!-- Sample cards for ranking -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 pb-4">

          <!-- PHP code for supplier cards -->
          <?php
          try {
            require_once 'dbconn.php';
            // Query to retrieve all suppliers
            $query = "SELECT * FROM suppliers";
            $statement = $conn->prepare($query);
            $statement->execute();
            // Check if there are any rows or results
            if ($statement->rowCount() > 0) {
              while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <!-- Card 1 -->

                <div class="bg-white border border-gray-300 rounded-lg drop-shadow-lg p-8 supplierCard"
                  data-supplier_name="<?php echo $row['Supplier_Name']; ?>" data-status="<?php echo $row['Status']; ?>">
                  <div class="flex flex-col gap-2">
                    <div class="flex flex-row justify-between">
                      <div>
                        <a class="text-1xl font-semibold">Supplier Name:</a>
                        <a class="ml-3 text-black-500"><?php echo $row['Supplier_Name']; ?></a>
                      </div>
                      <a href="/master/po/editsupplier/Supplier=<?php echo $row['Supplier_ID']; ?>"
                        class="bg-violet-950 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">Edit</a>
                    </div>
                    <div class="flex flex-row">
                      <a class="text-1xl font-semibold">Status:</a>
                      <?php if ($row['Status'] == 'Active'): ?>
                        <a class="ml-3 text-green-600"><?php echo $row['Status']; ?></a>
                      <?php else: ?>
                        <a class="ml-3 text-red-600"><?php echo $row['Status']; ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="flex justify-between items-center pt-3">

                    <a href="/master/po/viewsupplier/Supplier=<?php echo $row['Supplier_ID']; ?>"
                      class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">View</a>
                    <a href="/master/po/viewsupplierproduct/Supplier=<?php echo $row['Supplier_ID']; ?>"
                      class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">Product
                      Lists/Order</a>
                  </div>
                </div>
                <?php
              }
            } else {
              echo "No suppliers found.";
            }
          } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          // Close the database connection
          $conn = null;
          ?>
        </div>




      </div>
    </div>
  </div>
  <script>
    // Function to filter suppliers based on the selected filter option and search input
    function filterSuppliers() {
      console.log("Filtering suppliers...");

      var filterOption = document.getElementById("filterSelect").value.toLowerCase();
      var searchValue = document.getElementById("searchInput").value.toLowerCase();
      var supplierCards = document.querySelectorAll(".supplierCard");

      supplierCards.forEach(card => {
        var display = "none";

        // Get the specific data based on the filter option
        switch (filterOption) {
          case "supplier_name":
          case "status":
            display = card.dataset[filterOption].toLowerCase().includes(searchValue) ? "" : "none";
            break;
          default:
            display = "";
        }

        card.style.display = display;
      });
    }

    // Event listeners for filter and search input
    document.getElementById("filterSelect").addEventListener("change", function () {
      console.log("Filter select changed...");
      filterSuppliers();
    });
    document.getElementById("searchInput").addEventListener("input", function () {
      console.log("Search input changed...");
      filterSuppliers();
    });
  </script>
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>

</html>