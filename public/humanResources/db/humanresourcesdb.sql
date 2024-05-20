CREATE DATABASE IF NOT EXISTS bscs3a;
USE bscs3a;

CREATE TABLE employees (
    id INT(10) NOT NULL AUTO_INCREMENT,
    image_url VARCHAR(255) NULL DEFAULT NULL,
    first_name VARCHAR(30) NOT NULL,
    middle_name VARCHAR(30),
    last_name VARCHAR(30) NOT NULL,
    dateofbirth DATE NOT NULL,
    gender ENUM('Male','Female') NOT NULL,
    nationality VARCHAR(30) NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact_no VARCHAR(20) DEFAULT 'N/A',
    email VARCHAR(30) DEFAULT 'N/A',
    civil_status ENUM('Single','Married','Divorced','Widowed') NOT NULL,
    department ENUM('Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery') NOT NULL,
    position VARCHAR(50) NOT NULL,
    sss_number VARCHAR(20), -- SSS number
    philhealth_number VARCHAR(20), -- PhilHealth number
    tin_number VARCHAR(20), -- TIN number
    pagibig_number VARCHAR(20), -- Pag-IBIG number
    PRIMARY KEY (id)
);

CREATE TABLE employment_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    dateofhire DATE NOT NULL,
    startdate DATE NOT NULL,
    enddate DATE,
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

CREATE TABLE salary_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    monthly_salary DECIMAL(10,2) NOT NULL,
    daily_rate DECIMAL(10, 2) NOT NULL,
    total_deductions DECIMAL(10,2) NOT NULL, -- Total deductions (taxes, benefits)
    total_salary DECIMAL(10,2) NOT NULL, -- Total salary after deductions (taxes, benefits)
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

CREATE TABLE tax_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    income_tax DECIMAL(10,2) NOT NULL,
    withholding_tax DECIMAL(10,2) NOT NULL,
    salary_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (salary_id) REFERENCES salary_info (id)
);

CREATE TABLE benefit_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    philhealth DECIMAL(10,2) NOT NULL,
    sss_fund DECIMAL(10,2) NOT NULL,
    pagibig_fund DECIMAL(10,2) NOT NULL,
    thirteenth_month DECIMAL(10,2) NOT NULL,
    salary_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (salary_id) REFERENCES salary_info (id)
);

CREATE TABLE payroll (
    id INT(10) NOT NULL AUTO_INCREMENT,
    pay_date DATE NOT NULL,
    month VARCHAR(20) NOT NULL,
    -- deductions DECIMAL(10,2) NOT NULL,
    monthly_salary DECIMAL(10,2) NOT NULL,
    status ENUM('Pending','Paid') DEFAULT 'Pending',
    salary_id INT(10) NOT NULL,
    employees_id INT(10) NOT NULL,
    -- total_deductions DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id),
    FOREIGN KEY (salary_id) REFERENCES salary_info (id)
);

-- DTR
CREATE TABLE attendance (
    id INT(10) NOT NULL AUTO_INCREMENT,
    attendance_date DATETIME NOT NULL,
    clock_in TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    clock_out TIMESTAMP DEFAULT current_timestamp(),
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

CREATE TABLE calendar (
    id INT(10) NOT NULL AUTO_INCREMENT,
    event_name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    day ENUM('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE leave_requests (
    id INT(10) NOT NULL AUTO_INCREMENT,
    type ENUM('Sick Leave','Vacation Leave','5 Days Forced Leave','Special Privilege Leave','Maternity Leave','Paternity Leave','Parental Leave','Rehabilitation Leave','Special Leave (For Women)','Study Leave','Terminal Leave','Special Emergency Leave') NOT NULL,
    details VARCHAR(255),
    date_submitted TIMESTAMP DEFAULT current_timestamp(),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status ENUM('Pending','Approved','Denied') DEFAULT 'Pending',
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

CREATE TABLE applicants (
    id INT(10) NOT NULL AUTO_INCREMENT,
	image_url VARCHAR(255) NULL DEFAULT NULL,
    first_name VARCHAR(30) NOT NULL,
    middle_name VARCHAR(30),
    last_name VARCHAR(30) NOT NULL,
    dateofbirth DATE NOT NULL,
    gender ENUM('Male','Female') NOT NULL,
    nationality VARCHAR(30) NOT NULL,
    civil_status ENUM('Single','Married','Divorced','Widowed') NOT NULL,
    applyingForDepartment ENUM('Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery') NOT NULL,
    address VARCHAR(255) NOT NULL,
    contact_no VARCHAR(20) DEFAULT 'N/A',
    email VARCHAR(30) DEFAULT 'Email not available',
    applyingForPosition VARCHAR(30) NOT NULL,
    apply_date TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (id)
);

CREATE TABLE account_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery') NOT NULL,
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

CREATE TABLE session (
    id INT(10) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    login_time TIMESTAMP DEFAULT current_timestamp(),
    logout_time TIMESTAMP DEFAULT current_timestamp(),
    role ENUM('Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery') NOT NULL,
    account_info_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (account_info_id) REFERENCES account_info (id)
);

-- EXAMPLE DATA
INSERT INTO employees (image_url, first_name, middle_name, last_name, dateofbirth, gender, nationality, address, contact_no, email, civil_status, department, position, sss_number, philhealth_number, tin_number, pagibig_number) VALUES
('https://pbs.twimg.com/profile_images/1776936838118404096/cxF34bgy_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com','Single', 'Human Resources', 'HR Manager/Director','3934191496','254323228890','811863948','077652901241'),
('https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com','Single', 'Human Resources', 'Compensation and Benefits Specialist','9842683190','222904801483','398938596','393260427062'),
('https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com','Single', 'Human Resources', 'HR Legal Compliance Specialist','3217127657','982459800458','175523699','723082092314'),
('https://pbs.twimg.com/profile_images/1746139769342742528/cDQRzJIV_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com','Divorced', 'Human Resources', 'Recruiter','3831913601','296757397697','136729120','687715123719'),
('/master/public/humanResources/img/noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com','Married', 'Human Resources', 'HR Coordinator','1788631721','493539660119','579494717','254144900265'),
('/master/public/humanResources/img/noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com','Single', 'Product Order', 'Order Processor','5239186621','113821417235','293860405','677900026630');

INSERT INTO employment_info (dateofhire, startdate, enddate, employees_id) VALUES
('2021-01-01', '2021-01-01', NULL, 1),
('2021-01-01', '2021-01-01', NULL, 2),
('2021-01-01', '2021-01-01', NULL, 3),
('2021-01-01', '2021-01-01', NULL, 4),
('2021-01-01', '2021-01-01', NULL, 5),
('2024-04-11', '2024-04-11', '2025-04-11', 6);

INSERT INTO salary_info (monthly_salary, total_salary, total_deductions, employees_id) VALUES
(80000.00, 45507.54, 34492.46, 1),
(45000.00, 30909.00, 14091.00, 2),
(35000.00, 26357.00, 8643, 3),
(30000.00, 23747.67, 6252.33, 4),
(25000.00, 20971.67, 4028.33, 5),
(18000.00, 16093.60, 1906.4, 6);

INSERT INTO tax_info (income_tax, withholding_tax, salary_id) VALUES
(14833.33, 11875.13, 1),
(5416.67, 4208.33, 2),
(2916.67, 2208.33, 3),
(1833.33, 1375.00, 4),
(833.33, 625.00, 5),
(0.00, 0.00, 6);

INSERT INTO benefit_info (philhealth, sss_fund, pagibig_fund, thirteenth_month, salary_id) VALUES
(4000.00, 3584.00, 200.00, 80000.00, 1),
(2250.00, 2016.00, 200.00, 45000.00, 2),
(1750.00, 1568.00, 200.00, 35000.00, 3),
(1500.00, 1344.00, 200.00, 30000.00, 4),
(1250.00, 1120.00, 200.00, 25000.00, 5),
(900.00, 806.40, 200.00, 18000.00, 6);

INSERT INTO account_info (username, password, role, employees_id) VALUES
('bscs3a001', 'bscs3a1HR', 'Human Resources', 1),
('bscs3a002', 'bscs3a2HR', 'Human Resources', 2),
('bscs3a003', 'bscs3a3HR', 'Human Resources', 3),
('bscs3a004', 'bscs3a4HR', 'Human Resources', 4),
('bscs3a005', 'bscs3a5HR', 'Human Resources', 5),
('bscs3a006', 'bscs3a1PO', 'Product Order', 6);

INSERT INTO calendar (event_name, date, day) VALUES
('The Day of Valor', '2024-04-09', 'Tuesday'),
('Eidul-Fitar', '2024-04-10', 'Wednesday'),
('Labor Day', '2024-05-01', 'Wednesday');

INSERT INTO leave_requests (type, details, start_date, end_date, status, employees_id) VALUES
('Sick Leave', 'Enjoy this moon necklace. I got it for you. You remind me of the moon, because it\'s always there and it\'s beautiful.', '2024-08-27 08:00:00', '2024-08-28 08:00:00', 'Pending', 1);

INSERT INTO applicants (image_url, first_name, middle_name, last_name, dateofbirth, gender, nationality, civil_status, applyingForDepartment, address, contact_no, email, applyingForPosition) VALUES
('https://pbs.twimg.com/profile_images/1776936537089089536/Ws5Ihsh7_400x400.jpg', 'Jaruu', 'Eveland', 'Rias', '2001-08-31', 'Male', 'Filipino', 'Single', 'Human Resources', 'Country Roads Take Me Home', '09123456789', 'foxwriter@example.com', 'HR Coordinator'),
('https://pbs.twimg.com/profile_images/1752672426381762560/lGu3Vx-C_400x400.jpg', 'Suzuran', '', 'Yamino', '2001-08-31', 'Female', 'Filipino', 'Single', 'Finance', 'Sorcerer, I Hardly Even Know Her!', '09123456789', 'sorcerer@example.com', 'Credit Analyst');

-- ALTER TABLE payroll DROP COLUMN deductions;
-- ALTER TABLE salary_info ADD COLUMN total_deductions DECIMAL(10,2) NOT NULL;

-- ALTER TABLE salary_info
-- ADD COLUMN daily_rate DECIMAL(10, 2) NOT NULL;

-- Insert example data into the salary_info table
-- INSERT INTO salary_info (monthly_salary, total_salary, employees_id) VALUES
-- (80000.00, 45507.54, 1),
-- (45000.00, 30909.00, 2);

-- Retrieve the id values generated for the inserted records
-- SELECT id FROM salary_info;

-- INSERT INTO payroll (pay_date, month, monthly_salary, status, salary_id, employees_id, total_deductions) VALUES
-- ('2024-04-01', 'April', 50000.00, 'Pending', 1, 1, 1500.00),
-- ('2024-04-01', 'April', 30000.00, 'Pending', 2, 2, 800.00);

-- UPDATE salary_info SET total_deductions = monthly_salary * 0.05 WHERE id = 1;
-- UPDATE salary_info SET total_deductions = monthly_salary * 0.03 WHERE id = 2;

-- ALTER TABLE payroll DROP COLUMN total_deductions;
