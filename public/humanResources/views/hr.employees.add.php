<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title>New Employee</title>
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
  <a route="/hr/employees" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Employees</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Add New</a>
   </ul>
   <ul class="ml-auto flex items-center">
  <li class="mr-1">
    <a href="#" class="text-[#151313] hover:text-gray-600 text-sm font-medium">Sample User</a>
  </li>
  <li class="mr-1">
    <button type="button" class="w-8 h-8 rounded justify-center hover:bg-gray-300"><i class="ri-arrow-down-s-line"></i></button> 
  </li>
   </ul>
  </div>
  <!-- End Top Bar -->

  
  <div class="flex items-center flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">Employee Information</h3>
  </div>
  
<!-- Profile -->
<div class="py-2 px-6 mt-4">
<form action= "/hr/employees/add" method="POST" enctype="multipart/form-data">
  <div class="flex">
    
    <!-- IMAGE -->
    <div class="mr-4">
      <img src="/master/public/humanResources/img/noPhotoAvailable.png" alt="Profile Picture" name="image_url" id="image_url" class="w-48 h-48 object-cover">
      <input type="file" id="fileInput" name="image_url" accept="image/*" style="display: none;">
      <span>
          <div class="ml-1 mb-20 mt-4"> 
              <button type="button" id="uploadButton" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-yellow-600 font-medium rounded-lg text-sm px-5 py-2.5  mb-2">Upload</button>
              <button type="button" id="removeButton" class="focus:outline-none text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Remove</button>
          </div>    
      </span>
    </div>

  <!-- Employee Information -->
  <div class="flex flex-col ml-20">
    <div class="mb-4">
      <div class="flex">
        <div class="mr-2">
          <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="firstName">
            First Name
          </label>
          <input
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="firstName"
            id="firstName"
            type="text"
            placeholder="First Name"
          />
        </div>

    <!--Required Fields modal -->
    <div id="requiredFieldsModal" class="hidden fixed flex top-0 left-0 w-full h-full items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-5 rounded-lg text-center">
        <h2 class="mb-4">Please fill in all required fields.</h2>
        <button id="confirmFill" type="button" class="mr-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded">OK</button>
    </div>
    </div>

      <script>
          document.addEventListener('DOMContentLoaded', () => {
              const form = document.querySelector('form');
              const inputs = form.querySelectorAll('input');
              const requiredFieldsModal = document.querySelector('#requiredFieldsModal');
              const confirmFill = document.querySelector('#confirmFill');

              form.addEventListener('submit', (event) => {
                  console.log('Form submitted'); // Add this line to check if the code is being triggered

                  let hasEmptyField = false;

                  inputs.forEach((input) => {
                      if (input.value.trim() === '' && input.name !== 'middleName' && input.name !== 'email' && input.name !== 'contactnumber' && input.name !== 'enddate' && input.name !== 'image_url') {
                          hasEmptyField = true;
                      }
                  });

                  if (hasEmptyField) {
                      event.preventDefault();
                      requiredFieldsModal.classList.remove('hidden');
                  }
              });

              confirmFill.addEventListener('click', () => {
                  requiredFieldsModal.classList.add('hidden');
              });
          });
      </script>

        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="middleName">
              Middle Name
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="middleName"
              id="middleName"
              type="text"
              placeholder="Middle Name"
            />
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="lastName">
              Last Name
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="lastName"
              id="lastName"
              type="text"
              placeholder="Last Name"
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
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="dateofbirth"
              id="dateofbirth"
              type="date"
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="gender">
              Gender
            </label>
            <select
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="gender"
            id="gender">
            <option value="">Select Gender</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
          </select>
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="nationality">
              Nationality
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="nationality"
              id="nationality"
              type="text"
              placeholder="Nationality"
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
            <select
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="civilstatus"
              name="civilstatus">
              <option value="">Select Status</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Widowed">Widowed</option>
              <option value="Divorced">Divorced</option>
          </select>
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="address">
              Address
            </label>
            <input  
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="address"
            id="address"
            type="text"
            placeholder="Address"
          />
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="contactnumber">
                Contact Number
            </label>
            <input  
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="contactnumber"
                id="contactnumber"
                type="tel"
                placeholder="Contact Number"
                pattern="09[0-9]{9}"
                title="Please enter a valid 11-digit phone number."
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
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="email"
              id="email"
              placeholder="example@example.com">
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="department">
              Department
            </label>
            <select
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="department" id="Department" placeholder="Department">
                        
                        <option value="">Select Department</option>
                        <option value="Product Order">Product Order</option>
                        <option value="Inventory">Inventory</option>
                        <option value="Delivery">Delivery</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Point of Sales">Point of Sales</option>
                        <option value="Finance">Finance/Accounting</option>
              </select>
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Position">
              Position
            </label>
            <select
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="position" id="Position" placeholder="Position">
                        
                        <option value="">Select Position</option>
              </select>
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
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="dateofhire"
            id="dateofhire"
            type="date"
            placeholder="Date of Hire"
          />
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="startdate">
              Start of Employment
            </label>
            <input  
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="startdate"
            id="startdate"
            type="date"
            placeholder="Start Date"
          />
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="enddate">
              End of Employment
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="enddate"
              id="enddate"
              type="date"
              placeholder="enddate"
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
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="tinNumber"
                id="tinnumber"
                type="text"
                placeholder="TIN Number"
                pattern="[0-9]{9}"  
                title="Please enter a 9-digit TIN number"
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="sssnumber">
                SSS Number
              </label>
              <input  
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="sssNumber"
                id="sssnumber"
                type="text"
                placeholder="SSS Number"
                pattern="[0-9]{10}"
                title="Please enter a 10-digit SSS number"
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="philhealthnumber">
                PhilHealth Number
              </label>
              <input  
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="philhealthNumber"
                id="philhealthnumber"
                type="text"
                placeholder="PhilHealth Number"
                pattern="[0-9]{12}"
                title="Please enter a 12-digit PhilHealth number"
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
                    class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    name="pagibigNumber"
                    id="pagibignumber"
                    type="text"
                    placeholder="Pag-IBIG Number"
                    pattern="[0-9]{12}"   
                    title="Please enter a 12-digit Pag-IBIG number"
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
            placeholder="0.00"
            readonly
            onchange="calculateTax()"
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
              placeholder="0.00"
              readonly
            />
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="withholdingtax">
              Withholding tax
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
              name="withholdingtax"
              id="withholdingtax"
              type="number"
              placeholder="0.00"
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
                  placeholder="0.00"
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
                  placeholder="0.00"
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
                  placeholder="0.00"
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
                    placeholder="0.00"
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
                    placeholder="0.00"
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
              <?php
              $db = Database::getInstance();
              $conn = $db->connect();

              // Query to get the next auto_increment value
              $query = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'bscs3a' AND TABLE_NAME = 'employees'";
              $stmt = $conn->prepare($query);
              $stmt->execute();
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $nextId = $result['AUTO_INCREMENT'];

              $username = 'bscs3a' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

              $pdo = null;
              $stmt = null;
              ?>

              <input
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="username"
                id="username"
                type="text"
                placeholder="Username"
                value="<?php echo $username; ?>"
                readonly
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                Password
              </label>
              <input
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="password"
                id="password"
                type="password"
                placeholder="Password"
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                Confirm Password
              </label>
              <input
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="confirmPassword"
                id="confirmPassword"
                type="password"
                placeholder="Confirm Password"
              />
              <div class="text-sm mt-2 ml-40">
              <input type="checkbox" id="togglePassword"> Show Password
              </div>
            </div>
            </div>
            <!-- PASSWORD ERRORS -->
          <div class="flex">
            <div id="passwordError" class="text-xs text-red-500">
            </div>
          </div>
          <div class="flex">
            <div id="confirmPasswordError" class="text-xs text-red-500">
            </div>
          </div>
          </div>
        </div>
      </div>
      <div>
      </div>
      <div class="flex flex-row mt-8 justify-center">
        <button id="saveButton" type="submit" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Save</button>
        <button route="/hr/employees" type="button" class="focus:outline-none text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div> 
</main>

<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>

<script>
  // Sidebar Toggle
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });

  // DEPARTMENT AND POSITION DROPDOWN
  document.getElementById('Department').addEventListener('change', function() {
  var positionSelect = document.getElementById('Position');
  var department = this.value;

  // Clear the position select
  positionSelect.innerHTML = '<option value="">Select Position</option>';

  // Define the positions for each department
  var positions = {

      'Product Order': [
        'Order Processor',
        'Order Entry Clerk',
        'Quality Control Inspector',
        'Logistics Coordinator',
        'Procurement Specialist'
      ],

      'Inventory': [
        'Inventory Manager/Controller',
        'Inventory Planner',
        'Stock Controller',
        'Purchasing Manager',
        'Warehouse Manager',
        'Materials Manager'
      ],

      'Delivery': [
        'Delivery Driver',
        'Courier',
        'Warehouse Associate',
        'Customer Service Representative',
        'Parcel Sorter'
      ],

      'Human Resources': [
        'Recruiter',
        'HR Manager/Director',
        'Compensation and Benefits Specialist',
        'HR Coordinator',
        'HR Legal Compliance Specialist'
      ],

      'Point of Sales': [
        'Retail Associate/Cashier',
        'Inventory Control Specialist',
        'Sales Associate',
        'Customer Service Representative',
        'Business Analyst',
        'E-commerce Coordinator'
      ],

      'Finance': [
        'Accountant',
        'Bookkeeper',
        'Financial Analyst',
        'Tax Accountant',
        'Cost Accountant',
        'Credit Analyst',
        'Payroll Specialist'
      ]
  };
      
    // Define the salaries for each position
    var salaries = {
      'Order Processor': 18000,
      'Order Entry Clerk': 15000,
      'Quality Control Inspector': 20000,
      'Logistics Coordinator': 30000,
      'Procurement Specialist': 40000,
      'Inventory Manager/Controller': 60000,
      'Inventory Planner': 35000,
      'Stock Controller': 25000,
      'Purchasing Manager': 70000,
      'Warehouse Manager': 55000,
      'Materials Manager': 55000,
      'Delivery Driver': 15000,
      'Courier': 18000,
      'Warehouse Associate': 18000,
      'Customer Service Representative': 20000,
      'Parcel Sorter': 15000,
      'Recruiter': 30000,
      'HR Manager/Director': 80000,
      'Compensation and Benefits Specialist': 45000,
      'HR Coordinator': 25000,
      'HR Legal Compliance Specialist': 35000,
      'Retail Associate/Cashier': 12000,
      'Inventory Control Specialist': 25000,
      'Sales Associate': 18000,
      'Business Analyst': 45000,
      'E-commerce Coordinator': 35000,
      'Accountant': 35000,
      'Bookkeeper': 20000,
      'Financial Analyst': 45000,
      'Tax Accountant': 45000,
      'Cost Accountant': 45000,
      'Credit Analyst': 35000,
      'Payroll Specialist': 30000
    };

  // Add an event listener to the position select field
  document.getElementById('Position').addEventListener('change', function() {
  var salaryInput = document.getElementById('monthlysalary');
  var position = this.value;

  // Get the salary for the selected position
  var salary = salaries[position];

  // Update the salary input field
  if (salary) {
    salaryInput.value = salary.toFixed(2);
  } else {
    salaryInput.value = '';
  }

  // Manually trigger the calculateTax function
  calculateTax();
});
      // Get the positions for the selected department
      var departmentPositions = positions[department];

      // Add the positions to the position select
      if (departmentPositions) {
          departmentPositions.forEach(function(position) {
              var option = document.createElement('option');
              option.value = position;
              option.text = position;
              positionSelect.add(option);
          });
      }
  });

  // DATE OF HIRE AND START OF EMPLOYMENT VALIDATION
  document.getElementById('dateofhire').addEventListener('change', validateDates);
  document.getElementById('startdate').addEventListener('change', validateDates);

  function validateDates() {
      var dateOfHire = new Date(document.getElementById('dateofhire').value);
      var startDate = new Date(document.getElementById('startdate').value);

      if (startDate < dateOfHire) {
          alert('Start of employment should be on or after the date of hire.');
      }
  }

  // Show/Hide Password
  document.getElementById('togglePassword').addEventListener('change', function () {
    document.getElementById('password').type = this.checked ? 'text' : 'password';
    document.getElementById('confirmPassword').type = this.checked ? 'text' : 'password';
  });

  // CHECKING IF PASSWORDS MATCH AND THE PASSWORD IS STRONG
  var passwordField = document.getElementById('password');
  var confirmPasswordField = document.getElementById('confirmPassword');

  passwordField.addEventListener('input', validatePassword);
  confirmPasswordField.addEventListener('input', validatePassword);

  function validatePassword() {
    var password = passwordField.value;
    var confirmPassword = confirmPasswordField.value;

    // Check if passwords match
    if (password !== confirmPassword) {
      document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
      return;
    } else {
      document.getElementById('confirmPasswordError').textContent = '';
    }

    // Check if password meets requirements
    var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!regex.test(password)) {
      document.getElementById('passwordError').textContent = 'Password must contain at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long';
    } else {
      document.getElementById('passwordError').textContent = '';
    }
  }

  document.getElementById('saveButton').addEventListener('click', function (event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    // Check if passwords match
    if (password !== confirmPassword) {
      document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
      event.preventDefault();
      return;
    } else {
      document.getElementById('confirmPasswordError').textContent = '';
    }

    // Check if password meets requirements
    var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!regex.test(password)) {
      document.getElementById('passwordError').textContent = 'Password must contain at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long';
      event.preventDefault();
    } else {
      document.getElementById('passwordError').textContent = '';
    }
  });

  // Image Upload
  document.getElementById('uploadButton').addEventListener('click', function() {
      document.getElementById('fileInput').click();
  });

  document.getElementById('fileInput').addEventListener('change', function() {
      var file = this.files[0];
      var reader = new FileReader();
      reader.onloadend = function() {
          document.getElementById('image_url').src = reader.result;
      }
      if (file) {
          reader.readAsDataURL(file);
      } else {
          document.getElementById('image_url').src = "";
      }
  });

  document.getElementById('removeButton').addEventListener('click', function() {
      document.getElementById('image_url').src = '/master/public/humanResources/img/noPhotoAvailable.png';
      document.getElementById('fileInput').value = ""; // Clear the file input
  });

  // Form submission
  document.getElementById('form').addEventListener('submit', function(event) {
      event.preventDefault();

      var formData = new FormData(this);
      var xhr = new XMLHttpRequest();

      xhr.open('POST', 'hr/employees/add', true);
      xhr.onload = function() {
          if (xhr.status === 200) {
              alert('File uploaded successfully.');
          } else {
              alert('An error occurred while uploading the file.');
          }
      };
      xhr.send(formData);
  });

// Automatic Tax Calculation for UI
function calculateTax() {
  const monthlySalary = parseFloat(document.getElementById('monthlysalary').value.replace(/[^\d.-]/g, '')); // Retrieve and parse the monthly salary value
  
  if (!isNaN(monthlySalary)) { // Check if the parsed value is a valid number
    // TAX DEDUCTIONS
    // FIX INCOME TAX. THIS IS JUST A TEST
    let incomeTax;
    if (monthlySalary <= 20833.33) {
      incomeTax = 0;
    } else if (monthlySalary <= 33333.33) {
        incomeTax = (monthlySalary - 20833.33) * 0.20;
    } else if (monthlySalary <= 66666.67) {
        incomeTax = 2500 + (monthlySalary - 33333.33) * 0.25;
    } else if (monthlySalary <= 166666.67) {
        incomeTax = 10833.33 + (monthlySalary - 66666.67) * 0.30;
    } else if (monthlySalary <= 666666.67) {
        incomeTax = 40833.33 + (monthlySalary - 166666.67) * 0.32;
    } else {
        incomeTax = 200833.33 + (monthlySalary - 666666.67) * 0.35;
    }
    document.getElementById('incometax').value = incomeTax.toFixed(2);

    let withholdingTax;
    if (monthlySalary <= 20833.33) {
      withholdingTax = 0;
    } else if (monthlySalary <= 33333.33) {
        withholdingTax = 0 + (monthlySalary - 20833.33) * 0.15;
    } else if (monthlySalary <= 66666.67) {
        withholdingTax = 1875 + (monthlySalary - 33333.33) * 0.20;
    } else if (monthlySalary <= 166666.67) {
        withholdingTax = 8541.80 + (monthlySalary - 66666.67) * 0.25;
    } else if (monthlySalary <= 666666.67) {
        withholdingTax = 33541.80 + (monthlySalary - 166666.67) * 0.30;
    } else {
        withholdingTax = 183541.80 + (monthlySalary - 666666.67) * 0.35;
    }
    document.getElementById('withholdingtax').value = withholdingTax.toFixed(2);
    
    // BENEFIT DEDUCTIONS
    const pagibig = 200.00;
    document.getElementById('pagibig').value = pagibig;

    const sss = (monthlySalary * 0.14) * 0.32;
    document.getElementById('sss').value = sss.toFixed(2);
    
    let philhealth;
    if (monthlySalary <= 10000.00) {
        philhealth = 500.00;
    } else if (monthlySalary <= 99999.99) {
        philhealth = 500.00 + (monthlySalary - 10000.00) * 0.05;
    } else {
        philhealth = 5000.00;
    }
    document.getElementById('philhealth').value = philhealth.toFixed(2);

    const thirteenthmonth = monthlySalary;
    document.getElementById('thirteenthmonth').value = thirteenthmonth;

    // TOTAL SALARY
    const totalsalary = monthlySalary - (incomeTax + withholdingTax + pagibig + sss + philhealth);
    document.getElementById('totalsalary').value = totalsalary.toFixed(2);
  } else {
    // If the parsed value is NaN (Not a Number), clear the tax input fields
    document.getElementById('incometax').value = '';
    document.getElementById('withholdingtax').value = '';
    document.getElementById('pagibig').value = '';
    document.getElementById('sss').value = '';
    document.getElementById('philhealth').value = '';
    document.getElementById('thirteenthmonth').value = '';
    document.getElementById('totalsalary').value = '';
  }
}
// Function to update the monthly salary based on the selected position and calculate tax
function updateSalary() {
  var selectedPosition = document.getElementById('Position').value;
  var monthlySalaryInput = document.getElementById('monthlysalary');

  if (salaries[selectedPosition] !== undefined) {
    var salary = salaries[selectedPosition];
    monthlySalaryInput.value = salary.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    console.log("Monthly salary updated:", salary); // Debugging statement
    calculateTax(); // Call the calculateTax function after updating the salary
  } else {
    monthlySalaryInput.value = ''; // If position not found, clear the input
  }
}

</script>
</body>
</html> 