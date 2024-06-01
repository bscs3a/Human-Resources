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

INSERT INTO employees (image_url, first_name, middle_name, last_name, dateofbirth, gender, nationality, address, contact_no, email, civil_status, department, position, sss_number, philhealth_number, tin_number, pagibig_number) VALUES
('https://pbs.twimg.com/profile_images/1786051436142596096/wD5JGLmb_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com','Single', 'Human Resources', 'HR Manager/Director','3934191496','254323228890','811863948','077652901241'),
('https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com','Single', 'Human Resources', 'Compensation and Benefits Specialist','9842683190','222904801483','398938596','393260427062'),
('https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com','Single', 'Human Resources', 'HR Legal Compliance Specialist','3217127657','982459800458','175523699','723082092314'),
('https://pbs.twimg.com/profile_images/1788847774337044480/hkqRySjw_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com','Divorced', 'Human Resources', 'Recruiter','3831913601','296757397697','136729120','687715123719'),
('public\humanResources\img\noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com','Married', 'Human Resources', 'HR Coordinator','1788631721','493539660119','579494717','254144900265'),
('public\humanResources\img\noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com','Single', 'Product Order', 'Order Processor','5239186621','113821417235','293860405','677900026630'),
('public\humanResources\img\noPhotoAvailable.png', 'Sean Kenji', '', 'Ferrer', '2002-04-22', 'Male', 'Filipino', 'Pampanga', '09123456789', 'seanferrer@example.com','Single', 'Delivery', 'Customer Service Representative','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Aries Joseph', 'Vergara', 'Tagle', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'ariestagle@example.com','Single', 'Finance', 'Financial Analyst','6715934476','786694635416','004821400','284885227548'),
('public\humanResources\img\noPhotoAvailable.png', 'Jared Gilmonde', '', 'Ambrocio', '2003-03-05', 'Male', 'Filipino', 'Pampanga', '09123456789', 'jared@example.com','Single', 'Inventory', 'Inventory Planner','7177011845','518287693103','182964876','853988041841'),
('public\humanResources\img\noPhotoAvailable.png', 'Aian Louise', '', 'Alfaro', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'aian@example.com','Single', 'Point of Sales', 'Business Analyst','901919206','225738265529','3856950537','480432989856'),
('public\humanResources\img\noPhotoAvailable.png', 'Vince Gerald', '', 'Bantigue', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'vincegerald@example.com','Single', 'Delivery', 'Delivery Driver','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Mark John', '', 'Beltran', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'mjbeltran@example.com','Single', 'Delivery', 'Courier','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Shania', '', 'Castro', '2002-01-01', 'Female', 'Filipino', 'Pampanga', '09123456789', 'shania@example.com','Single', 'Delivery', 'Parcel Sorter','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Mark Kevin', '', 'de Dios', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'markkevin@example.com','Single', 'Delivery', 'Delivery Driver','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Niel Joshua', '', 'Dizon', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nieljoshua@example.com','Single', 'Delivery', 'Courier','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Alfred', '', 'Laxamana', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'alfred@example.com','Single', 'Delivery', 'Parcel Sorter','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Ryand', '', 'Soriano', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'ryand@example.com','Single', 'Delivery', 'Delivery Driver','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Simon', '', 'Mackay', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'simonmackay@example.com','Single', 'Delivery', 'Courier','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Steven', '', 'Graham', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'steven@example.com','Single', 'Delivery', 'Parcel Sorter','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Peter', '', 'Dyer', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'peter@example.com','Single', 'Delivery', 'Delivery Driver','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Benjamin', '', 'Scott', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'scott@example.com','Single', 'Delivery', 'Courier','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'David', '', 'Mathis', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'davidmathis@example.com','Single', 'Delivery', 'Parcel Sorter','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Stewart', '', 'Butler', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'stewart@example.com','Single', 'Delivery', 'Delivery Driver','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Anthony', '', 'Underwood', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'underwood@example.com','Single', 'Delivery', 'Courier','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Keith', '', 'Glover', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'gloverkeith@example.com','Single', 'Delivery', 'Parcel Sorter','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Joseph', '', 'Carr', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'carr@example.com','Single', 'Delivery', 'Delivery Driver','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Michael', '', 'Sanderson', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'michaelsanderson@example.com','Single', 'Delivery', 'Courier','8422736704','199055286298','764442924','092261301180'),
('public\humanResources\img\noPhotoAvailable.png', 'Colin', '', 'Greene', '2002-01-01', 'Male', 'Filipino', 'Pampanga', '09123456789', 'colineberde@example.com','Single', 'Delivery', 'Parcel Sorter','8422736704','199055286298','764442924','092261301180');

CREATE TABLE account_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    -- role ENUM('Product Order','Human Resources','Point of Sales', 'Inventory','Finance','Delivery') NOT NULL,
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

INSERT INTO account_info (username, password, employees_id) VALUES
('bscs3a001', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 1), -- BSCS3AHR!
('bscs3a002', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 2), 
('bscs3a003', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 3), 
('bscs3a004', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 4), 
('bscs3a005', '$2y$10$iQV1mMZ7wNqr8dz7tvLLGu7oW5B3nkui35vdRtGEzJs3dCsuptmcK', 5),
('bscs3a006', '$2y$10$Sipls.NxKvU5N7AGAEmy5.HvsXo2j080wk9cHih8h2puA.kSeJNna', 6), -- BSCS3APO!
('bscs3a007', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 7), -- BSCS3ADL!
('bscs3a008', '$2y$10$uxtn/YaNWUUgbFmgNeuf3Orijlbu.kq1lbLt3jXYGf/ZRJZ2Ccgyq', 8), -- BSCS3AFN!
('bscs3a009', '$2y$10$2zKFlxCS7GcQ6h3fnBSFMuSjMMP2J1GIRPF4u7jcRb848dOnZA7ZG', 9), -- BSCS3AIN!
('bscs3a010', '$2y$10$vgUdfpy3TvypVuracMwvHu9.EYJeBmO2/tnMAfRstMIE20hm3TZJy', 10), -- BSCS3ASL!
('bscs3a011', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 11), -- BSCS3ADL!
('bscs3a012', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 12), -- BSCS3ADL! 
('bscs3a013', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 13), -- BSCS3ADL! 
('bscs3a014', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 14), -- BSCS3ADL! 
('bscs3a015', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 15), -- BSCS3ADL! 
('bscs3a016', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 16), -- BSCS3ADL! 
('bscs3a017', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 17), -- BSCS3ADL! 
('bscs3a018', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 18), -- BSCS3ADL! 
('bscs3a019', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 19), -- BSCS3ADL! 
('bscs3a020', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 20), -- BSCS3ADL! 
('bscs3a021', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 21), -- BSCS3ADL! 
('bscs3a022', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 22), -- BSCS3ADL! 
('bscs3a023', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 23), -- BSCS3ADL! 
('bscs3a024', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 24), -- BSCS3ADL! 
('bscs3a025', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 25), -- BSCS3ADL! 
('bscs3a026', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 26), -- BSCS3ADL! 
('bscs3a027', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 27), -- BSCS3ADL! 
('bscs3a028', '$2y$10$AN1T1y9jDmspV1peH2Z30eBjihyeOacoh/UWrO4q1X9e5JNybNzqa', 28); -- BSCS3ADL!  

CREATE TABLE employment_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    dateofhire DATE NOT NULL,
    startdate DATE NOT NULL,
    enddate DATE,
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

INSERT INTO employment_info (dateofhire, startdate, enddate, employees_id) VALUES
('2021-01-01', '2021-01-01', NULL, 1),
('2021-01-01', '2021-01-01', NULL, 2),
('2021-01-01', '2021-01-01', NULL, 3),
('2021-01-01', '2021-01-01', NULL, 4),
('2021-01-01', '2021-01-01', NULL, 5),
('2024-04-11', '2024-04-11', NULL, 6),
('2024-04-11', '2024-04-11', NULL, 7),
('2024-04-11', '2024-04-11', NULL, 8),
('2024-04-11', '2024-04-11', NULL, 9),
('2024-04-11', '2024-04-11', NULL, 10),
('2024-04-11', '2024-04-11', NULL, 11),
('2024-04-11', '2024-04-11', NULL, 12),
('2024-04-11', '2024-04-11', NULL, 13),
('2024-04-11', '2024-04-11', NULL, 14),
('2024-04-11', '2024-04-11', NULL, 15),
('2024-04-11', '2024-04-11', NULL, 16),
('2024-04-11', '2024-04-11', NULL, 17),
('2024-04-11', '2024-04-11', NULL, 18),
('2024-04-11', '2024-04-11', NULL, 19),
('2024-04-11', '2024-04-11', NULL, 20),
('2024-04-11', '2024-04-11', NULL, 21),
('2024-04-11', '2024-04-11', NULL, 22),
('2024-04-11', '2024-04-11', NULL, 23),
('2024-04-11', '2024-04-11', NULL, 24),
('2024-04-11', '2024-04-11', NULL, 25),
('2024-04-11', '2024-04-11', NULL, 26),
('2024-04-11', '2024-04-11', NULL, 27),
('2024-04-11', '2024-04-11', NULL, 28);

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

INSERT INTO salary_info (monthly_salary, total_salary, total_deductions, employees_id) VALUES
(80000.00, 45507.54, 34492.46, 1),
(45000.00, 30909.00, 14091.00, 2),
(35000.00, 26357.00, 8643, 3),
(30000.00, 23747.67, 6252.33, 4),
(25000.00, 20971.67, 4028.33, 5),
(18000.00, 16093.60, 1906.4, 6),
(20000.00, 17904.00, 2096, 7),
(45000.00, 30909.00, 14091.00, 8),
(35000.00, 26357.00, 8643, 9),
(45000.00, 30909.00, 14091.00, 10),
(15000.00, 13378.00, 1622.00, 11),
(18000.00, 16093.60, 1906.4, 12),
(15000.00, 13378.00, 1622.00, 13),
(15000.00, 13378.00, 1622.00, 14),
(18000.00, 16093.60, 1906.4, 15),
(15000.00, 13378.00, 1622.00, 16),
(15000.00, 13378.00, 1622.00, 17),
(18000.00, 16093.60, 1906.4, 18),
(15000.00, 13378.00, 1622.00, 19),
(15000.00, 13378.00, 1622.00, 20),
(18000.00, 16093.60, 1906.4, 21),
(15000.00, 13378.00, 1622.00, 22),
(15000.00, 13378.00, 1622.00, 23),
(18000.00, 16093.60, 1906.4, 24),
(15000.00, 13378.00, 1622.00, 25),
(15000.00, 13378.00, 1622.00, 26),
(18000.00, 16093.60, 1906.4, 27),
(15000.00, 13378.00, 1622.00, 28);


CREATE TABLE tax_info (
    id INT(10) NOT NULL AUTO_INCREMENT,
    income_tax DECIMAL(10,2) NOT NULL,
    withholding_tax DECIMAL(10,2) NOT NULL,
    salary_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (salary_id) REFERENCES salary_info (id)
);

INSERT INTO tax_info (income_tax, withholding_tax, salary_id) VALUES
(14833.33, 11875.13, 1),
(5416.67, 4208.33, 2),
(2916.67, 2208.33, 3),
(1833.33, 1375.00, 4),
(833.33, 625.00, 5),
(0.00, 0.00, 6),
(0.00, 0.00, 7),
(5416.67, 4208.33, 8),
(2916.67, 2208.33, 9),
(5416.67, 4208.33, 10),
(0.00, 0.00, 11),
(0.00, 0.00, 12),
(0.00, 0.00, 13),
(0.00, 0.00, 14),
(0.00, 0.00, 15),
(0.00, 0.00, 16),
(0.00, 0.00, 17),
(0.00, 0.00, 18),
(0.00, 0.00, 19),
(0.00, 0.00, 20),
(0.00, 0.00, 21),
(0.00, 0.00, 22),
(0.00, 0.00, 23),
(0.00, 0.00, 24),
(0.00, 0.00, 25),
(0.00, 0.00, 26),
(0.00, 0.00, 27),
(0.00, 0.00, 28);

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

INSERT INTO benefit_info (philhealth, sss_fund, pagibig_fund, thirteenth_month, salary_id) VALUES
(4000.00, 3584.00, 200.00, 80000.00, 1),
(2250.00, 2016.00, 200.00, 45000.00, 2),
(1750.00, 1568.00, 200.00, 35000.00, 3),
(1500.00, 1344.00, 200.00, 30000.00, 4),
(1250.00, 1120.00, 200.00, 25000.00, 5),
(900.00, 806.40, 200.00, 18000.00, 6),
(1000.00, 896.00, 200.00, 20000.00, 7),
(2250.00, 2016.00, 200.00, 45000.00, 8),
(1750.00, 1568.00, 200.00, 35000.00, 9),
(2250.00, 2016.00, 200.00, 45000.00, 10),
(750.00, 672.00, 200.00, 15000.00, 11),
(900.00, 806.40, 200.00, 18000.00, 12),
(750.00, 672.00, 200.00, 15000.00, 13),
(750.00, 672.00, 200.00, 15000.00, 14),
(900.00, 806.40, 200.00, 18000.00, 15),
(750.00, 672.00, 200.00, 15000.00, 16),
(750.00, 672.00, 200.00, 15000.00, 17),
(900.00, 806.40, 200.00, 18000.00, 18),
(750.00, 672.00, 200.00, 15000.00, 19),
(750.00, 672.00, 200.00, 15000.00, 20),
(900.00, 806.40, 200.00, 18000.00, 21),
(750.00, 672.00, 200.00, 15000.00, 22),
(750.00, 672.00, 200.00, 15000.00, 23),
(900.00, 806.40, 200.00, 18000.00, 24),
(750.00, 672.00, 200.00, 15000.00, 25),
(750.00, 672.00, 200.00, 15000.00, 26),
(900.00, 806.40, 200.00, 18000.00, 27),
(750.00, 672.00, 200.00, 15000.00, 28);

CREATE TABLE products (
  ProductID int(11) NOT NULL AUTO_INCREMENT,
  Supplier_ID int(11) NOT NULL,
  Category_ID int(11) NOT NULL,
  ProductImage varchar(250) NOT NULL,
  ProductName varchar(100) DEFAULT NULL,
  Supplier varchar(50) NOT NULL,
  Description varchar(255) DEFAULT NULL,
  Category varchar(50) DEFAULT NULL,
  DeliveryRequired varchar(3) DEFAULT NULL,
  Price decimal(10,2) DEFAULT NULL,
  Stocks int(11) DEFAULT NULL,
  UnitOfMeasurement varchar(20) DEFAULT NULL,
  TaxRate decimal(5,2) DEFAULT NULL,
  ProductWeight decimal(10,2) DEFAULT NULL,
  Status varchar(35) NOT NULL,
  PRIMARY KEY (ProductID)
);

INSERT INTO products (ProductID, Supplier_ID, Category_ID, ProductImage, ProductName, Supplier, Description, Category, DeliveryRequired, Price, Stocks, UnitOfMeasurement, TaxRate, ProductWeight, Status) VALUES
(1, 1, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)', 'Supplier A', 'Heavy-duty hammer for construction work', NULL, 'No', 329.00, 50, 'pcs', 0.12, 1.50, ''),
(2, 2, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'Supplier B', 'Set of 6 screwdrivers with various sizes', NULL, 'No', 969.00, 30, 'set', 0.12, 0.80, ''),
(3, 3, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Supplier C', 'Portland cement for construction purposes', NULL, 'Yes', 240.00, 100, 'pcs', 0.12, 50.00, ''),
(4, 4, 2, 'uploads/Gravel_(1_ton).png', 'Gravel (1 ton)', 'Default Supplier', 'Crushed stone for construction projects', NULL, 'Yes', 550.00, 50, 'ton', 0.12, 907.19, ''),
(5, 5, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'Default Supplier', 'Set of 10 paint brushes for art projects', NULL, 'No', 209.00, 20, 'set', 0.12, 0.50, ''),
(6, 6, 4, 'uploads/Safety_Helmet.png', 'Safety Helmet', 'Default Supplier', 'Hard hat helmet for construction safety', NULL, 'No', 470.00, 40, 'pcs', 0.12, 0.30, ''),
(7, 7, 1, 'uploads/Drill_Machine.png', 'Drill Machine', 'Default Supplier', 'Cordless drill machine with rechargeable batteries', NULL, 'No', 1100.00, 15, 'pcs', 0.12, 2.00, ''),
(8, 8, 2, 'uploads/Plywood_(4x8_feet).png', 'Plywood (4x8 feet)', 'Default Supplier', 'Plywood sheets for carpentry and construction', NULL, 'Yes', 650.00, 30, 'sheet', 0.12, 20.00, ''),
(9, 9, 2, 'uploads/Steel_Bar_(1_meter).png', 'Steel Bar (1 meter)', 'Default Supplier', 'Deformed steel bars for reinforcement in concrete construction', NULL, 'Yes', 55.00, 200, 'meter', 0.12, 2.50, ''),
(10, 10, 5, 'uploads/Paint_Thinner.png', 'Paint Thinner', 'Default Supplier', 'Solvent used for thinning oil-based paints and cleaning paint brushes', NULL, 'No', 170.00, 50, 'pcs', 0.12, 1.00, ''),
(11, 11, 2, 'uploads/Concrete_Blocks_(Standard).png', 'Concrete Blocks (Standard)', 'Default Supplier', 'Standard concrete blocks for building walls', NULL, 'Yes', 12.00, 200, 'pcs', 0.12, 2.30, ''),
(12, 12, 2, 'uploads/Roofing_Shingles_(Bundle).png', 'Roofing Shingles (Bundle)', 'Default Supplier', 'Bundle of roofing shingles for covering roofs', NULL, 'Yes', 1750.00, 100, 'bundle', 0.12, 13.61, ''),
(13, 13, 2, 'uploads/Sand_(1_cubic_yard).jpg', 'Sand (1 cubic yard)', 'Default Supplier', 'Fine aggregate sand for various construction applications', NULL, 'Yes', 1500.00, 150, 'cubic yard', 0.12, 1088.62, ''),
(14, 14, 2, 'uploads/Brick_(Standard).png', 'Brick (Standard)', 'Default Supplier', 'Standard clay bricks for construction', NULL, 'Yes', 12.00, 500, 'pcs', 0.12, 2.50, ''),
(15, 15, 2, 'uploads/Wood_Studs_(8_feet).png', 'Wood Studs (8 feet)', 'Default Supplier', 'Standard wood studs for framing walls', NULL, 'Yes', 225.00, 300, '8 feet', 0.12, 3.63, ''),
(16, 16, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Default Supplier', 'Galvanized nails for various construction applications', NULL, 'Yes', 50.00, 100, 'lbs', 0.12, 2.27, ''),
(17, 17, 2, 'uploads/Drywall_(4x8_feet).png', 'Drywall (4x8 feet)', 'Default Supplier', 'Drywall sheets for interior wall finishing', NULL, 'Yes', 450.00, 200, 'sheet', 0.12, 22.68, ''),
(18, 18, 2, 'uploads/Concrete_Mix_(50_lb).png', 'Concrete Mix (50 lb)', 'Default Supplier', 'Pre-mixed concrete for small-scale construction projects', NULL, 'Yes', 365.00, 150, 'lb', 0.12, 22.68, ''),
(19, 19, 1, 'uploads/Adjustable_Wrench_(12_inches).png', 'Adjustable Wrench (12 inches)', 'Supplier D', 'Adjustable wrench for plumbing and mechanical work', NULL, 'No', 109.00, 50, 'pcs', 0.12, 1.20, ''),
(20, 20, 1, 'uploads/Electric_Screwdriver.png', 'Electric Screwdriver', 'Supplier E', 'Electric screwdriver with multiple torque settings', NULL, 'No', 269.00, 30, 'pcs', 0.12, 1.80, ''),
(21, 21, 2, 'uploads/PVC_Pipes_(10_feet).png', 'PVC Pipes (10 feet)', 'Supplier F', 'PVC pipes for plumbing and drainage systems', NULL, 'Yes', 42.00, 100, '10 feet', 0.12, 6.00, ''),
(22, 22, 2, 'uploads/Insulation_Foam_Board_(4x8_feet).png', 'Insulation Foam Board (4x8 feet)', 'Supplier G', 'Foam boards for insulation purposes in construction', NULL, 'Yes', 380.00, 80, 'sheet', 0.12, 12.00, ''),
(23, 23, 3, 'uploads/Watercolor_Paint_Set.png', 'Watercolor Paint Set', 'Supplier H', 'Set of high-quality watercolor paints for artists', NULL, 'No', 109.00, 25, 'set', 0.12, 0.60, ''),
(24, 24, 4, 'uploads/High-Visibility_Safety_Vest.png', 'High-Visibility Safety Vest', 'Supplier I', 'Fluorescent safety vest for high-visibility in construction areas', NULL, 'No', 58.00, 60, 'pcs', 0.12, 0.40, ''),
(25, 25, 5, 'uploads/Acrylic_Paint_Set.png', 'Acrylic Paint Set', 'Supplier J', 'Set of vibrant acrylic paints suitable for various surfaces', NULL, 'No', 99.00, 40, 'set', 0.12, 0.70, ''),
(26, 26, 3, 'uploads/Oil_Paint_Set.png', 'Oil Paint Set', 'Supplier K', 'Set of high-quality oil paints for professional artists', NULL, 'No', 129.00, 30, 'set', 0.12, 0.80, ''),
(27, 27, 3, 'uploads/Sketching_Pencils_(Set_of_12).png', 'Sketching Pencils (Set of 12)', 'Supplier L', 'Set of graphite sketching pencils for drawing and shading', NULL, 'No', 45.00, 50, 'set', 0.12, 0.30, ''),
(28, 28, 3, 'uploads/Canvas_Roll_(6_feet).png', 'Canvas Roll (6 feet)', 'Supplier M', 'Roll of primed canvas for painting', NULL, 'Yes', 40.00, 20, 'roll', 0.12, 3.00, ''),
(29, 29, 4, 'uploads/Hard_Hat_with_Ear_Protection.png', 'Hard Hat with Ear Protection', 'Supplier N', 'Safety hard hat with built-in ear protection for noisy environments', NULL, 'No', 305.00, 40, 'pcs', 0.12, 0.50, ''),
(30, 30, 4, 'uploads/Steel-Toed_Boots.png', 'Steel-Toed Boots', 'Supplier O', 'Heavy-duty steel-toed boots for foot protection in construction sites', NULL, 'No', 799.00, 25, 'pair', 0.12, 2.00, ''),
(31, 31, 4, 'uploads/Reflective_Safety_Tape_(Roll).png', 'Reflective Safety Tape (Roll)', 'Supplier P', 'Roll of reflective tape for enhancing visibility on safety gear', NULL, 'No', 40.00, 60, 'roll', 0.12, 0.20, ''),
(32, 32, 5, 'uploads/Wood_Stain_(1_quart).jpg', 'Wood Stain (1 quart)', 'Supplier Q', 'High-quality wood stain for finishing wood surfaces', NULL, 'No', 215.00, 40, 'quart', 0.12, 2.00, ''),
(33, 33, 5, 'uploads/Paint_Roller_Set.png', 'Paint Roller Set', 'Supplier R', 'Set of paint rollers for applying paint smoothly on surfaces', NULL, 'No', 300.00, 35, 'set', 0.12, 0.80, ''),
(34, 34, 5, 'uploads/Adhesive_Primer_(1_gallon).png', 'Adhesive Primer (1 gallon)', 'Supplier S', 'Adhesive primer for preparing surfaces before painting', NULL, 'No', 210.00, 20, 'gallon', 0.12, 8.00, '');

CREATE TABLE grouptype (
  grouptype varchar(2) NOT NULL,
  description varchar(255) NOT NULL,
  requiresinfo tinyint(1) NOT NULL,
  PRIMARY KEY (grouptype)
);

INSERT INTO grouptype (grouptype, description, requiresinfo) VALUES
('AA', 'Asset', 0),
('EP', 'Expenses', 0),
('IC', 'Income', 0),
('LE', 'liabilities and owner\'s equity', 1);

CREATE TABLE transactiontype_de (
  XactTypeCode varchar(2) NOT NULL,
  name varchar(255) NOT NULL,
  PRIMARY KEY (XactTypeCode)
);

INSERT INTO transactiontype_de (XactTypeCode, name) VALUES
('Cr', 'Credit'),
('Dr', 'Debit');

CREATE TABLE accounttype (
  AccountType int(11) NOT NULL AUTO_INCREMENT,
  Description varchar(255) NOT NULL,
  grouptype varchar(2) NOT NULL,
  XactTypeCode varchar(2) NOT NULL,
  PRIMARY KEY (AccountType),
  FOREIGN KEY (grouptype) REFERENCES grouptype (grouptype),
  FOREIGN KEY (XactTypeCode) REFERENCES transactiontype_de (XactTypeCode)
);

INSERT INTO accounttype (AccountType, Description, grouptype, XactTypeCode) VALUES
(1, 'Fixed assets', 'AA', 'DR'),
(2, 'Current assets', 'AA', 'DR'),
(3, 'Capital Accounts', 'LE', 'CR'),
(4, 'Accounts Payable', 'LE', 'CR'),
(5, 'Sales', 'IC', 'CR'),
(6, 'Contra-Revenue', 'IC', 'DR'),
(7, 'Direct Expense', 'EP', 'DR'),
(8, 'Indirect Expense', 'EP', 'DR'),
(9, 'Purchases', 'IC', 'DR'),
(10, 'Tax Payable', 'LE', 'Cr'),
(11, 'Retained', 'LE', 'Cr');

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

INSERT INTO applicants (image_url, first_name, middle_name, last_name, dateofbirth, gender, nationality, civil_status, applyingForDepartment, address, contact_no, email, applyingForPosition) VALUES
('https://pbs.twimg.com/profile_images/1776936537089089536/Ws5Ihsh7_400x400.jpg', 'Jaruu', 'Eveland', 'Rias', '2001-08-31', 'Male', 'Filipino', 'Single', 'Human Resources', 'Country Roads Take Me Home', '09123456789', 'foxwriter@example.com', 'HR Coordinator'),
('https://pbs.twimg.com/profile_images/1752672426381762560/lGu3Vx-C_400x400.jpg', 'Suzuran', '', 'Yamino', '2001-08-31', 'Female', 'Filipino', 'Single', 'Finance', 'Sorcerer, I Hardly Even Know Her!', '09123456789', 'sorcerer@example.com', 'Credit Analyst');

-- DTR
CREATE TABLE attendance (
    id INT(10) NOT NULL AUTO_INCREMENT,
    attendance_date DATE NOT NULL,
    clock_in VARCHAR(20) NOT NULL,
    clock_out VARCHAR(20) NULL,
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

CREATE TABLE batch_orders (
  Batch_ID int(11) NOT NULL AUTO_INCREMENT,
  Supplier_ID int(11) NOT NULL,
  Time_Ordered time NOT NULL DEFAULT current_timestamp(),
  Date_Ordered date NOT NULL DEFAULT current_timestamp(),
  Items_Subtotal int(11) NOT NULL,
  Total_Amount int(11) NOT NULL,
  Order_Status varchar(35) NOT NULL,
  PRIMARY KEY (Batch_ID)
);

CREATE TABLE calendar (
    id INT(10) NOT NULL AUTO_INCREMENT,
    event_name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    day ENUM('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO calendar (event_name, date, day) VALUES
('The Day of Valor', '2024-04-09', 'Tuesday'),
('Eidul-Fitar', '2024-04-10', 'Wednesday'),
('Labor Day', '2024-05-01', 'Wednesday');

CREATE TABLE categories (
  Category_ID int(11) NOT NULL AUTO_INCREMENT,
  Category_Name varchar(50) NOT NULL,
  PRIMARY KEY (Category_ID)
);

INSERT INTO categories (Category_ID, Category_Name) VALUES
(1, 'Hand Tools'),
(2, 'Power Tools'),
(5, 'Tools'),
(6, 'Building Materials'),
(7, 'Art Supplies'),
(8, 'Safety Gear'),
(9, 'Paints and Chemicals');

CREATE TABLE customers (
  CustomerID int(11) NOT NULL AUTO_INCREMENT,
  FirstName varchar(100) DEFAULT NULL,
  LastName varchar(100) DEFAULT NULL,
  Phone varchar(20) DEFAULT NULL,
  Email varchar(100) DEFAULT NULL,
  PRIMARY KEY (CustomerID)
);

CREATE TABLE sales (
  SaleID int(11) NOT NULL AUTO_INCREMENT,
  SaleDate datetime DEFAULT NULL,
  SalePreference enum('Delivery','Pick-up') DEFAULT NULL,
  ShippingFee decimal(10,2) DEFAULT NULL,
  PaymentMode enum('Cash','Card') DEFAULT NULL,
  CardNumber varchar(16) DEFAULT NULL,
  ExpiryDate text DEFAULT NULL,
  CVV varchar(3) DEFAULT NULL,
  TotalAmount decimal(10,2) DEFAULT NULL,
  EmployeeID int(11) DEFAULT NULL,
  CustomerID int(11) DEFAULT NULL,
  PRIMARY KEY (SaleID),
  FOREIGN KEY (EmployeeID) REFERENCES employees (id),
  FOREIGN KEY (CustomerID) REFERENCES customers (CustomerID)
);

INSERT INTO sales (SaleID, SaleDate, SalePreference, ShippingFee, PaymentMode, CardNumber, ExpiryDate, CVV, TotalAmount, EmployeeID, CustomerID) VALUES
(1, '2022-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 150.00, 1, NULL),
(2, '2022-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 250.00, 2, NULL),
(3, '2022-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 180.00, 3, NULL),
(4, '2022-04-10 09:15:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 200.00, 1, NULL),
(5, '2022-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 300.00, 2, NULL),
(6, '2022-06-08 16:30:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 350.00, 3, NULL),
(7, '2022-07-14 10:00:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 180.00, 1, NULL),
(8, '2022-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 270.00, 2, NULL),
(9, '2022-09-05 15:20:00', 'Delivery', 20.00, 'Card', NULL, NULL, NULL, 400.00, 3, NULL),
(10, '2022-10-18 09:30:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 220.00, 1, NULL),
(11, '2022-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 280.00, 2, NULL),
(12, '2022-12-30 14:00:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 320.00, 3, NULL),
(13, '2023-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 200.00, 1, NULL),
(14, '2023-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 300.00, 2, NULL),
(15, '2023-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 250.00, 3, NULL),
(16, '2023-04-10 09:15:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 350.00, 1, NULL),
(17, '2023-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 400.00, 2, NULL),
(18, '2023-06-08 16:30:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 450.00, 3, NULL),
(19, '2023-07-14 10:00:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 300.00, 1, NULL),
(20, '2023-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 350.00, 2, NULL),
(21, '2023-09-05 15:20:00', 'Delivery', 20.00, 'Card', NULL, NULL, NULL, 500.00, 3, NULL),
(22, '2023-10-18 09:30:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 400.00, 1, NULL),
(23, '2023-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 450.00, 2, NULL),
(24, '2023-12-30 14:00:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 500.00, 3, NULL),
(25, '2024-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 210.00, 1, NULL),
(26, '2024-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 310.00, 2, NULL),
(27, '2024-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 260.00, 3, NULL);

CREATE TABLE trucks (
  TruckID int(11) NOT NULL AUTO_INCREMENT,
  PlateNumber varchar(20) DEFAULT NULL,
  TruckType enum('Light-Duty','Heavy-Duty') DEFAULT NULL,
  Capacity decimal(10,2) DEFAULT NULL,
  TruckStatus enum('Available','In Transit','Unavailable') DEFAULT 'Available',
  PRIMARY KEY (TruckID)
);

CREATE TABLE deliveryorders (
  DeliveryOrderID int(11) NOT NULL AUTO_INCREMENT,
  SaleID int(11) DEFAULT NULL,
  ProductID int(11) DEFAULT NULL,
  Quantity int(11) DEFAULT NULL,
  ProductWeight decimal(10,2) DEFAULT NULL,
  Province varchar(255) DEFAULT NULL,
  Municipality varchar(255) DEFAULT NULL,
  StreetBarangayAddress varchar(255) DEFAULT NULL,
  DeliveryDate date DEFAULT NULL,
  ReceivedDate date DEFAULT NULL,
  DeliveryStatus enum('Pending','In Transit','Delivered','Failed to deliver') DEFAULT 'Pending',
  TruckID int(11) DEFAULT NULL,
  PRIMARY KEY (DeliveryOrderID),
  FOREIGN KEY (SaleID) REFERENCES sales (SaleID),
  FOREIGN KEY (ProductID) REFERENCES products (ProductID),
  FOREIGN KEY (TruckID) REFERENCES trucks (TruckID)
);

CREATE TABLE employeetrucks (
  EmployeeID int(11) DEFAULT NULL AUTO_INCREMENT,
  TruckID int(11) DEFAULT NULL,
  FOREIGN KEY (EmployeeID) REFERENCES employees (id),
  FOREIGN KEY (TruckID) REFERENCES trucks (TruckID)
);

CREATE TABLE feedbacks (
  feedback_ID int(11) NOT NULL AUTO_INCREMENT,
  supplier_ID int(11) NOT NULL,
  batch_ID int(11) NOT NULL,
  user varchar(35) NOT NULL,
  reviews varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (feedback_ID)
);

CREATE TABLE ledger (
  ledgerno int(11) NOT NULL AUTO_INCREMENT,
  AccountType int(11) NOT NULL,
  name varchar(255) NOT NULL,
  contactIfLE varchar(255) DEFAULT NULL,
  contactName varchar(255) DEFAULT NULL,
  PRIMARY KEY (ledgerno),
  FOREIGN KEY (AccountType) REFERENCES accounttype (AccountType)
);

INSERT INTO ledger (ledgerno, AccountType, name, contactIfLE, contactName) VALUES
(1, 1, 'Equipment', NULL, NULL),
(2, 1, 'Land', NULL, NULL),
(3, 2, 'Cash on hand', NULL, NULL),
(4, 2, 'Cash on bank', NULL, NULL),
(5, 2, 'Insurance', NULL, NULL),
(6, 2, 'Inventory', NULL, NULL),
(7, 3, 'A account', NULL, NULL),
(8, 3, 'B account', NULL, NULL),
(9, 4, 'C account', NULL, NULL),
(10, 4, 'D account', NULL, NULL),
(11, 5, 'Sales', NULL, NULL),
(12, 6, 'Discount', NULL, NULL),
(13, 6, 'Allowance', NULL, NULL),
(14, 6, 'Returns', NULL, NULL),
(15, 7, 'Payroll', NULL, NULL),
(16, 7, 'Fuel/Gas', NULL, NULL),
(17, 8, 'Rent', NULL, NULL),
(18, 8, 'Income Tax', NULL, NULL),
(19, 8, 'Insurance Expense', NULL, NULL),
(20, 8, 'Utilities', NULL, NULL),
(21, 8, 'Theft Expense', NULL, NULL),
(22, 8, 'Interest Expense', NULL, NULL),
(23, 8, 'Other Operating Expense', NULL, NULL),
(24, 9, 'Cost of Goods Sold', NULL, NULL),
(25, 11, 'Retained Earnings/Loss', NULL, NULL),
(26, 10, 'Income Tax Payable', NULL, NULL),
(27, 10, 'Withholding Tax Payable', NULL, NULL),
(28, 4, 'Salary Payable', NULL, NULL),
(29, 10, 'Value Added Tax Payable', NULL, NULL),
(32, 3, 'aries', '123456789', 'aries tagle assitant'),
(33, 3, 'a2', 'a2', 'a2'),
(36, 4, 'a3', 'a3', 'a3'),
(37, 10, 'a4', 'a4', 'a4');

CREATE TABLE ledgertransaction (
  LedgerXactID int(11) NOT NULL AUTO_INCREMENT,
  LedgerNo int(11) NOT NULL,
  DateTime datetime NOT NULL DEFAULT current_timestamp(),
  LedgerNo_Dr int(11) NOT NULL,
  amount double NOT NULL,
  details text DEFAULT NULL,
  PRIMARY KEY (LedgerXactID),
  FOREIGN KEY (LedgerNo) REFERENCES ledger (ledgerno),
  FOREIGN KEY (LedgerNo_Dr) REFERENCES ledger (ledgerno)
);

INSERT INTO ledgertransaction (LedgerXactID, LedgerNo, DateTime, LedgerNo_Dr, amount, details) VALUES
(33828, 3, '2024-05-14 09:31:14', 1, 10, 'Pondo expense for Finance'),
(33832, 3, '2024-05-14 11:30:04', 1, 10, 'Pondo expense for Human Resources'),
(33833, 4, '2024-05-15 18:04:46', 6, 100, NULL),
(33834, 6, '2024-05-15 12:05:27', 21, 10, 'Missing Inventory'),
(33835, 6, '2024-05-15 12:05:50', 24, 10, 'Recount Inventory'),
(33844, 11, '2024-05-15 12:37:08', 4, 90, 'made a sale with tax'),
(33845, 29, '2024-05-15 12:37:09', 4, 10, 'made a sale with tax'),
(33846, 4, '2024-05-15 12:37:09', 12, 10, 'Discount given'),
(33847, 4, '2024-05-15 12:40:40', 13, 10, 'Sales allowance'),
(33848, 4, '2024-05-15 12:40:56', 14, 10, 'Sales return'),
(33855, 28, '2024-05-17 11:54:45', 4, 100, 'Boroww on 28 with 4'),
(33856, 4, '2024-05-17 11:55:21', 28, 100, 'Paid 28 using 4'),
(33857, 28, '2024-05-17 11:57:33', 4, 100, 'Boroww on 28 with 4'),
(33858, 4, '2024-05-17 11:57:38', 28, 100, 'Paid 28 using 4'),
(33859, 28, '2024-05-17 11:58:55', 4, 100, 'Boroww on 28 with 4'),
(33860, 4, '2024-05-17 12:00:12', 28, 100, 'Pondo expense for Human Resources'),
(33861, 27, '2024-05-17 12:01:13', 4, 100, 'Boroww on 27 with 4'),
(33862, 4, '2024-05-17 12:01:13', 27, 100, 'Pondo expense for Human Resources'),
(33864, 32, '2024-05-17 12:08:16', 4, 100, 'Investment of 32 in 4 with 100'),
(33865, 4, '2024-05-17 12:08:38', 32, 100, 'Investment of 32 in 4'),
(34070, 32, '2024-05-17 13:14:13', 1, 100, 'Investment of 32 in 1 with 100'),
(34071, 3, '2024-05-17 13:14:19', 32, 100, 'Investment of 32 in 3'),
(34072, 36, '2024-05-17 13:15:58', 1, 100, 'Boroww on 36 with 1'),
(34073, 3, '2024-05-17 13:16:03', 36, 100, 'Paid 36 using 3'),
(34083, 37, '2024-05-17 13:18:46', 2, 100, 'Boroww on 37 with 2'),
(34084, 4, '2024-05-17 13:19:16', 37, 100, 'Paid 37 using 4'),
(35225, 11, '2024-04-01 08:53:46', 4, 100, 'sales try'),
(35230, 25, '2024-04-30 23:59:59', 11, 100, 'closing of account'),
(35231, 7, '2024-04-30 23:59:59', 25, 100, 'giving the remaining to the owner');

CREATE TABLE funds_transaction (
  id int(11) NOT NULL AUTO_INCREMENT,
  employee_id int(11) NOT NULL,
  lt_id int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (lt_id) REFERENCES ledgertransaction (LedgerXactID),
  FOREIGN KEY (employee_id) REFERENCES employees (id)
);

INSERT INTO funds_transaction (id, employee_id, lt_id) VALUES
(7, 1, 33828),
(19, 1, 33860),
(20, 1, 33862);

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

INSERT INTO leave_requests (type, details, start_date, end_date, status, employees_id) VALUES
('Sick Leave', 'Enjoy this moon necklace. I got it for you. You remind me of the moon, because it\'s always there and it\'s beautiful.', '2024-08-27 08:00:00', '2024-08-28 08:00:00', 'Pending', 1);

CREATE TABLE order_details (
  Order_ID int(11) NOT NULL AUTO_INCREMENT,
  Product_ID int(11) NOT NULL,
  Supplier_ID int(11) NOT NULL,
  Batch_ID int(11) NOT NULL,
  Product_Quantity int(11) DEFAULT NULL,
  Time_Ordered time NOT NULL DEFAULT current_timestamp(),
  Date_Ordered date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (Order_ID)
);

CREATE TABLE payroll (
    id INT(10) NOT NULL AUTO_INCREMENT,
    pay_date DATE NOT NULL,
    month VARCHAR(20) NOT NULL,
    -- deductions DECIMAL(10,2) NOT NULL,
    -- monthly_salary DECIMAL(10,2) NOT NULL,
    status ENUM('Pending','Paid') DEFAULT 'Pending',
    paid_type ENUM('Cash on hand', 'Cash on bank') NOT NULL,
    salary_id INT(10) NOT NULL,
    employees_id INT(10) NOT NULL,
    -- total_deductions DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id),
    FOREIGN KEY (salary_id) REFERENCES salary_info (id)
);

CREATE TABLE returnproducts (
  ReturnID int(11) NOT NULL AUTO_INCREMENT,
  SaleID int(11) DEFAULT NULL,
  ProductID int(11) DEFAULT NULL,
  Quantity int(11) DEFAULT NULL,
  Reason varchar(255) DEFAULT NULL,
  PaymentReturned decimal(10,2) DEFAULT NULL,
  ProductStatus varchar(255) DEFAULT NULL,
  ReturnDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (ReturnID),
  FOREIGN KEY (SaleID) REFERENCES sales (SaleID),
  FOREIGN KEY (ProductID) REFERENCES products (ProductID)
);

CREATE TABLE saledetails (
  SaleDetailID int(11) NOT NULL AUTO_INCREMENT,
  SaleID int(11) DEFAULT NULL,
  ProductID int(11) DEFAULT NULL,
  Quantity int(11) DEFAULT NULL,
  ProductWeight decimal(10,2) DEFAULT NULL,
  UnitPrice decimal(10,2) DEFAULT NULL,
  Subtotal decimal(10,2) DEFAULT NULL,
  Tax decimal(10,2) DEFAULT NULL,
  TotalAmount decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (SaleDetailID),
  FOREIGN KEY (SaleID) REFERENCES sales (SaleID),
  FOREIGN KEY (ProductID) REFERENCES products (ProductID)
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

CREATE TABLE suppliers (
    Supplier_ID int(11) NOT NULL AUTO_INCREMENT,
    Supplier_Name varchar(50) DEFAULT NULL,
    Contact_Name varchar(35) NOT NULL,
    Contact_Number int(20) DEFAULT NULL,
    Status varchar(25) NOT NULL,
    Email varchar(35) NOT NULL,
    Address varchar(50) DEFAULT NULL,
    Estimated_Delivery varchar(50) NOT NULL,
    Shipping_fee varchar(150) NOT NULL,
    Working_days varchar(150) NOT NULL,
    PRIMARY KEY (Supplier_ID)
);

CREATE TABLE targetsales (
    TargetID int(11) NOT NULL AUTO_INCREMENT,
    MonthYear date DEFAULT NULL,
    TargetAmount decimal(10,2) DEFAULT NULL,
    EmployeeID int(11) DEFAULT NULL,
    PRIMARY KEY (TargetID),
    FOREIGN KEY (EmployeeID) REFERENCES employees (id)
);

INSERT INTO targetsales (TargetID, MonthYear, TargetAmount, EmployeeID) VALUES
(1, '2022-01-01', 5000.00, 1),
(2, '2022-02-01', 6000.00, 2),
(3, '2022-03-01', 7000.00, 3),
(4, '2022-04-01', 5500.00, 1),
(5, '2022-05-01', 6500.00, 2),
(6, '2022-06-01', 7500.00, 3),
(7, '2022-07-01', 6000.00, 1),
(8, '2022-08-01', 7000.00, 2),
(9, '2022-09-01', 8000.00, 3),
(10, '2022-10-01', 6000.00, 1),
(11, '2022-11-01', 6500.00, 2),
(12, '2022-12-01', 7500.00, 3),
(13, '2023-01-01', 6000.00, 1),
(14, '2023-02-01', 7000.00, 2),
(15, '2023-03-01', 8000.00, 3),
(16, '2023-04-01', 6500.00, 1),
(17, '2023-05-01', 7500.00, 2),
(18, '2023-06-01', 8500.00, 3),
(19, '2023-07-01', 7000.00, 1),
(20, '2023-08-01', 8000.00, 2),
(21, '2023-09-01', 9000.00, 3),
(22, '2023-10-01', 7000.00, 1),
(23, '2023-11-01', 7500.00, 2),
(24, '2023-12-01', 8500.00, 3),
(25, '2024-01-01', 6100.00, 1),
(26, '2024-02-01', 7100.00, 2),
(27, '2024-03-01', 8100.00, 3);

CREATE TABLE transaction_history (
  Transaction_ID int(11) NOT NULL AUTO_INCREMENT,
  Batch_ID int(11) NOT NULL,
  Supplier_ID int(11) NOT NULL,
  Date_Delivered date DEFAULT current_timestamp(),
  Time_Delivered time DEFAULT current_timestamp(),
  Order_Status varchar(50) DEFAULT NULL,
  Feedback varchar(250) DEFAULT NULL,
  PRIMARY KEY (Transaction_ID)
);

CREATE TABLE audit_log (
  id int(11) NOT NULL,
  account_id int(11) NOT NULL,
  datetime datetime NOT NULL,
  action text NOT NULL,
  FOREIGN KEY (account_id) REFERENCES account_info (id)
);


