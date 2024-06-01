<?php
    // Check if the id is set in the URL
    // Start a new session or resume the existing one
    if (isset($_SESSION['id'])) {
        // Get the id from the session
        $id = $_SESSION['id'];

        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare the SQL statement
        $query = "SELECT * FROM applicants WHERE id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $applicant = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: /hr/dashboard');
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title>Applicant | 
    <?php 
      echo htmlspecialchars($applicant['last_name']) . ', ';
      echo htmlspecialchars(substr($applicant['first_name'], 0, 1)) . '. ';
      if (!empty($applicant['middle_name'])) {
          echo htmlspecialchars(substr($applicant['middle_name'], 0, 1)) . '.';
      }
    ?>
    </title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
    include 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- MAIN -->
<main id = "mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
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
  <a route="/hr/applicants" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Applicant</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Information</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->
  
<!-- Profile -->
<div class="py-2 px-6 mt-4">
  <div class="flex">
    
    <!-- Employee Picture -->
    <div class="mr-4">
      <img src="<?php echo htmlspecialchars($applicant['image_url']); ?>" alt="Profile Picture" class="w-48 h-48 object-cover">
      <span>
        <div class="ml-2 mb-20 mt-4"> 
          <button route="/hr/applicants/accept=<?php echo $applicant['id']; ?>" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Accept</button>
          <button id="rejectButton" type="button" data-id="<?php echo $applicant['id']; ?>" class="rejectButton  focus:outline-none text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Reject</button>
        </div>    
      </span>
    </div>

      <!-- Reject modal -->
<div id="rejectModal" class="hidden fixed flex top-0 left-0 w-full h-full items-center justify-center bg-black bg-opacity-50">
    <form action="/reject/applicants" method="POST" class="bg-white p-5 rounded-lg text-center">
        <h2 class="mb-4">Are you sure that you want to reject <?php 
                        echo $applicant['first_name'] . ' ';
                        if (!empty($applicant['middle_name'])) {
                            echo substr($applicant['middle_name'], 0, 1) . '. ';
                        }
                        echo $applicant['last_name']; 
                    ?>?</h2>
        <input type="hidden" name="id" id="idToDelete"> <!-- This will hold the ID of the row to delete -->
        <input type="submit" value="Yes" id="confirmReject" class="mr-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
        <input type="button" value="No" id="cancelReject" class="px-4 py-2 bg-gray-300 text-black rounded">
    </form>
</div>

  <!-- Employee Information -->

  <div class="flex flex-col ml-20">
  <h3 class="block mb-2 text-xl font-bold text-gray-700">Basic Applicant Information</h2>
    <div class="mb-4 mt-4">
      <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="firstName">
              First Name
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="firstName"
              id="firstName"
              type="text"
              value="<?php echo htmlspecialchars($applicant['first_name']); ?>"
                                readonly
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="middleName">
              Middle Name
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="middleName"
              id="middleName"
              type="text"
              value="<?php echo htmlspecialchars($applicant['middle_name']); ?>"
                                readonly
            />
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="lastName">
              Last Name
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="lastName"
              id="lastName"
              type="text"
              value="<?php echo htmlspecialchars($applicant['last_name']); ?>"
                                readonly
            />
        </div>
      </div>
    </div>
      <!-- Employee Information 2 -->
  <div class="flex flex-col">
    <div class="mb-4">
      <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="dateofbirth">
              Date of Birth
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="dateofbirth"
              id="dateofbirth"
              type="date"
              value="<?php echo htmlspecialchars($applicant['dateofbirth']); ?>"
                                readonly
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="gender">
              Gender
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            name="gender"
            id="gender"
            value="<?php echo htmlspecialchars($applicant['gender']); ?>"
                                readonly/>
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="nationality">
              Nationality
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="nationality"
              id="nationality"
              type="text"
              value="<?php echo htmlspecialchars($applicant['nationality']); ?>"
                                readonly
            />
        </div>
      </div>
    </div>
    <!-- Employee Information 3-->
    <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="civilstatus">
              Civil Status
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              id="civilstatus"
              name="civilstatus"
              value="<?php echo htmlspecialchars($applicant['civil_status']); ?>"
              readonly/>
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="address">
              Address
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            name="address"
            id="address"
            type="text"
              value="<?php echo htmlspecialchars($applicant['address']); ?>"
                                readonly
          />
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="contactnumber">
              Contact Number
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="contactnumber"
              id="contactnumber"
              type="tel"
              value="<?php echo htmlspecialchars($applicant['contact_no']); ?>"
                                readonly
            />
          </div>
        </div>
      </div>

      <!-- Employee Information 4-->
      <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="email">
              Email
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="email"
              id="email"
              value="<?php echo htmlspecialchars($applicant['email']); ?>"
                                readonly>
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="department">
              Applying for Department
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                        name="department" id="Department"
              value="<?php echo htmlspecialchars($applicant['applyingForDepartment']); ?>"
                         readonly>
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Position">
              Applying for Position
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="position"
              id="Position"
              type="text"
              value="<?php echo htmlspecialchars($applicant['applyingForPosition']); ?>"
                                readonly
            />  
          </div>
        </div>
      </div>

    <!-- Employee Information 5 : EMPLOYMENT INFO-->
    <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="dateofhire">
              Date Applied
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            name="dateofhire"
            id="dateofhire"
            type="text"
              value="<?php echo htmlspecialchars($applicant['apply_date']); ?>"
                                readonly
          />
          </div>
        </div>
      </div>
</main>

<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>


<script>
// Sidebar active/inactive 
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });

// Reject Modal
var rejectButton = document.getElementById('rejectButton');
var rejectModal = document.getElementById('rejectModal');
var idToDelete = document.getElementById('idToDelete');
var confirmReject = document.getElementById('confirmReject');

rejectButton.addEventListener('click', function() {
    var id = this.getAttribute('data-id');
    idToDelete.value = id;
    rejectModal.classList.remove('hidden');
});

confirmReject.addEventListener('click', function() {
    this.form.submit();
});

var cancelReject = document.getElementById('cancelReject');

cancelReject.addEventListener('click', function() {
  rejectModal.classList.add('hidden');
});
</script>
</body>
</html> 