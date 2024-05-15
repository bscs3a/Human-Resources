<?php
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
    '/hr/employees/departments/product-order' => $basePath . "departments.PO.php", // hr.departments.PO.php
    '/hr/employees/departments/inventory' => $basePath . "departments.inv.php", // hr.departments.inv.php
    '/hr/employees/departments/sales' => $basePath . "departments.POS.php", // hr.departments.POS.php
    '/hr/employees/departments/finance' => $basePath . "departments.fin.php", // hr.departments.fin.php
    '/hr/employees/departments/delivery' => $basePath . "departments.dlv.php", // hr.departments.dlv.php
    '/hr/employees/departments/human-resources' => $basePath . "departments.HR.php", // hr.departments.HR.php
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
    '/hr/payrolllist' => $basePath . "payroll.list.php",
    '/hr/dtr' => $basePath . "daily-time-record.php",
    '/hr/payslipgenerate' => $basePath . "payslip.generate.php",
    '/hr/payslipreport' => $basePath . "payslip.report.php",
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
];
// TAX CALCULATION
// Function to calculate tax amount based on monthly salary | INCOME TAX
function calculateIncomeTax($monthlysalary) {
    if ($monthlysalary <= 20833.33) {
        // Over 0 but not over 20,833.33 (250,000 annual salary)
        return 0;
    } elseif ($monthlysalary <= 33333.33) {
        // Over 20,833.33 but not over 33,333.33 (400,000 annual salary)
        return ($monthlysalary - 20833.33) * 0.20;
    } elseif ($monthlysalary <= 66666.67) {
        // Over 33,333.33 but not over 66,666 (800,000 annual salary)
        return 2500 + ($monthlysalary - 33333.33) * 0.25;
    } elseif ($monthlysalary <= 166666.67) {
        // Over 66,666 but not over 166,666 (2,000,000 annual salary)
        return 10833.33 + ($monthlysalary - 66666.67) * 0.30;
    } elseif ($monthlysalary <= 666666.67) {
        // Over 166,666 but not over 666,666 (8,000,000 annual salary)
        return 40833.33 + ($monthlysalary - 166666.67) * 0.32;
    } else {
        // Over 666,666 (8,000,000 annual salary)
        return 200833.33 + ($monthlysalary - 666666.67) * 0.35;
    }
}
// Function to calculate tax amount based on monthly salary | WITHHOLDING TAX
function calculateWithholdingTax($monthlysalary) {
    if ($monthlysalary <= 20833.33) {
        // 20,833.33 and below
        return 0;
    } elseif ($monthlysalary <= 33333.33) {
        // 20,833.34 to 33,333.33
        return 0 + ($monthlysalary - 20833.33) * 0.15;
    } elseif ($monthlysalary <= 66666.67) {
        // 33,333.34 to 66,666.67
        return 1875 + ($monthlysalary - 33333.33) * 0.20;
    } elseif ($monthlysalary <= 166666.67) {
        // 66,666.68 to 166,666.67
        return 8541.80 + ($monthlysalary - 66666.67) * 0.25;
    } elseif ($monthlysalary <= 666666.67) {
        // 166,666.68 to 666,666.67
        return 33541.80 + ($monthlysalary - 166666.67) * 0.30;
    } else {
        // 666,666.68 and above
        return 183541.80 + ($monthlysalary - 666666.67) * 0.35;
    }
}
// Function to calculate SSS contribution
function calculateSSS($monthlysalary) {
    // SSS contribution is 14% of the monthly salary
    return ($monthlysalary * 0.14) * 0.32;
}
// Function to calculate Philhealth contribution
function calculatePhilhealth($monthlysalary) {
    if ($monthlysalary <= 10000.00) {
        return 500.00;
    } elseif ($monthlysalary <= 99999.99) {
        return 500.00 + ($monthlysalary - 10000.00) * 0.05;
    } else {
        return 5000.00;
    }
}
// Function to calculate Pag-IBIG fund contribution
function calculatePagibig($monthlysalary) {
    // Pag-IBIG fund contribution is fixed at P200
    return 200.00;
}
// ADD employees
Router::post('/hr/employees/add', function () {
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
        ':sssNumber' => $sssNumber,
        ':philhealthNumber' => $philhealthNumber,
        ':tinNumber' => $tinNumber,
        ':pagibigNumber' => $pagibigNumber,
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
$query = "INSERT INTO salary_info (employees_id, monthly_salary, total_salary, total_deductions, daily_rate) VALUES (:employeeId, :monthlysalary, :totalsalary, :totaldeductions, :dailyrate);";
$stmt = $conn->prepare($query);
if (empty($monthlysalary)) {
    header("Location: $rootFolder/hr/employees/add");
    return;
}
// Calculate daily rate based on monthly salary and assuming 22 weekdays in a month
$dailyRate = $monthlysalary / 22;
$stmt->execute([
    ':employeeId' => $employeeId,
    ':monthlysalary' => $monthlysalary,
    ':totalsalary' => $totalSalary,
    ':totaldeductions' => $totalDeductions,
    ':dailyrate' => $dailyRate,
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
    header("Location: $rootFolder/hr/employees");
});
// UPDATE employees information
Router::post('/hr/employees/update', function () {
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
Router::post('/hr/employees', function () {
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees");
        return;
    }
    include './public/humanResources/views/hr.employees.php';
});
// search employees in DEPARTMENTS : Product Order
Router::post('/hr/employees/departments/product-order', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/product-order");
        return;
    }
    include './public/humanResources/views/hr.departments.PO.php';
});
// search employees in DEPARTMENTS : Inventory
Router::post('/hr/employees/departments/inventory', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/inventory");
        return;
    }
    include './public/humanResources/views/hr.departments.inv.php';
});
// search employees in DEPARTMENTS : Point of Sales
Router::post('/hr/employees/departments/sales', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/sales");
        return;
    }
    include './public/humanResources/views/hr.departments.POS.php';
});
// search employees in DEPARTMENTS : Finance
Router::post('/hr/employees/departments/finance', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/finance");
        return;
    }
    include './public/humanResources/views/hr.departments.fin.php';
});
// search employees in DEPARTMENTS : Delivery
Router::post('/hr/employees/departments/delivery', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/delivery");
        return;
    }
    include './public/humanResources/views/hr.departments.dlv.php';
});
// search employees in DEPARTMENTS : Human Resources
Router::post('/hr/employees/departments/human-resources', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/employees/departments/human-resources");
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
    $search = $_POST['search'];
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    if (empty($search)) {
        header("Location: $rootFolder/hr/payroll");
        return;
    }
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

    // Assuming you have the employee's information available when the modal is opened
    // If not, you'll need a way to retrieve it, such as an AJAX request
    $full_name = "John Doe"; // Example full name
    $position = "Manager"; // Example position
    $total_salary = 5000.00; // Example total salary
    $monthly_salary = 4000.00; // Example monthly salary
    $total_deductions = 1000.00; // Example total deductions

    // Retrieve salary_id from salary_info table based on employee_id
    $employee_id = 1; // Assuming employee_id is known
    $salary_query = "SELECT id FROM salary_info WHERE employees_id = :employees_id";
    $salary_stmt = $conn->prepare($salary_query);
    $salary_stmt->bindParam(':employees_id', $employee_id);
    $salary_stmt->execute();
    $salary_id = $salary_stmt->fetchColumn();
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
    // Redirect to a success page or reload the current page
    header("Location: $rootFolder/hr/payslipgenerate");
    exit(); // Ensure script termination after redirection
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
    // Execute the statement
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/hr/schedule");
});