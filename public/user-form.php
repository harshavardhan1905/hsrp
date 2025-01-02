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
    if (isset($_POST['wh_r_no'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
        // Get form data
        $wh_r_no = $_POST['wh_r_no'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Update the record in the database
        $stmt = $conn->prepare("UPDATE hsrp SET name = ?, email = ?, phone = ?, address = ? WHERE wheeler_re_no = ?");

        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("sssss", $name, $email, $phone, $address, $wh_r_no);

        if ($stmt->execute()) {
            // Redirect to a confirmation page
            header("Location: entered-form.php?wh_r_no=" . urlencode($wh_r_no));
            exit();
          
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
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
            
            <div id="user-details" class="">
                <h2>User Details</h2>
                <form action="user-form.php" method="POST" onsubmit="return validateForm();">
    <?php
    // Get the wheeler registration number from the query parameter
    $wh_r_no = isset($_GET['wh_r_no']) ? htmlspecialchars($_GET['wh_r_no']) : '';
    ?>
    <input type="hidden" name="wh_r_no" value="<?php echo $wh_r_no; ?>">

    <label for="name">Name: <span class="req_field">*</span></label>
    <input type="text" id="name" name="name" value="" placeholder="Your full name" required minlength="3">

    <label for="email">Email: <span class="req_field">*</span></label>
    <input type="email" id="email" name="email" value="" placeholder="example@domain.com" required>

    <label for="phone">Phone: <span class="req_field">*</span></label>
    <input type="tel" id="phone" name="phone" value="" placeholder="123-456-7890" required pattern="\d{10}">

    <label for="address">Delivery Address: <span class="req_field">*</span></label>
    <input type="text" id="address" name="address" value="" placeholder="Address" required minlength="5">

    <div class="buttons">
        <button type="button" id="back-booking" onclick="window.location.href='booking-form.php'">Back to Booking</button>
        <button type="submit" id="to-entered_details">Entered Details</button>
    </div>
</form>
            </div>
        </div>
        <footer>
            <p>&copy; 2024 HSRP. All rights reserved.</p>
        </footer>
    
        <script>
    function validateForm() {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const address = document.getElementById('address').value.trim();

        if (name.length < 3) {
            alert("Name must be at least 3 characters long.");
            return false;
        }

        if (!/^\S+@\S+\.\S+$/.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!/^\d{10}$/.test(phone)) {
        alert("Phone number must be exactly 10 numeric digits.");
        return false;
    }

        if (address.length < 5) {
            alert("Delivery address must be at least 5 characters long.");
            return false;
        }

        return true; // Allow form submission if all validations pass
    }
</script>
        
    </body>
</html>
