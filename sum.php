<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP to Python</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #29a329;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #29a329;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="header">
            <h2><?php echo "Kristen Clifford"; ?></h2>
            <h3><?php echo date("F j, Y"); ?></h3>
        </div>
        <h1>PHP to Python</h1>

        <form method="POST" action="">
            <label for="num1">Number 1:</label>
            <input type="text" id="num1" name="num1">
            <label for="num2">Number 2:</label>
            <input type="text" id="num2" name="num2">
            <input type="submit" name="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $num1 = isset($_POST["num1"]) ? $_POST["num1"] : '';
            $num2 = isset($_POST["num2"]) ? $_POST["num2"] : '';

            if ($num1 !== '' && $num2 !== '') {

                $command = escapeshellcmd("python3 sum.py $num1 $num2");
                $output = shell_exec($command);
                echo "<div class='result'><h3>Result from Python script:</h3><p>$output</p></div>";
            }
        }
        ?>

        <form method="POST" action="">
            <label for="celsius">Enter Temperature in Celsius:</label>
            <input type="text" id="celsius" name="celsius">
            <input type="submit" name="submit_temp" value="Convert to Fahrenheit">
        </form>
  <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_temp'])) {
            $celsius = isset($_POST["celsius"]) ? $_POST["celsius"] : '';

            if ($celsius !== '') {
                $command = escapeshellcmd("python3 temp.py $celsius");
                $output = shell_exec($command);
                echo "<div class='result'><h3>Result from Python script:</h3><p>" .  $celsius . "°C is equal to " . trim($output) . "°F</p></div>";
            }
        }
        ?>
    </div>
</body>
</html>

