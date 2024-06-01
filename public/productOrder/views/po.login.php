
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./../src/tailwind.css" rel="stylesheet">
</head>
<body>
  <!-- temp login -->
  <div id="temp-login" class="flex justify-center items-center h-screens">
    <!-- left panel -->
    <div class="flex flex-col h-screen w-full bg-[#262261] justify-center items-center">
      <div class="flex flex-col text-white items-center">
        <p class="text-7xl font-sans font-bold">BSCS 3A</p>
        <p class="text-sm mt-3">A Web Application</p>
        <p class="text-sm">for Hardware Store Management</p>
      </div>
    </div>

    <!-- right panel -->
    <div class="lg:p-36 md:p-52 sm:20 p-20 w-full lg:w-1/2 mx-32">
      <p class="text-6xl font-sans font-bold text-center">Login</p>
      <p class="mt-4 pb-5 text-sm text-gray-400 text-center">Welcome Back! Please enter your details</p>
    
      <!-- user info form -->
      <form action="/login/user" method="POST">
        <div class="mb-5">
          <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
          <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <button type="submit" class="text-white bg-[#262261] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
      </form>
    </div>
  </div>

 
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>

</html>
