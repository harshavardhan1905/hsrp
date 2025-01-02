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

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['wh_r_no'], $_POST['amt'], $_FILES['file'])) {
        // Get form data
        $wh_r_no = $_POST['wh_r_no'];
        $amt = $_POST['amt'];
        $file = $_FILES['file']['name']; // Get file name

        // Handle file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Prepare the query to update the record
            $stmt = $conn->prepare("UPDATE hsrp SET amt = ?, file = ? WHERE wheeler_re_no = ?");
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }

            // Bind parameters
            $stmt->bind_param("sss", $amt, $file, $wh_r_no);

            if ($stmt->execute()) {
                // Redirect to a confirmation page
                header("Location: index.php?wh_r_no=" . urlencode($wh_r_no));
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Please fill out all required fields.";
    }
}

$conn->close();
?>
<html>
    <head>
        <link rel="stylesheet" href="../public/style/style.css">
    </head>
    <style>
        /* Styles for the page */
        .qr-sec {
            text-align: center;
            margin: 20px 0;
        }

        .qr-sec label {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        .qr-sec img {
            width: 350px;
            height: 350px;
            border: 2px solid #ddd;
            border-radius: 10px;
            margin: 10px 0;
        }

        .price_content {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007BFF;
            margin: 10px 0;
        }
    </style>
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
            <div id="payment-details" class="">
                <h2>Payment Details</h2>
                <form id="payment-details-form" method="post" enctype="multipart/form-data">
                    <div class="qr-sec">
                        <label for="qr">Scan and Pay:</label>
                        <img src="../public/assets/payment_qr.png" id="qr" height="400px" width="300px" alt="">
                    </div>

                    <p class="price_content" id="price_content" style="display:none;">
                        <strong>Amt :</strong> <span id="price"></span>
                    </p>

                    <label for="cvv">Upload:<span class="req_field">*</span></label>
                    <input type="file" id="file" name="file" required>

                    <div class="buttons">
                        <button type="button" id="back-user" onclick="window.location.href='../public/entered-form.php'">Back to User Details</button>
                        <button type="submit" id="finish" name="submit">Finish</button>
                    </div>
                </form>
                <div id="success-alert" class="alert alert-success" style="display: none;">
                    Payment successful! Returning to the home page.
                </div>
            </div>
        </div>
        <footer>
            <p>&copy; 2024 HSRP. All rights reserved.</p>
        </footer>

        <script>
            // Retrieve the price from local storage
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
