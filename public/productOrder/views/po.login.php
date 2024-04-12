<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./../src/tailwind.css" rel="stylesheet">

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

        <!-- user info form -->
        <form class="mt-3 w-72 mx-auto">
          <div class="mb-5">
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Email</label
            >
            <input
              type="email"
              id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="user@gmail.com"
              required
            />
          </div>
          <div class="mb-5">
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Password</label
            >
            <input
              type="password"
              id="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required
            />
          </div>

          <button onclick="location.href='/Master/adm/dashboard'"
            type="submit"
            class="text-white bg-[#262261] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Login
          </button>
        </form>
      </div>
    </div>

    <!-- temp script for the login form needeed to be fill out before going to the menu -->
    <script>
      document.getElementById("temp-login").addEventListener("submit", function (event) {
      event.preventDefault();

      // Get the values from the form
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      // Check if both email and password are filled
      if (email.trim() !== "" && password.trim() !== "") {
        // Clear the input fields
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";

        // Redirect to the menu page
        window.location.href = "/Master/adm/dashboard";
      }
    });
    </script>
    <script  src="./../src/route.js"></script>
</body>

</html>