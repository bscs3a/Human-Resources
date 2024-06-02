-- (DLV) Trucks Table
CREATE TABLE IF NOT EXISTS Trucks (
    TruckID INT AUTO_INCREMENT PRIMARY KEY,
    PlateNumber VARCHAR(20),
    TruckType ENUM('Light-Duty', 'Heavy-Duty'),
    Capacity DECIMAL(10, 2),
    TruckStatus ENUM('Available', 'In Transit', 'Unavailable') DEFAULT 'Available'
);

-- (DLV) table to associate employees with trucks
CREATE TABLE IF NOT EXISTS EmployeeTrucks (
    EmployeeID INT,
    TruckID INT,
    FOREIGN KEY (EmployeeID) REFERENCES employees(id),
    FOREIGN KEY (TruckID) REFERENCES Trucks(TruckID)
);