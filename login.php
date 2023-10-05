<?php
$login = false;
$ShowError = false;
$admin = "admin";
$admin_pass = "root";

if(isset($_POST['submit']))
{   
    $conn = new mysqli('localhost','root','','ev');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } 
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    $username_search = "SELECT * FROM registration where Username='$username' AND Password='$password'";
    $result = mysqli_query($conn,$username_search);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: landing.php");
    }
    elseif($username == $admin && $password == $admin_pass){
        header("location: admin123.php");
    }
    else{
        ?>
        <script>alert("Invalid Credentials")</script>
        <?php
        $ShowError = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <div class="logo">
            <script src="https://cdn.lordicon.com/pzdvqjsp.js"></script>
            <a href="registration.html" target="_blank">
                <lord-icon src="https://cdn.lordicon.com/wuziebcn.json" trigger="hover"
                    colors="primary:#f00e0e,secondary:#fff" style="width:80px;height:80px;">
                </lord-icon>
            </a>
        </div>
        <div class="title">
            <h1><span>Ｗｅｌｃｏｍｅ Tｏ </span>Ｅｌｅｃｔｒｉｆｙ</h1>
        </div>
    </header>
    <form class="login-form" name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="flex-row">

            <label class="lf--label" for="username">
                <svg x="0px" y="0px" width="12px" height="13px">
                    <path fill="#B1B7C4"
                        d="M8.9,7.2C9,6.9,9,6.7,9,6.5v-4C9,1.1,7.9,0,6.5,0h-1C4.1,0,3,1.1,3,2.5v4c0,0.2,0,0.4,0.1,0.7 C1.3,7.8,0,9.5,0,11.5V13h12v-1.5C12,9.5,10.7,7.8,8.9,7.2z M4,2.5C4,1.7,4.7,1,5.5,1h1C7.3,1,8,1.7,8,2.5v4c0,0.2,0,0.4-0.1,0.6 l0.1,0L7.9,7.3C7.6,7.8,7.1,8.2,6.5,8.2h-1c-0.6,0-1.1-0.4-1.4-0.9L4.1,7.1l0.1,0C4,6.9,4,6.7,4,6.5V2.5z M11,12H1v-0.5 c0-1.6,1-2.9,2.4-3.4c0.5,0.7,1.2,1.1,2.1,1.1h1c0.8,0,1.6-0.4,2.1-1.1C10,8.5,11,9.9,11,11.5V12z" />
                </svg>
            </label>
            <input id="username" class='lf--input' placeholder='Username' type='text' name="uname" autocomplete="off">
        </div>
        <div class="flex-row">
            <label class="lf--label" for="password">
                <svg x="0px" y="0px" width="15px" height="5px">
                    <g>
                        <path fill="#B1B7C4"
                            d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z" />
                    </g>
                </svg>
            </label>
            <input id="password" class='lf--input' placeholder='Password' type='password' name="pwd">
        </div>
        <input class='lf--submit' type='submit' value='LOGIN' name='submit'>
    </form>
    <a class='lf--forgot' href='#' id="fp">Forgot password?</a>
    <a class='lf--create' href='registration.html' id="caa" target="_blank">Create an account</a>
    <a class='lf--create' id="ad" onclick="admin()" on target="_blank">Login as Admin</a>

    <script>
        var a = document.getElementById("fp");
        var b = document.getElementById("caa");
        var c = document.getElementById("ad");

        function admin(){
            a.style.display = 'none';
            b.style.display = 'none';
            c.style.display = 'none';
        }
    </script>
</body>

</html>