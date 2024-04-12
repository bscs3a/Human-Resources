-- (Sales) Products Table
CREATE TABLE Products (
    ProductID INT PRIMARY KEY AUTO_INCREMENT,
    ProductName VARCHAR(100),
    Description VARCHAR(255),
    Category VARCHAR(50),
    DeliveryRequired VARCHAR(3),
    Price DECIMAL(10, 2),
    Stocks INT,
    UnitOfMeasurement VARCHAR(20),
    TaxRate DECIMAL(5, 2),
    ProductWeight DECIMAL(10, 2)
);

-- (Sales) Customers Table
CREATE TABLE IF NOT EXISTS Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Phone VARCHAR(20),
    Email VARCHAR(100)
);

-- (Sales) Employees Table -- Filler onLy
--CREATE TABLE IF NOT EXISTS Employees (
--    EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
--    FirstName VARCHAR(100),
--    LastName VARCHAR(100),
--    Position VARCHAR(100),
--    Email VARCHAR(100),
--    Phone VARCHAR(20)
--);

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
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- (SALES) SaleDetails Table
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

-- (SALES) (DLV) DeliveryOrders Table
CREATE TABLE IF NOT EXISTS DeliveryOrders (
    DeliveryOrderID INT AUTO_INCREMENT PRIMARY KEY,
    SaleID INT,  
    ProductID INT,
    Quantity INT,
    ProductWeight DECIMAL(10, 2),
    DeliveryAddress TEXT,
    DeliveryDate DATE,
    ReceivedDate DATE,  
    DeliveryStatus ENUM('Pending', 'In Transit', 'Delivered', 'Not Delivered') DEFAULT 'Pending',
    TruckID INT,
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (TruckID) REFERENCES Trucks(TruckID)
);

-- (DLV) Trucks Table
CREATE TABLE IF NOT EXISTS Trucks (
    TruckID INT AUTO_INCREMENT PRIMARY KEY,
    PlateNumber VARCHAR(20),
    TruckType ENUM('Light-Duty', 'Heavy-Duty'),
    Capacity DECIMAL(10, 2)
    TruckStatus ENUM('Available', 'In Transit', 'Unavailable') DEFAULT 'Available'
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
    PRIMARY KEY (id)
);
-- (HR)
CREATE TABLE attendance (
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

-- Insert sample data

INSERT INTO Products (ProductName, Description, Category, DeliveryRequired, Price, Stocks, TaxRate, UnitOfMeasurement, ProductWeight) 
VALUES 
    ('Hammer (Large)', 'Heavy-duty hammer for construction work', 'Tools', 'No', 299.00, 50, 0.12, 'pcs', 1.5),
    ('Screwdriver Set (Standard)', 'Set of 6 screwdrivers with various sizes', 'Tools', 'No', 199.00, 30, 0.12, 'set', 0.3,)
    ('Cement (50kg)', 'Portland cement for construction purposes', 'Building Materials', 'Yes', 220.00, 100, 0.12, 'kg', 50),
    ('Gravel (1 ton)', 'Crushed stone for construction projects', 'Building Materials', 'Yes', 500.00, 50, 0.12, 'ton', 907.185),  -- Converted 1 ton to kg
    ('Paint Brush Set', 'Set of 10 paint brushes for art projects', 'Art Supplies', 'No', 99.00, 20, 0.12, 'set', 0.5),
    ('Safety Helmet', 'Hard hat helmet for construction safety', 'Safety Gear', 'No', 150.00, 40, 0.12, 'pcs', 0.3),
    ('Drill Machine', 'Cordless drill machine with rechargeable batteries', 'Tools', 'No', 599.00, 15, 0.12, 'pcs', 2),
    ('Plywood (4x8 feet)', 'Plywood sheets for carpentry and construction', 'Building Materials', 'Yes', 600.00, 30, 0.12, 'sheet', 20),
    ('Steel Bar (1 meter)', 'Deformed steel bars for reinforcement in concrete construction', 'Building Materials', 'Yes', 50.00, 200, 0.12, 'meter', 2.5),
    ('Paint Thinner', 'Solvent used for thinning oil-based paints and cleaning paint brushes', 'Paints and Chemicals', 'No', 150.00, 50, 0.12, NULL, 1),
    ('Concrete Blocks (Standard)', 'Standard concrete blocks for building walls', 'Building Materials', 'Yes', 5.00, 200, 0.12, 'pcs', 2.3),
    ('Roofing Shingles (Bundle)', 'Bundle of roofing shingles for covering roofs', 'Building Materials', 'Yes', 25.00, 100, 0.12, 'bundle', 13.6078),  -- Converted 30 lbs to kg
    ('Sand (1 cubic yard)', 'Fine aggregate sand for various construction applications', 'Building Materials', 'Yes', 40.00, 150, 0.12, 'cubic yard', 1088.62),  -- Converted 1 cubic yard to kg
    ('Brick (Standard)', 'Standard clay bricks for construction', 'Building Materials', 'Yes', 0.50, 500, 0.12, 'pcs', 2.5),
    ('Wood Studs (8 feet)', 'Standard wood studs for framing walls', 'Building Materials', 'Yes', 3.00, 300, 0.12, '8 feet', 3.62874),  -- Converted 8 lbs to kg
    ('Galvanized Nails (5 lbs)', 'Galvanized nails for various construction applications', 'Building Materials', 'Yes', 10.00, 100, 0.12, 'lbs', 2.26796),  -- Converted 5 lbs to kg
    ('Drywall (4x8 feet)', 'Drywall sheets for interior wall finishing', 'Building Materials', 'Yes', 12.00, 200, 0.12, 'sheet', 22.6796),  -- Converted 50 lbs to kg
    ('Concrete Mix (50 lb)', 'Pre-mixed concrete for small-scale construction projects', 'Building Materials', 'Yes', 8.00, 150, 0.12, 'lb', 22.6796);  -- Converted 50 lbs to kg

    INSERT INTO trucks (TruckType, PlateNumber) VALUES ('Light-Duty', 'ALD123');
    INSERT INTO trucks (TruckType, PlateNumber) VALUES ('Light-Duty', 'DUY234');
    INSERT INTO trucks (TruckType, PlateNumber) VALUES ('Light-Duty', 'VRR125');

    INSERT INTO trucks (TruckType, PlateNumber) VALUES ('Heavy-Duty', 'DJD233');
    INSERT INTO trucks (TruckType, PlateNumber) VALUES ('Heavy-Duty', 'PGD994');
    INSERT INTO trucks (TruckType, PlateNumber) VALUES ('Heavy-Duty', 'UHD535');

INSERT INTO employee (first_name, middle_name, last_name, dateofbirth, gender, nationality, address, contact_no, email, civil_status, department, position) VALUES
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
INSERT INTO attendance (attendance_date, clock_in, clock_out, employee_id) VALUES
(CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 1),
(CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 2),
(CURDATE(), NOW(), CONCAT(CURDATE(), ' 20:30:00'), 3);

-- To update delivery orders to 'Pending' status and clear the TruckID and ReceivedDate
UPDATE deliveryorders
SET DeliveryStatus = 'Pending',
ReceivedDate = NULL,
TruckID = NULL;