<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> BOOK MOVIE</title>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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
      <a class="navbar-brand" href="#">BookingHistory</a>
    </div>
        <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
        <?php 
        if(!isset($_SESSION['id'])){
      echo '<li class="active"><a href="home.php">Movies</a></li>';
      echo  '<li><a href="signup.php">Sign Up</a></li>';
      echo '<li><a href="login.php">Login</a></li>'; 
     echo '<li><a href="contact.php">ContactUs</a></li>';
   }
     else {
        echo '<li><a href="recom.php">Recommended</a></li>';
        echo '<li><a href="home.php">Movies</a></li>';
        echo '<li class="active"><a href="bookhis.php">BookingHistory</a></li>';
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

  <b><p class="about" align="center">Your Booking History</p></b>
  
  <div class="clear"> </div>
  <div id="BlogsBody">    
      <div class="clear"> </div>

  <script>
    var userid = <?php echo $_SESSION['id']; ?>;
      $(document).ready(function(){
        //$("#logout").hide();
        loadHis(userid);  
      });
  
      function trim(str){
          var str=str.replace(/^\s+|\s+$/,'');
          return str;
      }



        function fillHis(datas) {
            $("#BlogsBody").empty();
            var row='<div class="class="w3-container" align="center">';
            $.each(JSON.parse(datas), function(i, data) {

                var movieid = data.MovieId;
                var seats = data.Seat;
                var name=data.MovieName;


                       row=row + '<div class="w3-card-12" style="width:50%">'+
                      '<img  src="pic.jpg" alt="Card image cap" width="400px" height="400px ">'+
                        '<div class="w3-container w3-center">'+
                          '<h><b>'+name+'</b></h>'+
                          '<p>'+seats+'</p>'+
                        
                        
                      '</div>'+
                  '</div>'+
                  '<div class="clear"> </div></br>';
      
                
            });
            row=row+'</div>'

             


            $("#BlogsBody").append(row);
        };

      function loadHis(userid){
            $.ajax({
                  url : "loadhis.php",
                  type: "POST",
                  context: document.body,
                  data: {userid: userid},
                  success: function(data)
                  {   
                          fillHis(data);
              },

              });
      }


    </script>


 
    </body>

</html>