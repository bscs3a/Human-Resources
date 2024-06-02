<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Supplier</title>

  <link href="./../../src/tailwind.css" rel="stylesheet">
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
    <div class="flex flex-col flex-1 overflow-y-auto hide-scrollbar">
      <!-- header -->
      <div class="sticky top-0 flex items-center justify-between h-16 bg-white shadow-md px-4">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Suppliers / Edit</label>
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
        <div class="h-full w-[90%] mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
          <div id="main" class="m-3 pt-6">

            <!-- Supplier Edit Form -->
            <?php
            // Function to edit supplier information
            function editSupplier($supplierID)
            {
              $db = Database::getInstance();
              $conn = $db->connect();

              try {
                // Retrieve supplier data based on Supplier_ID
                $stmt = $conn->prepare("SELECT * FROM suppliers WHERE Supplier_ID = :supplierID");
                $stmt->bindParam(':supplierID', $supplierID);
                $stmt->execute();
                $supplier = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($supplier) {
                  ?>
                  <div class="px-10">
                    <form action="/master/edit/editsupplier" method="POST" enctype="multipart/form-data">
                      <div class="grid grid-cols-2 gap-6">
                        <input type="hidden" name="supplierID" value="<?php echo $supplierID; ?>">
                        <div>
                          <!-- Supplier fields -->
                          <div class="mb-4">
                            <label for="suppliername" class="block text-black font-semibold mb-2">Supplier Name</label>
                            <input type="text" id="suppliername" name="suppliername"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Supplier_Name']; ?>" required>
                          </div>
                          <div class="mb-4">
                            <label for="contactname" class="block text-black font-semibold mb-2">Contact Name</label>
                            <input type="text" id="contactname" name="contactname"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Contact_Name']; ?>" required>
                          </div>
                          <div class="mb-4">
                            <label for="contactnum" class="block text-black font-semibold mb-2">Contact Number</label>
                            <input type="number" id="contactnum" name="contactnum"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Contact_Number']; ?>" required>
                          </div>
                          <div class="mb-4">
                            <label for="email" class="block text-black font-semibold mb-2">Email</label>
                            <input type="text" id="email" name="email"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Email']; ?>" required>
                          </div>
                        </div>
                        <div>
                        <div class="mb-4">
                          <label for="status" class="block text-black font-semibold mb-2">Status</label>
                          <select id="status" name="status" class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                              <option value="Active" <?php echo $supplier['Status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                              <option value="Inactive" <?php echo $supplier['Status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                          </select>
                      </div>
                          <div class="mb-4">
                            <label for="location" class="block text-black font-semibold mb-2">Location</label>
                            <input type="text" id="Address" name="Address"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Address']; ?>" required>
                          </div>
                          <div class="mb-4">
                            <label for="estimated-delivery-date" class="block text-black font-semibold mb-2">Estimated Delivery
                              Date</label>
                            <input type="text" id="estimated-delivery-date" name="estimated-delivery-date"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Estimated_Delivery']; ?>" required>
                          </div>
                          <div class="mb-4">
                            <label for="shipping-fee" class="block text-black font-semibold mb-2">Shipping Fee</label>
                            <input type="text" id="estimated-delivery-date" name="shipping-fee"
                              class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                              value="<?php echo $supplier['Shipping_fee']; ?>" required>
                          </div>

                          <!-- ... -->
                        </div>

                      </div>

                      <div class="flex flex-col w-1/2 mx-auto mb-5">
                        <label for="working-days" class="block text-black font-semibold mb-2">Working Days</label>
                        <input type="text" id="working-days" name="working-days"
                          class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                          value="<?php echo $supplier['Working_days']; ?>" required>
                      </div>

                      <div>
                        <!-- Product table -->
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
                              <th class="px-4 py-2 font-semibold">Tax Rate</th>
                              <th class="px-4 py-2 font-semibold"></th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php
                               // Fetch products based on the Supplier_ID
                               $stmt_products = $conn->prepare("SELECT * FROM products WHERE Supplier_ID = :supplierID");
                               $stmt_products->bindParam(':supplierID', $supplierID);
                               $stmt_products->execute();
                               $products = $stmt_products->fetchAll(PDO::FETCH_ASSOC); 
                              foreach ($products as $product) { ?>
                                <tr>
                                  <!-- Product fields -->
                                  <td class="flex flex-col justify-center items-center gap-3 px-2 py-4 font-normal text-gray-900">
                                    <input class="w-40" type="file" name="product_image_<?php echo $product['ProductID']; ?>" accept="image/*">
                                    <?php
                                    // Display current product image
                                    $imagePath = '../../' . $product['ProductImage'];
                                    echo '<img src="' . $imagePath . '" alt="" class="w-20 h-20 object-cover mr-4">';
                                    ?>
                                  </td>
                            <td class="px-4 py-4">
                                <input type="text" name="product_name_<?php echo $product['ProductID']; ?>"
                                    value="<?php echo $product['ProductName']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400">
                            </td>
                            <td class="px-4 py-4">
                                <select name="product_category_<?php echo $product['ProductID']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400">
                                    <?php
                                    // Fetch categories from the Categories table
                                    $stmt_categories = $conn->prepare("SELECT * FROM categories");
                                    $stmt_categories->execute();
                                    $categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);

                                    // Iterate over each category and populate the select dropdown
                                    foreach ($categories as $category) {
                                    ?>
                                    <option value="<?php echo $category['Category_Name']; ?>"
                                        <?php if ($category['Category_Name'] == $product['Category']) echo 'selected'; ?>>
                                        <?php echo $category['Category_Name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="px-4 py-4">
                                <input type="text" name="product_price_<?php echo $product['ProductID']; ?>"
                                    value="<?php echo $product['Price']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400">
                            </td>
                            <td class="px-4 py-4">
                                <input type="text" name="supplier_price_<?php echo $product['ProductID']; ?>"
                                    value="<?php echo $product['Supplier_Price']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400">
                            </td>
                            <td class="px-4 py-4">
                                <select name="availability_<?php echo $product['ProductID']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400">
                                    <option value="Available"
                                        <?php if ($product['Availability'] == 'Available') echo 'selected'; ?>>
                                        Available
                                    </option>
                                    <option value="Not Available"
                                        <?php if ($product['Availability'] == 'Not Available') echo 'selected'; ?>>
                                        Not Available
                                    </option>
                                </select>
                            </td>
                            
                            <td class="px-4 py-4">
                                <textarea name="product_description_<?php echo $product['ProductID']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"><?php echo $product['Description']; ?></textarea>
                            </td>
                            <td class="px-4 py-4">
                                <textarea name="product_weight_<?php echo $product['ProductID']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"><?php echo $product['ProductWeight']; ?></textarea>
                            </td>
                            <td class="px-4 py-4">
                                <textarea name="unitofmeasurement_<?php echo $product['ProductID']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"><?php echo $product['UnitOfMeasurement']; ?></textarea>
                            </td>
                            <td class="px-4 py-4">
                                <textarea name="taxrate_<?php echo $product['ProductID']; ?>"
                                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"><?php echo $product['TaxRate']; ?></textarea>
                            </td>
                                  <!-- ... -->
                                  <td class="px-4 py-4">
                                    <!-- FORM METHOD TO DELETE A PRODUCT -->
                                    <form action="/master/delete/product" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                      <input type="hidden" name="product_id" value="<?php echo $product['ProductID']; ?>">
                                      <input type="hidden" name="supplier_id" value="<?php echo $supplierID; ?>">
                                      <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- Buttons for navigation -->
                      <div class="flex flex-row justify-end gap-3 my-3">
                        <a route='/po/suppliers' class="py-2 px-6 border border-gray-600 font-bold rounded-md">Back
                        </a>
                        <button type="submit" class="py-2 px-6 border border-gray-600 font-bold rounded-md bg-yellow-400">Save
                        </button>
                      </div>
                    </form>
                    <!-- Delete Supplier Form -->
                    <form action="/master/delete/supplier" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                      <input type="hidden" name="supplier_id" value="<?php echo $supplierID; ?>">
                      <button type="submit" class="py-2 px-6 border border-red-600 font-bold rounded-md bg-red-400 text-white">Delete Supplier</button>
                    </form>
                  </div>
                  <?php
                } else {
                  echo "Supplier not found.";
                }
              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              } finally {
                $conn = null; // Close connection
              }
            }

            // Assuming you have the supplier ID available, you can call the editSupplier function like this:
            $supplierID = $_GET['Supplier_ID']; // Get the supplier ID from the URL parameter or any other source
            
            // Call the editSupplier function with the supplier ID
            editSupplier($supplierID);
            ?>

            <!-- end of form -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../src/route.js"></script>
  <script src="../../src/form.js"></script>
</body>

</html>
