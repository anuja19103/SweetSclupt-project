<?php
// Connect to your PostgreSQL database
$conn = pg_connect("user=postgres");

// Retrieve form data
$r_name = $_POST['r_name'];
$r_email = $_POST['r_email'];
$r_password = $_POST['r_password'];

// Pr  epare and execute SQL query
$query = "INSERT INTO user_register VALUES ('$r_name', '$r_email','$r_password')";

$result = pg_query($conn, $query);

// Check if the query was successful
if ($result) {
	header("location: index.php");
    echo "Data saved successfully!";
} else {
    echo "Error: " . pg_last_error($conn);
}

// Close the connection
pg_close($conn);
?>

