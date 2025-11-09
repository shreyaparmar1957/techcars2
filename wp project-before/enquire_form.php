<?php
// enquire_form.php
if (isset($_GET['car'])) {
    $carName = htmlspecialchars($_GET['car']);
} else {
    $carName = "Unknown Car";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquire About <?php echo $carName; ?></title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 30px;
        }
        .enquire-form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .enquire-form input, .enquire-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .enquire-form button {
            background: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .enquire-form button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="enquire-form">
    <h2>Enquire About: <?php echo $carName; ?></h2>
    <form action="backend/handle_enquiry.php" method="POST">
        <input type="hidden" name="car_name" value="<?php echo $carName; ?>">
        <label for="name">Your Name:</label>
        <input type="text" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" name="email" required>

        <label for="message">Message:</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit">Send Enquiry</button>
    </form>
</div>

</body>
</html>
