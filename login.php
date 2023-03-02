<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>WAVESTREAM </h2>
<h3>Log In</h3>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <h6 style="color:white;">Email:</h6>
        <div class="form-group">
            <input type="email" placeholder="Enter your Email" name="email" class="form-control">
        </div>
        <h7 style="color:white;">Password:</h7>
        <div class="form-group">
            <input type="password" placeholder="Enter Your Password" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary " style="background-color: green; margin-left: 120px;">
        </div>
      </form>
     <div><p style="color:white;">Don't have an Account?<a href="registration.php">Sign up</a></p></div>
    </div>
    <p8    style="
       position: fixed;
       bottom: 0;
       right: 0;
       margin: 10px"
    ><b><a href="#">Privacy | policy |Copyright©️ 2023</a></p8>
    
</body>
</html>