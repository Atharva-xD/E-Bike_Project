<?php
	$FName = $_POST['fname'];
	$LName = $_POST['lname'];
	$Number = $_POST['num'];
	$Email = $_POST['email'];
	$Model = $_POST['model'];
	$State = $_POST['state'];
	$City = $_POST['city'];
	$Day = $_POST['day'];

	$conn = new mysqli('localhost','root','','ev');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 

	$stmt = $conn->prepare("insert into test_ride(FirstName, LastName, Number1, Email, Model, State1, City, Day1) values(?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssisssss", $FName, $LName, $Number, $Email, $Model, $State, $City, $Day);
	$execval = $stmt->execute();
	if($execval){
		$stmt->close();
	    $conn->close();
		?>
		<script>alert("You Have succesfuly applied for test ride.You will get response in next 24 Hours")</script>
	    <?php
		header("location: landing.php");
	}

?>