<?php
$conn = new mysqli('localhost', 'root', '', 'ev');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed : " . $conn->connect_error);
}
$Bike_name = $_GET['name'];

$query_bikeinfo = "SELECT * FROM bike_details where Model='$Bike_name'";

$data_bikeinfo = mysqli_query($conn, $query_bikeinfo);
$total_rows_bikeinfo = mysqli_num_rows($data_bikeinfo);
$result_bikeinfo = mysqli_fetch_assoc($data_bikeinfo);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bike Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="moredetails.css">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="landing.php">ELECTRIFY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Product Page/index.HTML">All Products</a>
            </li>

          </ul>
          <!-- <span class="navbar-text">
                  <a href="../compare.html" target="_blank">Compare</a>
               </span> -->
        </div>
      </div>
    </nav>
  </header>
  <div class="container">
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">

            <div class="preview-pic tab-content">
              <div class="tab-pane active" id="pic-1"><img src="<?php echo $result_bikeinfo['Image']?>" /></div>

            </div>

          </div>
          <div class="details col-md-6">
            <h3 class="product-title"><?php echo $result_bikeinfo['Model']?></h3>
            <div class="rating">
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
              </div>
              <span class="review-no">0 reviews</span>
            </div>
            <p class="product-description"><?php echo $result_bikeinfo['Description']?></p>
            <h4 class="price">current price: <span>₹<?php echo $result_bikeinfo['Price']?></span></h4>
            <p class="vote"><strong>100%</strong> Customers liked this Bike! <strong>(0 votes)</strong></p>
            <div class="action">
              <button class="add-to-cart btn btn-default" type="button"><a class="text-reset text-decoration-none" href="book_now.php">Book Now</a></button>
              <button class="add-to-cart btn btn-default" type="button"><a class="text-reset text-decoration-none" href="Test_ride.html">Test Ride</a></button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="Heading_bike container pb-3 pt-5">
    <h3><?php echo $result_bikeinfo['Model']?> Key Specification :</h3>
  </div>

  <div class="container ">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Riding Range</th>
          <td>1<?php echo $result_bikeinfo['Riding_Range']?></td>

        </tr>
        <tr>
          <th scope="row">Top Speed</th>
          <td><?php echo $result_bikeinfo['Top_Speed']?></td>

        </tr>
        <tr>
          <th scope="row">Weight</th>
          <td><?php echo $result_bikeinfo['Weight']?></td>

        </tr>
        <tr>
          <th scope="row">Battery Charging Time</th>
          <td><?php echo $result_bikeinfo['Battery_Charging_Time']?></td>

        </tr>
        <tr>
          <th scope="row">Rated Power</th>
          <td><?php echo $result_bikeinfo['Rated_Power']?></td>

        </tr>
        <tr>
          <th scope="row">Seat Height</th>
          <td><?php echo $result_bikeinfo['Seat_Height']?></td>

        </tr>
      </tbody>
    </table>
  </div>
  <footer class="py-5 my-5 mb-0">
    <div class="container">
      <div class="row">
        <div class="col-6 col-md-2 mb-3">
          <h5>About</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="landing.php#about" class="nav-link p-0 text-muted">About Us</a></li>
            <li class="nav-item mb-2"><a href="Product Page/index.HTML" class="nav-link p-0 text-muted">Products</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Purchase</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="book_now.php" class="nav-link p-0 text-muted">Book a Product</a></li>
            <li class="nav-item mb-2"><a href="Test_ride.html" class="nav-link p-0 text-muted">Test Ride</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>Interact</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="landing.php#contactus" class="nav-link p-0 text-muted">Contact Us</a></li>
        </div>
        <div class="col-md-5 offset-md-1 mb-3">
          <form>
            <h5>Subscribe to our newsletter</h5>
            <p>Monthly digest of what's new and exciting from us.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>© 2022 ELECTRIFY, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-light" href="https://twitter.com/i/flow/login"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter"
                viewBox="0 0 16 16">
                <path
                  d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
              </svg></a></li>
          <li class="ms-3"><a class="link-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path
                  d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
              </svg></a></li>
          <li class="ms-3"><a class="link-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path
                  d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
              </svg></a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</body>

</html>