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
              <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 border border-gray-50 rounded-md bg-white p-2 focus:outline-none">
                <div class="flex items-center gap-4">
                  <a class="flex-none text-sm dark:text-white" href="#">David, Marc</a>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
              </button>

                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-20">
                  <a href="#" class="block px-8 py-1 text-sm capitalize text-gray-700">Log out</a>
                </div>
            </div>
          </div>

          <script>
            document.getElementById('toggleSidebar').addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
            });
          </script>

      <!-- Main Content -->
      <div class="py-4 px-10">
        <div class="justify-between items-start mt-4">
                      <!-- Button -->
                      <div class="flex justify-between">
                          <div class="items-start">
                              <div class="relative">
                                  <div class="inline-flex items-center overflow-hidden rounded-lg border border-gray-500">
                                      <button class="border-e px-4 py-2 text-sm/none bg-gray-200 hover:bg-gray-300 text-gray-900 border-gray-500">
                                          <i class="ri-calendar-2-fill"></i>
                                          Filter
                                      </button>
                                      
                                      <div class="relative">
                                          <label for="Search" class="sr-only"> Search </label>

                                          <input type="text" id="Search" placeholder="Search by ID..."
                                              class="w-full rounded-md rounded-l-md p-1 border-gray-200 pe-10 shadow-sm sm:text-sm outline-none pl-4" />

                                          <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                                              <button type="button" class="text-gray-600 hover:text-gray-700">
                                                  <span class="sr-only">Search</span>

                                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                      stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                                  </svg>
                                              </button>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="flex place-content-end mt-2 m-3">
                            <button route='/po/addsupplier' class="items-end rounded-full px-2 py-1 bg-violet-950 text-white">
                            <i class="ri-add-circle-line"></i>
                            <span>Add Supplier</span> 
                            </button>
                          </div>
                      </div>
        </div>

        <!-- Sample cards for ranking -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 pb-4">
              <!-- Card 1 -->
              <div class="bg-white border border-gray-300 rounded-lg drop-shadow-lg p-8">
                  <div class="flex flex-col gap-2 ">
                    <a class="text-2xl font-semibold">No Rank Yet</a>
                    <div class="flex flex-row">
                      <a>Supplier Name:</a>
                      <a class="ml-3 text-gray-500"></a>
                    </div>
                    <div class="flex flex-row">
                      <a>Status:</a>
                      <a class="ml-3 text-green-600">Active</a>
                    </div>
                  </div>
                  <div class="flex justify-center items-center pt-3">
                    <button route='/po/viewsupplier' class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">View</button>
                  </div>
              </div>

              <!-- Card 2 -->
              <div class="bg-white border border-gray-300 rounded-lg drop-shadow-lg p-8">
                  <div class="flex flex-col gap-2 ">
                    <a class="text-2xl font-semibold">No Rank Yet</a>
                    <div class="flex flex-row">
                      <a>Supplier Name:</a>
                      <a class="ml-3 text-gray-500"></a>
                    </div>
                    <div class="flex flex-row">
                      <a>Status:</a>
                      <a class="ml-3 text-green-600">Active</a>
                    </div>
                  </div>
                  <div class="flex justify-center items-center pt-3">
                    <button class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                      <a href="#">View</a>
                    </button>
                  </div>
              </div>

              <!-- Card 3 -->
              <div class="bg-white border border-gray-300 rounded-lg drop-shadow-lg p-8">
                  <div class="flex flex-col gap-2 ">
                    <a class="text-2xl font-semibold">No Rank Yet</a>
                    <div class="flex flex-row">
                      <a>Supplier Name:</a>
                      <a class="ml-3 text-gray-500"></a>
                    </div>
                    <div class="flex flex-row">
                      <a>Status:</a>
                      <a class="ml-3 text-green-600">Active</a>
                    </div>
                  </div>
                  <div class="flex justify-center items-center pt-3">
                    <button class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                      <a href="#">View</a>
                    </button>
                  </div>
              </div>
            </div> 

        <!-- Cards -->
        <?php
        try {
          require_once 'dbconn.php';
          // Query to retrieve supplier information
          $query = "SELECT * FROM suppliers";
          $statement = $conn->prepare($query);
          $statement->execute();
          // Check if there are any results
          if ($statement->rowCount() > 0) {
            // Loop through each row of the result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              // Output HTML code for each supplier
              echo '

            <div class="flex justify-center items-center">
            <div class="grid grid-cols-3 gap-6">
              <div class="h-72 w-96 border border-gray-400 rounded-lg drop-shadow-md">
                <div class="flex flex-col gap-2 ml-3 my-8">
                  <a class="text-2xl">No Rank Yet</a>
                  <div class="flex flex-row">
                    <a>Supplier Name:</a>
                    <a class="ml-3 text-gray-500">' . $row["Supplier_Name"] . '</a>
                  </div>
                  <div class="flex flex-row">
                    <a>Status:</a>
                    <a class="ml-3 text-green-600">Active</a>
                  </div>
                </div>

                <div class="flex justify-center items-center">
                  <button
                    class="bg-violet-950 my-3 px-4 py-1 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    <a>View</a>
                  </button>
                </div>
              </div>';

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

        <!-- //end -->
       

      </div>
    </div>

  </div>
  </div>
  </div>
</body>

</html>