<?php
$conn = new mysqli('localhost', 'root', '', 'ev');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed : " . $conn->connect_error);
}
$id = $_GET['id'];

$query_userinfo = "SELECT * FROM registration where id='$id'";

$data_userinfo = mysqli_query($conn, $query_userinfo);
$total_rows_userinfo = mysqli_num_rows($data_userinfo);
$result_userinfo = mysqli_fetch_assoc($data_userinfo);




?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="registrationstyles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <title>Update User Form</title>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      separateDialCode: true
    });
  </script>

</head>

<body>
  <div class="container">
    <div class="title">Update User Form</div>
    <div class="content">
      <form action="" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" value="<?php echo $result_userinfo['Name'] ?>" placeholder="Enter your name" name="fname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" value="<?php echo $result_userinfo['Username'] ?>" placeholder="Enter your username" name="uname" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" value="<?php echo $result_userinfo['Email'] ?>" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" value="<?php echo $result_userinfo['Number1'] ?>" placeholder="Phone number *" name="num" id="phone" required autofocus>
          </div>
        </div>
        <!-- <div class="gender-details">
          <input type="radio" name="gender" value="y" id="dot-2">
          <input type="radio" name="gender" value="n" id="dot-3">
          <input type="radio" name="gender" value="l" id="dot-1">
          <span class="gender-title">Want to take Premium Membership</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">YES</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">No</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Remind me later</span>
            </label>
          </div>
        </div> -->
        <div class="btn btn-success">
          <input type="submit" value="Update Details" name="update">
        </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>

<?php
  if(isset($_POST['update'])) {
    $Name = $_POST['fname'];
    $Username = $_POST['uname'];
    $Email = $_POST['email'];
    $Number = $_POST['num'];

    $query_update = "UPDATE registration set Name='$Name', Username='$Username', Email='$Email',Number1='$Number' WHERE id='$id'";
    $data_update = mysqli_query($conn, $query_update);

    if($data_update){
      echo "<script>alert('Successfully Updated')</script>";
      ?>
      <meta http-equiv="refresh" content="0; url=http://localhost/Ebikesproject/admin.php#"/>
      <?php
    }
    else
    {
      echo "Failed";
    }
  }

?>