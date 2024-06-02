-- (Sales) Audit Trail Table
CREATE TABLE tbl_sls_audit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255),
    log_action VARCHAR(255),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- INSERT INTO tbl_sls_audit (employee_name, log_action) VALUES ('Alfaro, Aian Louise', 'Log in');
-- INSERT INTO tbl_sls_audit (employee_name, log_action) VALUES ('Alfaro, Aian Louise', 'Log out');

-- (Sales) Categories Table
CREATE TABLE IF NOT EXISTS Categories (
    Category_ID INT(11) NOT NULL AUTO_INCREMENT,
    Category_Name VARCHAR(50) NOT NULL,
    PRIMARY KEY (Category_ID)
);

-- (Sales) Products Table
CREATE TABLE IF NOT EXISTS Products (
    ProductID INT(11) NOT NULL AUTO_INCREMENT,
    Supplier_ID INT(11) NOT NULL,
    Category_ID INT(11) NOT NULL,
    ProductImage VARCHAR(250) NOT NULL,
    ProductName VARCHAR(100) DEFAULT NULL,
    Supplier VARCHAR(50) NOT NULL,
    Description VARCHAR(255) DEFAULT NULL,
    DeliveryRequired VARCHAR(3) DEFAULT NULL,
    Price DECIMAL(10,2) DEFAULT NULL,
    Stocks INT(11) DEFAULT NULL,
    UnitOfMeasurement VARCHAR(20) DEFAULT NULL,
    TaxRate DECIMAL(5,2) DEFAULT NULL,
    ProductWeight DECIMAL(10,2) DEFAULT NULL,
    FOREIGN KEY (Category_ID) REFERENCES Categories(Category_ID),
    PRIMARY KEY (ProductID)
);

-- (Sales) Customers Table
CREATE TABLE IF NOT EXISTS Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Phone VARCHAR(20),
    Email VARCHAR(100)
);

-- (Sales) Table with DeliveryDate column
CREATE TABLE IF NOT EXISTS Sales (
    SaleID INT AUTO_INCREMENT PRIMARY KEY,
    SaleDate DATETIME,
    SalePreference ENUM('Delivery', 'Pick-up'),
    ShippingFee DECIMAL(10, 2),
    PaymentMode ENUM('Cash', 'Card'),
    CardNumber VARCHAR(16),
    ExpiryDate TEXT,
    CVV VARCHAR(3),
    TotalAmount DECIMAL(10, 2),
    EmployeeID INT,
    CustomerID INT,
 -- FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- (Sales) SaleDetails Table
CREATE TABLE IF NOT EXISTS SaleDetails (
    SaleDetailID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,
    ProductID INT,
    Quantity INT,
    ProductWeight DECIMAL(10, 2),
    UnitPrice DECIMAL(10, 2),
    Subtotal DECIMAL(10, 2),
    Tax DECIMAL(10, 2),
    TotalAmount DECIMAL(10, 2),
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);
-- (DLV) Trucks Table
CREATE TABLE IF NOT EXISTS Trucks (
    TruckID INT AUTO_INCREMENT PRIMARY KEY,
    PlateNumber VARCHAR(20),
    TruckType ENUM('Light-Duty', 'Heavy-Duty'),
    Capacity DECIMAL(10, 2),
    TruckStatus ENUM('Available', 'In Transit', 'Unavailable') DEFAULT 'Available'
);

-- (SALES) DeliveryOrders Table
CREATE TABLE IF NOT EXISTS DeliveryOrders (
    DeliveryOrderID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,  
    ProductID INT,
    Quantity INT,
    ProductWeight DECIMAL(10, 2),
    Province VARCHAR(255),
    Municipality VARCHAR(255),
    StreetBarangayAddress VARCHAR(255),
    DeliveryDate DATE,
    ReceivedDate DATE,  
    DeliveryStatus ENUM('Pending', 'In Transit', 'Delivered', 'Failed to Deliver') DEFAULT 'Pending',
    TruckID INT,
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (TruckID) REFERENCES Trucks(TruckID)
);

-- (HR) Create a table for employees
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
    sss_number varchar(20) DEFAULT NULL,
    philhealth_number varchar(20) DEFAULT NULL,
    tin_number varchar(20) DEFAULT NULL,
    pagibig_number varchar(20) DEFAULT NULL
    PRIMARY KEY (id)
);
-- (HR) attendance table
CREATE TABLE IF NOT EXISTS attendance (
    id INT(10) NOT NULL AUTO_INCREMENT,
    attendance_date DATETIME NOT NULL,
    clock_in TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    clock_out TIMESTAMP DEFAULT current_timestamp(),
    employees_id INT(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (employees_id) REFERENCES employees (id)
);

-- (DLV) Create a new table to associate employees with trucks
CREATE TABLE IF NOT EXISTS EmployeeTrucks (
    EmployeeID INT,
    TruckID INT,
    FOREIGN KEY (EmployeeID) REFERENCES employees(id),
    FOREIGN KEY (TruckID) REFERENCES Trucks(TruckID)
);

-- (Sales) TargetSales Table
CREATE TABLE IF NOT EXISTS TargetSales (
    TargetID INT AUTO_INCREMENT PRIMARY KEY,
    MonthYear DATE,
    TargetAmount DECIMAL(10, 2),
    EmployeeID INT,
--  FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

-- (Sales) ReturnProducts Table
CREATE TABLE ReturnProducts (
    ReturnID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,
    ProductID INT,
    Quantity INT,
    Reason VARCHAR(255),
    PaymentReturned DECIMAL(10, 2),
    ProductStatus VARCHAR(255), -- Add this line
    ReturnDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);


-- INSERT
INSERT INTO Categories (Category_Name) 
VALUES 
    ('Tools'),
    ('Building Materials'),
    ('Art Supplies'),
    ('Safety Gear'),
    ('Paints and Chemicals');

INSERT INTO Products (Supplier_ID, Category_ID, ProductImage, ProductName, Supplier, Description, DeliveryRequired, Price, Stocks, UnitOfMeasurement, TaxRate, ProductWeight) 
VALUES 
    (1, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)', 'Supplier A', 'Heavy-duty hammer for construction work', 'No', 329.00, 50, 'pcs', 0.12, 1.5),
    (2, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'Supplier B', 'Set of 6 screwdrivers with various sizes', 'No', 969.00, 30, 'set', 0.12, 0.8),
    (3, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Supplier C', 'Portland cement for construction purposes', 'Yes', 240.00, 100, 'pcs', 0.12, 50),
    (4, 2, 'uploads/Gravel_(1_ton).png', 'Gravel (1 ton)', 'Default Supplier', 'Crushed stone for construction projects', 'Yes', 550.00, 50, 'ton', 0.12, 907.185),
    (5, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'Default Supplier', 'Set of 10 paint brushes for art projects', 'No', 209.00, 20, 'set', 0.12, 0.5),
    (6, 4, 'uploads/Safety_Helmet.png', 'Safety Helmet', 'Default Supplier', 'Hard hat helmet for construction safety', 'No', 470.00, 40, 'pcs', 0.12, 0.3),
    (7, 1, 'uploads/Drill_Machine.png', 'Drill Machine', 'Default Supplier', 'Cordless drill machine with rechargeable batteries', 'No', 1100.00, 15, 'pcs', 0.12, 2),
    (8, 2, 'uploads/Plywood_(4x8_feet).png', 'Plywood (4x8 feet)', 'Default Supplier', 'Plywood sheets for carpentry and construction', 'Yes', 650.00, 30, 'sheet', 0.12, 20),
    (9, 2, 'uploads/Steel_Bar_(1_meter).png', 'Steel Bar (1 meter)', 'Default Supplier', 'Deformed steel bars for reinforcement in concrete construction', 'Yes', 55.00, 200, 'meter', 0.12, 2.5),
    (10, 5, 'uploads/Paint_Thinner.png', 'Paint Thinner', 'Default Supplier', 'Solvent used for thinning oil-based paints and cleaning paint brushes', 'No', 170.00, 50, 'pcs', 0.12, 1),
    (11, 2, 'uploads/Concrete_Blocks_(Standard).png', 'Concrete Blocks (Standard)', 'Default Supplier', 'Standard concrete blocks for building walls', 'Yes', 12.00, 200, 'pcs', 0.12, 2.3),
    (12, 2, 'uploads/Roofing_Shingles_(Bundle).png', 'Roofing Shingles (Bundle)', 'Default Supplier', 'Bundle of roofing shingles for covering roofs', 'Yes', 1750.00, 100, 'bundle', 0.12, 13.6078),
    (13, 2, 'uploads/Sand_(1_cubic_yard).jpg', 'Sand (1 cubic yard)', 'Default Supplier', 'Fine aggregate sand for various construction applications', 'Yes', 1500.00, 150, 'cubic yard', 0.12, 1088.62),
    (14, 2, 'uploads/Brick_(Standard).png', 'Brick (Standard)', 'Default Supplier', 'Standard clay bricks for construction', 'Yes', 12.00, 500, 'pcs', 0.12, 2.5),
    (15, 2, 'uploads/Wood_Studs_(8_feet).png', 'Wood Studs (8 feet)', 'Default Supplier', 'Standard wood studs for framing walls', 'Yes', 225.00, 300, '8 feet', 0.12, 3.62874),
    (16, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Default Supplier', 'Galvanized nails for various construction applications', 'Yes',50.00, 100, 'lbs', 0.12, 2.26796),
    (17, 2, 'uploads/Drywall_(4x8_feet).png', 'Drywall (4x8 feet)', 'Default Supplier', 'Drywall sheets for interior wall finishing', 'Yes', 450.00, 200, 'sheet', 0.12, 22.6796),
    (18, 2, 'uploads/Concrete_Mix_(50_lb).png', 'Concrete Mix (50 lb)', 'Default Supplier', 'Pre-mixed concrete for small-scale construction projects', 'Yes', 365.00, 150, 'lb', 0.12, 22.6796),
    (19, 1, 'uploads/Adjustable_Wrench_(12_inches).png', 'Adjustable Wrench (12 inches)', 'Supplier D', 'Adjustable wrench for plumbing and mechanical work', 'No', 109.00, 50, 'pcs', 0.12, 1.2),
    (20, 1, 'uploads/Electric_Screwdriver.png', 'Electric Screwdriver', 'Supplier E', 'Electric screwdriver with multiple torque settings', 'No', 269.00, 30, 'pcs', 0.12, 1.8),
    (21, 2, 'uploads/PVC_Pipes_(10_feet).png', 'PVC Pipes (10 feet)', 'Supplier F', 'PVC pipes for plumbing and drainage systems', 'Yes', 42.00, 100, '10 feet', 0.12, 6),
    (22, 2, 'uploads/Insulation_Foam_Board_(4x8_feet).png', 'Insulation Foam Board (4x8 feet)', 'Supplier G', 'Foam boards for insulation purposes in construction', 'Yes', 380.00, 80, 'sheet', 0.12, 12),
    (23, 3, 'uploads/Watercolor_Paint_Set.png', 'Watercolor Paint Set', 'Supplier H', 'Set of high-quality watercolor paints for artists', 'No', 109.00, 25, 'set', 0.12, 0.6),
    (24, 4, 'uploads/High-Visibility_Safety_Vest.png', 'High-Visibility Safety Vest', 'Supplier I', 'Fluorescent safety vest for high-visibility in construction areas', 'No', 58.00, 60, 'pcs', 0.12, 0.4),
    (25, 5, 'uploads/Acrylic_Paint_Set.png', 'Acrylic Paint Set', 'Supplier J', 'Set of vibrant acrylic paints suitable for various surfaces', 'No', 99.00, 40, 'set', 0.12, 0.7),
    (26, 3, 'uploads/Oil_Paint_Set.png', 'Oil Paint Set', 'Supplier K', 'Set of high-quality oil paints for professional artists', 'No', 129.00, 30, 'set', 0.12, 0.8),
    (27, 3, 'uploads/Sketching_Pencils_(Set_of_12).png', 'Sketching Pencils (Set of 12)', 'Supplier L', 'Set of graphite sketching pencils for drawing and shading', 'No', 45.00, 50, 'set', 0.12, 0.3),
    (28, 3, 'uploads/Canvas_Roll_(6_feet).png', 'Canvas Roll (6 feet)', 'Supplier M', 'Roll of primed canvas for painting', 'Yes', 40.00, 20, 'roll', 0.12, 3),
    (29, 4, 'uploads/Hard_Hat_with_Ear_Protection.png', 'Hard Hat with Ear Protection', 'Supplier N', 'Safety hard hat with built-in ear protection for noisy environments', 'No', 305.00, 40, 'pcs', 0.12, 0.5),
    (30, 4, 'uploads/Steel-Toed_Boots.png', 'Steel-Toed Boots', 'Supplier O', 'Heavy-duty steel-toed boots for foot protection in construction sites', 'No', 799.00, 25, 'pair', 0.12, 2),
    (31, 4, 'uploads/Reflective_Safety_Tape_(Roll).png', 'Reflective Safety Tape (Roll)', 'Supplier P', 'Roll of reflective tape for enhancing visibility on safety gear', 'No', 40.00, 60, 'roll', 0.12, 0.2),
    (32, 5, 'uploads/Wood_Stain_(1_quart).jpg', 'Wood Stain (1 quart)', 'Supplier Q', 'High-quality wood stain for finishing wood surfaces', 'No', 215.00, 40, 'quart', 0.12, 2),
    (33, 5, 'uploads/Paint_Roller_Set.png', 'Paint Roller Set', 'Supplier R', 'Set of paint rollers for applying paint smoothly on surfaces', 'No', 300.00, 35, 'set', 0.12, 0.8),
    (34, 5, 'uploads/Adhesive_Primer_(1_gallon).png', 'Adhesive Primer (1 gallon)', 'Supplier S', 'Adhesive primer for preparing surfaces before painting', 'No', 210.00, 20, 'gallon', 0.12, 8);

    INSERT INTO trucks (TruckType, PlateNumber, Capacity) VALUES ('Light-Duty', 'ALD123', '4000');
    INSERT INTO trucks (TruckType, PlateNumber, Capacity) VALUES ('Light-Duty', 'DUY234', '4000');
    INSERT INTO trucks (TruckType, PlateNumber, Capacity) VALUES ('Light-Duty', 'VRR125', '4000');

    INSERT INTO trucks (TruckType, PlateNumber, Capacity) VALUES ('Heavy-Duty', 'DJD233', '20000');
    INSERT INTO trucks (TruckType, PlateNumber, Capacity) VALUES ('Heavy-Duty', 'PGD994', '20000');
    INSERT INTO trucks (TruckType, PlateNumber, Capacity) VALUES ('Heavy-Duty', 'UHD535', '20000');

    INSERT INTO employees (first_name, middle_name, last_name, dateofbirth, gender, nationality, address, contact_no, email, civil_status, department, position) VALUES
    ('FName1', 'M1', 'LName1', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f1@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName2', 'M2', 'LName2', '1980-01-01', 'Male', 'Filipino', 'Manila, Philippines', '09123456789', 'f2@sample.com', 'Single', 'Delivery', 'Driver'),
    ('FName3', 'M3', 'LName3', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f3@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName4', 'M4', 'LName4', '1980-01-01', 'Male', 'Filipino', 'Manila, Philippines', '09123456789', 'f4@sample.com', 'Single', 'Delivery', 'Driver'),
    ('FName5', 'M5', 'LName5', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f5@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName6', 'M6', 'LName6', '1980-01-01', 'Male', 'Filipino', 'Manila, Philippines', '09123456789', 'f6@sample.com', 'Single', 'Delivery', 'Driver'),
    ('FName7', 'M7', 'LName7', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f7@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName8', 'M8', 'LName8', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f8@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName9', 'M9', 'LName9', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f9@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName10', 'M10', 'LName10', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f10@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName11', 'M11', 'LName11', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f11@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName12', 'M12', 'LName12', '1980-01-01', 'Male', 'Filipino', 'Manila, Philippines', '09123456789', 'f12@sample.com', 'Single', 'Delivery', 'Driver'),
    ('FName13', 'M13', 'LName13', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f13@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName14', 'M14', 'LName14', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f14@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName15', 'M15', 'LName15', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f15@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName16', 'M16', 'LName16', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f16@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName17', 'M17', 'LName17', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f17@sample.com', 'Married', 'Delivery', 'Driver'),
    ('FName18', 'M18', 'LName18', '1997-06-18', 'Male', 'Filipino', 'Manila, Philippines', '09123456772', 'f18@sample.com', 'Married', 'Delivery', 'Driver');

-- Assign 3 employees to each truck
INSERT INTO EmployeeTrucks (EmployeeID, TruckID) VALUES
    (1, 1),
    (2, 1),
    (3, 1),
    (4, 2),
    (5, 2),
    (6, 2),
    (7, 3),
    (8, 3),
    (9, 3),
    (10, 4),
    (11, 4),
    (12, 4),
    (13, 5),
    (14, 5),
    (15, 5),
    (16, 6),
    (17, 6),
    (18, 6);

    -- Attendance check
    INSERT INTO attendance (attendance_date, clock_in, clock_out, employees_id) VALUES
    (CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 1),
    (CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 2),
    (CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 3),
    (CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 16),
    (CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 17),
    (CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 18);

    -- To update delivery orders to 'Pending' status and clear the TruckID and ReceivedDate
    UPDATE deliveryorders
    SET DeliveryStatus = 'Pending',
    ReceivedDate = NULL,
    TruckID = NULL;