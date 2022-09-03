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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="causes.html">Causes</a></li>
                                <li><a href="portfolio.html">Gallery</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li class="current-menu-item">
										<a href="login.php">Sign up</a>
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
session_start();// Starting Session

//if session exit, user nither need to signin nor need to signup
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
      $pageStore = $_SESSION['pageStore'];
header("location: $pageStore"); // Redirecting To Profile Page
    }
}

//Register progess start, if user press the signup button
if (isset($_POST['signUp'])) {
if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['newPassword'])) {
echo "Please fill up all the required field.";
}
else
{

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['newPassword'];
$hash = password_hash($password, PASSWORD_DEFAULT);

// Make a connection with MySQL server.
include('config.php');

$sQuery = "SELECT id from account where email=? LIMIT 1";
$iQuery = "INSERT Into account (fullName, email, password) values(?, ?, ?)";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($sQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0) { //if true, insert new data
          $stmt->close();
          
          $stmt = $conn->prepare($iQuery);
    	  $stmt->bind_param("sss", $fullName, $email, $hash);
          if($stmt->execute()) {
        echo 'Register successfully, Please login with your login details';}
        } else { 
       echo 'Someone already register with this email address.';
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
	<title>Register</title>
	<link rel="stylesheet" href="auth.css">
</head>
<body>
 <div class="rlform">
  <div class="rlform rlform-wrapper">
   <div class="rlform-box">
	<div class="rlform-box-inner">
	 <form method="post" oninput='validatePassword()'>
	 <p style="color:#ff4800" >Let's create your account</p>

     <div class="rlform-group">
	  <label><p style="color:#ff4800"> Full Name </p></label>
	  <input type="text" name="fullName" class="rlform-input" required>
	 </div>
		
	 <div class="rlform-group">					
	  <label> <p style="color:#ff4800"> Email </p> </label>
	  <input type="email" name="email" class="rlform-input" required>
	 </div>
		
	 <div class="rlform-group">					
	  <label><p style="color:#ff4800">Password</p></label>
	  <input type="password" name="newPassword" id="newPass" class="rlform-input" required>
     </div>

     <div class="rlform-group">
	  <label> <p style="color:#ff4800">Conform password</p></label>
	  <input type="password" name="conformpassword" id="conformPass" class="rlform-input" required>
     </div>

	  <button class="rlform-btn" name="signUp"> Sign Up
	  </button>

	  <div class="text-foot">
	   <p style="color:#ff4800">Already have an account ?  <a href="login.php">Login</a>
	  </div>
	 </form>
	</div>
   </div>
  </div>
 </div>

	<script>
		function validatePassword(){
  if(newPass.value != conformPass.value) {
    conformPass.setCustomValidity('Passwords do not match.');
  } else {
    conformPass.setCustomValidity('');
  }
}
	</script>
</body>
</html>