<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
    
    body {
	font-size:10px;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .confirmation {
            text-align: center;
            margin-top: 30px;
        }

        .confirmation p {
            font-size: 18px;
            color: #555;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
        
       /* CSS for input boxes */
input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; /* Ensures padding and border are included in the width */
}

/* CSS for submit button */
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

        
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    body{
    		background-color: #f9d4da;
    		font-size:20px;
    }
    .form{
    		
		width: 50%;
		margin: 20px auto;
		margin-left: auto;
		background-color: #fff;
		padding: 20px;
		border-radius: 10px;
		margin-left: 10%;
		background: #fff;
		box-shadow: 0 0 50px rgba(0, 0, 0, 0.08);
	}
	strong{
		font-family:cursive;
	}
    </style>
</head>
<body>
    <div class="form">
        <h2>Thank You for Your Order!</h2>
        <h3>Order Details:</h3>
        <div>
            <?php
            // Connect to PostgreSQL database
            $conn = pg_connect("user=postgres");

            // Check connection
            if (!$conn) {
                echo "Failed to connect to PostgreSQL.";
                exit;
            }

            // Fetch data from the checkout table
            $result = pg_query($conn, "SELECT * FROM checkout ORDER BY id DESC LIMIT 1");

            if (pg_num_rows($result) > 0) {
                // Output data of the last record
                $row = pg_fetch_assoc($result);
                echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
                echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                echo "<p><strong>Phone Number:</strong> " . $row["phone"] . "</p>";
                echo "<p><strong>Type of Event:</strong> " . $row["event"] . "</p>";
                echo "<p><strong>Event Date:</strong> " . $row["event_date"] . "</p>";

                echo "<p><strong>Delivery Address:</strong> " . $row["delivery_address"] . "</p>";
                echo "<p><strong>Cake Base Flavor:</strong> " . $row["cake_flavor"] . "</p>";
                echo "<p><strong>Cake Shape:</strong> " . $row["cake_shape"] . "</p>";
                echo "<p><strong>Frosting/Filling Flavor:</strong> " . $row["frosting_flavor"] . "</p>";
                echo "<p><strong>Theme or Color Scheme:</strong> " . $row["theme_color"] . "</p>";
                echo "<p><strong>Special Requests or Customizations:</strong> " . $row["special_requests"] . "</p>";
      
            } else {
                echo "0 results";
            }

            // Close connection
            pg_close($conn);
            ?>
        </div>
    </div>
    
    <div class="form">
        <h1>Billing Information</h1>
        <p>Thank you for ordering from us. Please review your order details and proceed with the payment.</p>
        <!-- Billing Form -->
        <form action="payment.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>
            <!-- Confirmation Message -->
    <div class="confirmation">
        <p>Your order has been successfully placed!</p>
        
        <a href="home.html" class="button">Submit ? Back to Home</a>
    </div>
        </form>
    </div>

    
    </div>
</body>
</html>

