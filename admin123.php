<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <link rel="stylesheet" href="admin123.css">

</head>

<body>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'ev');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    }
    // else{
    //     echo "connection ok";
    // }

    $query_userinfo = "SELECT * FROM registration";
    $data_userinfo = mysqli_query($conn, $query_userinfo);
    $total_rows_userinfo = mysqli_num_rows($data_userinfo);

    $query_test_ride = "SELECT * FROM test_ride";
    $data_test_ride = mysqli_query($conn, $query_test_ride);
    $total_rows_test_ride = mysqli_num_rows($data_test_ride);

    $query_book_now = "SELECT * FROM book_now";
    $data_book_now = mysqli_query($conn, $query_book_now);
    $total_rows_book_now = mysqli_num_rows($data_book_now);
    ?>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="landing.php">Electrify</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Admin's Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#" onclick="Mytable1()">User Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="Mytable2()">Test Ride</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="Mytable3()">Book Now Payment</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <div class="container mt-3">
        <h3>You have Logged in as an Admin.Be careful while making any changes</h3>
    </div>
    <div class="container table1 mt-3" id="table1">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($total_rows_userinfo != 0) {

                    while ($result_userinfo = mysqli_fetch_assoc($data_userinfo)) {
                        echo "<tr>
                                    <td>" . $result_userinfo["Name"] . "</td>
                                    <td>" . $result_userinfo["Username"] . "</td>
                                    <td>" . $result_userinfo["Email"] . "</td>
                                    <td>" . $result_userinfo["Number1"] . "</td>

                                    <td><a href='admin_update.php?id=$result_userinfo[id]'>Update</a>
                                    <a href='admin_delete.php?id=$result_userinfo[id]' onclick = 'return checkdelete()'>Delete</a>
                                    </td>
                                </tr> ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container table2 mt-3" id="table2">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Model</th>
                    <th scope="col">State</th>
                    <th scope="col">City</th>
                    <th scope="col">Day</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($total_rows_test_ride != 0) {

                    while ($result_test_ride = mysqli_fetch_assoc($data_test_ride)) {
                        echo "<tr>
                                    <td>" . $result_test_ride["FirstName"] . "</td>
                                    <td>" . $result_test_ride["LastName"] . "</td>
                                    <td>" . $result_test_ride["Number1"] . "</td>
                                    <td>" . $result_test_ride["Email"] . "</td>
                                    <td>" . $result_test_ride["Model"] . "</td>
                                    <td>" . $result_test_ride["State1"] . "</td>
                                    <td>" . $result_test_ride["City"] . "</td>
                                    <td>" . $result_test_ride["Day1"] . "</td>
                                    <td><a href='admin_testride.php?id=$result_test_ride[id]'>Update</a>
                                    <a href='admin_delete_testride.php?id=$result_test_ride[id]' onclick = 'return checkdelete()'>Delete</a>
                                    </td>
                                </tr> ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>


    <div class="container table3 mt-3" id="table3" style="display:none;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">order_id</th>
                    <th scope="col">razorpay_payment_id</th>
                    <th scope="col">Company</th>
                    <th scope="col">Color</th>
                    <th scope="col">Model</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($total_rows_book_now != 0) {

                    while ($result_book_now = mysqli_fetch_assoc($data_book_now)) {
                        echo "<tr>
                                    <td>" . $result_book_now["Name1"] . "</td>
                                    <td>" . $result_book_now["Number1"] . "</td>
                                    <td>" . $result_book_now["order_id"] . "</td>
                                    <td>" . $result_book_now["razorpay_payment_id"] . "</td>
                                    <td>" . $result_book_now["Company"] . "</td>
                                    <td>" . $result_book_now["Color"] . "</td>
                                    <td>" . $result_book_now["Model"] . "</td>

                                </tr> ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    </div>
    <script>
        var a = document.getElementById("table1");
        var b = document.getElementById("table2");
        var c = document.getElementById("table3");

        function Mytable1() {
            if (a.style.display == 'none') {
                a.style.display = 'block';
                b.style.display = 'none';
                c.style.display = 'none';
            } else {
                a.style.display = 'none';
            }
            // a.style.display = "block";
            // b.style.display = "none";
        }

        function Mytable2() {
            if (b.style.display == 'none') {
                b.style.display = 'block';
                a.style.display = 'none';
                c.style.display = 'none';
            } else {
                b.style.display = 'none';
            }

        }

        function Mytable3() {
            if (c.style.display == 'none') {
                c.style.display = 'block';
                b.style.display = 'none';
                a.style.display = 'none';
            } else {
                c.style.display = 'none';
            }

        }

        function checkdelete() {
            return confirm("Are you sure you want to delete this?")
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>