<?php
// backend/handle_enquiry.php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

// adjust path if your db.php is located elsewhere
include __DIR__ . '/db.php'; // must set $conn as mysqli object

if (!isset($conn) || !($conn instanceof mysqli)) {
    http_response_code(500);
    echo "Database connection error. Check db.php";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method not allowed";
    exit;
}

// helper to safely fetch POST values
function post($k) {
    return isset($_POST[$k]) ? trim($_POST[$k]) : '';
}

$car_name = post('car') ?: post('car_name'); // support ?car=.. or hidden input named car_name
$name     = post('name');
$email    = post('email');
$message  = post('message');

// Basic validation
$errors = [];
if ($car_name === '') $errors[] = "Car name missing.";
if ($name === '') $errors[] = "Your name is required.";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";

if (!empty($errors)) {
    // show errors (simple)
    echo "<h3>There were errors with your submission:</h3><ul>";
    foreach ($errors as $e) {
        echo "<li>" . htmlspecialchars($e) . "</li>";
    }
    echo "</ul><p><a href=\"javascript:history.back()\">Go back</a></p>";
    exit;
}

// Insert into DB using prepared statement
$sql = "INSERT INTO enquiries (car_name, name, email, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Prepare failed: " . htmlspecialchars($conn->error);
    exit;
}
$stmt->bind_param("ssss", $car_name, $name, $email, $message);
$ok = $stmt->execute();
if (!$ok) {
    echo "Insert failed: " . htmlspecialchars($stmt->error);
    $stmt->close();
    exit;
}
$stmt->close();

// Successful: show confirmation and link back
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Enquiry Sent</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>
    body{font-family:Arial,Helvetica,sans-serif;background:#f6f8fb;padding:40px}
    .card{max-width:720px;margin:40px auto;padding:26px;background:#fff;border-radius:10px;box-shadow:0 10px 30px rgba(12,20,40,0.06)}
    h1{color:#1565d8;margin:0 0 8px}
    p{color:#333}
    a.btn{display:inline-block;margin-top:14px;padding:10px 14px;background:#1565d8;color:#fff;border-radius:8px;text-decoration:none}
  </style>
</head>
<body>
  <div class="card">
    <h1>Enquiry submitted</h1>
    <p>Thanks <?php echo htmlspecialchars($name); ?> — your enquiry about <strong><?php echo htmlspecialchars($car_name); ?></strong> has been received. We'll contact you at <strong><?php echo htmlspecialchars($email); ?></strong> soon.</p>
    <a class="btn" href="C:\xampp\htdocs\wp project-before\index.php">Back to Home</a>
  </div>
</body>
</html>
<?php
$conn->close();
exit;
