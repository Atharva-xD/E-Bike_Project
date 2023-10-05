<?php
	$Name = $_POST['fname'];
	$Username = $_POST['uname'];
	$Email = $_POST['email'];
	$Number = $_POST['num'];
	$Password = $_POST['pwd'];

	$conn = new mysqli('localhost','root','','ev');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 

	else {
		$stmt = $conn->prepare("insert into registration(Name, Username, Email, Number1, Password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $Name, $Username, $Email, $Number, $Password);
		$execval = $stmt->execute();
		header("Location:landing.php");
		$stmt->close();
		$conn->close();
	}
?>