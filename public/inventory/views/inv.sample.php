<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Inventory</title>
</head>

<body class="bg-slate-200">
  <div class="flex flex-col items-center justify-center min-h-screen bg-red-700">
  <button onclick="location.href='/Master/inv/main'"
      class="px-6 py-3 text-white bg-blue-500 rounded hover:bg-blue-700">Inventory</button>
    <button onclick="location.href='/Master/inv/product_order'"
      class="px-6 py-3 text-white bg-blue-500 rounded hover:bg-blue-700">Product Order</button>
  </div>
  <script src="./../src/route.js"></script>
        <script src="./../src/form.js"></script>
</body>

</html>