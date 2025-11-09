<?php
// add_to_cart.php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['car'])) {
    $carName = htmlspecialchars($_GET['car']);
    $_SESSION['cart'][] = $carName;
    $message = "$carName has been added to your cart.";
} else {
    $message = "No car selected to add.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart Update</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 30px;
            text-align: center;
        }
        .message {
            margin-top: 50px;
            background: #fff;
            display: inline-block;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        a.btn {
            display: inline-block;
            margin-top: 20px;
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        a.btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="message">
    <h2><?php echo $message; ?></h2>
    <a href="view_cart.php" class="btn">View Cart</a>
    <a href="index.php" class="btn">Back to Home</a>
</div>

</body>
</html>
