<?php
require __DIR__ . '../../vendor/autoload.php';
require('config.php');

use Twilio\Rest\Client;


$account_sid = 'ACbf05f9acdaf73a02ba29b4d8ce454580';
$auth_token = '0baa78bb057a3162251257fc5ce36714';
// // In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"];

// // A Twilio number you own with SMS capabilities
$twilio_number = "+14632383937";



session_start();

$conn = new mysqli('localhost', 'root', '', 'ev');



require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $company = $_SESSION['company'];
    $color = $_SESSION['color'];
    $model = $_SESSION['model'];
    $name = $_SESSION['name'];
    $number = $_SESSION['number'];

    $stmt = $conn->prepare("insert into book_now(Name1, Number1, order_id, razorpay_payment_id,Company, Color, Model) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $number, $razorpay_order_id, $razorpay_payment_id, $company, $color, $model);
    $execval = $stmt->execute();

    // $query = "INSERT INTO `book_now` (`Number1`, `order_id`, `razorpay_payment_id`, `Status`, `Company`, `Color`, `Model`) VALUES ($number, $razorpay_order_id, $razorpay_payment_id,'Success', $company, $color, $model);";
    // //VALUES($name, $number, $razorpay_order_id, $razorpay_payment_id,'Success', $company, $color, $model)
    // if(mysqli_query($conn,$query)){
    //     echo 'Your Payment was Succesful';
    // }
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        '+91' . $number . '',
        array(
            'from' => $twilio_number,
            'body' => 'You have succesfully Booked ' . $model . '.You will Recieve Respons in next 24 Houres.Keep the following payment id for future reference.Payment Id = ' . $razorpay_payment_id . ''
        )
    );
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Succesful!</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <style type="text/css">
            body {
                background: #f2f2f2;
            }

            .payment {
                border: 1px solid #f2f2f2;
                height: 280px;
                border-radius: 20px;
                background: #fff;
            }

            .payment_header {
                background: linear-gradient(to right, #ff002f, #000c14);
                padding: 20px;
                border-radius: 20px 20px 0px 0px;

            }

            .check {
                margin: 0px auto;
                width: 50px;
                height: 50px;
                border-radius: 100%;
                background: #fff;
                text-align: center;
            }

            .check i {
                vertical-align: middle;
                line-height: 50px;
                font-size: 30px;
            }

            .content {
                text-align: center;
            }

            .content h1 {
                font-size: 25px;
                padding-top: 25px;
            }

            .content a {
                width: 200px;
                height: 35px;
                color: #fff;
                border-radius: 30px;
                padding: 5px 10px;
                background: linear-gradient(to right, #ff002f, #000c14);
                transition: all ease-in-out 0.3s;
            }

            .content a:hover {
                text-decoration: none;
                background: #000;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="payment">
                        <div class="payment_header">
                            <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </div>
                        <div class="content">
                            <h1>Payment Success !</h1>
                            <p> Thank You <?php echo $name?>.You have succesfully Booked <?php echo $model ?>.You will recieve next response in next 24 Hours.Keep following Payment id for future Refrence. Payment ID : <?php echo $razorpay_payment_id?></p>
                            <a href="../landing.php">Go to Main Page</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    echo 'Your Payment Failed';
}


?>