<?php
$conn = new mysqli('localhost', 'root', '', 'ev');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed : " . $conn->connect_error);
}
$id = $_GET['id'];

$query = "DELETE FROM registration where id='$id'";
$data = mysqli_query($conn,$query);

if($data){
    echo "<script>alert('Successfully Deleted')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/Ebikesproject/admin.php#"/>
    <?php
}
else{
    echo "Failed";
}
?>