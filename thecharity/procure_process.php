<?php
$item_name=$_POST['item'];
$types=$_POST['type'];
$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];

$servername = "localhost";
$username = 'root';
$password = '';
$dbname = "login";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
$sql = "select * from entry where item='$item_name' ";
$result =$conn->query($sql);


$sql = "INSERT INTO item(donate,types,username,email,contect)
VALUES ('$item_name','$types','$name','$email','$contact')";
$subject = "Registration Conformation";
$message = "Hello  '$name' you are sucessfully registred for event '$item_name' Best wishes from Sportpro Team";



if ($conn->query($sql) === TRUE) {
	
 //$message = "Event Added Successfully";
 // echo "<script type='text/javascript'>alert('$message');</script>";
  //header('Location: Add Events.html'); 

echo '<script type="text/javascript">'; 
echo 'alert("Registered Sucessfully!!!!!!!!!!");'; 
echo 'window.location.href = "index1.php";';
echo '</script>';  
}


 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




echo '<script type="text/javascript">'; 
echo 'alert("Already Registered!!!!!!!!!!");'; 
echo 'window.location.href = "item.php";';
echo '</script>';  

$conn->close();
?>