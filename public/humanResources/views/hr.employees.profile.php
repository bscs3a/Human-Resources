<?php
    // Check if the id is set in the URL
    // Start a new session or resume the existing one
    if (isset($_SESSION['id'])) {
        // Get the id from the session
        $id = $_SESSION['id'];

        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare the SQL statement
        $query = "SELECT employees.*, employment_info.*, salary_info.*, tax_info.*, benefit_info.*, account_info.* FROM employees
        LEFT JOIN employment_info ON employment_info.employees_id = employees.id
        LEFT JOIN salary_info ON salary_info.employees_id = employees.id
        LEFT JOIN tax_info ON tax_info.salary_id = salary_info.id
        LEFT JOIN benefit_info ON benefit_info.salary_id = salary_info.id
        LEFT JOIN account_info ON account_info.employees_id = employees.id
        WHERE employees.id = :id AND salary_info.id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $employees = $stmt->fetch(PDO::FETCH_ASSOC);
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
  <title>Employee | 
    <?php 
      echo htmlspecialchars($employees['last_name']) . ', ';
      echo htmlspecialchars(substr($employees['first_name'], 0, 1)) . '. ';
      if (!empty($employees['middle_name'])) {
          echo htmlspecialchars(substr($employees['middle_name'], 0, 1)) . '.';
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
  <a route="/hr/employees/page=1" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Employees</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Information</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->

  
  <!-- <div class="flex items-center flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">Employee Profile</h3>
  </div> -->
  
<!-- Profile -->
<div class="py-2 px-6 mt-4">
  <div class="flex">
    
    <!-- Employee Picture -->
    <div class="mr-4">
      <img src="<?php echo htmlspecialchars($employees['image_url']); ?>" alt="Profile Picture" class="w-48 h-48 object-cover">
      <span>
        <div class="ml-2 mb-20 mt-4"> 
          <button route="/hr/employees/update=<?php echo htmlspecialchars($employees['id']); ?>" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>
          <button id="deleteButton" type="button" data-id="<?php echo $employees['id']; ?>" class="deleteButton focus:outline-none text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Delete</button>
        </div>    
      </span>
    </div>

<!-- Delete modal -->
<div id="deleteModal" class="hidden fixed flex top-0 left-0 w-full h-full items-center justify-center bg-black bg-opacity-50">
  <form action="/delete/employees" method="POST" class="bg-white p-5 rounded-lg text-center">
      <h2 class="mb-4">Are you sure that you want to delete <?php 
                        echo $employees['first_name'] . ' ';
                        if (!empty($employees['middle_name'])) {
                            echo substr($employees['middle_name'], 0, 1) . '. ';
                        }
                        echo $employees['last_name']; 
                    ?>?</h2>
      <h3 class="mb-4 text-sm text-red-600">Note: Once deleted, it cannot be undone.</h3>
      <input type="hidden" name="id" id="idToDelete"> <!-- This will hold the ID of the row to delete -->
      <input type="submit" value="Yes" id="confirmDelete" class="mr-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
      <input type="button" value="No" id="cancelDelete" class="px-4 py-2 bg-gray-300 text-black rounded">
  </form>
</div>

  <!-- Employee Information -->

  <div class="flex flex-col ml-20">
  <h3 class="block mb-2 text-xl font-bold text-gray-700">Basic Employee Information</h2>
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
              value="<?php echo htmlspecialchars($employees['first_name']); ?>"
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
              value="<?php echo htmlspecialchars($employees['middle_name']); ?>"
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
              value="<?php echo htmlspecialchars($employees['last_name']); ?>"
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
              value="<?php echo htmlspecialchars($employees['dateofbirth']); ?>"
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
            value="<?php echo htmlspecialchars($employees['gender']); ?>"
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
              value="<?php echo htmlspecialchars($employees['nationality']); ?>"
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
              value="<?php echo htmlspecialchars($employees['civil_status']); ?>"
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
              value="<?php echo htmlspecialchars($employees['address']); ?>"
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
              value="<?php echo htmlspecialchars($employees['contact_no']); ?>"
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
              value="<?php echo htmlspecialchars($employees['email']); ?>"
                                readonly>
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="department">
              Department
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                        name="department" id="Department"
              value="<?php echo htmlspecialchars($employees['department']); ?>"
                         readonly>
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Position">
              Position
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="position"
              id="Position"
              type="text"
              value="<?php echo htmlspecialchars($employees['position']); ?>"
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
              Date of Hire
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            name="dateofhire"
            id="dateofhire"
            type="text"
              value="<?php echo htmlspecialchars($employees['dateofhire']); ?>"
                                readonly
          />
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="startdate">
              Start of Employment
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            name="startdate"
            id="startdate"
            type="text"
              value="<?php echo htmlspecialchars($employees['startdate']); ?>"
                                readonly
          />
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="enddate">
              End of Employment
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="enddate"
              id="enddate"
              type="text"
              value="<?php echo htmlspecialchars($employees['enddate']); ?>"
                                readonly
            />
          </div>
        </div>
      </div>

      
      <!-- Taxpayer Information -->
    <div>
      <h2 class="block mb-2 mt-8 text-base font-bold text-gray-700">Taxpayer Information</h2>
          <!-- TAXPAYER INFO: COLUMN 1 -->
      <div class="flex flex-col">
        <div class="mb-4 mt-4">
          <div class="flex">
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="tinnumber">
                TIN Number
              </label>
              <input  
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                name="tinNumber"
                id="tinnumber"
                type="text"
                placeholder="TIN Number"
                pattern="[0-9]{9}"  
                title="Please enter a 9-digit TIN number"
                value="<?php echo htmlspecialchars($employees['tin_number']); ?>"
                readonly
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="sssnumber">
                SSS Number
              </label>
              <input  
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                name="sssNumber"
                id="sssnumber"
                type="text"
                placeholder="SSS Number"
                pattern="[0-9]{10}"
                title="Please enter a 10-digit SSS number"
                value="<?php echo htmlspecialchars($employees['sss_number']); ?>"
                readonly
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="philhealthnumber">
                PhilHealth Number
              </label>
              <input  
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                name="philhealthNumber"
                id="philhealthnumber"
                type="text"
                placeholder="PhilHealth Number"
                pattern="[0-9]{12}"
                title="Please enter a 12-digit PhilHealth number"
                value="<?php echo htmlspecialchars($employees['philhealth_number']); ?>"
                readonly
              />
            </div>
          </div>
        </div>
        <div>
          <!-- TAXPAYER INFO: COLUMN 2 -->
          <div class="flex flex-col">
            <div class="mb-4">
              <div class="flex">
                <div class="mr-2">
                  <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="pagibignumber">
                    Pag-IBIG Number
                  </label>
                  <input  
                    class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                    name="pagibigNumber"
                    id="pagibignumber"
                    type="text"
                    placeholder="Pag-IBIG Number"
                    pattern="[0-9]{12}"   
                    title="Please enter a 12-digit Pag-IBIG number"
                    value="<?php echo htmlspecialchars($employees['pagibig_number']); ?>"
                    readonly
                  />
                </div>
              </div>
            </div>

                  <!-- Salary Information and Tax Information -->
            <div>
              <h2 class="block mb-2 mt-8 text-base font-bold text-gray-700">Salary and Tax Information</h2>
              <div class="flex flex-col">
                <div class="mb-4 mt-4">
                  <div class="flex">
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="monthlysalary">
                          Monthly Salary
                        </label>
                        <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="monthlysalary"
                          id="monthlysalary"
                          type="text"
                          value="<?php echo htmlspecialchars($employees['monthly_salary']); ?>"
                                readonly
                          
                        />
                    </div>
                    <!-- TAX INFO -->
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                          Income Tax
                        </label>
                        <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="incometax"
                          id="incometax"
                          type="text"
              value="<?php echo htmlspecialchars($employees['income_tax']); ?>"
                          readonly
                        />
                    </div>
                    <div>
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="withholdingtax">
                          Withholding Tax
                        </label>
                        <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="withholdingtax"
                          id="withholdingtax"
                          type="number"
              value="<?php echo htmlspecialchars($employees['withholding_tax']); ?>"
                          readonly
                        />
                    </div>
                  </div>
                </div>
                <div>
                  <!-- BENEFIT INFO -->
                  <div class="flex flex-col">
                    <div class="mb-4">
                      <div class="flex">
                        <div class="mr-2">
                            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="sss">
                              SSS
                            </label>
                            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                              name="sss"
                              id="sss"
                              type="text"
              value="<?php echo htmlspecialchars($employees['sss_fund']); ?>"
                              readonly
                            />
                        </div>
                        <div class="mr-2">
                            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="pagibig">
                              Pag-IBIG Fund
                            </label>
                            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                              name="pagibig"
                              id="pagibig"
                              type="text"
              value="<?php echo htmlspecialchars($employees['pagibig_fund']); ?>"
                              readonly
                            />
                        </div>
                        <div>
                            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="philhealth">
                              Philhealth
                            </label>
                            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                              name="philhealth"
                              id="philhealth"
                              type="text"
              value="<?php echo htmlspecialchars($employees['philhealth']); ?>"
                              readonly
                            />
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col">
                      <div class="mb-4">
                        <div class="flex">
                          <div class="mr-2">
                              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="thirteenthmonth">
                                13th Month Pay
                              </label>
                              <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                                name="thirteenthmonth"
                                id="thirteenthmonth"
                                type="number"
              value="<?php echo htmlspecialchars($employees['thirteenth_month']); ?>"
                                readonly
                              />
                          </div>
                          <div class="mr-2">
                              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="totalsalary">
                                Total Salary (with Tax reductions)
                              </label>
                              <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                                name="totalsalary"
                                id="totalsalary"
                                type="number"
              value="<?php echo htmlspecialchars($employees['total_salary']); ?>"
                                readonly
                              />
                          </div>
                      </div>

                            <!-- Account Information -->
            <div>
              <h2 class="block mb-2 mt-8 text-base font-bold text-gray-700">Account Information</h2>
              <div class="flex flex-col">
                <div class="mb-4 mt-4">
                  <div class="flex">
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="username">
                          Username
                        </label>
                        <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="username"
                          id="username"
                          type="text"
              value="<?php echo htmlspecialchars($employees['username']); ?>"
                                readonly
                        />
                    </div>
                    <!-- TAX INFO -->
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                          Password
                        </label>
                        <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="password"
                          id="password"
                          type="password"
              value="<?php echo htmlspecialchars($employees['password']); ?>"
                                readonly
                        />
                        <input type="checkbox" id="togglePassword"> Show Password
                    </div>
                  </div>
                </div>
              </div>
                      <div>
                      </div>
    </div>
  </div>
</div> 
</main>

<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>

<!-- Sidebar active/inactive -->
<script>
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });

  document.getElementById('togglePassword').addEventListener('change', function () {
    const passwordInput = document.getElementById('password');
    if (this.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
  });

// Get the delete button, delete modal, hidden input field, and "Yes" button
var deleteButton = document.getElementById('deleteButton');
var deleteModal = document.getElementById('deleteModal');
var idToDelete = document.getElementById('idToDelete');
var confirmDelete = document.getElementById('confirmDelete');

// When the delete button is clicked, show the delete modal and set the id of the employee to be deleted
deleteButton.addEventListener('click', function() {
    var id = this.getAttribute('data-id');
    idToDelete.value = id;
    deleteModal.classList.remove('hidden');
});

// When the "Yes" button is clicked, submit the form
confirmDelete.addEventListener('click', function() {
    this.form.submit();
});

// Get the "No" button
var cancelDelete = document.getElementById('cancelDelete');

// When the "No" button is clicked, hide the delete modal
cancelDelete.addEventListener('click', function() {
    deleteModal.classList.add('hidden');
});
</script>
</body>
</html> 