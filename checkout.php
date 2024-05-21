<?php

$username = 'postgres';


// Establishing a connection to the database
$conn = pg_connect("user=$username");
if (!$conn) {
    die("Connection failed");
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an INSERT statement
    $query = "INSERT INTO checkout (name, email, phone, event, event_date, delivery_date_time, delivery_address, cake_flavor, cake_shape, frosting_flavor, dietary_restrictions, theme_color, special_requests, delivery_option) 
              VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14)";

    // Prepare the statement
    $stmt = pg_prepare($conn, "insert_checkout", $query);

    // Bind parameters and execute the statement
    $result = pg_execute($conn, "insert_checkout", array(
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['event'],
        $_POST['eventDate'],
        ($_POST['deliveryDateTime'] != "" ? $_POST['deliveryDateTime'] : null), // Handling empty deliveryDateTime
        $_POST['deliveryAddress'],
        $_POST['cakeFlavor'],
        $_POST['cakeShape'],
        $_POST['frosting'],
        ($_POST['dietary'] == 'Yes' ? 'true' : 'false'),
        $_POST['themeColor'],
        $_POST['specialRequests'],
        ($_POST['deliveryOption'] == 'Yes' ? 'true' : 'false')
    ));

    if ($result) {
        header("location: thankyou.php");
    } else {
        echo "Error in inserting record";
    }
}
?>

