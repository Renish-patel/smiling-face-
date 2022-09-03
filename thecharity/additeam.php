<?php
$item_name=$_POST['item_name'];
	$types=$_POST['type12'];
	$description=$_POST['description'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$time=$_POST['time'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];


$servername = "localhost";
$username = 'root';
$password = '';
$dbname = "login";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $sql = "INSERT INTO `donate`(`itemname`, `types`,`description`,`starttime`,`endtime`,`time`,`address`,`pincode`) VALUES ('$item_name','$types','$description','$start_date','$end_date','$time','$address','$pincode')";



if ($conn->query($sql) === TRUE) {	
 //$message = "Event Added Successfully";
 // echo "<script type='text/javascript'>alert('$message');</script>";
  //header('Location: Add Events.html'); 

echo '<script type="text/javascript">'; 
echo 'alert("Donate Iteam Sucessfully");'; 
echo 'window.location.href = "index1.php";';
echo '</script>';  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

