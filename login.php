<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div class="contain">


    <?php 
    
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_POST["login"])){



    $email = $_POST["email"];

	$password = $_POST["pass"];

    require_once "database.php";

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($user){


   

       
        if(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user["first_name"];
            
            header("Location: index.php");
            die();

        }else{
            echo "<div class='alert alert-danger'>Password does not match</div>";

        }



    }else{

        echo "<div class='alert alert-danger'>Email does not exist in data base</div>";
    }

}

    
    
    ?>

        <form action="login.php" method="post">

        <div class="group">
            <input type="email" placeholder="Enter the email:" name="email" class="inputbox">
        </div>
<br><br>
        <div class="group">
            <input type="password" placeholder="Password:" name="pass" class="inputbox">
        </div>

        <br><br>
        <div class="btn btn-primary navbar-btn text-white w-100 p-2">
<input type="submit" class="btn btn-primary" value="Login" name="login">
</div>


</form>

    </div>
    
</body>
</html>