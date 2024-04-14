<?php

// Get database instance and establish connection
$db = Database::getInstance();
$conn = $db->connect();

// Initialize department variable
$selected_department = "";

// Check if a department is selected
if(isset($_GET['department']) && !empty($_GET['department'])) {
    $selected_department = $_GET['department'];
}

// Prepare the SQL query
$query = "SELECT CONCAT(e.first_name, ' ', e.last_name) AS full_name, e.department, e.position, s.total_salary
          FROM employees e
          JOIN salary_info s ON e.id = s.employees_id";

// If a department is selected, add WHERE clause to filter by department
if(!empty($selected_department)) {
    $query .= " WHERE e.department = :department";
}

// Execute the query
$stmt = $conn->prepare($query);

// If a department is selected, bind the parameter
if(!empty($selected_department)) {
    $stmt->bindParam(':department', $selected_department, PDO::PARAM_STR);
}

$stmt->execute();

// Build table rows with filtered employee data
$rows = "";
if($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $rows .= "<tr>";
        $rows .= "<td class='px-4 py-2 text-center'>" . $row['full_name'] . "</td>";
        $rows .= "<td class='px-4 py-2 text-center'>" . $row['department'] . "</td>";
        $rows .= "<td class='px-4 py-2 text-center'>" . $row['position'] . "</td>";
        $rows .= "<td class='px-4 py-2 text-center'>" . $row['total_salary'] . "</td>";
        $rows .= "<td class='px-4 py-2 text-center'><button class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'>Generate</button></td>";
        $rows .= "</tr>";
    }
} else {
    $rows .= "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
}

echo $rows;
?>
