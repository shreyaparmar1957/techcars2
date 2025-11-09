<?php
// car_details.php

if (isset($_GET['name'])) {
    $carName = htmlspecialchars($_GET['name']);

    // More detailed car data
    $cars = [
        "Ford MustangGT" => [
            "price" => "₹50 Lakhs",
            "description" => "A legendary muscle car with powerful V8 engine and iconic design.",
            "image" => "images/car1.jpg",
            "mileage" => "7 kmpl",
            "Kms Driven" => "50,345 Kms",
            "avg_speed" => "250 km/h",
            "engine" => "5.0L Petrol V8",
            "transmission" => "Manual",
            "year" => "2020",
            "seating" => "4"
        ],
        "Ford Raptor 4x4" => [
            "price" => "₹47 Lakhs",
            "description" => "An off-road beast built for rugged terrains and adventure seekers.",
            "image" => "images/car2.jpg",
            "mileage" => "9 kmpl",
            "Kms Driven" => "29,295 Kms",
            "avg_speed" => "210 km/h",
            "engine" => "3.5L V6 Petrol",
            "transmission" => "Automatic",
            "year" => "2019",
            "seating" => "5"
        ],
        "Tesla model X" => [
            "price" => "₹42 Lakhs",
            "description" => "A futuristic electric SUV with falcon-wing doors and autopilot features.",
            "image" => "images/car3.jpg",
            "mileage" => "Electric - 400 km range",
            "Kms Driven" => "20,225 Kms",
            "avg_speed" => "250 km/h",
            "engine" => "Dual Electric Motors",
            "transmission" => "Automatic",
            "year" => "2021",
            "seating" => "7"
        ],
        "Ford Mustang Mach-E" => [
            "price" => "₹55 Lakhs",
            "description" => "A powerful electric SUV with sleek styling and cutting-edge tech.",
            "image" => "images/car4.jpeg",
            "mileage" => "Electric - 490 km range",
            "Kms Driven" => "15,500 Kms",
            "avg_speed" => "230 km/h",
            "engine" => "Dual Electric Motors",
            "transmission" => "Automatic",
            "year" => "2022",
            "seating" => "5"
        ],

        "BMW iX" => [
            "price" => "₹1.20 Crore",
            "description" => "A luxurious electric SUV with exceptional performance and interior comfort.",
            "image" => "images/car5.jpeg",
            "mileage" => "Electric - 566 km range",
            "Kms Driven" => "10,000 Kms",
            "avg_speed" => "250 km/h",
            "engine" => "Dual Electric Motors",
            "transmission" => "Automatic",
            "year" => "2023",
            "seating" => "5"
        ],

        "Audi e-tron GT" => [
            "price" => "₹1.5 Crore",
            "description" => "A high-performance electric sports sedan with remarkable design and handling.",
            "image" => "images/car6.jpeg",
            "mileage" => "Electric - 450 km range",
            "Kms Driven" => "5,300 Kms",
            "avg_speed" => "300 km/h",
            "engine" => "Dual Electric Motors",
            "transmission" => "Automatic",
            "year" => "2022",
            "seating" => "4"
        ],

        "Mercedes-Benz EQC" => [
            "price" => "₹1.05 Crore",
            "description" => "A premium electric SUV that blends luxury with advanced technology.",
            "image" => "images/car7.jpeg",
            "mileage" => "Electric - 400 km range",
            "Kms Driven" => "7,800 Kms",
            "avg_speed" => "220 km/h",
            "engine" => "Dual Electric Motors",
            "transmission" => "Automatic",
            "year" => "2021",
            "seating" => "5"
        ],

        "Jaguar I-PACE" => [
            "price" => "₹1 Crore",
            "description" => "A sophisticated electric crossover with exceptional handling and a premium feel.",
            "image" => "images/car8.jpeg",
            "mileage" => "Electric - 470 km range",
            "Kms Driven" => "12,000 Kms",
            "avg_speed" => "240 km/h",
            "engine" => "Dual Electric Motors",
            "transmission" => "Automatic",
            "year" => "2022",
            "seating" => "5"
        ]

       
    ];

    if (array_key_exists($carName, $cars)) {
        $car = $cars[$carName];
    } else {
        echo "Car not found.";
        exit();
    }
} else {
    echo "No car selected.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $carName; ?> - Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        header {
            background: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
        .car-details {
            padding: 30px;
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            text-align: center;
        }
        .car-details img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .specs-table {
            margin: 20px auto;
            text-align: left;
            width: 90%;
            border-collapse: collapse;
            background: #222;
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .specs-table td {
            padding: 12px;
            border-bottom: 1px solid #555;
        }
        .specs-table td:first-child {
            font-weight: bold;
            width: 40%;
        }
        .btn {
            display: inline-block;
            background: #ff9800;
            color: #fff;
            padding: 10px 20px;
            margin: 10px 5px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #e68a00;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $carName; ?> - Full Details</h1>
    </header>

    <section class="car-details">
        <img src="<?php echo $car['image']; ?>" alt="<?php echo $carName; ?>">
        <h2>Price: <?php echo $car['price']; ?></h2>
        <p><?php echo $car['description']; ?></p>

        <h3>Specifications:</h3>
        <table class="specs-table">
            <tr><td>Mileage</td><td><?php echo $car['mileage']; ?></td></tr>
            <tr><td>Average Speed</td><td><?php echo $car['avg_speed']; ?></td></tr>
            <tr><td>Engine</td><td><?php echo $car['engine']; ?></td></tr>
            <tr><td>Transmission</td><td><?php echo $car['transmission']; ?></td></tr>
            <tr><td>Model Year</td><td><?php echo $car['year']; ?></td></tr>
            <tr><td>Seating Capacity</td><td><?php echo $car['seating']; ?></td></tr>
        </table>

        <!-- Bonus Buttons -->
        <a href="enquire_form.php?car=<?php echo urlencode($carName); ?>" class="btn">Enquire Now</a>
        <a href="add_to_cart.php?car=<?php echo urlencode($carName); ?>" class="btn">Add to Cart</a>

        <br><br>
        <a href="index.php" class="btn">Back to Home</a>
    </section>
</body>
</html>
