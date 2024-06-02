<?php
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

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
      <div class="flex items-center justify-between h-16 bg-gray-200 shadow-md px-4">
        <div class="flex items-center gap-4">
          <button id="toggleSidebar" class="text-gray-900 focus:outline-none focus:text-gray-700">
            <i class="ri-menu-line"></i>
          </button>
          <label class="text-black font-medium">Dashboard</label>
        </div>

        <!-- dropdown -->
        <div x-data="{ dropdownOpen: false }" class="relative my-32">
          <button @click="dropdownOpen = !dropdownOpen"
            class="relative z-10 border border-gray-400 rounded-md bg-gray-100 p-2 focus:outline-none">
            <div class="flex items-center gap-4">
            <a class="flex-none text-sm dark:text-white" href="#"><?php echo $_SESSION['user']['username']; ?></a>
              <i class="ri-arrow-down-s-line"></i>
            </div>
          </button>


          <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

          <form id="logout-form" action="/logout/user" method="POST">
            <div x-show="dropdownOpen"
              class="absolute right-0 mt-2 py-2 w-40 bg-gray-100 border border-gray-200 rounded-md shadow-lg z-20">
              <button type="submit" class="block px-8 py-1 text-sm capitalize text-gray-700">Log out</button>
            </div>
          </form>
        </div>

      </div>

      <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
          var sidebar = document.getElementById('sidebar');
          sidebar.classList.toggle('hidden', !sidebar.classList.contains('hidden'));
        });
      </script>

      <!-- Main Content -->
      <div class="px-10 my-8">
        <!-- Table -->
        <?php
        // Establish database connection
        $db = Database::getInstance();
        $conn = $db->connect();

        try {
          // Prepare SQL statement to fetch data from the poauditlogs table
          $stmt = $conn->query("SELECT * FROM poauditlogs ORDER BY poauditlogs.audit_ID DESC");
          $audit_logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        ?>

        <!-- Table --> <!-- either h-screen or h-96 -->
        <div class="max-w-full h-96 rounded-lg border border-gray-400 overflow-auto overflow-x-auto hide-scrollbar">
          <table class="min-w-full text-left bg-white">
            <thead class=" sticky top-0 bg-gray-200 border-b border-gray-400">
              <tr>
                <th class="px-4 py-2 font-semibold">Date</th>
                <th class="px-4 py-2 font-semibold">User</th>
                <th class="px-4 py-2 font-semibold">Time In</th>
                <th class="px-4 py-2 font-semibold">Time Out</th>
                <th class="px-4 py-2 font-semibold">Action</th>
              </tr>
            </thead>

            <tbody>
              <?php if (!empty($audit_logs)): ?>
                <?php foreach ($audit_logs as $log): ?>
                  <tr>
                    <td class="px-4 py-4"><?= $log['date'] ?></td>
                    <td class="px-4 py-4"><?= $log['user'] ?></td>
                    <td class="px-4 py-4"><?= $log['time_in'] ?></td>
                    <td class="px-4 py-4"><?= $log['time_out'] ?></td>
                    <td class="px-4 py-4"><?= $log['action'] ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="px-4 py-4 text-center">No data available</td>
                </tr>
              <?php endif; ?>
            </tbody>

         
          </table>
        </div>
      </div>

    </div>

  </div>
  
  <script src="./../src/route.js"></script>
  <script src="./../src/form.js"></script>
</body>

</html>