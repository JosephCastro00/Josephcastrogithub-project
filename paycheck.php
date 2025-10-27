<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Calculation Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .results-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .result-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4CAF50;
        }
        .result-item {
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .result-label {
            font-weight: bold;
            color: #555;
        }
        .result-value {
            color: #333;
            font-size: 18px;
        }
        .total-salary {
            background-color: #e8f5e8;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #2e7d32;
        }
        .back-button {
            display: inline-block;
            background-color: #2196F3;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
        .back-button:hover {
            background-color: #1976D2;
        }
        .error {
            background-color: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #c62828;
        }
        .calculation {
            background-color: #fff3e0;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            font-family: monospace;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h1>Salary Calculation Results</h1>
        
        <?php
        // Check if form data was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get and sanitize input values
            $hours = filter_var($_POST['hours'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $rate = filter_var($_POST['rate'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            
            // Validate inputs
            $errors = [];
            
            if (empty($hours) || !is_numeric($hours)) {
                $errors[] = "Please enter a valid number for hours worked.";
            }
            
            if (empty($rate) || !is_numeric($rate)) {
                $errors[] = "Please enter a valid number for rate of pay.";
            }
            
            if ($hours < 0) {
                $errors[] = "Hours worked cannot be negative.";
            }
            
            if ($rate < 0) {
                $errors[] = "Rate of pay cannot be negative.";
            }
            
            // Display errors or calculate salary
            if (!empty($errors)) {
                echo '<div class="error">';
                echo '<strong>Error(s):</strong><ul>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul></div>';
            } else {
                // Calculate salary
                $salary = $hours * $rate;
                
                // Display input summary
                echo '<div class="result-card">';
                echo '<div class="result-item">';
                echo '<span class="result-label">Hours Worked: </span>';
                echo '<span class="result-value">' . number_format($hours, 2) . ' hours</span>';
                echo '</div>';
                
                echo '<div class="result-item">';
                echo '<span class="result-label">Rate of Pay: </span>';
                echo '<span class="result-value">$' . number_format($rate, 2) . ' per hour</span>';
                echo '</div>';
                echo '</div>';
                
                // Show calculation
                echo '<div class="calculation">';
                echo 'Calculation: ' . number_format($hours, 2) . ' hours × $' . number_format($rate, 2) . '/hour = $' . number_format($salary, 2);
                echo '</div>';
                
                // Display calculated salary
                echo '<div class="total-salary">';
                echo 'Gross Salary: $' . number_format($salary, 2);
                echo '</div>';
                
                // Additional calculations
                echo '<div class="result-card">';
                echo '<h3>Additional Salary Information:</h3>';
                
                echo '<div class="result-item">';
                echo '<span class="result-label">Weekly Salary (40 hours): </span>';
                echo '<span class="result-value">$' . number_format($rate * 40, 2) . '</span>';
                echo '</div>';
                
                echo '<div class="result-item">';
                echo '<span class="result-label">Bi-weekly Salary (80 hours): </span>';
                echo '<span class="result-value">$' . number_format($rate * 80, 2) . '</span>';
                echo '</div>';
                
                echo '<div class="result-item">';
                echo '<span class="result-label">Monthly Salary (4 weeks): </span>';
                echo '<span class="result-value">$' . number_format($rate * 40 * 4, 2) . '</span>';
                echo '</div>';
                
                echo '<div class="result-item">';
                echo '<span class="result-label">Annual Salary (52 weeks): </span>';
                echo '<span class="result-value">$' . number_format($rate * 40 * 52, 2) . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="error">';
            echo 'No form data submitted. Please go back and enter your hours and rate.';
            echo '</div>';
        }
        ?>
        
        <div style="text-align: center;">
            <a href="paycheck.html" class="back-button">Calculate Another Salary</a>
        </div>
    </div>
</body>
</html>
