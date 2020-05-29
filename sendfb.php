<html>
    <head>
        <title>Diabetex</title>
    </head>
   <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: patient.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
    <body>
      <style>
          .welcome-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 32px;
            text-align: center;
          }
          .welcome-txt2
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 24px;
            text-align: center;
          }
          .info-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 18px;
          }
          .to-txt
          {
            color:#fecc00;
            font-family: Britannic Bold;
            font-size: 20px;
          }
          .creator-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 12px;
            text-align: center;
          }
          .diabetex-logo
          {
            display: block;
            margin-left: auto;
            margin-right: auto; 
            width: 1500px;  
          }
          .form-setting
          {
            display: block;
            margin-left: auto;
            margin-right: auto; 
          }
          .yellow-bg
          {
            background-color: #fecc00;
            border-style: solid;
            border-color: #a5302e;
            border-width: 5px;
            
          }
          .red-bg
          {
            background-color: #a5302e;
          }
      </style>
      <div class="yellow-bg">
        <h2 class="welcome-txt2">Hello <?php Print "$user"?>!</h2> <!--Display's user name-->
        <h1 class="welcome-txt">________________________________________Send Feedback________________________________________</h1>
        <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
        <div style="padding-left:670px">
          <a href="logout.php" class="info-txt" style="padding-left:20px">Click here to go logout</a><br/><br>
          <a href="home.php" class="info-txt">Click here to go to homepage</a><br/><br/><br/>
        </div>
        
        <div class="red-bg to-txt" style="padding-left:210px">          
          <br><a href="http://127.0.0.1:5000/" style="color:#fecc00"> Check Diabetes Status </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="viewdoc.php" style="color:#fecc00"> View Doctor Details </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="tobe.php" style="color:#fecc00"> Send Feedback </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="about.php" style="color: #fecc00"> About Diabetes and Diabetex </a><br><br> 
        </div>

        <div class="red-bg to-txt" style="padding-left:200px">
                <p style="color:#a5302e">------------------------------------------</p> 
                <p style="margin-right:160px">Here, you can send your feedbacks about the application or your personal diagnosis/treatment concerns to the administrator of Diabetex. These inputs are anonymous and add great value to the system, but if you wish, you can add your contact details in case you need the experts to contact you regarding your case. We encourage you to voice your opinions and problems here without any inhibitions.</p><br><br>
                  <form action="sendfb.php" method="POST" style="padding-left:130px">
                     Select Today's Date: <input type="date" name="dtfb" required="required" autocomplete="off"/> <br/><br>
                     Enter Feedback : &emsp;&nbsp;<textarea name="fb" cols="100" rows="5" required="required" autocomplete="off" maxlength="500"></textarea><br/><br><br>
                     <div class="red-bg to-txt" style="padding-left:400px">            
                        <input style=" text-align:center padding-left:200px" type="submit" value="Send Feedback"/><br><br>
                     </div><br>        
                  </form>           
        </div>

          <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>   
          
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $feedback = ($_POST['fb']);
  $date = ($_POST['dtfb']);
  $con=mysqli_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysqli_select_db($con,"diabetex") or die("Cannot connect to database"); //connect to database
    mysqli_query($con,"INSERT INTO feedback (feedback, fbdate) VALUES ('$feedback','$date')"); //inserts the value to table feedback
    Print '<script>alert("Feedback sent successfully!");</script>';//prompts the user
    Print '<script>window.location.assign("sendfb.php");</script>'; //redirects to sendfb.php
  
}
?>  
