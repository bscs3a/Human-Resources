<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Link</title>
    <link href="./../src/tailwind.css" rel="stylesheet">

</head>
<body>

<div class="flex h-screen bg-gray-200">

    <div class="flex-1 flex justify-center items-center">

        <div class="w-full max-w-4xl">
            <h2 class="p-3 bg-violet-950 text-2xl font-bold mb-4 text-white flex justify-between items-center">
                Order Details
                <a onclick="location.href='/Master/dlv/sample'" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Order ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#0231</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Customer ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#3232</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Customer Name</td>
                            <td class="px-6 py-4 whitespace-nowrap">Mark John</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Address</td>
                            <td class="px-6 py-4 whitespace-nowrap">Lubao Pampanga 123 Zone 2</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Customer Contact Number</td>
                            <td class="px-6 py-4 whitespace-nowrap">09232256745</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Order Date</td>
                            <td class="px-6 py-4 whitespace-nowrap">2-23-2023</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Supplier ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#234453</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Product ID</td>
                            <td class="px-6 py-4 whitespace-nowrap">#223345</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Quantity</td>
                            <td class="px-6 py-4 whitespace-nowrap">12</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Price</td>
                            <td class="px-6 py-4 whitespace-nowrap">500</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Total</td>
                            <td class="px-6 py-4 whitespace-nowrap">₱6000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</body>
</html>
