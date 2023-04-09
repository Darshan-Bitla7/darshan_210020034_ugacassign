<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
            header("location: login.php");
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
    <link rel="stylesheet" href="login.css">
</head>

<body class="text-center">


    <!-- <div class="container my-4"> -->
    <!-- <h1 class="text-center">Signup to our website</h1> -->
    <!-- <form action="/forum/signup.php" method="post"> -->
    <!-- <div class="form-group"> -->
    <!-- <label for="username">Username</label> -->
    <!-- <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"> -->

    <!-- </div> -->
    <!-- <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div> -->
    <!-- <div class="form-group"> -->
    <!-- <label for="cpassword">Confirm Password</label> -->
    <!-- <input type="password" class="form-control" id="cpassword" name="cpassword"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div> -->

    <!-- <button type="submit" class="btn btn-primary">SignUp</button>
    <small>Already have an account? <a href="/forum/login.php">Login</a></small>
    </form>
    </div> -->

    <main class="form-signin w-100 m-auto">
        <!-- <?php require 'partials/_header.php' ?> -->
        <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
        <form action="/forum/signup.php" method="post">
            <img class="mb-4" src="images/turbopack-icon.svg" alt="" height="100" />
            <h1 class="h2 mb-3 fw-normal">Register Yourself</h1>
            <div class="form-floating">
                <input style="padding: 20px 10px;" type="text" placeholder="Name" class="form-control" id="name"
                    name="name" aria-describedby="emailHelp">
                <div class="form-floating">
                    <input style="padding: 20px 10px;margin-top:10px" type="text" placeholder="Username"
                        class="form-control" id="username" name="username" aria-describedby="emailHelp">
                </div>
                <div class="form-floating">
                    <input style="padding: 20px 10px; margin-top:10px;" type="password" class="form-control"
                        placeholder="Password" id="password" name="password">
                </div>
                <div class="form-floating">
                    <input style="padding: 20px 10px; margin-top:10px; margin-bottom: -6px;" type="password"
                        class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword">
                    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                </div>
                <button style="margin-top:5px;" class="w-50 btn btn-lg btn-primary" type="submit">
                    Sign Up
                </button>
                <br>
                <small>Already have an account? <a href="/forum/login.php">Login</a></small>
                <hr>
                <p class="mt-5 mb-3 text-body-secondary">&copy; 2023</p>
                <small class="text-muted">By continuing, you are setting up a SaidIt account and agree to our</small><a
                    href="" style="font-size:13px;"> User
                    Agreement</a> <small class="text-muted">and</small> <a href="" style="font-size:13px;">Privacy
                    Policy</a>
        </form>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>