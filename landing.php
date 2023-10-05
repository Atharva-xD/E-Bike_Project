<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin = true;
}
else{
    $loggedin = false;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ELECTRIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="landing.css">
</head>

<body>
    <?php
    echo '<header>
        <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="landing.php">ELECTRIFY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#popbrands">Popular Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Product Page/index.HTML" target="_blank">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactus">Contact Us</a>
                        </li>';
                        if(!$loggedin){ 
                        echo '<li class="nav-item">
                            <a class="nav-link" href="login.php">Log In</a>
                        </li>';
                        }
                        if($loggedin){ 
                        echo '<li class="nav-item">
                            <a class="nav-link" href="logout.php">Log Out</a>
                            </li>';
                            }
                    echo '</ul>
                    <form class="d-flex" role="search">
                        <a href="book_now.php" target="_blank"><button class="btn btn-danger" type="button">Book Now</button></a>
                    </form>
                </div>
            </div>
        </nav>
    </header>'
    ?>
    <div class="banner_image">
        <div class="banner_content">
            <br>
            <?php
            if($loggedin){
                ?><h1>Welcome <?php echo $_SESSION['username']?>!</h1> <?php
            }
            ?>
            <h1>Make the smart move, <br> <span>Book Your E-bike just for Rs 999/-<span></h1>
            <p>Most trusted e-commerce website for Electric bikes</p>
        </div>
    </div>
    <div class="popbrands my-5" id="popbrands">
        <h1 class="title text-center">Popular Brands</h1>
        <div class="popbrands_wrapper mx-5">
            <div class="popbrands-1 team my-3 ">
                <div class="popbrands_members"><a href="https://www.tvsmotor.com/iqube" target="_blank"><img src="images/tvs.png" alt="service_image"></a></div>
                <div class="popbrands_members"><a href="Product Page/index.HTML" target="_blank"><img src="images/yamaha.png" alt="service_image"></a></div>
                <div class="popbrands_members "><a href="https://heroelectric.in/" target="_blank"><img src="images/Hero.png" alt="service_image"></a></div>
            </div>
            <div class="popbrands-2 team">
                <div class="popbrands_members"><a href="https://www.chetak.com/" target="_blank"><img src="images/bajaj.png" alt="service_image"></a></div>
                <div class="popbrands_members"><a href="https://atherenergy.com/" target="_blank"><img src="images/ather.png" alt="service_image"></a></div>
                <div class="popbrands_members"><a href="https://www.revoltmotors.com/" target="_blank"><img src="images/revolt.png" alt="service_image"></a></div>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="about my-5" id="about">
            <h1 class="title">About Us</h1>
            <p>We are Electrify,We are a team of innovators, designers, bikers, nature - lovers and the odd
                'tree-hugger'. With an R&D facility situated at the hub of India's automobile industry - Mumbai - the crew
                is all set to bring back an electric revolution of style, comfort and quality to the Indian roads. Our
                vision is to become the best electric two-wheeler manufacturer in India with our expertise and
                innovative designs.

                The next step of the electric revolution is here and now! Come experience the revolutionary technology
                advancement we bring to the automobile industry.</p>
            <button type="button" class="btn btn-danger"> Learn More</button>
        </div>
    </div>
    <div class="contactus text-center my-5" id="contactus">
        <h1 class="title">contact us</h1>
        <form action="https://formspree.io/f/mpznoaar" method="POST">
        <div class="form_wrapper">
            <div class="form_input">
                <input type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="form_input">
                <input type="text" placeholder="Subject" name="subject" autocomplete="off">
            </div>
            <div class="form_input">
                <textarea placeholder="Message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-danger"> Submit</button>
        </div>
        </form>
    </div>
    <footer class="py-5 my-5 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>About</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#about" class="nav-link p-0 text-muted">About Us</a></li>
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
                        <li class="nav-item mb-2"><a href="#contactus" class="nav-link p-0 text-muted">Contact Us</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>