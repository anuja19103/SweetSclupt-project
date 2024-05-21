<?php
// Connect to your PostgreSQL database
$conn = pg_connect("user=postgres");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match any entry in the user_register table
    $query = "SELECT * FROM user_register WHERE r_name='$username' AND r_password='$password'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        // Redirect to admin page if username and password match
        if ($username === 'admin' && $password === 'sanikaanuja') {
            header("Location: admin.php");
            exit();
        } else {
            // Redirect to home page for regular users
            header("Location: home.html");
            exit();
        }
    } else {
        // Display error message if credentials are incorrect
        $error_message = "Invalid username or password. Please try again.";
    }
}

// Close the connection
pg_close($conn);
?>

