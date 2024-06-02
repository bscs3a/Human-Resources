<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Supplier</title>

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
          <label class="text-black font-medium">Product Order / Add Suppliers</label>
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

      <!-- New Form -->
      <div class="container mx-auto py-3">
        <div class="max-w-6xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
          <div id="main" class="m-3 pt-6">

            <!-- NEW Form -->
            <div class="px-10">
              <form class="grid grid-cols-2 gap-6" id="productForm" action="/master/insert/addsupplier/" method="post"
                enctype="multipart/form-data">

                <div>
                  <div class="mb-4">
                    <label for="productid" class="block text-black font-semibold mb-2">Supplier Name</label>
                    <input type="text" id="suppliername" name="suppliername"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>
                  <div class="mb-4">
                    <label for="contactname" class="block text-black font-semibold mb-2">Contact Name</label>
                    <input type="text" id="contactname" name="contactname"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>
                  <div class="mb-4">
                    <label for="contactnum" class="block text-black font-semibold mb-2">Contact Number</label>
                    <input type="number" id="contactnum" name="contactnum"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>
                  <div class="mb-4">
                    <label for="location" class="block text-black font-semibold mb-2">Estimated Delivery Date</label>
                    <input type="text" id="delivery" name="delivery"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>
                </div>
                <div>
                  <div class="mb-4">
                    <label for="status" class="block text-black font-semibold mb-2">Status</label>
                    <select id="status" name="status"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                      <option value="Active">Active</option>
                      <option value="Not Active">Not Active</option>
                    </select>
                  </div>
                  <div class="mb-4">
                    <label for="location" class="block text-black font-semibold mb-2">Email</label>
                    <input type="text" id="email" name="email"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>
                  <div class="mb-4">
                    <label for="location" class="block text-black font-semibold mb-2">Address</label>
                    <input type="text" id="address" name="address"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>
                  <div class="mb-4">
                    <label for="location" class="block text-black font-semibold mb-2">Shipping Fee</label>
                    <input type="text" id="shippingfee" name="shippingfee"
                      class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                      required>
                  </div>

                </div>



            </div>

            <div class="flex flex-col w-1/2 mx-auto mb-5">
              <label for="location" class="block text-black font-semibold mb-2">Working Days (Monday -
                Sunday)</label>
              <input type="text" id="workingday" name="workingday"
                class="border border-gray-400 p-2 w-full text-center rounded-lg focus:outline-none focus:border-blue-400"
                required>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-400">
              <table id="productTable" class="min-w-full text-center mx-auto bg-white">
                <thead class="bg-gray-200 border-b border-gray-400 text-sm">
                  <tr>
                  <th class="px-4 py-2 font-semibold">Product Image</th>
                <th class="px-4 py-2 font-semibold">Product Name</th>
                <th class="px-4 py-2 font-semibold">Category</th>
                <th class="px-4 py-2 font-semibold">Product Price</th>
                <th class="px-4 py-2 font-semibold">Supplier Price</th>
                <th class="px-4 py-2 font-semibold">Availability</th>
                <th class="px-4 py-2 font-semibold">Description</th>
                <th class="px-4 py-2 font-semibold">Product Weight (KG)</th>
                <th class="px-4 py-2 font-semibold">Unit of Measurement</th>

                  </tr>
                </thead>
                <tbody>
                  <!-- Row 1 -->
                  <!-- Repeat this structure for each product row -->
                  <tr>
                    <td><input type="file" name="productImage1"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="text" name="productName1"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <?php
                    // Database connection (ensure this is correctly configured)
                    $db = Database::getInstance();
                    $conn = $db->connect();

                    // Fetch categories from the database
                    $query = "SELECT Category_Name FROM categories";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <td>
                      <select name="category1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td><input type="number" name="price1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="number" name="retailprice1"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td>
                      <select name="avail1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                      </select>
                    </td>
                    <td><input type="text" name="description1"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="float" name="productweight1"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  </tr>
                  <!-- Repeat rows 2 to 5 similarly -->
                  <tr>
                    <td><input type="file" name="productImage2"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="text" name="productName2"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <?php
                    // Database connection (ensure this is correctly configured)
                    $db = Database::getInstance();
                    $conn = $db->connect();

                    // Fetch categories from the database
                    $query = "SELECT Category_Name FROM categories";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <td>
                      <select name="category2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td><input type="number" name="price2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="number" name="retailprice2"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td>
                      <select name="avail2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                      </select>
                    </td>
                    <td><input type="text" name="description2"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="float" name="productweight2"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  </tr>
                  <!-- Row 3 -->

                  <tr>
                    <td><input type="file" name="productImage3"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="text" name="productName3"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <?php
                    // Database connection (ensure this is correctly configured)
                    $db = Database::getInstance();
                    $conn = $db->connect();

                    // Fetch categories from the database
                    $query = "SELECT Category_Name FROM categories";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <td>
                      <select name="category3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td><input type="number" name="price3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="number" name="retailprice3"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td>
                      <select name="avail3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                      </select>
                    </td>
                    <td><input type="text" name="description3"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="float" name="productweight3"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  </tr>
                  <!-- Row 4 -->
                  <tr>
                    <td><input type="file" name="productImage4"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="text" name="productName4"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <?php
                    // Database connection (ensure this is correctly configured)
                    $db = Database::getInstance();
                    $conn = $db->connect();

                    // Fetch categories from the database
                    $query = "SELECT Category_Name FROM categories";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <td>
                      <select name="category4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td><input type="number" name="price4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="number" name="retailprice4"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td>
                      <select name="avail4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                      </select>
                    </td>
                    <td><input type="text" name="description4"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="float" name="productweight4"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  </tr>
                  <!-- Row 5 -->
                  <tr>
                    <td><input type="file" name="productImage5"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="text" name="productName5"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <?php
                    // Database connection (ensure this is correctly configured)
                    $db = Database::getInstance();
                    $conn = $db->connect();

                    // Fetch categories from the database
                    $query = "SELECT Category_Name FROM categories";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <td>
                      <select name="category5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td><input type="number" name="price5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="number" name="retailprice5"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td>
                      <select name="avail5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                      </select>
                    </td>
                    <td><input type="text" name="description5"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                    <td><input type="float" name="productweight5"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  </tr>
                  <!-- You can copy the structure of Row 1 and paste it here for Rows 5 to 10 -->
                </tbody>
              </table>
            </div>

            <div class="flex flex-row justify-end gap-3 my-3">
              <a href='/master/po/suppliers' class="py-2 px-6 border border-gray-600 font-bold rounded-md">Back</a>
              <button id="saveButton" type="submit"
                class="py-2 px-6 border border-gray-600 font-bold rounded-md bg-yellow-400">Save</button>
            </div>
            </form>


            </script>
            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>

</body>


</html>