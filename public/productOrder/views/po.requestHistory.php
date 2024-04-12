<?php
// Initialize $requests variable to an empty array
$requests = [];

// Check if form is submitted and display search results
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchDate'])) {
  // Call the function to search requests by date and assign the result to $requests
  $requests = searchByDate();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request History</title>

    <link href="./../src/tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  </head>
  <body>
    <div class="flex h-screen bg-gray-100">
      <!-- sidebar -->
        <div id="sidebar" class="flex h-screen">
          <?php include "components/po.sidebar.php" ?>
        </div>

      <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
          <!-- header -->
          <div class="flex items-center justify-between h-16 bg-white shadow-md px-4">
            <div class="flex items-center gap-4">
              <button id="toggleSidebar" class="text-gray-500 focus:outline-none focus:text-gray-700">
                <i class="ri-menu-line"></i>
              </button>
              <label class="text-black font-medium">Request History</label>
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


      <!-- Calender Button -->
      <div class="m-5 flex justify-between items-center">
        <div class="flex flex-col">
          <form action="/search/requestHistory" method="post"> <!-- Removed "date/requestHistory" from action -->
            <input type="date" name="searchDate"
              class="appearance-none rounded-l-lg border border-gray-400 border-b block pl-8 pr-6 py-2 bg-gray-300 text-sm placeholder-gray-400 text-black focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            <button type="submit"
              class="border border-gray-400 border-b px-6 py-2 bg-gray-300 text-sm text-black focus:bg-white focus:text-gray-700 focus:outline-none">
              Search date
            </button>
          </form>
        </div>
      </div>

      <?php
      // Initialize a variable to hold the default month
      $defaultMonth = date('F Y');

      // Check if form is submitted and search date is set
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchDate'])) {
        // Process the search date
        $searchDate = $_POST['searchDate'];

        // Extract the month and year from the search date
        $searchedMonth = date('F Y', strtotime($searchDate));

        // If the search date is valid, update the default month
        if ($searchedMonth) {
          $defaultMonth = $searchedMonth;
        }
      }
      ?>

      <nav class="mx-5">
        <ul class="flex items-center justify-between -space-x-px h-8 text-sm">
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 font-bold text-lg text-gray-500 dark:text-gray-400"></a>
          </li>
          <li>
            <a href="#"
            class="flex items-center justify-center px-3 h-8 font-semibold text-2xl text-gray-800 dark:text-gray-400">
              <?php echo $defaultMonth; ?>
            </a>
          </li>
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 font-bold text-lg text-gray-500 dark:text-gray-400"></a>
          </li>
        </ul>
      </nav>
      <!-- Existing table -->
      <div
          class="overflow-overflow rounded-lg border border-gray-300 shadow-md m-5">
          <table
            class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-200">
            <tr class="border-b border-y-gray-300">
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                Product
              </th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                Request ID
              </th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                Date
              </th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                Price
              </th>
              <th scope="col" class="px-6 py-4 font-medium text-center text-gray-900">
                Quantity
              </th>
              <th scope="col" class="px-6 py-4 font-medium text-center text-gray-900">
                Total
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 border-b border-gray-300">
            <?php
            // Check if form is submitted and display search results
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchDate'])) {
              $searchedRequests = searchByDate();

              // Loop through the search results and generate table rows dynamically
              foreach ($searchedRequests as $request) {
                ?>
                <tr class="hover:bg-gray-100">
                  <th class="flex gap-3 px-6 py-7 font-normal text-gray-900">
                    <div class="flex flex-col font-medium text-gray-700 text-sm">
                      <a>
                        <?php echo $request['ProductName']; ?>
                      </a>
                    </div>
                  </th>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Request_ID']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Date_Ordered']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Price']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Product_Quantity']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-center text-gray-700 text-sm">
                      <?php echo $request['Product_Total_Price']; ?> <!-- Assuming Total is the same as Price -->
                    </div>
                  </td>
                </tr>
                <?php
              }
            } else {
              // If no search date is specified, fetch and display all data by default
              $requests = fetchAllRequestsData();
              foreach ($requests as $request) {
                ?>
                <tr class="hover:bg-gray-100">
                  <th class="flex gap-3 px-6 py-7 font-normal text-gray-900">
                    <div class="flex flex-col font-medium text-gray-700 text-sm">
                      <a>
                        <?php echo $request['ProductName']; ?>
                      </a>
                    </div>
                  </th>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Request_ID']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Date_Ordered']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-gray-700 text-sm">
                      <?php echo $request['Price']; ?>
                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-center text-gray-700 text-sm">
                      <?php echo $request['Product_Quantity']; ?>

                    </div>
                  </td>
                  <td class="px-6 py-7">
                    <div class="font-medium text-center text-gray-700 text-sm">
                      <?php echo $request['Product_Total_Price']; ?> <!-- Assuming Total is the same as Price -->
                    </div>
                  </td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
          <?php
          // Initialize variables to hold total quantity and total price
          $totalQuantity = 0;
          $totalPrice = 0;

          // Loop through the fetched data and generate table rows dynamically
          foreach ($requests as $request) {
            // Increment total quantity
            $totalQuantity += $request['Product_Quantity'];

            // Calculate total price for each item and increment total price
            $totalPrice += $request['Price'] * $request['Product_Quantity'];
            ?>
            <tr class="hover:bg-gray-100">
              <!-- Your existing table row content here -->
            </tr>
            <?php
          }
          ?>
          <!-- Your existing HTML code -->

          <!-- Display total quantity and total price in table footer -->
          <tfoot class="bg-gray-200">
            <tr class="border-b border-y-gray-300">
              <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
              <th scope="col" class="px-6 py-4 ml-3 font-medium text-gray-900">
                <div class="flex flex-col font-medium text-gray-700 gap-3">
                  <a>Items Subtotal:
                    <?php echo $totalQuantity; ?>
                  </a>
                  <a>Total Amount:
                    <?php echo $totalPrice; ?>
                  </a>
                </div>
              </th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>

</html>