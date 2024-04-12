<?php 
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