<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Suppliers Add Product</title>

  <link href="../../src/tailwind.css" rel="stylesheet" />
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
          <label class="text-black font-medium">Product Order / Add Items</label>
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

      <!-- New Form for add bulk product -->
      <div class="flex flex-col justify-center my-3 mx-10">
        <!--<div class="flex place-content-end mt-2 m-3">
           <button class="items-end rounded-full px-2 py-1 bg-violet-950 text-white">
            <i class="ri-add-circle-line"></i>
            <span>Add Row</span>
          </button> 
        </div> -->

        <div class="overflow-x-auto rounded-lg border border-gray-400">
          <table class="min-w-full text-center mx-auto bg-white">
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

            <form method="post" action="/master/po/addbulk/" enctype="multipart/form-data">
              <input type="hidden" name="supplierID" value="<?php echo $_GET['Supplier_ID']; ?>">

              <!-- Table structure for product details -->
              <tbody>
                <!-- Row 1 -->
                <tr>
                  <td><input type="file" name="productImage1"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="number" name="retailprice1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="float" name="productweight1"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement1" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 2 -->
                <tr>
                  <td><input type="file" name="productImage2"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="number" name="retailprice2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description2" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="text" name="productName3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="number" name="retailprice3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description3" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="text" name="productName4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="number" name="retailprice4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description4" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="text" name="productName5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                  <td><input type="number" name="retailprice5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="float" name="productweight5"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement5" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 6 -->
                <tr>
                  <td><input type="file" name="productImage6"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                      <select name="category6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="float" name="productweight6"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement6" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 7 -->
                <tr>
                  <td><input type="file" name="productImage7"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                      <select name="category7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="float" name="productweight7"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement7" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 8 -->
                <tr>
                  <td><input type="file" name="productImage8"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                      <select name="category8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="float" name="productweight8"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement8" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 9 -->
                <tr>
                  <td><input type="file" name="productImage9"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
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
                      <select name="category9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="float" name="productweight9"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement9" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 10 -->
                <tr>
                  <td><input type="file" name="productImage10"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName10"
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
                      <select name="category10" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price10" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice10" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail10" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description10"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                      <td><input type="float" name="productweight10"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement10" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 11 -->
                <tr>
                  <td><input type="file" name="productImage11"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName11"
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
                      <select name="category11" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price11" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice11" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail11" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description11"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                      <td><input type="float" name="productweight12"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement11" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 12 -->
                <tr>
                  <td><input type="file" name="productImage12"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName12"
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
                      <select name="category12" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price12" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice12" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail12" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description12"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                      <td><input type="float" name="productweight12"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement12" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
                <!-- Row 13 -->
                <tr>
                  <td><input type="file" name="productImage13"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                  <td><input type="text" name="productName13"
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
                      <select name="category13" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                        <?php foreach ($categories as $category): ?>
                          <option value="<?php echo htmlspecialchars($category['Category_Name']); ?>">
                            <?php echo htmlspecialchars($category['Category_Name']); ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  <td><input type="number" name="price13" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td><input type="number" name="retailprice13" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                  <td>
                    <select name="avail13" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                      <option value="Available">Available</option>
                      <option value="Not Available">Not Available</option>
                    </select>
                  </td>
                  <td><input type="text" name="description13"
                      class="px-4 py-2 border border-gray-300 rounded-md w-full"></td>
                      <td><input type="float" name="productweight13"
                        class="px-4 py-2 border border-gray-300 rounded-md w-full">
                    </td>
                    <td><input type="text" name="measurement13" class="px-4 py-2 border border-gray-300 rounded-md w-full">
                  </td>
                </tr>
              </tbody>
        </div>

        <div class="flex flex-row justify-between items-center m-3">
          <a class="flex text-xl font-bold">Add Items</a>
          <div class="flex flex-row gap-3">
            <a route='/po/viewsupplierproduct/Supplier=<?php echo isset($_GET['Supplier_ID']) ? $_GET['Supplier_ID'] : ''; ?>'
              class="flex py-2 px-6 border border-gray-600 font-bold rounded-md">Back</a>
            <button type="submit" class="flex py-2 px-6 border border-gray-600 font-bold rounded-md bg-yellow-400">Save
            </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./../../src/form.js"></script>
  <script src="./../../src/route.js"></script>

</body>

</html>