-- Audit Trail Table
CREATE TABLE tbl_sls_audit (

    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(255),
    log_action VARCHAR(255),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- INSERT INTO tbl_sls_audit (employee_name, log_action) VALUES ('Alfaro, Aian Louise', 'Log in');
-- INSERT INTO tbl_sls_audit (employee_name, log_action) VALUES ('Alfaro, Aian Louise', 'Log out');

SELECT * FROM tbl_sls_audit;

-- Categories Table
CREATE TABLE Categories (
    Category_ID INT(11) NOT NULL AUTO_INCREMENT,
    Category_Name VARCHAR(50) NOT NULL,
    PRIMARY KEY (Category_ID)
);

-- Products Table
CREATE TABLE Products (
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

-- Customers Table
CREATE TABLE IF NOT EXISTS Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(200),
    Phone VARCHAR(20),
    Email VARCHAR(100)
);

-- Employees Table -- Filler OnLy
CREATE TABLE IF NOT EXISTS Employees (
    EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Position VARCHAR(100),
    Email VARCHAR(100),
    Phone VARCHAR(20)
);

-- Sales Table with DeliveryDate column
CREATE TABLE IF NOT EXISTS Sales (
    SaleID INT AUTO_INCREMENT PRIMARY KEY,
    SaleDate DATETIME,
    SalePreference ENUM('Delivery', 'Pick-up'),
    ShippingFee DECIMAL(10, 2),
    PaymentMode ENUM('Cash', 'Card'),
    CardNumber VARCHAR(16),
    ExpiryDate TEXT,
    CVV VARCHAR(3),
    Discount DECIMAL(10, 2),
    TotalAmount DECIMAL(10, 2),
    EmployeeID INT,
    CustomerID INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- SaleDetails Table
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

-- Trucks Table -- Filler Only
CREATE TABLE IF NOT EXISTS Trucks (
    TruckID INT AUTO_INCREMENT PRIMARY KEY,
    TruckName VARCHAR(100),
    TruckType VARCHAR(50),
    Capacity DECIMAL(10, 2)
);

-- DeliveryOrders Table
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
    DeliveryStatus ENUM('Pending', 'In Transit', 'Delivered') DEFAULT 'Pending',
    TruckID INT,
    FOREIGN KEY (SaleID) REFERENCES Sales(SaleID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (TruckID) REFERENCES Trucks(TruckID)
);

-- TargetSales Table
CREATE TABLE IF NOT EXISTS TargetSales (
    TargetID INT AUTO_INCREMENT PRIMARY KEY,
    MonthYear DATE,
    TargetAmount DECIMAL(10, 2),
    EmployeeID INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

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

-- Assuming the categories already exist in the Categories table
-- You should adjust the following INSERT statements according to the Category_ID values in your Categories table

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



    INSERT INTO Categories (Category_Name) 
    VALUES 
        ('Tools'),
        ('Building Materials'),
        ('Art Supplies'),
        ('Safety Gear'),
        ('Paints and Chemicals');


    -- Dummy Sales Data for 2022
    INSERT INTO `sales` (`SaleDate`, `SalePreference`, `ShippingFee`, `PaymentMode`, `TotalAmount`, `EmployeeID`, `CustomerID`) 
    VALUES 
        ('2022-01-15 10:30:00', 'Delivery', 10.00, 'Cash', 150.00, 1, NULL),
        ('2022-02-05 14:45:00', 'Pick-up', 0.00, 'Card', 250.00, 2, NULL),
        ('2022-03-20 11:00:00', 'Delivery', 20.00, 'Cash', 180.00, 3, NULL),
        ('2022-04-10 09:15:00', 'Delivery', 15.00, 'Cash', 200.00, 1, NULL),
        ('2022-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', 300.00, 2, NULL),
        ('2022-06-08 16:30:00', 'Delivery', 25.00, 'Card', 350.00, 3, NULL),
        ('2022-07-14 10:00:00', 'Delivery', 10.00, 'Cash', 180.00, 1, NULL),
        ('2022-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', 270.00, 2, NULL),
        ('2022-09-05 15:20:00', 'Delivery', 20.00, 'Card', 400.00, 3, NULL),
        ('2022-10-18 09:30:00', 'Delivery', 15.00, 'Cash', 220.00, 1, NULL),
        ('2022-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', 280.00, 2, NULL),
        ('2022-12-30 14:00:00', 'Delivery', 25.00, 'Card', 320.00, 3, NULL);

    -- Dummy Target Sales Data for 2022
    INSERT INTO `targetsales` (`MonthYear`, `TargetAmount`, `EmployeeID`) 
    VALUES 
        ('2022-01-01', 5000.00, 1),
        ('2022-02-01', 6000.00, 2),
        ('2022-03-01', 7000.00, 3),
        ('2022-04-01', 5500.00, 1),
        ('2022-05-01', 6500.00, 2),
        ('2022-06-01', 7500.00, 3),
        ('2022-07-01', 6000.00, 1),
        ('2022-08-01', 7000.00, 2),
        ('2022-09-01', 8000.00, 3),
        ('2022-10-01', 6000.00, 1),
        ('2022-11-01', 6500.00, 2),
        ('2022-12-01', 7500.00, 3);

    -- Dummy Sales Data for 2023
    INSERT INTO `sales` (`SaleDate`, `SalePreference`, `ShippingFee`, `PaymentMode`, `TotalAmount`, `EmployeeID`, `CustomerID`) 
    VALUES 
        ('2023-01-15 10:30:00', 'Delivery', 10.00, 'Cash', 200.00, 1, NULL),
        ('2023-02-05 14:45:00', 'Pick-up', 0.00, 'Card', 300.00, 2, NULL),
        ('2023-03-20 11:00:00', 'Delivery', 20.00, 'Cash', 250.00, 3, NULL),
        ('2023-04-10 09:15:00', 'Delivery', 15.00, 'Cash', 350.00, 1, NULL),
        ('2023-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', 400.00, 2, NULL),
        ('2023-06-08 16:30:00', 'Delivery', 25.00, 'Card', 450.00, 3, NULL),
        ('2023-07-14 10:00:00', 'Delivery', 10.00, 'Cash', 300.00, 1, NULL),
        ('2023-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', 350.00, 2, NULL),
        ('2023-09-05 15:20:00', 'Delivery', 20.00, 'Card', 500.00, 3, NULL),
        ('2023-10-18 09:30:00', 'Delivery', 15.00, 'Cash', 400.00, 1, NULL),
        ('2023-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', 450.00, 2, NULL),
        ('2023-12-30 14:00:00', 'Delivery', 25.00, 'Card', 500.00, 3, NULL);

    -- Dummy Target Sales Data for 2023
    INSERT INTO `targetsales` (`MonthYear`, `TargetAmount`, `EmployeeID`) 
    VALUES 
        ('2023-01-01', 6000.00, 1),
        ('2023-02-01', 7000.00, 2),
        ('2023-03-01', 8000.00, 3),
        ('2023-04-01', 6500.00, 1),
        ('2023-05-01', 7500.00, 2),
        ('2023-06-01', 8500.00, 3),
        ('2023-07-01', 7000.00, 1),
        ('2023-08-01', 8000.00, 2),
        ('2023-09-01', 9000.00, 3),
        ('2023-10-01', 7000.00, 1),
        ('2023-11-01', 7500.00, 2),
        ('2023-12-01', 8500.00, 3);

    -- Dummy Sales Data for 2024
    INSERT INTO `sales` (`SaleDate`, `SalePreference`, `ShippingFee`, `PaymentMode`, `TotalAmount`, `EmployeeID`, `CustomerID`) 
    VALUES 
        ('2024-01-15 10:30:00', 'Delivery', 10.00, 'Cash', 210.00, 1, NULL),
        ('2024-02-05 14:45:00', 'Pick-up', 0.00, 'Card', 310.00, 2, NULL),
        ('2024-03-20 11:00:00', 'Delivery', 20.00, 'Cash', 260.00, 3, NULL);

    -- Dummy Target Sales Data for 2024
    INSERT INTO `targetsales` (`MonthYear`, `TargetAmount`, `EmployeeID`) 
    VALUES 
        ('2024-01-01', 6100.00, 1),
        ('2024-02-01', 7100.00, 2),
        ('2024-03-01', 8100.00, 3);

    -- Adjust TotalAmount for each sale to be close to or above the target sales
    UPDATE `sales` s
    JOIN (
        SELECT 
            ts.`EmployeeID`,
            ts.`MonthYear`,
            ts.`TargetAmount`,
            SUM(s.`TotalAmount`) AS `TotalSalesAmount`
        FROM 
            `targetsales` ts
        LEFT JOIN 
            `sales` s ON ts.`EmployeeID` = s.`EmployeeID`
        GROUP BY 
            ts.`EmployeeID`, ts.`MonthYear`, ts.`TargetAmount`
    ) t ON s.`EmployeeID` = t.`EmployeeID`
    SET 
        s.`TotalAmount` = CASE 
            WHEN t.`TotalSalesAmount` < t.`TargetAmount` THEN s.`TotalAmount` + (t.`TargetAmount` - t.`TotalSalesAmount`)
            ELSE s.`TotalAmount`
        END;