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
          <label class="text-black font-medium">Product List / Add Item</label>
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

      <form action="/po/addItem" method="POST" enctype="multipart/form-data">
        <!-- New Form for add product -->
        <div class="container mx-auto py-10 px-5">
          <div class="max-w-6xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-6 px-6 pt-4">
              <!-- Upload image -->
              <div class="p-5">
                <div class="flex justify-center items-center">
                  <div>
                    <div class="flex size-64 border border-gray-600 rounded-md justify-center items-center relative">
                      <img id="previewImage" src="placeholder.jpg" alt="" class="w-full h-full rounded-lg object-cover">

                      <input type="file" name="file" id="fileInput" class="absolute inset-0 opacity-0" required
                        onchange="previewFile()">
                    </div>
                    <div class="text-center py-4">

                      <label for="fileInput" class="button border border-gray-500 p-2 rounded-lg">
                        <i class="ri-image-add-line px-2"></i>Choose Image
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="md:col-span-2 p-6">

                <div class="mb-4">
                  <label for="productname" class="block text-black font-semibold mb-2">Product Name</label>
                  <input type="text" id="productname" name="productname"
                    class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                    required>
                </div>
                <div class="mb-4">

                  <label for="supplier" class="block text-gblack font-semibold mb-2">Supplier</label>
                  <select class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                    id="supplier" name="supplier" required>
                    <option value="">Select Supplier</option>
                    <?php
                    // Function to retrieve all suppliers from the database
                    function getAllSuppliers()
                    {
                      try {
                        // Connect to your database using PDO
                        require_once 'dbconn.php';

                        // Query to retrieve all suppliers
                        $sql = "SELECT Supplier_Name FROM suppliers";

                        // Prepare the SQL statement
                        $stmt = $conn->prepare($sql);

                        // Execute the query
                        $stmt->execute();

                        // Fetch all supplier names
                        $suppliers = $stmt->fetchAll(PDO::FETCH_COLUMN);
                        return $suppliers;
                      } catch (PDOException $e) {
                        // Handle errors
                        echo "Error: " . $e->getMessage();
                        return array(); // Return empty array if there's an error
                      }
                    }

                    // Call the function to get all suppliers
                    $allSuppliers = getAllSuppliers();

                    // Output all suppliers as options in the select dropdown
                    foreach ($allSuppliers as $supplier) {
                      echo "<option>$supplier</option>";
                    }
                    ?>
                  </select>

                </div>
              </div>
            </div>


            <!-- NEW Forms for category, weight, price, and description -->
            <div class="px-10">

              <div class="mb-6">
                <label for="category" class="block text-black font-semibold mb-2">Category</label>
                <select id="category" name="category"
                  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                  required>
                  <option value="">Select Category</option>
                  <?php
                  // Get all category names
                  $categoryNames = getAllCategories();

                  // Generate options dynamically
                  foreach ($categoryNames as $category) {
                    echo "<option value=\"$category\">$category</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="mb-4">
                <label for="weight" class="block text-black font-semibold mb-2">Weight(KG)</label>
                <input type="text" id="weight" name="weight"
                  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                  required>
              </div>
              <div class="mb-4">
                <label for="price" class="block text-black font-semibold mb-2">Price</label>
                <input type="text" id="price" name="price"
                  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400"
                  required>
              </div>
              <div class="mb-4">
                <label for="description" class="block text-black font-semibold mb-2">Description</label>
                <textarea id="description" name="description"
                  class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" rows="5"
                  required></textarea>
              </div>
              <div class="flex flex-row justify-end gap-3 px-8 my-3">
                <button route='/po/items' class="py-2 px-6 border border-gray-600 font-bold rounded-md">Back</button>
                <button type="submit"
                  class="py-2 px-6 border border-gray-600 font-bold rounded-md bg-yellow-400">Save</button>
              </div>
      </form>
    </div>
  </div>
  </div>
  <script>
    function previewFile() {
      const preview = document.getElementById('previewImage');
      const icon = document.getElementById('imageIcon');
      const file = document.querySelector('input[type=file]').files[0];
      const reader = new FileReader();

      reader.onloadend = function () {
        preview.src = reader.result;
        icon.style.display = 'none'; // Hide the icon when an image is selected
      };

      if (file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = "placeholder.jpg"; // If no file is selected, display a placeholder image
        icon.style.display = 'block'; // Display the icon when no image is selected
      }
    }
  </script>
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>


</html>