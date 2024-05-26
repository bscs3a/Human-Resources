<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

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
              <label class="text-black font-medium">Dashboard</label>
            </div>

            <!-- dropdown -->
            <?php require_once 'components/logout.php' ?>
            <!-- <div x-data="{ dropdownOpen: false }" class="relative my-32">
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
            </div> -->
          </div>

          <script>
            document.getElementById('toggleSidebar').addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
            });
          </script>

        <!-- Main Content -->
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:py-24 lg:px-8 py-4">
              <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-4">
                  <div class="bg-white overflow-hidden shadow sm:rounded-lg border border-gray-700">
                      <div class="px-4 py-2 sm:p-6">
                        <a route='/po/suppliers' class="flex justify-start items-center gap-4 px-8">
                          <i class="ri-contacts-book-3-line" style="font-size: 2em;"></i>   
                          <span class="text-lg font-semibold">Suppliers</span>
                        </a>
                      </div>
                  </div>
                  <div class="bg-white overflow-hidden shadow sm:rounded-lg border border-gray-700">
                      <div class="items-center px-4 py-2 sm:p-6">
                        <a route='/po/items' class="flex justify-start items-center gap-4 px-8">
                          <i class="ri-list-unordered" style="font-size: 2em;"></i>  
                          <span class="text-lg font-semibold">Product List</span>
                        </a>
                      </div>
                  </div>
                  <div class="bg-white overflow-hidden shadow sm:rounded-lg border border-gray-700">
                      <div class="px-4 py-2 sm:p-6">
                        <a route='/po/requestOrder' class="flex justify-start items-center gap-4 px-8">
                          <i class="ri-shopping-cart-line" style="font-size: 2em;"></i> 
                          <span class="text-lg font-semibold">Request Order</span>
                        </a>
                      </div>
                  </div>
              </div>
          </div>  

          <div class="px-10 py-2">
            <!-- Table -->
            <div class="overflow-x-auto rounded-lg border border-gray-400">
                <table class="min-w-full text-left mx-auto bg-white">
                    <thead class="bg-gray-200 border-b border-gray-400">
                        <tr>
                            <th class="px-4 py-2 font-semibold">Date</th>
                            <th class="px-4 py-2 font-semibold">User</th>
                            <th class="px-4 py-2 font-semibold">Time In</th>
                            <th class="px-4 py-2 font-semibold">Time Out</th>
                        </tr>
                    </thead>

                    <tbody class="">
                        <tr>
                            <td class="px-4 py-4">03/29/2024</td>
                            <td class="px-4 py-4">POAdmin@gmail.com</td>
                            <td class="px-4 py-4">07:30:15 AM</td>
                            <td class="px-4 py-4">07:30:15 AM</td>
                        </tr>    
                    </tbody>
                </table>
            </div>
          </div>
      
        </div>
    </div>
  </body>
</html>
