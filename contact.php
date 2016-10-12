
<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> BOOK MOVIE </title>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery 1.11.1 (Compatible with countdown timer - DO NOT change order of scripts) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="style_sheet.css">
   <link rel="icon" type="image/jpg" sizes="16x16" href="images/logo.jpg">


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">BOOK MOVIE</a>
    </div>
       <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
       <?php
       if(!isset($_SESSION['id']))
       { 
       echo '<li><a href="home.php">Movies</a></li>
      <li><a href="signup.php">Sign Up</a></li>
      <li><a href="login.php">Login</a></li> 
      <li class="active"><a href="contact.php">ContactUs</a></li>';

      }
      else {
              echo '<li> <a href="recom.php">Recommended</a></li>';
        echo '<li class="active"><a href="home.php">Movies</a></li>';
        echo '<li><a href="bookhis.php">BookingHistory</a></li>';
      echo '<li><a href="logout.php">LogOut</a></li>'; 
     echo '<li><a href="contact.php">ContactUs</a></li>';

       } 
      ?>
    </ul>
  </div>
</nav>
 </div>  

 <br>
 <br>
 <br>
 <br>

  <b><p class="about" align="center"> ContactUs</p></b>
  
  <br>
  <br>

  <div class="col-md-3"> </div>
  <div class="col-md-6"> 
  <form class="form-group" action="contact.php" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
      <label >Name :</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label >Email :</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label >What do you want to say us? :</label>
      <textarea rows="10" class="form-control" name="msg"></textarea>
    </div>
    <button class="btn-primary " type="submit" name="submit">Submit</button> 
    </form>
    </div>
<div class="col-md-3"> </div>

<?php

$host="localhost";
$username="root"; 
$password=""; 
$db_name="BookMovie"; 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


if(isset($_POST['submit'])){ 
$name=$_POST['name']; 
$email=$_POST['email'];
$msg = $_POST['msg'];
if($name!='' && $email!='' && $msg!=''){ 

mysql_query("INSERT INTO query(Name , Email ,Message) VALUES ('$name' ,'$email','$msg') ") or die(mysql_error());

}
}
?>




  


 
    </body>

</html>