<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

// if(isset)

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="book_now.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
</head>

<body>
    <?php
    echo '<header>
    <div class="container">
        <nav class=" navbar navbar-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="landing.php">ELECTRIFY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="book_now.php">BOOK NOW</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Product Page/index.HTML" target="_blank">ALL PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Test_ride.html" target="_blank">TEST RIDE</a>
                        </li>';
    if ($loggedin) {
        echo '<li class="nav-item">
                                <a class="nav-link" href="logout.php">Log Out</a>
                                </li>';
    }
    echo '</ul>
                </div>
            </div>
        </nav>
    </div>
    </header>';
    ?>
    <div class="my-4 ">
        <div class="container">
            <h6>You will recieve a response in 24 hrs after Booking.</h6>
        </div>
    </div>
    <div class="container" id="hanging-icons">
        <h2 class="pb-2 border-bottom">How does booking work</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                </div>
                <div>
                    <h3 class="fs-2"><a href="testing.html" target="_blank">Log In</a></h3>
                    <p>Enter your personal details like Name, Phone No., Email and Address to log in.</p>
                    <?php if (!$loggedin) {
                        echo '<a href="login.php" class="btn btn-dark">
                        Login Now
                    </a>';
                    } ?>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                </div>
                <div>
                    <h3 class="fs-2">Select Bike</h3>
                    <p>Select the bike you want to ride in the color of your choice. Once done, enter your
                        location to select a dealership near you.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-bg-light d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                </div>
                <div>
                    <h3 class="fs-2">Add Payment Info</h3>
                    <p>Choose the payment method of your choice. Enter the required information to complete the
                        payment.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-4 pb-2">
        <?php
        if (!$loggedin) {
        ?><h4>You have not logged in yet! Please Log in !</h4> <?php
                                                            }
                                                            if ($loggedin) {
                                                                ?><h4>You have Logged in <?php echo $_SESSION['username'] ?>! Please select your Favourite Bike Below: </h4> <?php
                                                                                                                                                                            }
                                                                                                                                                                                ?>

    </div>
    <div class="container">
        <form id="form-booking-step-1" action="razorpay/pay.php" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="step-title">Step 2: Select Vehicle</h3>
                    <script>
                        var colorUrlMap = {
                            "Bajaj_CHETAK": "images/Bajaj-Chetak.jpg",
                            "Ather_450X": "images/Ather1.jpg",
                            "TVS_IQUBE": "images/TVS-IQUBE.png",
                            "Hero_Eddy": "images/Hero_Eddy.png",
                            "Hero_Electric_Photon_LP": "images/Hero_Electric_Photon_LP.png",
                            "Revolt_RV400": "images/Revolt_RV400.png"
                        };
                    </script>
                    <input class="form-control my-3 py-3" list="datalistOptions" id="exampleDataList" placeholder="Company" name="company" autocomplete="off">
                    <datalist id="datalistOptions">
                        <option value="Yamaha">
                        <option value="Ather">
                        <option value="TVS">
                        <option value="Hero">
                        <option value="Bajaj">
                        <option value="Revolt">
                    </datalist>
                    <!-- <select class="form-select py-3" aria-label="Default select example" name="company">
                        <option selected>Select Company</option>
                        <option value="Honda" >Honda</option>
                        <option value="Ather">Ather</option>
                        <option value="TVS">TVS</option>
                        <option value="Hero">Hero</option>
                        <option value="Bajaj">Bajaj</option>
                    </select> -->
                    <select class="form-select py-3" aria-label="Default select example" name="color">
                        <option selected>Select Color</option>
                        <option value="Red">Red</option>
                        <option value="Black">Black</option>
                        <option value="Yellow">Yellow</option>
                    </select>

                    <input class="form-control my-3 py-3" list="datalistOptions1" id="exampleDataList" placeholder="Model" onchange="document.getElementById('Bike_image').src = colorUrlMap[this.value];" name="model">
                    <datalist id="datalistOptions1">
                        <option value="Bajaj_CHETAK">
                        <option value="Ather_450X">
                        <option value="TVS_IQUBE">
                        <option value="Hero_Eddy">
                        <option value="Hero_Electric_Photon_LP">
                        <option value="Revolt_RV400">
                        
                        
                    </datalist>
                    <!-- <select class="form-select py-3" aria-label="Default select example" onchange="document.getElementById('Bike_image').src = colorUrlMap[this.value];" name="model">
                        <option selected>Select Model</option>
                        <option value="bajaj">Bajaj_Chetak</option>
                        <option value="ather">Ather2</option>
                        <option value="TVS_Iqube">TVS_Iqube</option>
                    </select> -->


                    <!-- <button type="button" class="btn btn-outline-dark mx-3">Proceed</button> -->
                </div>
                <div class="col-lg-7 text-center ml-auto">
                    <div class="box my-3">
                        <img src="https://images.unsplash.com/photo-1620802051782-725fa33db067?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=450&q=80" class="img-fluid" alt="Bike" id="Bike_image">
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-dark mx-3" type="submit" name="submit">
                <!-- <input type="submit" name="submit" value="Proceed to Pay"> -->
                Proceed to Pay
            </button>
        </form>
    </div>

    <footer class="py-5 my-5 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>About</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="landing.php#about" class="nav-link p-0 text-muted">About Us</a></li>
                        <li class="nav-item mb-2"><a href="Product page/index.HTML" class="nav-link p-0 text-muted">Products</a></li>
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
                    <li class="ms-3"><a class="link-light" href="https://twitter.com/i/flow/login"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg></a></li>
                    <li class="ms-3"><a class="link-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>