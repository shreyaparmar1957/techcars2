<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Checkout</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            text-align: center;
            padding: 30px;
        }
        .cart {
            background: #fff;
            margin: auto;
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            font-size: 18px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 8px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            background: #28a745;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #218838;
        }
        .empty-message {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="cart">
    <h2>Your Selected Cars</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $car): ?>
                <li><?php echo htmlspecialchars($car); ?></li>
            <?php endforeach; ?>
        </ul>
        <form action="process_transaction.php" method="POST">
            <button type="submit" class="btn">Proceed to Transaction</button>
        </form>
    <?php else: ?>
        <p class="empty-message">Your cart is empty.</p>
    <?php endif; ?>
</div>

</body>
</html>
