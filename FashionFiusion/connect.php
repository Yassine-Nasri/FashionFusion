<?php
$firstName = $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$address = $_REQUEST['address'];
$password = $_REQUEST['password'];

$conn = new mysqli('localhost','root','','projet');

if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($address) && !empty($password))
		{	
			$sql="INSERT INTO user (firstName,lastName,email,phone,address,password) VALUES ('$firstName','$lastName','$email','$phone','$address','$password')";
			$result=mysqli_query($con, $sql);
			move_uploaded_file($temp_name1,"admin/user/$enreg");
			   if($result){
				   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
			   }
			   else{
				   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
			   }
		}else{
			$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
		}

/*if ($conn->connect_error) {
die ('connection failed'. $conn->connect_error);
} else {
$stm = $conn->prepare('insert into registration(firstName,lastName,email,phone,address,password)
 values(?, ?, ?, ?, ?, ?)');*/

$stm->bind_param('sssiss', $firstName, $lastName,$email,$phone,$address,$password);
$stm->execute();
echo"Registration Successfully";
$stmt->close();
$conn->close();
?>