<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
    <!-- Include Tailwind CSS -->
    <link href="./../src/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Left Sidebar -->
<div class="flex h-screen bg-gray-200">
    <div class="flex flex-col w-64">
        <!-- Sidebar Content -->
        <div class="flex flex-col h-full">
            <!-- Logo/Header -->
            <div class="flex justify-end bg-violet-950 text-white p-4">
                <h1 class="text-3xl font-bold">BSCS 3A</h1>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 bg-violet-950 p-2">
                <ul class="space-y-2">
                    <!-- Delivery Tab -->
                    <li>
                        <button onclick="location.href='/Master/dlv/sample'"
                        class="block px-4 py-2 text-white hover:bg-gray-600">Delivery</button>
                    </li>
                    <!-- Add more tabs here if needed -->
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">
        <!-- Table -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-bold mb-4">Delivery Orders</h2>
                <select class="float-right">
                    <option value="default" selected>Default</option>
                    <option>Preparing</option>
                    <option>In Transit</option>
                    <option>Delivered</option>
                </select>
            </h2>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="border-b border-gray-400 px-4 py-2">Order ID</th>
                        <th class="border-b border-gray-400 px-4 py-2">Order Date</th>
                        <th class="border-b border-gray-400 px-4 py-2">Item</th>
                        <th class="border-b border-gray-400 px-4 py-2">Quantity</th>
                        <th class="border-b border-gray-400 px-4 py-2">Status</th>
                        <th class="border-b border-gray-400 px-4 py-2">Action</th> <!-- New column for details -->
                        <!-- Add more table headers if needed -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows will be dynamically populated here -->
                        <tr>
                            <td class="border px-4 py-2">#0231</td>
                            <td class="border px-4 py-2">2-23-2023</td>
                            <td class="border px-4 py-2">Shovel</td>
                            <td class="border px-4 py-2">12</td>
                            <td class="border px-4 py-2">Delivered</td>
                            <td class="border px-4 py-2 flex justify-center">
                                <button onclick="location.href='/Master/dlv/details'" class="viewDetailsBtn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    View Details
                                </button>
                            </td>
                        </tr>

                </tbody>             
            </table>
        </div>
    </div>
</div>
</body>
</html>