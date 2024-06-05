 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <?php require_once __DIR__ . "/../functions/db.php"; ?>
    <?php include __DIR__ . '/../functions/q_counter.php'; ?>
    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!-- Start: Stats -->
        <div class="text-2xl font-semibold px-6 py-5">
            <h1>Account Settings</h1>
        </div>


        <!-- Start: Details -->
        <div class="flex flex-col items-center">
            <!-- Circular photo placeholder -->
            <div class="w-16 h-16 bg-gray-200 rounded-full mb-4">
                <img src="path_to_your_placeholder_image" alt="Placeholder"
                    class="object-cover w-full h-full rounded-full">
            </div>

            <!-- Two buttons on the right in a column -->
            <div class="flex flex-col space-y-2 mb-4 items-center">
                <button class="bg-blue-500 text-white rounded p-2">Change Picture</button>
                <button class="bg-blue-500 text-white rounded p-2">Delete Picture</button>
            </div>

            <div class="grid grid-cols-2 gap-4 p-4 items-center">
                <div>
                    <div>
                        <label for="first-name">First Name</label>
                    </div>
                    <div>
                        <input type="text" id="first-name" class="border rounded p-2">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="last-name">Last Name</label>
                    </div>
                    <div>
                        <input type="text" id="last-name" class="border rounded p-2">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <div>
                        <input type="text" id="email" class="border rounded p-2">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="phone">Phone</label>
                    </div>
                    <div>
                        <input type="text" id="phone" class="border rounded p-2">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="current-password">Current Password</label>
                    </div>
                    <div>
                        <input type="text" id="current-password" class="border rounded p-2">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="new-password">New Password</label>
                    </div>
                    <div>
                        <input type="text" id="new-password" class="border rounded p-2">
                    </div>
                </div>
            </div>

            <!-- Cancel and Save buttons -->
            <div class="flex justify-center items-center mt-4 mb-4 space-x-4">
                <div>
                    <button data-modal-hide="order-modal"
                        class="rounded-full text-lg border border-black text-black px-6 py-1 hover:bg-gray-100 active:bg-gray-300 duration-75">
                        Cancel
                    </button>
                </div>
                <div></div> <!-- Empty div for spacing -->
                <div>
                    <button route='/inv/inventoryProducts'
                        class="rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                        Save
                    </button>
                </div>
            </div>
        </div>
        </div>
        <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
    </main>
</body>

</html>