INSERT INTO Products (ProductName, Description, Category, DeliveryRequired, Price, Stocks, TaxRate, UnitOfMeasurement, ProductWeight) 
VALUES 
    ('Hammer (Large)', 'Heavy-duty hammer for construction work', 'Tools', 'No', 299.00, 50, 0.12, 'pcs', 1.5),
    ('Screwdriver Set (Standard)', 'Set of 6 screwdrivers with various sizes', 'Tools', 'No', 199.00, 30, 0.12, 'set', 0.8),
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

    -- Insert mock data into the Sales table for 2023
    INSERT INTO Sales (SaleDate, SalePreference, ShippingFee, PaymentMode, TotalAmount, EmployeeID, CustomerID)
    SELECT
        DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('2023-01-01') + RAND() * (UNIX_TIMESTAMP('2023-12-31') - UNIX_TIMESTAMP('2023-01-01'))), '%Y-%m-%d %H:%i:%s') AS SaleDate,
        IF(RAND() < 0.5, 'Delivery', 'Pick-up') AS SalePreference,
        ROUND(RAND() * (30 - 10) + 10, 2) AS ShippingFee,  -- Adjusted range
        'Cash' AS PaymentMode,
        ROUND(RAND() * (1000 - 100) + 100, 2) AS TotalAmount,  -- Adjusted range
        FLOOR(RAND() * 10) + 1 AS EmployeeID,  -- Assuming 10 employees
        FLOOR(RAND() * 20) + 1 AS CustomerID  -- Assuming 20 customers
    FROM
        information_schema.tables;

    -- Insert mock data into the Sales table for 2022
    INSERT INTO Sales (SaleDate, SalePreference, ShippingFee, PaymentMode, TotalAmount, EmployeeID, CustomerID)
    SELECT
        DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP('2022-01-01') + RAND() * (UNIX_TIMESTAMP('2022-12-31') - UNIX_TIMESTAMP('2022-01-01'))), '%Y-%m-%d %H:%i:%s') AS SaleDate,
        IF(RAND() < 0.5, 'Delivery', 'Pick-up') AS SalePreference,
        ROUND(RAND() * (20 - 5) + 5, 2) AS ShippingFee,  -- Original range
        'Cash' AS PaymentMode,
        ROUND(RAND() * (500 - 50) + 50, 2) AS TotalAmount,  -- Original range
        FLOOR(RAND() * 10) + 1 AS EmployeeID,  -- Assuming 10 employees
        FLOOR(RAND() * 20) + 1 AS CustomerID  -- Assuming 20 customers
    FROM
        information_schema.tables;

    -- Insert mock data into the TargetSales table for both years
    INSERT INTO TargetSales (MonthYear, TargetAmount, EmployeeID)
    SELECT
        CONCAT(YEAR, '-', LPAD(month, 2, '0'), '-01') AS MonthYear,
        ROUND(RAND() * (10000 - 5000) + 5000, 2) AS TargetAmount,
        FLOOR(RAND() * 10) + 1 AS EmployeeID  -- Assuming 10 employees
    FROM
        ((SELECT 1 AS month, '2023' AS YEAR UNION ALL SELECT 2, '2023' UNION ALL SELECT 3, '2023' UNION ALL SELECT 4, '2023' UNION ALL SELECT 5, '2023' UNION ALL SELECT 6, '2023' UNION ALL SELECT 7, '2023' UNION ALL SELECT 8, '2023' UNION ALL SELECT 9, '2023' UNION ALL SELECT 10, '2023' UNION ALL SELECT 11, '2023' UNION ALL SELECT 12, '2023')
        UNION ALL
        (SELECT 1 AS month, '2022' AS YEAR UNION ALL SELECT 2, '2022' UNION ALL SELECT 3, '2022' UNION ALL SELECT 4, '2022' UNION ALL SELECT 5, '2022' UNION ALL SELECT 6, '2022' UNION ALL SELECT 7, '2022' UNION ALL SELECT 8, '2022' UNION ALL SELECT 9, '2022' UNION ALL SELECT 10, '2022' UNION ALL SELECT 11, '2022' UNION ALL SELECT 12, '2022')) months;