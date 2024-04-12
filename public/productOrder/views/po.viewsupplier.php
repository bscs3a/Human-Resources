<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Supplier</title>

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
              <label class="text-black font-medium">Supplier / View</label>
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

      <!-- New Form for add product -->
      <div class="container mx-auto py-10 px-5">
        <div class="max-w-4xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden"> 
                <div class="flex-1 p-16">
                    <div class="flex items-center justify-between">
                      <h3 class="text-3xl leading-6 font-bold text-gray-900">Rank 1</h3>
                      <p class="mt-1 max-w-2xl text-md font-semibold text-gray-900">#2323</p>
                    </div>
                    <div>
                      <ul class="mt-2 text-gray-900">
                              <li class="flex py-2">
                                  <span class="font-bold w-56">Supplier ID:</span>
                                  <span class="font-medium text-gray-900">1012</span>
                              </li>
                              <li class="flex py-2">
                                  <span class="font-bold w-56">Supplier Name:</span>
                                  <span class="font-medium text-gray-900">Marc Toolbox</span>
                              </li>
                              <li class="flex py-2">
                                  <span class="font-bold w-56">Status:</span>
                                  <span class="font-medium text-green-900">Active</span>
                              </li>
                              <li class="flex py-2">
                                  <span class="font-bold w-56">Location:</span>
                                  <span class="font-medium text-gray-900">Florida</span>
                              </li>
                              <li class="flex py-2">
                                  <span class="font-bold w-56">Contact Number:</span>
                                  <span class="font-medium text-gray-900">09546424567</span>
                              </li>
                              <li class="flex py-2">
                                  <span class="font-bold w-56">Category:</span>
                                  <span class="font-medium text-gray-900">Hand Tool, Appliances, Tiles, etc...</span>
                              </li>
                      </ul>
                    </div>

                  <div class="py-10">
                    <div class="w-full h-auto mx-auto bg-white border border-gray-400 rounded-lg shadow-md overflow-hidden">
                      <div class="font-bold py-4 pl-8 text-xl border-b border-gray-400">Reviews and Feedbacks</div>
                  
                      <!-- Item Container -->
                      <div class="flex flex-col gap-3 p-4">
                        <div class="flex flex-col gap-1 p-4 border-b border-gray-300">
                          <!-- Profile and Rating -->
                            <div class="flex justify justify-between">
                                    <div class="font-semibold text-lg">
                                        David, Marc
                                    </div>
                                    <div class="flex p-1 gap-1" style="color: #fde047; font-size: 1.4em;" >
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-half-fill"></i>
                                    </div>
                            </div>

                            <div class="font-medium">
                                    Gorgeous design! Even more responsive than the previous version. A pleasure to use!
                            </div>

                            <div class="font-normal text-sm">Feb 13, 2021</div>
                        </div> 
                        
                        <div class="flex flex-col gap-1 p-4 border-b border-gray-300">
                          <!-- Profile and Rating -->
                            <div class="flex justify justify-between">
                                    <div class="font-semibold text-lg">
                                        David, Marc
                                    </div>
                                    <div class="flex p-1 gap-1" style="color: #fde047; font-size: 1.4em;" >
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-fill"></i>
                                      <i class="ri-star-half-fill"></i>
                                    </div>
                            </div>

                            <div class="font-medium">
                                    Gorgeous design! Even more responsive than the previous version. A pleasure to use!
                            </div>

                            <div class="font-normal text-sm">Feb 13, 2021</div>
                        </div> 
                      </div>
                    </div>
                  </div>  
                  
                  <div class="flex justify-end">
                  <button route='/po/suppliers' class="py-2 px-6 border border-gray-600 font-bold rounded-md">Back</button>
                  </div>
                  
              </div>           
      </div>
    </div>
  </div>
</body>
    <script src="./../src/route.js"></script>
    <script src="./../src/form.js"></script>

</html>