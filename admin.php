<?php
$username = 'postgres';

// Establishing a connection to the database
$conn = pg_connect("user=$username");
if (!$conn) {
    die("Connection failed");
}

// Function to fetch and display data from a table
function displayTableData($conn, $tableName) {
    $query = "SELECT * FROM $tableName";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "Error fetching data from $tableName";
        return;
    }
    echo"<hr><hr>";
    echo "<h2>Contents of $tableName</h2>";
    echo "<table border='1'>";
    $headerPrinted = false;
    while ($row = pg_fetch_assoc($result)) {
        if (!$headerPrinted) {
            echo "<tr>";
            foreach ($row as $column => $value) {
                echo "<th>$column</th>";
            }
            echo "</tr>";
            $headerPrinted = true;
        }
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
    body{
        background:#f9d4da;
    }
        table {
            width: 100%;
            border-collapse: collapse;
            padding:30px;
            border-radius:20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid black;
            border-top:none;
        }
        th {
            background-color:#f9d4da;
        }
        h2 {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Welcome Admin</h1>

    <?php
    // Display data from checkout table
    displayTableData($conn, 'checkout');

    // Display data from contact_us table
    displayTableData($conn, 'contact_us');

    // Display data from user_register table
    displayTableData($conn, 'user_register');
    ?>

</body>
</html>

