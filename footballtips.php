<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Profit Academi - Football Tips</title>
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
  <link href="css/fotball.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">

  <script>
  logoutAfterInactivity();
</script>
  </head>
  <body>

  
  <style>
.navbar {
  position: sticky;
  top: 0;
  background-color: #030d38 !important;
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 999;
}
</style>


  
  <body>
    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
      <div class="container-fluid">
        <img class="logo" src="img/logo.jpeg" alt="Company Logo">
          <a href="index.php" class="navbar-brand">Profit Academi</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav ml-auto">
    <a href="index.php" class="nav-item nav-link active">Home</a>
    <a href="aboutus.html" class="nav-item nav-link">About</a>

    <?php
    // Check if the user is logged in and subscribed
$userLoggedIn = false;


// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // User is logged in
    $userLoggedIn = true;
    // Check if the user is logged in
    
}
    if ($userLoggedIn) {
        // Display Logout link
        echo '<a href="logout.php" class="nav-item nav-link">Logout</a>';
    } else {
        // Display Sign-up and Login links
        echo '<a href="signup.php" class="nav-item nav-link">Sign-up</a>';
        echo '<a href="login.html" class="nav-item nav-link">Login</a>';
    }
    ?>
</div>
          </div>
      </div>
  </div>
          <!-- Nav Bar End -->



<!-- Price Start -->
<?php

// Define database credentials
$servername = "localhost";
 $username = "profitac_admin";
 $password = "@Profit01";
 $dbname = "profitac_profit";

// Create a MySQLi connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the user is logged in and subscribed
$userLoggedIn = false;
$userSubscribed = false;
$subscriptionEndDate = '';

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // User is logged in
    $userLoggedIn = true;
    
    // Fetch the user's subscription status from your database
    $email = $_SESSION['email'];
    $sql = "SELECT ft1, ft3, ft6, unlockall, enddate FROM subscriptions WHERE email = '$email'";
    $subscriptionResult = $conn->query($sql);
    
    if ($subscriptionResult->num_rows > 0) {
        $subscriptionData = $subscriptionResult->fetch_assoc();
        
        // Check if the user is subscribed
        if ($subscriptionData['ft1'] == 1 || $subscriptionData['ft3'] == 1 || $subscriptionData['ft6'] == 1 || $subscriptionData['unlockall'] == 1) {
            $userSubscribed = true;
            $subscriptionEndDate = $subscriptionData['enddate'];
        }
    }
}
?>

<?php if (!$userSubscribed) { ?>
    <div class="price" id="price">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <div class="text-center wow fadeInUp">
                    <div class="badge badge-subhead">Plan Pricing</div>
                </div>
                <p style="margin-bottom: 50px;">Unlock Accurate and well-analyzed Football tips with High Odds</p>
            </div>
            <div class="row">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="price-item">
                        <div class="price-header">
                            <div class="price-title">
                                <h2>1 Month</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>$</small>70</h2>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    <li>30 Days VIP Access</li>
                                    <li>High Odds</li>
                                    <li>24/7 Customer Care Support</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                        <div class="price-action">
    <?php if ($userLoggedIn) { ?>
        <a class="btn" href="ft1sub.php">Subscribe</a>
    <?php } else { ?>
        <a class="btn" href="login.html">Subscribe</a>
    <?php } ?>
</div>

                        </div>
                    </div>
                    <p class="subs"><i class="fas fa-user"></i> 1.5k subscribers</p>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.0s">
                    <p class="price-pop">MOST POPULAR</p>
                    <div class="price-item featured-item">
                        <div class="price-header">
                            <div class="price-title">
                                <h2>3 Months</h2>
                            </div>
                            <div class="price-prices">
                                <div>
                                    <h2><small>$</small>100</h2>
                                </div>
                                <div class="discount-container">
                                    <span class="discount-label">Save 50%</span>
                                </div>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    <li>90 Days VIP Access</li>
                                    <li>High Odds</li>
                                    <li>24/7 Customer Care Support</li>
                                    <li>Save 50%</li>
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                            <?php if ($userLoggedIn) { ?>
        <a class="btn" href="ft3sub.php">Subscribe</a>
    <?php } else { ?>
        <a class="btn" href="login.html">Subscribe</a>
    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <p class="subs"><i class="fas fa-user"></i> 2.2k subscribers</p>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="price-pop">BEST CHOICE</p>
                    <div class="price-item">
                        <div class="price-header">
                            <div class="price-title">
                                <h2>6 Months</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>$</small>150</h2>
                            </div>
                            <div class="discount-container">
                                <span class="discount-label">Save 65%</span>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    <li>180 Days VIP Access</li>
                                    <li>High Odds</li>
                                    <li>24/7 Customer Care Support</li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                            <?php if ($userLoggedIn) { ?>
                            <a class="btn" href="ft6sub.php">Subscribe</a>
                            <?php } else { ?>
                             <a class="btn" href="login.html">Subscribe</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <p class="subs"><i class="fas fa-user"></i> <span style="color: blue;">800 </span>subscribers</p>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="success-message">
   <div class="success-box">
        <p>Subscription End Date: <?php echo $subscriptionEndDate; ?></p>
   </div>
    </div>
<?php } ?>
<!-- Price End -->
        
    <!-- Todays games -->
<div class="text-center wow fadeInUp">
  <div class="badge badge-subhead" style="margin-top: 20px;">Today's Matches</div>
</div>

<?php

// Check if the user is logged in and subscribed
$userLoggedIn = false;
$userSubscribed = false;

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // User is logged in
    $userLoggedIn = true;
    
    // Fetch the user's subscription status from your database
    $email = $_SESSION['email'];
    $sql = "SELECT ft1, ft3, ft6, unlockall FROM subscriptions WHERE email = '$email'";
    $subscriptionResult = $conn->query($sql);
    
    if ($subscriptionResult->num_rows > 0) {
        $subscriptionData = $subscriptionResult->fetch_assoc();
        
        // Check if the user is subscribed
        if ($subscriptionData['ft1'] == 1 || $subscriptionData['ft3'] == 1 || $subscriptionData['ft6'] == 1 || $subscriptionData['unlockall'] == 1) {
            $userSubscribed = true;
        }
    }
}

// Check if the user is logged in and subscribed to display today's games section
if ($userLoggedIn && $userSubscribed) {
    // Retrieve today's games from the database and display the section
    $today = date("Y-m-d");
    $sql = "SELECT * FROM games WHERE date = '$today'";
    $result = $conn->query($sql);
    ?>

    <div class="todays-match">
        <?php if ($result->num_rows > 0) { ?>
            <table>
                <tr>
                    <th class="white-column">Date</th>
                    <th class="blue-column">League</th>
                    <th class="white-column">Game</th>
                    <th class="blue-column">Prediction</th>
                    <th class="white-column">Odds</th>
                </tr>
                <?php
                $row_index = 0;
                while ($row = $result->fetch_assoc()) {
                    $row_class = $row_index % 2 == 0 ? 'blue-column' : 'white-column';
                    ?>
                    <tr>
                        <td class="<?php echo $row_class; ?>"><?php echo $row['date']; ?></td>
                        <td class="<?php echo $row_class; ?>"><?php echo $row['league']; ?></td>
                        <td class="<?php echo $row_class; ?>"><?php echo $row['game']; ?></td>
                        <td class="<?php echo $row_class; ?>"><?php echo $row['prediction']; ?></td>
                        <td class="<?php echo $row_class; ?>"><?php echo $row['odds']; ?></td>
                    </tr>
                    <?php
                    $row_index++;
                }
                ?>
            </table>
        <?php } else { ?>
            <p>No games present for today.</p>
        <?php } ?>
    </div>

<?php } else {
    // Display error message for non-subscribed or non-logged-in users
    if (!$userLoggedIn) {
        echo '<div class="error-message"><div class="error-box"><p>Please log in to view today\'s tips.</p></div></div>';
    } else if (!$userSubscribed) {
        echo '<div class="error-message"><div class="error-box"><p>Please subscribe to view today\'s tips.</p></div></div>';
    } else {
        echo '<div class="error-message"><div class="error-box"><p>Unknown error occurred.</p></div></div>';
    }
}
?>

        <!-- Yesterdays games -->
        <div class="text-center wow fadeInUp">
            <div class="badge badge-subhead" style="margin-top: 20px;">Yesterdays Matches</div>
          </div>
          <?php

// Retrieve yesterday's games from the database
$yesterday = date("Y-m-d", strtotime("-1 day"));
$sql = "SELECT * FROM games WHERE date = '$yesterday'";
$result = $conn->query($sql);

?>


    <div class="yst-match">
    <?php if ($result->num_rows > 0) { ?>
        <table>
            <tr>
                <th class="white-column">Date</th>
                <th class="blue-column">League</th>
                <th class="white-column">Game</th>
                <th class="blue-column">Prediction</th>
                <th class="white-column">Odds</th>
                <th class="blue-column">Result</th>
                <th class="white-column">Status</th>
            </tr>
            <?php
            $row_index = 0;
            while ($row = $result->fetch_assoc()) {
                $row_class = $row_index % 2 == 0 ? 'blue-column' : 'white-column';
                ?>
                <tr>
                    <td class="<?php echo $row_class; ?>"><?php echo $row['date']; ?></td>
                    <td class="<?php echo $row_class; ?>"><?php echo $row['league']; ?></td>
                    <td class="<?php echo $row_class; ?>"><?php echo $row['game']; ?></td>
                    <td class="<?php echo $row_class; ?>"><?php echo $row['prediction']; ?></td>
                    <td class="<?php echo $row_class; ?>"><?php echo $row['odds']; ?></td>
                    <td class="<?php echo $row_class; ?>"><?php echo $row['results']; ?></td>
                    <td class="<?php echo $row_class; ?>">
                        <?php if ($row['status'] == 1) { ?>
                            <span class="green-tick">&#10004;</span>
                        <?php } elseif ($row['status'] == 0) { ?>
                            <span class="red-x">&#10008;</span>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                $row_index++;
            }
            ?>
        </table>
    <?php } else { ?>
        <div class="error-message"><div class="error-box"><p>No data present.</p></div></div>
    <?php } ?>
    </div>


<!-- footer Start -->
<div class="footer-dark">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="footballtips.php">Football Tips</a></li>
                        <li><a href="tradingbots.php">Trading bots</a></li>
                        
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="aboutus.html">Company</a></li>
                        <li><a href="aboutus.html">Team</a></li>
                        <li><a href="faqs.html">FAQS</a></li>
                    </ul>
                </div>
                <div class="col-md-6 item text">
                    <h3>Profit Academi</h3>
                    <p>Welcome to Profit Academi, your ultimate destination for football tips and trading bots. We are a dedicated team of passionate football
                    enthusiasts and experienced traders who aim to provide you with the tools and knowledge to excel in the exciting world of football trading..</p>
                </div>
                <div class="col item social">
                      
                        <a href=""><i class="fab fa-facebook-f" style="color: blue;"></i></a>
                        <a href=""><i class="fab fa-youtube" style="color: rgb(250, 6, 6);"></i></a>
                        <a href=""><i class="fab fa-instagram"  style="color: rgb(236, 9, 9);"></i></a>
                        <a href=""><i class="fab fa-twitter" style="color: blue;"></i></a>
                        <a href="#"><i class="icon ion-social-snapchat"style="color: yellow;"></i></a>
                        <a href=""><i class="fab fa-linkedin-in" style="color: white;"></i></a>
                    </div>
            </div>
            <hr style="border-top: 1px solid white;">
            <p class="copyright">Profit Academia © 2023</p>
        </div>
    </footer>
</div>

<!-- WhatsApp Icon -->
      <a href="https://api.whatsapp.com/send?phone=254751683439" target="_blank" class="whatsapp-icon"><i class="fab fa-whatsapp"></i></a>
      
    
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