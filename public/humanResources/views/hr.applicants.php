<?php
  $db = Database::getInstance();
  $conn = $db->connect();

  $search = $_POST['search'] ?? '';
  $query = "SELECT * FROM applicants";
  $params = [];

  if (!empty($search)) {
      $query .= " WHERE first_name = :search OR last_name = :search OR applyingForPosition = :search OR applyingForDepartment = :search OR id = :search;";
      $params[':search'] = $search;
  }

  $stmt = $conn->prepare($query);
  $stmt->execute($params);
  $applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $stmt = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Applicants</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
    include 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- Start Main Bar -->
<main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
  <!-- Top Bar -->
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600 sidebar-toggle">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a route="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Applicants</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->

<!-- applicants -->
  
<div class="flex flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">All Applicants</h3>
    <form action="/hr/applicants" method="POST" class="mt-6 ml-auto mr-4 flex">
      <input type="search" id="search" name="search" placeholder="Search" class="w-40 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
      <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600"><i class="ri-search-line"></i></button>
    </form>
</div> 
  
<?php 
  if (empty($applicants)) {
      require_once 'inc/noResult.php';
  } 
  else {
      require_once 'inc/applicants.table.php';
  } 
?>

  <!-- Reject modal -->
<div id="rejectModal" class="hidden fixed flex top-0 left-0 w-full h-full items-center justify-center bg-black bg-opacity-50">
    <form action="/master/reject/applicants" method="POST" class="bg-white p-5 rounded-lg text-center">
        <h2 class="mb-4">Reject this applicant?</h2>
        <input type="hidden" name="id" id="idToDelete"> <!-- This will hold the ID of the row to delete -->
        <input type="submit" value="Yes" id="confirmReject" class="mr-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
        <input type="button" value="No" id="cancelReject" class="px-4 py-2 bg-gray-300 text-black rounded">
    </form>
</div>

</main>
<!-- End Main Bar -->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
<script>
  document.querySelectorAll('.rejectButton').forEach(function(button) {
    button.addEventListener('click', function() {
        var id = this.getAttribute('data-id');
        document.getElementById('idToDelete').value = id;
        document.getElementById('rejectModal').classList.remove('hidden');
    });
  });

  document.getElementById('cancelReject').addEventListener('click', function() {
      document.getElementById('rejectModal').classList.add('hidden');
  });

  document.getElementById('confirmReject').addEventListener('click', function() {
    document.getElementById('rejectModal').submit();
  });
</script>
</body>
</html> 