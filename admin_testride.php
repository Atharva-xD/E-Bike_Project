<?php
$conn = new mysqli('localhost', 'root', '', 'ev');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
}
$id = $_GET['id'];

$query_test_ride = "SELECT * FROM test_ride where id='$id'";

$data_test_ride = mysqli_query($conn, $query_test_ride);
$total_rows_test_ride = mysqli_num_rows($data_test_ride);
$result_test_ride = mysqli_fetch_assoc($data_test_ride);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Ride</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="test_ride.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-7  ml-auto">
                <h6>You've got to ride it to feel it!</h6>
                <div class="box my-3">
                    <img src="https://images.unsplash.com/photo-1620802051782-725fa33db067?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" class="img-fluid" alt="Bike">
                </div>
            </div>
            <div class="col-lg-4">
                <h6>Book a Test Ride</h6>
                <form id="form-booking-step-1" action="#" method="POST">
                    <div class="row">

                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" value="<?php echo $result_test_ride['FirstName'] ?>" class="form-control" id="floatingInput" placeholder="First Name" name="fname" required>
                                <label for="floatingInput">First Name*</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating">
                                <input type="text" value="<?php echo $result_test_ride['LastName'] ?>" class="form-control" id="floatingInput" placeholder="Last Name" name="lname" required>
                                <label for="floatingInput">Last Name*</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="tel" value="<?php echo $result_test_ride['Number1'] ?>" class="form-control" id="floatingInput" placeholder="Phone No." name="num" required>
                                <label for="phone floatingInput">Phone No*</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="email" value="<?php echo $result_test_ride['Email'] ?>" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                                <label for="floatingInput">Email address*</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <select class="form-select py-3 " aria-label="Default select example" name="model">
                                <option value="">Select Model
                                </option>
                                <option value="Bajaj_CHETAK" <?php
                                                                if ($result_test_ride['Model'] == "Bajaj_CHETAK") {
                                                                    echo "selected";
                                                                }
                                                                ?>>
                                    Bajaj_Chetak</option>
                                <option value="Ather_450X" <?php
                                                            if ($result_test_ride['Model'] == "Ather_450X") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    Ather_450X</option>

                                <option value="TVS_IQUBE" <?php
                                                            if ($result_test_ride['Model'] == "TVS_IQUBE") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    TVS_IQUBE</option>
                                <option value="Hero_Eddy" <?php
                                                            if ($result_test_ride['Model'] == "Hero_Eddy") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    Hero_Eddy</option>
                                <option value="TVS_IQUBE" <?php
                                                            if ($result_test_ride['Model'] == "Hero_Electric_Photon_LP") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    TVS_IQUBE</option>
                                <option value="Revolt_RV400" <?php
                                                                if ($result_test_ride['Model'] == "Revolt_RV400") {
                                                                    echo "selected";
                                                                }
                                                                ?>>
                                    Revolt_RV400</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select py-3" aria-label="Default select example" name="state">
                                <option value="">Select State
                                </option>
                                <option value="Maharashtra" <?php
                                                            if ($result_test_ride['State1'] == "Maharashtra") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    Maharashtra</option>
                                <option value="Gujrat" <?php
                                                        if ($result_test_ride['State1'] == "Gujrat") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Gujrat</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select py-3" aria-label="Default select example" name="city">
                                <option value="">Select City
                                </option>
                                <option value="Mumbai" <?php
                                                        if ($result_test_ride['City'] == "Mumbai") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Mumbai</option>
                                <option value="Pune" <?php
                                                        if ($result_test_ride['City'] == "Pune") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Pune</option>
                                <option value="Thane" <?php
                                                        if ($result_test_ride['City'] == "Thane") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Thane</option>
                                <option value="Nagpur" <?php
                                                        if ($result_test_ride['City'] == "Nagpur") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Nagpur</option>
                                <option value="Nashik" <?php
                                                        if ($result_test_ride['City'] == "Nashik") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Nashik</option>
                                <option value="Ahmedabad" <?php
                                                            if ($result_test_ride['City'] == "Ahmedabad") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    Ahmedabad</option>
                                <option value="Surat" <?php
                                                        if ($result_test_ride['City'] == "Surat") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Surat</option>
                                <option value="Vadodara" <?php
                                                            if ($result_test_ride['City'] == "Vadodara") {
                                                                echo "selected";
                                                            }
                                                            ?>>
                                    Vadodara</option>
                                <option value="Rajkot" <?php
                                                        if ($result_test_ride['City'] == "Rajkot") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Rajkot</option>
                                <option value="Gandhinagar" <?php
                                                        if ($result_test_ride['City'] == "Gandhinagar") {
                                                            echo "selected";
                                                        }
                                                        ?>>
                                    Gandhinagar</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="form-select py-3 " aria-label="Default select example" name="day">
                                <option value="">Select Day
                                </option>
                                <option value="10" <?php
                                                    if ($result_test_ride['Day1'] == "10") {
                                                        echo "selected";
                                                    }
                                                    ?>>


                                    In next 10 days</option>
                                <option value="20" <?php
                                                    if ($result_test_ride['Day1'] == "20") {
                                                        echo "selected";
                                                    }
                                                    ?>>
                                    In next 20 days</option>
                            </select>
                        </div>
                        <div class="col-12 text-center py-3">
                            <div class="d-grid gap-2">
                                <input type="submit" value="Update Details" name="update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['update'])) {
    $FirstName = $_POST['fname'];
    $LastName = $_POST['lname'];
    $Number = $_POST['num'];
    $Email = $_POST['email'];
    $Model = $_POST['model'];
    $State = $_POST['state'];
    $City = $_POST['city'];
    $Day = $_POST['day'];


    $query_update = "UPDATE test_ride set FirstName='$FirstName', LastName='$LastName', Number1='$Number', Email='$Email',Model='$Model' ,State1='$State' ,City='$City' ,Day1='$Day' where id='$id'";
    $data_update = mysqli_query($conn, $query_update);

    if ($data_update) {
        echo "<script>alert('Successfully Updated')</script>";
?>
        <meta http-equiv="refresh" content="0; url=http://localhost/Ebikesproject/admin.php#" />
<?php
    } else {
        echo "Failed";
    }
}

?>