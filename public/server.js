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

// Check if 'wh_r_no' is passed via GET parameter
if (isset($_GET['wh_r_no'])) {
    $wh_r_no = $_GET['wh_r_no'];

    // Query to fetch data by wheeler registration number
    $sql = "
        SELECT b.state, b.wheeler_reg_no, b.chassis_no, b.engine_no, u.name, u.email, u.phone, u.address
        FROM bookings b
        LEFT JOIN users u ON b.wheeler_reg_no = u.wheeler_reg
        WHERE b.wheeler_reg_no = ?
    ";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameter and execute the query
    $stmt->bind_param("s", $wh_r_no);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if results are found
    if ($result->num_rows > 0) {
        // Fetch the data from the query result
        $row = $result->fetch_assoc();
    } else {
        echo "No details found for the given booking ID.";
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No wheeler registration number provided.";
    exit();
}

// Close the connection
$conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="../public/style/style.css">
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
        <marquee behavior="scroll" direction="left" class="float-content">Booking Open for all states <span>Book Your High-Security Number Plates (HSRP) - HSRP Booking Now Open</span>  - It's now easier than ever to re-gister your Wheeler and Book the mandatory High-Security Number Plates</marquee>
    </header>

    <div class="container" id="payment-details">
        <div id="entered_details" class="">
            <h2>Entered Details:</h2>
            <p><strong>State:</strong> <span id="result_state"><?php echo isset($row['state']) ? $row['state'] : ''; ?></span></p>
            <p><strong>Wheeler Reg No:</strong> <span id="result_wh_rg_no"><?php echo isset($row['wheeler_reg_no']) ? $row['wheeler_reg_no'] : ''; ?></span></p>
            <p><strong>Chassis No:</strong> <span id="result_chassis_no"><?php echo isset($row['chassis_no']) ? $row['chassis_no'] : ''; ?></span></p>
            <p><strong>Engine No:</strong> <span id="result_eng_no"><?php echo isset($row['engine_no']) ? $row['engine_no'] : ''; ?></span></p>

            <p><strong>Name:</strong> <span id="result_name"><?php echo isset($row['name']) ? $row['name'] : ''; ?></span></p>
            <p><strong>Email:</strong> <span id="result_email"><?php echo isset($row['email']) ? $row['email'] : ''; ?></span></p>
            <p><strong>Phone No:</strong> <span id="result_phone"><?php echo isset($row['phone']) ? $row['phone'] : ''; ?></span></p>
            <p><strong>Address:</strong> <span id="result_address"><?php echo isset($row['address']) ? $row['address'] : ''; ?></span></p>

            <label for="accept-terms">
                <input type="checkbox" id="accept-terms" required checked>
                I agree to HSRP <a href="../terms.html" target="_blank">Terms & Conditions</a>
            </label>

            <div class="paym-btns">
                <button id="to-payment">Confirm and Pay</button>
                <button type="button" id="pay-later-to-home">Pay Later</button>
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
