<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once "database.php";


if (!isset($_SESSION["user"])) {
   header("Location: login.php");

}

$new1 = $_SESSION["user"]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">

</head>
<body>
  

<style>




    body{

        padding: 50px 0px 0px  50px;
background: aliceblue;
text-align: center;

    }

   
    #btn{


        background-color:white;
        border-color: white;
        border-radius: 3px;
        padding: 5px;
        color: black;
        text-decoration: none;
        }
    
  
   
  .containerh h1{
position: relative;


   top: -10px;
  }


  .form-layout{

width: 50%;
border: 3px solid rgb(29, 33, 29);
    border-radius: 20px;
   
    box-shadow: black 0px 9px 31px 0px;


  }

    
</style>


<br>
<br>
<br><br><br>
<div class="container bg-white shadow-md p-3 form-layout">


<div class="group">
        <h1>Welcome, <?php echo $new1;?></h1>
        </div>
<hr>
<h4>On the dasboard you can perform <br>
    the following actions:</h4>
<p>
    Here, you can track your orders, <br>
    Check out our latest products <br>
  

</p>
<br>




</div>
<br>


</div>
<br>
<div class="container bg-white shadow-md p-5 form-layout">
    <h4>Manage your account</h4>
    
    <hr>
<a href="index.php" id="btn">Profile Management </a>
<br>
<br>



<a href="logout.php" id="btn">Log out</a>




    </div>
<br>







 
</body>
</html>