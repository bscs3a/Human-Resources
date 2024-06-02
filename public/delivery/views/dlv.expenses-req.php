<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses-Request</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>
<body>
    <?php include "component/sidebar.php" ?>

    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md sticky top-0 left-0 z-30">

            <!-- Start: Active Menu -->

            <button type="button" class="text-lg sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>

            <ul class="flex items-center text-md ml-4">

                <li class="mr-2">
                    <p class="text-black font-medium">Delivery / Expenses Request</p>
                </li>

            </ul>

            <!-- End: Active Menu -->

            <!-- Start: Profile -->

            <ul class="ml-auto flex items-center">
                <div class="text-black font-medium">Sample User</div>
                <li class="dropdown ml-3">
                    <i class="ri-arrow-down-s-line"></i>
                </li>
            </ul>

            <!-- End: Profile -->

        </div>
        <!-- Content here -->

    <div class="flex items-center justify-center mt-10"> 
        <div class="w-1/2 bg-white p-4 rounded-lg shadow-xl border overflow-hidden">
            <form action="" method="post">
                <!-- Pay Using -->
                <label class="text-lg font-bold">Pay Using:</label><br>
                <div class="px-4">
                <select class="bg-gray-200 w-full text-md p-1 rounded-lg mb-4" required>
                    <option value="" selected disabled>Select...</option>
                    <option value="cash">Cash</option>
                    <option value="bankTransfer">Bank Transfer</option>
                    <option value="creditCard">Credit/Debit Card</option>
                </select>
                </div>

                <!-- Amount -->
                <label class="text-lg font-bold">Amount:</label><br>
                <div class="px-4">
                    <input class="bg-gray-200 w-full text-md p-1 rounded-lg mb-4" type="number" required><br>
                </div>

                <!-- Pay For -->
                <label class="text-lg font-bold">Pay For:</label><br>
                <div class="px-4">
                <select class="bg-gray-200 w-full text-md p-1 rounded-lg mb-4" required>
                    <option value="" selected disabled>Select...</option>
                    <option value="fuel">Fuel</option>
                    <option value="maintenanceRepairs">Maintenance and Repairs</option>
                    <option value="miscellaneous">Miscellaneous</option>
                </select><br>
                </div>

                <!-- Include SweetAlert2 library -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <!-- Submit -->
                <div class="px-4 text-right">
                    <button id="submit-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-150">Submit</button>
                </div>

            </form>
        </div>
    </div>

  </main>
            <!-- JS function for sidebar -->
  <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.getElementById('sidebar-menu').classList.toggle('hidden');
            document.getElementById('sidebar-menu').classList.toggle('transform');
            document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
            document.getElementById('mainContent').classList.toggle('md:w-full');
            document.getElementById('mainContent').classList.toggle('md:ml-64');
        });
    </script>
    
    <script>
        // Get the submit button
        var submitButton = document.getElementById('submit-button');

        // Add event listener
        submitButton.addEventListener('click', function(event) {
            // Prevent form from submitting
            event.preventDefault();

            // Get the input fields
            var payUsingField = document.querySelector('select');
            var amountField = document.querySelector('input[type="number"]');
            var payForField = document.querySelectorAll('select')[1];

            // Check if the fields are empty
            if (payUsingField.value === "" || amountField.value === "" || payForField.value === "") {
                // Show a warning popup
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please complete all fields!',
                });
                return;
            }

            Swal.fire(
                'Expenses Request!',
                'Request created successfully',
                'success'
            )
        });
    </script>

    <script  src="./../src/route.js"></script>
    <script  src="./../src/form.js"></script>
</body>

</html>