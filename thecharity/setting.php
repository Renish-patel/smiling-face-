<?php
include('session.php');
$_SESSION['pageStore'] = "indexl.php";

if(!isset($_SESSION['login_id'])){
header("location: login.php"); // Redirecting To login
}
echo '<div style="font-size: 35px;">
<strong>Setting</strong>
<br>'
. $session_fullName
. '<br>
<a href="index1.php">Profile</a>
<a href="logout.php">Logout</a>
</div>';
?>