<?php
session_start();
require 'backend/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Fetch all cars
$cars = [];
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TechCars2</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to TechCars2 Dashboard</h1>
        <a href="backend/logout.php" class="btn">Logout</a>
    </header>

    <section class="car-section">
        <h2>Available Cars</h2>
        <div class="car-grid">
            <?php foreach ($cars as $car): ?>
                <div class="car-card">
                    <img src="images/<?php echo htmlspecialchars($car['image_url']); ?>" alt="<?php echo htmlspecialchars($car['name']); ?>">
                    <h3><?php echo htmlspecialchars($car['name']); ?></h3>
                    <p>Price: ₹<?php echo htmlspecialchars($car['price']); ?></p>
                    <p><?php echo htmlspecialchars($car['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="featured-cars">
        <h2>Featured Cars</h2>
        <div class="car-grid">
            <div class="car-card">
                <img src="images/car1.jpg" alt="Car 1">
                <h3>Ford MustangGT</h3>
                <p>₹50 Lakhs</p>
                <a href="car_details.php?name=Ford MustangGT" class="btn">View Details</a>

            </div>
             <div class="car-card">
                <img src="images/car2.jpg" alt="Car 2">
                <h3>Ford Raptor 4x4</h3>
                <p>₹47 Lakhs</p>
                <a href="car_details.php?name=Ford Raptor 4x4" class="btn">View Details</a>
            </div>
            <div class="car-card">
                <img src="images/car3.jpg" alt="Car 3">
                <h3>Tesla model X</h3>
                <p>₹42 Lakhs</p>
                <a href="car_details.php?name=Tesla model X" class="btn">View Details</a>
            </div>
            <div class="car-card">
                <img src="images/car4.jpeg" alt="Car 4">
                <h3>Ford Mustang Mach-E</h3>
                <p>₹55 Lakhs</p>
                <a href="car_details.php?name=Ford Mustang Mach-E" class="btn">View Details</a>
            </div>
            <div class="car-card">
                <img src="images/car5.jpeg" alt="Car 5">
                <h3>BMW iX</h3>
                <p>₹1.20 Crore</p>
                <a href="car_details.php?name=BMW iX" class="btn">View Details</a>
            </div>
            <div class="car-card">
                <img src="images/car6.jpeg" alt="Car 6">
                <h3>Audi e-tron GT</h3>
                <p>₹1.5 Crore</p>
                <a href="car_details.php?name=Audi e-tron GT" class="btn">View Details</a>
            </div>
            <div class="car-card">
                <img src="images/car7.jpeg" alt="Car 7">
                <h3>Mercedes-Benz EQC</h3>
                <p>₹1.05 Crore</p>
                <a href="car_details.php?name=Mercedes-Benz EQC" class="btn">View Details</a>
            </div>
            <div class="car-card">
                <img src="images/car8.jpeg" alt="Car 8">
                <h3>Jaguar I-PACE</h3>
                <p>₹1 Crore</p>
                <a href="car_details.php?name=Jaguar I-PACE" class="btn">View Details</a>
            </div>
            
           
        </div>
    </section>

    <section class="add-car-form">
        <h2>Add a New Car</h2>
        <form action="backend/add_car.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Car Name" required>
            <input type="number" name="price" placeholder="Price (₹)" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" class="btn">Add Car</button>
        </form>
    </section>

</body>
</html>
