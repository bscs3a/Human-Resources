<?php
    // Check if the id is set in the URL
    // Start a new session or resume the existing one
    if (isset($_SESSION['id'])) {
        // Get the id from the session
        $id = $_SESSION['id'];

        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare the SQL statement
        $query = "SELECT payroll.*, employees.*, salary_info.* FROM payroll 
        JOIN employees ON payroll.employees_id = employees.id
        JOIN salary_info ON payroll.salary_id = salary_info.id AND salary_info.id = employees.id
        WHERE payroll.id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $payroll = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: /hr/payroll');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title><?php echo htmlspecialchars($payroll['status']) ?> | 
    <?php 
      echo htmlspecialchars($payroll['last_name']) . ', ';
      echo htmlspecialchars(substr($payroll['first_name'], 0, 1)) . '. ';
      if (!empty($payroll['middle_name'])) {
          echo htmlspecialchars(substr($payroll['middle_name'], 0, 1)) . '.';
      }
    ?></title>
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
  <!-- <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600 sidebar-toggle">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a route="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a route="/hr/leave-requests" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Payslip</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">View Details</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div> -->
  <!-- End Top Bar -->
  <div id="printableArea" class="py-2 ml-4 mr-4 flex justify-center items-center">
    <div class="relative  sm:rounded-lg h-min flex-col justify-center items-center">
  <div class="flex items-center pb-4 border-b border-b-white ml-16 mt-4">
    <div class="w-20 h-20 mt-6 rounded bg-cover bg-[url('../public/finance/img/logo_reports.png')]">
    </div>
    <span  class="cursor-pointer text-5xl font-russo text-black mt-8 ml-3">BSCS 3A Hardware</span>
  </div>
  <hr>
  <div class="flex ml-20 mt-8 font-bold text-xl ">
    <h1>Payslip Details</h1>
   </div>
   <div class="flex ml-20">
    <!-- Column 1-->
  <div class="flex flex-col mb-8">
  <div class="mt-12">
    <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="employee">
            Employee Name
            </label>
            <p
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="employee"
            type="text"
            placeholder="employee"><?php 
                        echo $payroll['first_name'] . ' ';
                        if (!empty($payroll['middle_name'])) {
                            echo substr($payroll['middle_name'], 0, 1) . '. ';
                        }
                        echo $payroll['last_name']; 
                    ?></p>
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Position">
            Position
            </label>
            <p
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="Position"
            type="text"
            placeholder="Position"><?php echo htmlspecialchars($payroll['position']); ?></p>
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="monthly_salary">
            Monthly Salary
            </label>
            <p
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="monthly_salary"
            type="text"
            placeholder="monthly_salary">₱<?php echo htmlspecialchars($payroll['monthly_salary']); ?></p>
        </div>
  </div>
  </div>
  <!-- Column 2 -->
  <div class="mt-8">
    <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="month">
            Month
            </label>
            <p
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="month"
            type="text"
            placeholder="month"><?php echo htmlspecialchars($payroll['month']); ?></p>
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="total_salary">
            Total Salary Paid
            </label>
            <p
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="total_salary"
            type="text"
            placeholder="total_salary">₱<?php echo htmlspecialchars($payroll['total_salary']); ?></p>
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="pay_date">
            Pay Date
            </label>
            <p
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="pay_date"
            type="text"
            placeholder="pay_date"><?php echo date('F d, Y', strtotime($payroll['pay_date'])); ?></p>
        </div>
  </div>
  </div>
  </div>
  </div>
</div>
  </div>
<hr>
<div>
<div class="mr-8 mt-8 flex justify-center items-center">
    <p>Would you like to print
        <?php 
            echo "<strong>" . $payroll['first_name'] . ' ';
            if (!empty($payroll['middle_name'])) {
                echo substr($payroll['middle_name'], 0, 1) . '. ';
            }
            echo $payroll['last_name'] . "</strong>"; 
        ?>'s payslip as PDF?</p>
  <span class="ml-4 mt-2">
    <button type="button" id="print" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Print</button>
    <script>
        document.getElementById('print').addEventListener('click', function() {
            var pdf = new jsPDF('p', 'mm', 'a4');
            var printableArea = document.getElementById('printableArea');
            html2canvas(printableArea).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var imgWidth = 210; 
                var pageHeight = 295;  
                var imgHeight = canvas.height * imgWidth / canvas.width;
                var heightLeft = imgHeight;
                var position = 0;

                pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }
                pdf.save('payslip.pdf');
            });
        });
    </script>
  </span>
</div>
</div>
  <!-- </div>
  </div> -->
</main>
<!-- End Main Bar -->
<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
  // Sidebar Toggle
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });
</script>
</body>
</html> 