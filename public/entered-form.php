<?php
// Database connection
$servername = "localhost";
$username = "dev_harsha";
$password = "Harsha@123";
$dbname = "hsrpbooking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the last record
$sql = "SELECT * FROM hsrp ORDER BY id DESC LIMIT 1"; // Assumes 'id' is the primary key
$result = $conn->query($sql);

// Prepare variables for displaying data
$record = null;
if ($result->num_rows > 0) {
    $record = $result->fetch_assoc();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/style.css">
    <title>HSRP Online Booking - Last Record</title>
</head>
<body>
    <header>
        <div class="head-sec">
            <h1>HSRP Online Booking</h1>
            <nav>
                <a href="#home" onclick="window.location.href='../public/index.php'">Home</a>
                <a href="#contact-us" onclick="window.location.href='../public/contact.php'">Contact Us</a>
                <a href="#privacy-policy">Privacy Policy</a>
                <a href="#refund-policy" onclick="window.location.href='../public/refund_policy.php'">Refund Policy</a>
                <a href="#terms-conditions" onclick="window.location.href='../public/terms.php'">Terms & Conditions</a>
            </nav>
        </div>
        <marquee behavior="scroll" direction="left" class="float-content">
            Booking Open for all states <span>Book Your High-Security Number Plates (HSRP) - HSRP Booking Now Open</span>
        </marquee>
    </header>
    <div class="container" id="payment-details">
        <div id="entered_details">
            <h2>Last Entered Details:</h2>
            <?php if ($record): ?>
                <p><strong>State:</strong> <?= htmlspecialchars($record['state']); ?></p>
                <p><strong>Wheeler Reg No:</strong> <?= htmlspecialchars($record['wheeler_re_no']); ?></p>
                <p><strong>Chassis No:</strong> <?= htmlspecialchars($record['chassis_no']); ?></p>
                <p><strong>Engine No:</strong> <?= htmlspecialchars($record['eng_no']); ?></p>
                <p><strong>Name:</strong> <?= htmlspecialchars($record['name']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($record['email']); ?></p>
                <p><strong>Phone No:</strong> <?= htmlspecialchars($record['phone']); ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($record['address']); ?></p>
            <?php else: ?>
                <p>No records found.</p>
            <?php endif; ?>

            <label for="accept-terms">
                <input type="checkbox" id="accept-terms" required>
                I agree to HSRP <a href="../terms.html" target="_blank">Terms & Conditions</a>
            </label>
            
            <div class="paym-btns">
                <button id="to-payment" onclick="window.location.href='../public/payment-form.php'">Confirm and Pay</button>
                <button type="button" id="pay-later-to-home" onclick="window.location.href='../public/index.php'">Pay Later</button>
                <div id="success-alert" class="alert alert-success" style="display: none;">
                    Pay Later is successful! Returning to the home page.
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 HSRP. All rights reserved.</p>
    </footer>
    <script src="../public/script/script.js"></script>
</body>
</html>
