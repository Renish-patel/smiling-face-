
<html lang="en">
<head>
    <title>Home</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">	

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                    <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                                                  
						  <h3> <tt>It's Easy To Help !!</h3></tt>
						  
                       <!-- .header-bar-email -->

                        
		                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .top-header-bar -->

        <div class="nav-bar">
			<div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                           <a class="d-block" href="index.php" rel="home"><img class="d-block" src="images/logo.png" width= "150" height="110" alt="logo"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                <li class="current-menu-item"><a href="index.php">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="causes.html">Causes</a></li>
                                <li><a href="portfolio.html">Gallery</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li>
										<a href="login/login.php">Sign up</a>
										</div>
								</div></a></li>
								
                            </ul>
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->
		</div>
    </header><!-- .site-header -->

<?php
debug_backtrace();
session_start(); // Starting Session
//if session exit, user nither need to signin nor need to signup
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
      $pageStore = $_SESSION['pageStore'];
header("location: $pageStore"); // Redirecting To Profile Page
    }
}

//Login progess start, if user press the signin button
if (isset($_POST['signIn'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
echo "Username & Password should not be empty";
}
else
{

$email = $_POST['email'];
$password = $_POST['password'];

// Make a connection with MySQL server.
include('config.php');

$sQuery = "SELECT id, password from account where email=? LIMIT 1";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($sQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id, $hash);
$stmt->store_result();

if($stmt->fetch()) { 
  if (password_verify($password, $hash)) {
          $_SESSION['login_id'] = $id;

          if (isset($_SESSION['pageStore'])) {
            $pageStore = $_SESSION['pageStore'];
          }
          else {
            $pageStore = "index.php";
          }
          header("location: $pageStore"); // Redirecting To Profile
          $stmt->close();
          $conn->close();

        }
else {
       echo 'Invalid Username & Password';
     }
      } else {
       echo 'Invalid Username & Password';
     }
$stmt->close();
$conn->close(); // Closing database Connection
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="auth.css">
</head>
<body>
 <div class="rlform">
  <div class="rlform rlform-wrapper">
   <div class="rlform-box">
    <div class="rlform-box-inner">
   <form method="post">
    <p>Sign in to continue</p>

    <div class="rlform-group">
     <label>Email</label>
     <input type="email" name="email" class="rlform-input" required>
    </div>

    <div class="rlform-group password-group">
     <label>Password</label>
     <input type="password" name="password" class="rlform-input" required>
    </div>

    <button type="submit" class="rlform-btn" name="signIn">Sign In
    </button>

    <div class="text-foot">
    Don't have an account? <a href="register.php">Register</a>
    </div>
   </form>
  </div>
   </div>
     </div>
 </div>
 </body>
</html>