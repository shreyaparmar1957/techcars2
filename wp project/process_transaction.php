<?php
session_start();
require '<backend/db.php'; // Make sure db.php connects to your database

if (!empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user_id'] ?? null; // Get logged in user's ID

    if ($user_id) {
        foreach ($_SESSION['cart'] as $car) {
            $car_name = htmlspecialchars($car);

            // Insert each car into the transactions table
            $stmt = $conn->prepare("INSERT INTO transactions (user_id, car_name) VALUES (?, ?)");
            $stmt->bind_param("is", $user_id, $car_name);
            $stmt->execute();
        }

        // After saving, clear the cart
        $_SESSION['cart'] = [];

        $message = "Transaction Successful! Your cars have been ordered.";
    } else {
        $message = "Error: User not logged in!";
    }
} else {
    $message = "Your cart is empty. Cannot proceed.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Status</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f9f9f9;
            padding: 50px;
        }
        .transaction {
            background: #fff;
            display: inline-block;
            padding: 30px 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .transaction h2 {
            color: #28a745;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            background: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="transaction">
    <h2><?php echo $message; ?></h2>
    <a href="index.php" class="btn">Return to Home</a>
</div>

</body>
</html>
