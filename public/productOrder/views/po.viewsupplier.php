<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Supplier</title>

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
    <div class="flex flex-col flex-1 overflow-y-auto">
      <!-- header -->
      <div class="flex items-center justify-between h-16 bg-white shadow-md px-4 py-2">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Supplier / View</label>
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

      <!-- New Form for add product -->
      <div class="container mx-auto py-10 px-5">
        <div class="max-w-4xl h-full mx-auto bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
          <div class="flex-1 p-16">
            <div class="flex items-center justify-between">

            </div>
            <!-- table -->

            <?php
            function displaySupplierDetails($supplierID)
            {
              // Establish database connection
              $db = Database::getInstance();
              $conn = $db->connect();

              try {
                // Prepare SQL statement to retrieve supplier details
                $sql = "SELECT * FROM suppliers WHERE Supplier_ID = :supplierID";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':supplierID', $supplierID, PDO::PARAM_INT);
                $stmt->execute();

                // Fetch supplier details
                $supplier = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($supplier) {
                  // Display supplier details
                  echo '<div class="flex justify-between mb-5">';
                  echo '<a class="text-3xl font-bold">' . $supplier['Supplier_Name'] . '</a>';
                  echo '<a class="text-xl font-bold">#' . $supplier['Supplier_ID'] . '</a>';
                  echo '</div>';
                  echo '<div class="grid grid-cols-2 gap-6">';
                  echo '<div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Contact Name:</a><a>' . $supplier['Contact_Name'] . '</a>';
                  echo '</div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Contact Number:</a><a>' . $supplier['Contact_Number'] . '</a>';
                  echo '</div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Email:</a><a>' . $supplier['Email'] . '</a>';
                  echo '</div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Shipping Fee:</a><a>' . $supplier['Shipping_fee'] . '</a>'; //for shipping fee
                  echo '</div>';
                  echo '</div>';
                  echo '<div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Status:</a><a>' . $supplier['Status'] . '</a>';
                  echo '</div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Location:</a><a>' . $supplier['Address'] . '</a>';
                  echo '</div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Estimated Delivery:</a><a>' . $supplier['Estimated_Delivery'] . '</a>';
                  echo '</div>';
                  echo '<div class="mb-2">';
                  echo '<a class="font-bold mr-3">Working Days:</a><a>' . $supplier['Working_days'] . '</a>'; //for Working Days
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                } else {
                  // Supplier not found
                  echo "Supplier not found.";
                }
              } catch (PDOException $e) {
                // Handle PDO exceptions
                echo "Error: " . $e->getMessage();
              } finally {
                // Close connection
                $conn = null;
              }
            }

            // Check if Supplier_ID is set in the $_GET superglobal
            if (isset($_GET['Supplier_ID'])) {
              // Call the function to display supplier details
              $supplierID = $_GET['Supplier_ID'];
              displaySupplierDetails($supplierID);
            }

            ?>

            <!-- reviews and feedback area -->
            <div class="py-10">
              <div class="w-full h-auto mx-auto bg-white border border-gray-400 rounded-lg shadow-md overflow-hidden">
                <div class="font-bold py-4 pl-8 text-xl border-b border-gray-400">Feedbacks</div>

                <!-- Item Container -->
                <div class="flex flex-col gap-3 p-4">

                  <?php
                  require_once 'dbconn.php';
                  // Fetch feedbacks based on the Supplier_ID from the URL parameter
                  $supplierID = $_GET['Supplier_ID']; // Assuming 'supplierID' is the key in the URL parameter
                  $query = "SELECT * FROM feedbacks WHERE supplier_id = :supplierID";
                  $stmt = $conn->prepare($query);
                  $stmt->bindParam(':supplierID', $supplierID);
                  $stmt->execute();
                  $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  // Check if feedbacks exist
                  if ($feedbacks) {
                    // Iterate through each feedback and display it
                    foreach ($feedbacks as $feedback) {
                      ?>
                      <div class="flex flex-col gap-1 p-4 border-b border-gray-300">
                        <!-- Profile and Rating -->
                        <div class="flex justify justify-between">
                          <div class="font-semibold text-lg">
                            <?= $feedback['user'] ?>
                          </div>
                        </div>
                        <div class="font-medium">Order #
                          <?= $feedback['batch_ID'] ?>
                        </div>
                        <div class="font-medium">
                          <?= $feedback['reviews'] ?>
                        </div>

                        <div class="font-normal text-sm"><?= $feedback['date'] ?></div>
                      </div>
                      <?php
                    }
                  } else {
                    // No feedbacks found
                    echo "<div>No feedbacks available</div>";
                  }
                  ?>
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
<script src="./../../src/form.js"></script>
<script src="./../../src/route.js"></script>

</html>