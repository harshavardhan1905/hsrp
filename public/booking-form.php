<?php
// Database connection
$servername = "localhost";
$username = "dev_harsha";
$password = "Harsha@123";
$dbname = "hsrpbooking";

// Create connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error, 0);
    die("Could not connect to the database. Please try again later.");
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['state'], $_POST['wh_r_no'], $_POST['chassis_no'], $_POST['eng_no'])) {
        $state = $_POST['state'];
        $wh_r_no = $_POST['wh_r_no'];
        $chassis_no = $_POST['chassis_no'];
        $eng_no = $_POST['eng_no'];

        // Insert into the database with a unique wheeler registration number
        $stmt = $conn->prepare("INSERT INTO hsrp (state, wheeler_re_no, chassis_no, eng_no) VALUES (?, ?, ?, ?)");

        if ($stmt === false) {
            error_log("Error preparing statement: " . $conn->error, 0);
            die("An error occurred. Please try again later.");
        }

        $stmt->bind_param("ssss", $state, $wh_r_no, $chassis_no, $eng_no);

        if ($stmt->execute()) {
            // Redirect to the second form page
            header("Location: user-form.php?wh_r_no=" . urlencode($wh_r_no));
            exit();
        } else {
            error_log("Error executing statement: " . $stmt->error, 0);
            echo "An error occurred. Please try again.";
        }

        $stmt->close();
    } else {
        echo "Please fill out all required fields.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/style.css">
    <title>HSRP Online Booking</title>
</head>
<body>
    <header id="home">
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
            Booking Open for all states <span>Book Your High-Security Number Plates (HSRP) - HSRP Booking Now Open</span> - It's now easier than ever to register your Wheeler and Book the mandatory High-Security Number Plates
        </marquee>
    </header>

    <div class="container" id="payment-details">
        <div id="booking-details" class="section active">
            <h2>Booking Details</h2>

            <form action="booking-form.php" method="POST">
                <label for="state">State: <span class="req_field">*</span></label>
                <select id="state" name="state" required>
                <option value="">Select Registration state</option>
                        <option value="Andhra Pradesh" selected>Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana" >Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Puducherry">Puducherry</option>
                    <!-- Add other options here -->
                </select>

                <label for="wh_r_no">Wheeler Reg No: <span class="req_field">*</span></label>
                <input type="text" id="wh_r_no" name="wh_r_no" required>
                <span style="font-size: 10px; margin-top: 3px;">(Reg No. Ex:- DLXXXXXX01)</span>

                <label for="chassis_no">Chassis No.* (XXXXXX12345): <span class="req_field">*</span></label>
                <input type="text" id="chassis_no" name="chassis_no" value="XXXXXX12345" required>
                <span style="font-size: 10px; margin-top: 3px;">(Kindly enter last 5 digits including special characters)</span>

                <label for="eng_no">Engine No.* (XXXXXX12345): <span class="req_field">*</span></label>
                <input type="text" id="eng_no" name="eng_no" value="XXXXXX12345" required>
                <span style="font-size: 10px; margin-top: 3px;">(Kindly enter last 5 digits)</span>

                <div class="buttons">
                    <button type="button" id="back-home">Back to Home</button>
                    <button type="submit" id="to-user" onclick="window.location.href='user-form.php'">Continue</button>
                </div>
            </form>
        </div>
    </div>
    <p class="price_content" id="price_content" style="display:none;">
                        <strong>Amt :</strong> <span id="price"></span>
                    </p>

    <footer>
        <p>&copy; 2024 HSRP. All rights reserved.</p>
    </footer>
    <script>
         const price = localStorage.getItem("price");

    if (price) {
    // Display the price content
        const priceContent = document.getElementById("price_content");
        priceContent.style.display = "block";

    // Set the price value
        document.getElementById("price").textContent = price;
        }

// Finish button navigation
document.getElementById('finish').addEventListener('click', function() {
    window.location.href = '../public/index.php'; // Navigate to the index page after finish
});
    </script>

</body>
</html>
