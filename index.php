<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Application</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Navigation Menu */
        nav {
            background-color: #2c3e50;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
        }
        
        .nav-menu li {
            margin-left: 25px;
        }
        
        .nav-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .nav-menu a:hover {
            background-color: #34495e;
        }
        
        .nav-menu a.active {
            background-color: #3498db;
        }
        
        /* Main Content */
        main {
            padding: 40px 0;
            min-height: calc(100vh - 160px);
        }
        
        .page {
            display: none;
        }
        
        .page.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 36px;
        }
        
        h2 {
            color: #3498db;
            margin: 25px 0 15px;
            font-size: 28px;
        }
        
        p {
            margin-bottom: 15px;
            font-size: 16px;
        }
        
        /* Calculator Styles */
        .calculator-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .calculator-form {
            display: flex;
            flex-direction: column;
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .btn-group {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        button {
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
            flex: 1;
        }
        
        button:hover {
            background-color: #2980b9;
        }
        
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f4fc;
            border-radius: 4px;
            border-left: 4px solid #3498db;
        }
        
        .result h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
            }
            
            .nav-menu {
                margin-top: 15px;
            }
            
            .nav-menu li {
                margin: 0 10px;
            }
            
            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav>
        <div class="container nav-container">
            <div class="logo">MyWebApp</div>
            <ul class="nav-menu">
                <li><a href="#" class="nav-link active" data-page="home">Home</a></li>
                <li><a href="#" class="nav-link" data-page="calculator">Calculator</a></li>
                <li><a href="#" class="nav-link" data-page="about">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        <!-- Home Page -->
        <section id="home" class="page active">
            <h1>Welcome to My Web Application</h1>
            <p>This is a multi-page website featuring a PHP calculator and responsive design.</p>
            
            <h2>Features</h2>
            <ul>
                <li>Responsive navigation menu</li>
                <li>PHP-powered calculator</li>
                <li>Clean, modern design</li>
                <li>Easy to host on free PHP hosting platforms</li>
            </ul>
            
            <h2>How to Use</h2>
            <p>Navigate to the Calculator page to perform mathematical operations. The calculator supports addition, subtraction, multiplication, and division.</p>
        </section>

        <!-- Calculator Page -->
        <section id="calculator" class="page">
            <h1>Calculator</h1>
            <p>Enter two numbers and select an operation to calculate the result.</p>
            
            <div class="calculator-container">
                <form class="calculator-form" method="post" action="">
                    <div class="input-group">
                        <label for="num1">First Number:</label>
                        <input type="number" id="num1" name="num1" step="any" required value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>">
                    </div>
                    
                    <div class="input-group">
                        <label for="operation">Operation:</label>
                        <select id="operation" name="operation" required>
                            <option value="add" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'add') ? 'selected' : ''; ?>>Addition (+)</option>
                            <option value="subtract" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'subtract') ? 'selected' : ''; ?>>Subtraction (-)</option>
                            <option value="multiply" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'multiply') ? 'selected' : ''; ?>>Multiplication (×)</option>
                            <option value="divide" <?php echo (isset($_POST['operation']) && $_POST['operation'] == 'divide') ? 'selected' : ''; ?>>Division (÷)</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label for="num2">Second Number:</label>
                        <input type="number" id="num2" name="num2" step="any" required value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>">
                    </div>
                    
                    <div class="btn-group">
                        <button type="submit" name="calculate">Calculate</button>
                        <button type="reset">Clear</button>
                    </div>
                </form>
                
                <?php
                // PHP Calculator Logic
                if (isset($_POST['calculate'])) {
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    $operation = $_POST['operation'];
                    $result = '';
                    
                    if (is_numeric($num1) && is_numeric($num2)) {
                        switch ($operation) {
                            case 'add':
                                $result = $num1 + $num2;
                                $symbol = '+';
                                break;
                            case 'subtract':
                                $result = $num1 - $num2;
                                $symbol = '-';
                                break;
                            case 'multiply':
                                $result = $num1 * $num2;
                                $symbol = '×';
                                break;
                            case 'divide':
                                if ($num2 != 0) {
                                    $result = $num1 / $num2;
                                    $symbol = '÷';
                                } else {
                                    $result = 'Error: Division by zero';
                                    $symbol = '÷';
                                }
                                break;
                            default:
                                $result = 'Invalid operation';
                                $symbol = '';
                        }
                        
                        if (is_numeric($result)) {
                            echo "<div class='result'>";
                            echo "<h3>Calculation Result:</h3>";
                            echo "<p>{$num1} {$symbol} {$num2} = <strong>{$result}</strong></p>";
                            echo "</div>";
                        } else {
                            echo "<div class='result'>";
                            echo "<h3>Error:</h3>";
                            echo "<p><strong>{$result}</strong></p>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='result'>";
                        echo "<h3>Error:</h3>";
                        echo "<p><strong>Please enter valid numbers</strong></p>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </section>

        <!-- About Page -->
        <section id="about" class="page">
            <h1>About This Project</h1>
            <p>This web application demonstrates the integration of HTML, CSS, and PHP to create a functional multi-page website.</p>
            
            <h2>Technologies Used</h2>
            <ul>
                <li><strong>HTML5:</strong> For page structure and content</li>
                <li><strong>CSS3:</strong> For styling and responsive design</li>
                <li><strong>PHP:</strong> For server-side calculator functionality</li>
                <li><strong>JavaScript:</strong> For page navigation (optional enhancement)</li>
            </ul>
            
            <h2>Hosting Information</h2>
            <p>This application can be hosted on any free PHP hosting platform such as:</p>
            <ul>
                <li>InfinityFree</li>
                <li>000webhost</li>
                <li>FreeHosting</li>
            </ul>
            
            <h2>Contact</h2>
            <p>If you have any questions about this project, feel free to reach out.</p>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> My Web Application. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Navigation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const pages = document.querySelectorAll('.page');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links and pages
                    navLinks.forEach(l => l.classList.remove('active'));
                    pages.forEach(page => page.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Show the corresponding page
                    const pageId = this.getAttribute('data-page');
                    document.getElementById(pageId).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
