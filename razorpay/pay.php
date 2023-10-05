<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$conn = new mysqli('localhost', 'root', '', 'ev');
$username = $_SESSION['username'];
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed : " . $conn->connect_error);
}
$query_userinfo = "SELECT * FROM registration WHERE Username='$username'";

$data_userinfo = mysqli_query($conn, $query_userinfo);

$result_userinfo = mysqli_fetch_assoc($data_userinfo);

$company = $_POST['company'];
$color = $_POST['color'];
$model = $_POST['model'];

$_SESSION['company'] = $company;
$_SESSION['color'] = $color;
$_SESSION['model'] = $model;
$_SESSION['name'] = $result_userinfo['Name'];
$_SESSION['number'] = $result_userinfo['Number1'];



$orderData = [
  'receipt'         => 3456,
  'amount'          => 99900, // 2000 rupees in paise
  'currency'        => 'INR',
  'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
  $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
  $exchange = json_decode(file_get_contents($url), true);

  $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
  "key"               => $keyId,
  "amount"            => $amount,
  "name"              => "Electrify",
  "description"       => "Electric Bikes",
  "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
  "prefill"           => [
    "name"              => $result_userinfo['Name'],
    "email"             => $result_userinfo['Email'],
    "contact"           => $result_userinfo['Number1'],
  ],
  "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
  ],
  "theme"             => [
    "color"             => "#F37254"
  ],
  "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
  $data['display_currency']  = $displayCurrency;
  $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../registrationstyles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <title>Payment</title>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      separateDialCode: true
    });
  </script>


</head>

<body>
  <div class="container">
    <div class="title">Do you want to continue?</div>
    <div class="content">
      <form action="verify.php" method="post">
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>" data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>" data-prefill.name="<?php echo $data['prefill']['name'] ?>" data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
        </script>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text"  autocomplete="off" value="<?php echo $result_userinfo['Name']?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" value="<?php echo $result_userinfo['Email']?>" autocomplete="off" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" value="<?php echo $result_userinfo['Number1']?>" autocomplete="off" required>
          </div>
          <div class="input-box">
            <span class="details">Company</span>
            <input type="text" value="<?php echo $company?>" id="phone" autocomplete="off" required autofocus>

          </div>
          <div class="input-box">
            <span class="details">Model</span>
            <input  value="<?php echo $model?>" autocomplete="off" required>
          </div>
          <div class="input-box">
            <span class="details">Amount</span>
            <input value="₹999.00" autocomplete="off" required>
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Pay Now" class="razorpay-payment-button">
        </div>
      </form>
    </div>
  </div>
</body>

</html>