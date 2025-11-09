<?php
include('db.php');  // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get car details
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);  // Assuming image URL is passed
    
    // Insert car into database
    $insert = "INSERT INTO cars (name, price, description, image_url) 
               VALUES ('$name', '$price', '$description', '$image_url')";
    
    if ($conn->query($insert) === TRUE) {
        echo "Car added successfully!";
        // Redirect to inventory page (optional)
        header('Location: http://localhost/wp%20project-before/dashboard.php');
    } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
}
?>
