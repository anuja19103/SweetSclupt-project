<?php
// Database connection parameters
$db_user = 'postgres';

// Connect to PostgreSQL database
$conn = pg_connect("user=$db_user");

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare SQL statement to insert data into the contact_us table
$sql = "INSERT INTO contact_us (name, email, subject, message) VALUES ($1, $2, $3, $4)";

// Execute the prepared statement
$result = pg_query_params($conn, $sql, array($name, $email, $subject, $message));
//echo $result;
if (!$result) {
    die("Error: " . pg_last_error());
} else {
    // If insertion is successful, redirect to success page
//    header("Location: home.html");
	echo "success";
	//exit();
}

// Close connection
pg_close($conn);
?>

