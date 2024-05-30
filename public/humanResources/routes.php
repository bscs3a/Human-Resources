<?php
require_once 'public\finance\functions\otherGroups\salary.php';
$path = './public/humanResources/views';
$basePath = "$path/hr.";
$hr = [
    // Dashboard
    '/hr/dashboard' => $basePath . "dashboard.php",
    // employees
    '/hr/employees' => $basePath . "employees.php",
    '/hr/employees/search' => $basePath . "employees.php",
    '/hr/employees/add' => $basePath . "employees.add.php",
    // departments
    '/hr/employees/departments' => $basePath . "departments.php", // hr.departments.php
    '/hr/departments/product-order' => $basePath . "departments.PO.php", // hr.departments.PO.php
    '/hr/departments/inventory' => $basePath . "departments.inv.php", // hr.departments.inv.php
    '/hr/departments/sales' => $basePath . "departments.POS.php", // hr.departments.POS.php
    '/hr/departments/finance' => $basePath . "departments.fin.php", // hr.departments.fin.php
    '/hr/departments/delivery' => $basePath . "departments.dlv.php", // hr.departments.dlv.php
    '/hr/departments/human-resources' => $basePath . "departments.HR.php", // hr.departments.HR.php
    // applicants
    '/hr/applicants' => $basePath . "applicants.php",
    '/hr/applicants/accept={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "applicants.accept.php";
    },
    // leave requests
    '/hr/leave-requests' => $basePath . "leave-requests.php",
    '/hr/leave-requests/reviewed' => $basePath . "leave-requests.reviewed.php",
    '/hr/leave-requests/file-leave' => $basePath . "leave-requests.file.php",
    //view leave request (approve/deny)
    '/hr/leave-requests/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "leave-requests.pending.php";
    },
    //view leave request (approve/deny)
    '/hr/leave-requests/details={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "leave-requests.details.php";
    },
    '/hr/schedule' => $basePath . "schedule.php",
    '/hr/payroll' => $basePath . "payroll.php",
    //view payslip
    '/hr/payroll/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "payslip.view.php";
    },
    '/hr/generate-payslip' => $basePath . "payslip.generate.php",
    '/hr/dtr' => $basePath . "daily-time-record.php",
    //view employee profile
    '/hr/employees/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "employees.profile.php";
    },
    //update profile
    '/hr/employees/update={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "employees.update.php";
    },
    //view applicant profile
    '/hr/applicants/id={id}' => function($id) use ($basePath) {
        $_SESSION['id'] = $id;
        include $basePath . "applicants.view.php";
    },
    //PAGINATION
    '/hr/employees/page={pageNumber}' => function($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "employees.php";
    },
    '/hr/departments/product-order/page={pageNumber}' => function($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "departments.PO.php";
    },
    '/hr/departments/human-resources/page={pageNumber}' => function($pageNumber) use ($basePath) {
        $_GET['page'] = $pageNumber;
        include $basePath . "departments.HR.php";
    },
    '/hr/funds/page={pageNumber}' => function($pageNumber) use ($basePath){
        $_GET['page'] = $pageNumber;
        include $basePath . "funds.php";
    },
];
// ADD employees
Router::post('/add-employees', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    // BASIC EMPLOYEE INFORMATION
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $civilstatus = $_POST['civilstatus'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $sssNumber = $_POST['sssNumber'];
    $philhealthNumber = $_POST['philhealthNumber'];
    $tinNumber = $_POST['tinNumber'];
    $pagibigNumber = $_POST['pagibigNumber'];
    // Handle the image upload
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
        $uploadDir = './public/humanResources/img/';
        $uploadFile = $uploadDir . basename($_FILES['image_url']['name']);
        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
            $image_url = preg_replace('/\./', '/master', $uploadFile, 1);
        } else {
            echo "Failed to move uploaded file.";
            return;
        }
    } else {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $query = "INSERT INTO employees (image_url, first_name, middle_name, last_name, dateofbirth, gender, nationality, civil_status, address, contact_no, email, department, position, sss_number, philhealth_number, tin_number, pagibig_number) VALUES (:image_url, :firstName, :middleName, :lastName, :dateofbirth, :gender, :nationality, :civilstatus, :address, :contactnumber, :email, :department, :position, :sssNumber, :philhealthNumber, :tinNumber, :pagibigNumber);";
    $stmt = $conn->prepare($query);
    if (empty($firstName) || empty($lastName) || empty($dateofbirth) || empty($gender) || empty($nationality) || empty($civilstatus) || empty($address) || empty($department) || empty($position)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $resultEmployee = $stmt->execute([
        'image_url' => $image_url,
        ':firstName' => $firstName,
        ':middleName' => $middleName,
        ':lastName' => $lastName,
        ':dateofbirth' => $dateofbirth,
        ':gender' => $gender,
        ':nationality' => $nationality,
        ':civilstatus' => $civilstatus,
        ':address' => $address,
        ':contactnumber' => $contactnumber,
        ':email' => $email,
        ':department' => $department,
        ':position' => $position,
        ':sssNumber' => $sssNumber,
        ':philhealthNumber' => $philhealthNumber,
        ':tinNumber' => $tinNumber,
        ':pagibigNumber' => $pagibigNumber,
    ]);
    if (!$resultEmployee) {
        $errorInfo = $stmt->errorInfo();
        echo "EMPLOYEE SQL Error: {$errorInfo[2]}";
        die();
    }

    $employeeId = $conn->lastInsertId();
    // EMPLOYMENT INFORMATION
    $dateofhire = $_POST['dateofhire'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $query = "INSERT INTO employment_info (employees_id, dateofhire, startdate, enddate) VALUES (:employeeId, :dateofhire, :startdate, :enddate);";
    $stmt = $conn->prepare($query);
    if (empty($dateofhire) || empty($startdate)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $resultEmploymentInfo = $stmt->execute([
        ':employeeId' => $employeeId,
        ':dateofhire' => $dateofhire,
        ':startdate' => $startdate,
        ':enddate' => $enddate,
    ]);
    if (!$resultEmploymentInfo) {
        $errorInfo = $stmt->errorInfo();
        echo "EMPLOYMENT INFO SQL Error: {$errorInfo[2]}";
        die();
    }
    // SALARY AND TAX INFORMATION
    // salary FK : employees_id
    $monthlysalary = $_POST['monthlysalary'];
    $totalsalary = $_POST['totalsalary'];
    
// Calculate total deductions
$totalDeductions = calculatePagibig($monthlysalary) + calculateSSS($monthlysalary) + calculatePhilhealth($monthlysalary) + calculateIncomeTax($monthlysalary) + calculateWithholdingTax($monthlysalary);
// Calculate total salary
$totalSalary = $monthlysalary - $totalDeductions;
$query = "INSERT INTO salary_info (employees_id, monthly_salary, total_salary, total_deductions) VALUES (:employeeId, :monthlysalary, :totalsalary, :totaldeductions);";
$stmt = $conn->prepare($query);
if (empty($monthlysalary)) {
    header("Location: $rootFolder/hr/employees/add");
    return;
}
// Calculate daily rate based on monthly salary and assuming 22 weekdays in a month
// $dailyRate = $monthlysalary / 22;
$resultSalary = $stmt->execute([
    ':employeeId' => $employeeId,
    ':monthlysalary' => $monthlysalary,
    ':totalsalary' => $totalSalary,
    ':totaldeductions' => $totalDeductions,
    // ':dailyrate' => $dailyRate,
]);
if (!$resultSalary) {
    $errorInfo = $stmt->errorInfo();
    echo "SALARY SQL Error: {$errorInfo[2]}";
    die();
}

    // tax : FK salary_id
    $incometax = $_POST['incometax'];
    $withholdingtax = $_POST['withholdingtax'];
    $salaryId = $conn->lastInsertId();
    // Calculate tax amount based on monthly salary
    $taxAmount = calculateWithholdingTax($monthlysalary);
    $query = "INSERT INTO tax_info (salary_id, income_tax, withholding_tax) VALUES (:salaryId, :incometax, :withholdingtax);";
    $stmt = $conn->prepare($query);
    $resultTax = $stmt->execute([
        ':salaryId' => $salaryId,
        ':incometax' => $incometax,
        ':withholdingtax' => $taxAmount,
    ]);
    if (!$resultTax) {
        $errorInfo = $stmt->errorInfo();
        echo "TAX SQL Error: {$errorInfo[2]}";
        die();
    }
    
    // benefits : FK salary_id
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
    $thirteenthmonth = $_POST['thirteenthmonth'];
    // Calculate SSS contribution
    $sssContribution = calculateSSS($monthlysalary);
    // Calculate Philhealth contribution based on monthly salary
    $philhealthContribution = calculatePhilhealth($monthlysalary);
    // Calculate Pag-IBIG fund contribution based on monthly salary
    $pagibigContribution = calculatePagibig($monthlysalary);
    // Calculate total basic salary earned by the employee within the calendar year
    $totalBasicSalary = $monthlysalary * 12;
    // Calculate the minimum value for the 13th-month pay
    $minimumThirteenthMonthPay = $totalBasicSalary / 12;
    // Ensure that the 13th-month pay is not less than the minimum value
    $thirteenthmonth = max($minimumThirteenthMonthPay, $monthlysalary);
    $query = "INSERT INTO benefit_info (salary_id, sss_fund, pagibig_fund, philhealth, thirteenth_month) VALUES (:salaryId, :sss, :pagibig, :philhealth, :thirteenthmonth);";
    $stmt = $conn->prepare($query);
    $resultBenefit = $stmt->execute([
        ':salaryId' => $salaryId,
        ':sss' => $sssContribution,
        ':pagibig' => $pagibigContribution,
        ':philhealth' => $philhealthContribution,
        ':thirteenthmonth' => $thirteenthmonth,
    ]);
    if (!$resultBenefit) {
        $errorInfo = $stmt->errorInfo();
        echo "BENEFIT SQL Error: {$errorInfo[2]}";
        die();
    }

    // ACCOUNT INFORMATION
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['department'];
    $query = "INSERT INTO account_info (employees_id, username, password, role) VALUES (:employeeId, :username, :password, :role);";
    $stmt = $conn->prepare($query);
    if (empty($username) || empty($password) || empty($role)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $resultAccount = $stmt->execute([
        ':employeeId' => $employeeId,
        ':username' => $username,
        ':password' => $password,
        ':role' => $role,
    ]);
    if (!$resultAccount) {
        $errorInfo = $stmt->errorInfo();
        echo "ACCOUNT SQL Error: {$errorInfo[2]}";
        die();
    }
    header("Location: $rootFolder/hr/employees/page=1");
});
// UPDATE employees information
Router::post('/update-employees', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    // BASIC EMPLOYEE INFORMATION
    $id = $_SESSION['id'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $civilstatus = $_POST['civilstatus'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $query = "SELECT image_url FROM employees WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $id]);
    $image_url = $stmt->fetchColumn();
    // Handle the image upload
    if (isset($_FILES['image_url'])) {
        if ($_FILES['image_url']['error'] == UPLOAD_ERR_NO_FILE) {
            // No file was uploaded. Keep the old image_url.
        } else if ($_FILES['image_url']['error'] == 0) {
            $uploadDir = './public/humanResources/img/';
            $uploadFile = $uploadDir . basename($_FILES['image_url']['name']);
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
                $image_url = preg_replace('/\./', '/master', $uploadFile, 1);
            } else {
                echo "Failed to move uploaded file.";
                return;
            }
        } else {
            // An error occurred. Handle it.
            echo "An error occurred: " . $_FILES['image_url']['error'];
            return;
        }
    }
    $query = "UPDATE employees SET image_url = :image_url, first_name = :firstName, middle_name = :middleName, last_name = :lastName, dateofbirth = :dateofbirth, gender = :gender, nationality = :nationality, civil_status = :civilstatus, address = :address, contact_no = :contactnumber, email = :email, department = :department, position = :position WHERE id = :id";
    $stmt = $conn->prepare($query);
    if (empty($firstName) || empty($lastName) || empty($dateofbirth) || empty($gender) || empty($nationality) || empty($civilstatus) || empty($address) || empty($department) || empty($position)) {
        header("Location: $rootFolder/hr/employees/update=$id");
        return;
    }
    $stmt->execute([
        'image_url' => $image_url,
        ':firstName' => $firstName,
        ':middleName' => $middleName,
        ':lastName' => $lastName,
        ':dateofbirth' => $dateofbirth,
        ':gender' => $gender,
        ':nationality' => $nationality,
        ':civilstatus' => $civilstatus,
        ':address' => $address,
        ':contactnumber' => $contactnumber,
        ':email' => $email,
        ':department' => $department,
        ':position' => $position,
        ':id' => $id,
    ]);
    // EMPLOYMENT INFORMATION
    $dateofhire = $_POST['dateofhire'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $query = "UPDATE employment_info SET dateofhire = :dateofhire, startdate = :startdate, enddate = :enddate WHERE employees_id = :id";
    $stmt = $conn->prepare($query);
    if (empty($dateofhire) || empty($startdate)) {
        header("Location: $rootFolder/hr/employees/update=$id");
        return;
    }
    $stmt->execute([
        ':dateofhire' => $dateofhire,
        ':startdate' => $startdate,
        ':enddate' => $enddate,
        ':id' => $id,
    ]);
    // SALARY AND TAX INFORMATION
    // salary FK : employees_id
    $monthlysalary = $_POST['monthlysalary'];
    $totalsalary = $_POST['totalsalary'];
    $query = "UPDATE salary_info SET monthly_salary = :monthlysalary, total_salary = :totalsalary WHERE employees_id = :id";
    $stmt = $conn->prepare($query);
    if (empty($monthlysalary)) {
        header("Location: $rootFolder/hr/employees/update=$id");
        return;
    }
    $stmt->execute([
        ':id' => $id,
        ':monthlysalary' => $monthlysalary,
        ':totalsalary' => $totalsalary,
    ]);
    // tax : FK salary_id
    $incometax = $_POST['incometax'];
    $withholdingtax = $_POST['withholdingtax'];
    $query = "UPDATE tax_info SET income_tax = :incometax, withholding_tax = :withholdingtax WHERE salary_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':id' => $id,
        ':incometax' => $incometax,
        ':withholdingtax' => $withholdingtax,
    ]);
    
    // benefits : FK salary_id
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
    $thirteenthmonth = $_POST['thirteenthmonth'];
    $query = "UPDATE benefit_info SET sss_fund = :sss, pagibig_fund = :pagibig, philhealth = :philhealth, thirteenth_month = :thirteenthmonth WHERE salary_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':id' => $id,
        ':sss' => $sss,
        ':pagibig' => $pagibig,
        ':philhealth' => $philhealth,
        ':thirteenthmonth' => $thirteenthmonth,
    ]);
    // ACCOUNT INFORMATION
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['department'];
    $query = "UPDATE account_info SET username = :username, password = :password, role = :role WHERE employees_id = :id";
    $stmt = $conn->prepare($query);
    if (empty($username) || empty($password) || empty($role)) {
        header("Location: $rootFolder/hr/employees/update=$id");
        return;
    }
    $stmt->execute([
        ':id' => $id,
        ':username' => $username,
        ':password' => $password,
        ':role' => $role,
    ]);
    header("Location: $rootFolder/hr/employees/id=$id");
});
// DELETE employees (1. benefit_info 2. tax_info 3. salary_info 4. employment_info 5. account_info 6. employees)
Router::post('/delete/employees', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $idToDelete = $_POST['id'];
        // Delete from leave_requests
        $query = "DELETE FROM leave_requests WHERE employees_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
        // Delete from benefit_info and tax_info
        $query = "DELETE FROM benefit_info WHERE salary_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
        $query = "DELETE FROM tax_info WHERE salary_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
        // Delete from salary_info, account_info, and employment_info
        $query = "DELETE FROM salary_info WHERE employees_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
        $query = "DELETE FROM account_info WHERE employees_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
        $query = "DELETE FROM employment_info WHERE employees_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
        // Delete from employees
        $query = "DELETE FROM employees WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([':id' => $idToDelete]);
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/hr/employees");
});
// SEARCH employees
Router::post('/hr/employees/page=1', function () {
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/page=1");
        return;
    }
    include './public/humanResources/views/hr.employees.php';
});
// search employees in DEPARTMENTS : Product Order
Router::post('/hr/departments/product-order', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/departments/product-order");
        return;
    }
    include './public/humanResources/views/hr.departments.PO.php';
});
// search employees in DEPARTMENTS : Inventory
Router::post('/hr/departments/inventory', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/departments/inventory");
        return;
    }
    include './public/humanResources/views/hr.departments.inv.php';
});
// search employees in DEPARTMENTS : Point of Sales
Router::post('/hr/departments/sales', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/departments/sales");
        return;
    }
    include './public/humanResources/views/hr.departments.POS.php';
});
// search employees in DEPARTMENTS : Finance
Router::post('/hr/departments/finance', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/departments/finance");
        return;
    }
    include './public/humanResources/views/hr.departments.fin.php';
});
// search employees in DEPARTMENTS : Delivery
Router::post('/hr/departments/delivery', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/departments/delivery");
        return;
    }
    include './public/humanResources/views/hr.departments.dlv.php';
});
// search employees in DEPARTMENTS : Human Resources
Router::post('/hr/departments/human-resources', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/departments/human-resources");
        return;
    }
    include './public/humanResources/views/hr.departments.HR.php';
});
// search applicants
Router::post('/hr/applicants', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/applicants");
        return;
    }
    $query = "SELECT * FROM applicants WHERE first_name = :search OR last_name = :search OR applyingForPosition = :search OR id = :search;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);
    // Execute the statement
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include './public/humanResources/views/hr.applicants.php';
});
// accept applicants
Router::post('/hr/applicants/accept', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    $applicantid = $_SESSION['id'];
    // BASIC EMPLOYEE INFORMATION
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $civilstatus = $_POST['civilstatus'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $query = "SELECT image_url FROM applicants WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $applicantid]);
    $image_url = $stmt->fetchColumn();
    // Handle the image upload
    if (isset($_FILES['image_url'])) {
        if ($_FILES['image_url']['error'] == UPLOAD_ERR_NO_FILE) {
            // No file was uploaded. Keep the old image_url.
        } else if ($_FILES['image_url']['error'] == 0) {
            $uploadDir = './public/humanResources/img/';
            $uploadFile = $uploadDir . basename($_FILES['image_url']['name']);
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile)) {
                $image_url = preg_replace('/\./', '/master', $uploadFile, 1);
            } else {
                echo "Failed to move uploaded file.";
                return;
            }
        } else {
            // An error occurred. Handle it.
            echo "An error occurred: " . $_FILES['image_url']['error'];
            return;
        }
    }
    $query = "INSERT INTO employees (image_url, first_name, middle_name, last_name, dateofbirth, gender, nationality, civil_status, address, contact_no, email, department, position) VALUES (:image_url, :firstName, :middleName, :lastName, :dateofbirth, :gender, :nationality, :civilstatus, :address, :contactnumber, :email, :department, :position);";
    $stmt = $conn->prepare($query);
    if (empty($firstName) || empty($lastName) || empty($dateofbirth) || empty($gender) || empty($nationality) || empty($civilstatus) || empty($address) || empty($department) || empty($position)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $stmt->execute([
        'image_url' => $image_url,
        ':firstName' => $firstName,
        ':middleName' => $middleName,
        ':lastName' => $lastName,
        ':dateofbirth' => $dateofbirth,
        ':gender' => $gender,
        ':nationality' => $nationality,
        ':civilstatus' => $civilstatus,
        ':address' => $address,
        ':contactnumber' => $contactnumber,
        ':email' => $email,
        ':department' => $department,
        ':position' => $position,
    ]);
    $employeeId = $conn->lastInsertId();
    // EMPLOYMENT INFORMATION
    $dateofhire = $_POST['dateofhire'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $query = "INSERT INTO employment_info (employees_id, dateofhire, startdate, enddate) VALUES (:employeeId, :dateofhire, :startdate, :enddate);";
    $stmt = $conn->prepare($query);
    if (empty($dateofhire) || empty($startdate)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $stmt->execute([
        ':employeeId' => $employeeId,
        ':dateofhire' => $dateofhire,
        ':startdate' => $startdate,
        ':enddate' => $enddate,
    ]);
    // SALARY AND TAX INFORMATION
    // salary FK : employees_id
    $monthlysalary = $_POST['monthlysalary'];
    $totalsalary = $_POST['totalsalary'];
    
    // Calculate total deductions
    $totalDeductions = calculatePagibig($monthlysalary) + calculateSSS($monthlysalary) + calculatePhilhealth($monthlysalary) + calculateIncomeTax($monthlysalary) + calculateWithholdingTax($monthlysalary);
    // Calculate total salary
    $totalSalary = $monthlysalary - $totalDeductions;
    $query = "INSERT INTO salary_info (employees_id, monthly_salary, total_salary) VALUES (:employeeId, :monthlysalary, :totalsalary);";
    $stmt = $conn->prepare($query);
    if (empty($monthlysalary)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $stmt->execute([
        ':employeeId' => $employeeId,
        ':monthlysalary' => $monthlysalary,
        ':totalsalary' => $totalSalary,
    ]);
    // tax : FK salary_id
    $incometax = $_POST['incometax'];
    $withholdingtax = $_POST['withholdingtax'];
    $salaryId = $conn->lastInsertId();
    // Calculate tax amount based on monthly salary
    $taxAmount = calculateWithholdingTax($monthlysalary);
    $query = "INSERT INTO tax_info (salary_id, income_tax, withholding_tax) VALUES (:salaryId, :incometax, :withholdingtax);";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':salaryId' => $salaryId,
        ':incometax' => $incometax,
        ':withholdingtax' => $taxAmount,
    ]);
    
    // benefits : FK salary_id
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
    $thirteenthmonth = $_POST['thirteenthmonth'];
    // Calculate SSS contribution
    $sssContribution = calculateSSS($monthlysalary);
    // Calculate Philhealth contribution based on monthly salary
    $philhealthContribution = calculatePhilhealth($monthlysalary);
    // Calculate Pag-IBIG fund contribution based on monthly salary
    $pagibigContribution = calculatePagibig($monthlysalary);
    // Calculate total basic salary earned by the employee within the calendar year
    $totalBasicSalary = $monthlysalary * 12;
    // Calculate the minimum value for the 13th-month pay
    $minimumThirteenthMonthPay = $totalBasicSalary / 12;
    // Ensure that the 13th-month pay is not less than the minimum value
    $thirteenthmonth = max($minimumThirteenthMonthPay, $monthlysalary);
    $query = "INSERT INTO benefit_info (salary_id, sss_fund, pagibig_fund, philhealth, thirteenth_month) VALUES (:salaryId, :sss, :pagibig, :philhealth, :thirteenthmonth);";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':salaryId' => $salaryId,
        ':sss' => $sssContribution,
        ':pagibig' => $pagibigContribution,
        ':philhealth' => $philhealthContribution,
        ':thirteenthmonth' => $thirteenthmonth,
    ]);
    // ACCOUNT INFORMATION
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['department'];
    $query = "INSERT INTO account_info (employees_id, username, password, role) VALUES (:employeeId, :username, :password, :role);";
    $stmt = $conn->prepare($query);
    if (empty($username) || empty($password) || empty($role)) {
        header("Location: $rootFolder/hr/employees/add");
        return;
    }
    $stmt->execute([
        ':employeeId' => $employeeId,
        ':username' => $username,
        ':password' => $password,
        ':role' => $role,
    ]);
    
    // Delete a row from APPLICANTS table
    $id = $_SESSION['id'];
    $query = "DELETE FROM applicants WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $id]);
    header("Location: $rootFolder/hr/employees");
});
// reject applicants (will delete a row from applicants)
Router::post('/reject/applicants', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $idToDelete = $_POST['id'];
    $query = "DELETE FROM applicants WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $idToDelete]);
    // Execute the statement
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/hr/applicants");
});
// search leave_requests
Router::post('/hr/leave-requests', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/leave-requests");
        return;
    }
    $query = "SELECT leave_requests.*, employees.image_url, employees.first_name, employees.middle_name, employees.last_name, employees.position, employees.department FROM leave_requests LEFT JOIN employees ON leave_requests.employees_id = employees.id WHERE employees.first_name = :search OR employees.last_name = :search OR employees.position = :search OR employees.department = :search OR leave_requests.id = :search OR leave_requests.type = :search OR leave_requests.employees_id = :search;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":search", $search);
    // Execute the statement
    $stmt->execute();
    $leaveRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include './public/humanResources/views/hr.leave-requests.php';
});
// search leave_requests (reviewed)
Router::post('/hr/leave-requests/reviewed', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/leave-requests/reviewed");
        return;
    }
    include './public/humanResources/views/hr.leave-requests.reviewed.php';
});
// file leave requests
Router::post('/hr/leave-requests/file-leave', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    $type = $_POST['type'];
    $details = $_POST['details'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $employees_id = $_POST['employee'];
    $query = "INSERT INTO leave_requests (type, details, date_submitted, start_date, end_date, employees_id) VALUES (:type, :details, NOW(), :start_date, :end_date, :employees_id)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':type' => $type,
        ':details' => $details,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':employees_id' => $employees_id,
    ]);
    header("Location: $rootFolder/hr/leave-requests");
});
// approve leave requests (update status to 'Approved')
Router::post('/approve/leave-requests', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    $id = $_SESSION['id'];
    $status = $_POST['status'];
    $query = "UPDATE leave_requests SET status = 'Approved' WHERE id = :id";
    $stmt = $conn->prepare($query);
     
    $stmt->execute([':id' => $id]);
    header("Location: $rootFolder/hr/leave-requests");
});
// deny leave requests (update status to 'Denied')
Router::post('/deny/leave-requests', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    $id = $_SESSION['id'];
    $status = $_POST['status'];
    $query = "UPDATE leave_requests SET status = 'Denied' WHERE id = :id";
    $stmt = $conn->prepare($query);
    
    $stmt->execute([':id' => $id]);
    header("Location: $rootFolder/hr/leave-requests");
});
// SEARCH payroll
Router::post('/hr/payroll', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/payroll");
        return;
    }
    $query = "SELECT payroll.*, employees.first_name, employees.middle_name, employees.last_name, employees.position, payroll.month FROM PAYROLL 
    LEFT JOIN employees ON payroll.employees_id = employees.id
    LEFT JOIN salary_info ON payroll.salary_id = salary_info.id AND salary_info.employees_id = employees.id 
    WHERE employees.first_name LIKE :search OR employees.last_name LIKE :search OR employees.position LIKE :search OR payroll.id = :id OR payroll.month = :month";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":search", '%' . $search . '%');
    $stmt->bindValue(":id", $search, PDO::PARAM_INT);
    $stmt->bindValue(":month", $search, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    $payroll = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include './public/humanResources/views/hr.payroll.php';
});
// CREATE Payslip
Router::post('/create/payslip', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    // Capture form data
    $pay_date = $_POST['pay_date'];
    $month = $_POST['month'];
    $status = $_POST['status'];
    $employee_id = $_POST['employee_id']; // Get the employee ID from the form

    // Retrieve salary_id from salary_info table based on employee_id
    $salary_query = "SELECT id, monthly_salary FROM salary_info WHERE employees_id = :employees_id";
    $salary_stmt = $conn->prepare($salary_query);
    $salary_stmt->bindParam(':employees_id', $employee_id);
    $salary_stmt->execute();
    $row = $salary_stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $salary_id = $row['id'];
        $monthly_salary = $row['monthly_salary'];
    }
    
    // Retrieve tax_id from tax_info table based on employee_id
    $tax_query = "SELECT id, withholding_tax FROM tax_info WHERE salary_id = :salary_id";
    $tax_stmt = $conn->prepare($tax_query);
    $tax_stmt->bindParam(':salary_id', $salary_id);
    $tax_stmt->execute();
    $row = $tax_stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $withholding_tax = $row['withholding_tax'];
    }

    // Insert data into payroll table
    $query = "INSERT INTO payroll (pay_date, month, status, salary_id, employees_id) VALUES (:pay_date, :month, :status, :salary_id, :employees_id)";
    $stmt = $conn->prepare($query);
    // Bind parameters
    $stmt->bindParam(':pay_date', $pay_date);
    $stmt->bindParam(':month', $month);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':salary_id', $salary_id); // Bind the retrieved salary_id
    $stmt->bindParam(':employees_id', $employee_id);
    // Execute the query
    $stmt->execute();

    inputSalary($monthly_salary, $withholding_tax);
    
    // Redirect to a success page or reload the current page
    header("Location: $rootFolder/hr/generate-payslip");
    exit(); // Ensure script termination after redirection
});
// SEARCH generate payslip (filter)
Router::post('/hr/generate-payslip', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $selected_department = $_POST['department'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($selected_department)) {
        header("Location: $rootFolder/hr/generate-payslip");
        return;
    }
    $query = "SELECT payroll.*, employees.department FROM payroll 
    LEFT JOIN employees ON payroll.employees_id = employees.id
    WHERE employees.department = :department";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':department', $selected_department);
    // Execute the statement
    $stmt->execute();
    $payslip = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include './public/humanResources/views/hr.payslip.generate.php';
});
// SAVE/CREATE event - schedule/calendar
Router::post('/create/schedule', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    $event_name = $_POST['event_name'];
    $date = $_POST['date'];
    $day = $_POST['day'];
    $query = "INSERT INTO calendar (event_name, date, day) VALUES (:event_name, :date,:day)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':event_name' => $event_name,
        ':date' => $date,
        ':day' => $day,
    ]);
    header("Location: $rootFolder/hr/schedule");
});
// REMOVE event
Router::post('/remove/schedule', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $idToDelete = $_POST['event'];
    $query = "DELETE FROM calendar WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute([':id' => $idToDelete]);

    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/hr/schedule");
});
// attendance dtr clock in
Router::post('/clock-in', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);

    $username = $_SESSION['user']['username'];

    // Fetch the employees_id based on the username
    $stmt = $conn->prepare("SELECT employees_id FROM account_info WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $employees_id = $user['employees_id'];

    // Use the current date and time for attendance_date and clock_in
    date_default_timezone_set('Asia/Manila');
    $attendance_date = date('Y-m-d');
    $clock_in = date('H:i:s');

    // Include employees_id in the INSERT query
    $query = "INSERT INTO attendance (employees_id, attendance_date, clock_in) VALUES (:employees_id, :attendance_date, :clock_in)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        ':employees_id' => $employees_id,
        ':attendance_date' => $attendance_date,
        ':clock_in' => $clock_in,
    ]);
    header("Location: $rootFolder/hr/dashboard");
});
// attendance dtr clock out
Router::post('/clock-out', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $rootFolder = dirname($_SERVER['PHP_SELF']);

    $username = $_SESSION['user']['username'];

    // Fetch the employees_id based on the username
    $stmt = $conn->prepare("SELECT employees_id FROM account_info WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $employees_id = $user['employees_id'];

    // Use the current date and time for attendance_date and clock_out
    date_default_timezone_set('Asia/Manila');
    $attendance_date = date('Y-m-d');
    $clock_out = date('H:i:s');

    $stmt = $conn->prepare("UPDATE attendance SET clock_out = :clock_out WHERE attendance_date = :attendance_date AND employees_id = :employees_id");

    $stmt->execute([
        ':employees_id' => $employees_id,
        ':attendance_date' => $attendance_date,
        ':clock_out' => $clock_out,
    ]);

    header("Location: $rootFolder/hr/dashboard");
});
// SEARCH dtr
Router::post('/hr/dtr', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/dtr");
        return;
    }
    $query = "SELECT attendance.*, employees.first_name, employees.middle_name, employees.last_name, employees.position, employees.department FROM attendance 
    LEFT JOIN employees ON attendance.employees_id = employees.id
    WHERE employees.first_name LIKE :search OR employees.last_name LIKE :search OR employees.position LIKE :search OR employees.department LIKE :search OR attendance.id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":search", '%' . $search . '%');
    $stmt->bindValue(":id", $search, PDO::PARAM_INT);
    // Execute the statement
    $stmt->execute();
    $dtr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include './public/humanResources/views/hr.daily-time-record.php';
});