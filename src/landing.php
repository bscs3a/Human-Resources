<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="src/tailwind.css" rel="stylesheet">
  <title>Welcome!</title>

</head>

<body>
    <!-- temp login -->
    <div id="temp-login" class="flex flex-row h-screen w-screen">
      <!-- left panel -->
      <div
        class="flex flex-col h-screen w-1/2 bg-[#262261] justify-center items-center"
      >
        <div class="flex flex-col text-white items-center">
          <p class="text-7xl font-sans font-bold">BSCS 3A</p>
          <p class="text-sm mt-3">A Web Application</p>
          <p class="text-sm">for Hardware Store Mangement</p>
        </div>
      </div>

      <!-- right panel -->
      <div class="flex flex-col h-screen w-1/2 justify-center items-center">
        <p class="text-6xl font-sans font-bold">Login</p>
        <p class="mt-3 text-sm text-gray-400">
          Welcome Back! Please enter your details
        </p>
        
        <?php 
        if(isset($_GET['error'])){
        ?>
        <p class="mt-3 text-sm text-red-400 ">
            Invalid Credentials
        </p>
        <?php
        } ?>
        <!-- user info form -->
        <form class="mt-3 w-72 mx-auto" method="post" action="/login">
          <div class="mb-5">
            <label
              for="username"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Username</label
            >
            <input
              type="text"
              id="username"
              name = "username"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              placeholder="username"
              required
            />
          </div>
          <div class="mb-5">
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Password</label
            >
            <input
              type="password"
              id="password"
              name="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
          </div>

          <button
            type="submit"
            class="text-white bg-[#262261] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center"
          >
            Login
          </button>
        </form>
      </div>
    </div>

    
    <script  src="./src/route.js"></script>
    <script  src="./src/form.js"></script>
</body>

</html>