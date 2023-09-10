<?php 


session_start();


 // Define database credentials
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "mpesa";
 
 // Create a MySQLi connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 // User is logged in
// Access the session variables
 $email = $_SESSION['email'];
 $userPhoneNumber = $_SESSION['phone'];
 
                                 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Profit Academi - Subscription Checkout</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Football betting tips and trading bots - Increase your chances of winning with our expert tips and automated trading bots." name="description">
  <meta content="football betting tips, trading bots, football tips, sports betting, automated bots" name="keywords">

  <!-- Favicon -->
  <link href="img/logo.jpeg" rel="icon">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
  <!--Custom CSS -->
  <link href="css/main.css" rel="stylesheet">
  <link href="css/subs.css" rel="stylesheet">
  <link href="css/mpesa.css" rel="stylesheet">

    
</head>
<body class="App">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 order-1 order-md-1">
                <div class="form-container">
                    <h1></h1>
                    <div class="col__box">
                        <h5 style="color:blue;">FOOTBALL TIPS 1 MONTH</h5>
                        
                        <form class="paypal" action="request.php" method="post" id="paypal_form">
                            <div class="form-group">
                                
                                <input type="text" name="email" value="<?php echo $email; ?>" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="item_number" value="1">
                                <input type="text" name="item_name" value="football Tips 1 Month" readonly class="form-control">
                                <input type="text" name="amount" value="70" readonly class="form-control">
                                <input type="text" name="currency_code" value="USD" readonly class="form-control">
                            </div>
  

                            <input type="submit" name="submit" value="PAY NOW" class="btn btn-primary btn-lg">
                        </form>
                         <!-- MPesa Payment Button -->
    <a href="#" onclick="showPopup();" class="m-pesa-btn">
        <img src="img/mpesalogo.svg" alt="M-Pesa Logo" style="object-fit:cover; height: 85px;"/>
    </a>

                    </div>
                </div>
            </div>
<!-- Modal Overlay -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h5 style="color:blue;">FOOTBALL TIPS 1 MONTH</h5>
        <form id="mpesaForm">
            <input type="tel" name="phone_number" value="<?php echo $userPhoneNumber; ?>" required>
            <input type="text" name="amount" value="1" readonly class="form-control">
            <input type="text" name="currency_code" value="KES" readonly class="form-control">
            
            <button type="button" class="btn btn-primary btn-lg" onclick="submitMpesaForm()">LIPA NA M-Pesa</button>
        </form>
    </div>
</div>


                <script>
    // Function to show the popup
    function showPopup() {
        document.getElementById("myModal").style.display = "block";
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById("myModal").style.display = "none";
    }

    // Function to handle form submission
    function submitMpesaForm() {
    var phoneNumber = document.getElementById("mpesaForm").phone_number.value;
    var amount = document.getElementById("mpesaForm").amount.value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "mpesa/stkpush.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "success") {
                    showNotification("M-Pesa pop-up sent to your phone. CheckoutRequestID: " + response.CheckoutRequestID);
                } else {
                    showNotification("Error sending M-Pesa pop-up. Please try again later.");
                }
                closePopup();
            } else {
                showNotification("Error sending M-Pesa pop-up. Please try again later.");
            }
        }
    };

    var params = "phone_number=" + encodeURIComponent(phoneNumber) + "&amount=" + encodeURIComponent(amount);
    xhr.send(params);
}

// Function to show the notification
function showNotification(message) {
    var notificationContainer = document.createElement("div");
    notificationContainer.className = "notification-container";

    var notification = document.createElement("div");
    notification.className = "notification";
    notification.textContent = message;

    var notificationLine = document.createElement("div");
    notificationLine.className = "notification-line";

    notificationContainer.appendChild(notification);
    notificationContainer.appendChild(notificationLine);
    document.body.appendChild(notificationContainer);

    // Show notification container
    notificationContainer.style.display = "block";

    // Set timeout to hide notification container and line
    setTimeout(function() {
        notificationContainer.style.display = "none";
    }, 10000); // 10 seconds
}
</script>   


            <div class="col-lg-6 col-md-6 order-2 order-md-2">
                <div class="container">
                <div class="row">
                        <div class="col">
                            
                            <!-- Add your disclaimers here -->
                            <div class="error-message"><div class="error-box"><p>DISCLAIMERS!</p></div></div>
                            <div class="disclaimers">
    <!-- Disclaimer 1: PayPal -->
    <div class="error-message">
        <div class="error-box">
            <p><em>Payment Methods: PayPal and M-Pesa (Kenyan Subscribers)</em></p>
            <p><em>Disclaimer: PayPal payments require a valid PayPal account. Registration is free and easy. Please ensure you have a PayPal account before proceeding.</em></p>
        </div>
    </div>

    <!-- Disclaimer 2: Prices and Authorization -->
    <div class="error-message">
        <div class="error-box">
            <p><em>Prices: Listed in USD for PayPal and KES for M-Pesa</em></p>
            <p><em>Disclaimer: By clicking either payment method, you authorize the payment transaction to proceed. Please review your order details before completing the payment.</em></p>
        </div>
    </div>

    <!-- Disclaimer 3: Alternative Payment Methods -->
    <div class="error-message">
        <div class="error-box">
            <p><em>Alternative Payment Methods</em></p>
            <p><em>We also offer various other payment methods. If none of the listed options suit you, please contact us via email, WhatsApp, or any method listed on this site for guidance or to explore alternative payment methods.</em></p>
        </div>
    </div>
</div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            
                            <!-- Add your other payment methods here -->
                            <p>We accept a variety of payment methods, but our on-site methods are limited to paypal, Debit/Credit Card and M-pesa Methods.
                            However, on-site M-pesa is limited to Kenyan subscribers. </p>
                            <h1>OFF-SITE PAYMENT METHODS: </h1>
                            <p>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i> M-pesa<br>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i> Skrill<br>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i>  AirtelMoney<br>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i> Tigo<br>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i> Western-Union<br>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i>  Bitcoin<br>
                            <i class='fas fa-check text-success' style="font-size: 12px;"></i> Neteller<br>
                            </p>
                            <p>
                            Please Contact us so we can guide you on how to use any of these methods.
                            </p>



                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

 
        <!-- Back to top button -->
        <a href="#" class="btn back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

 <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/isotope/3.0.6/isotope.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

 <!-- custom Javascript -->
 <script src="js/main.js"></script>
    </body>
    </html>        
