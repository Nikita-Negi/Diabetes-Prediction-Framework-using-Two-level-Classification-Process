<html>
    <head>
        <title>Diabetex</title>
    </head>
   <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: doctorlogin.php"); // redirects if user is not logged in
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
        <h2 class="welcome-txt2">Hello Admin!</h2> <!--Display's user name-->
        <h1 class="welcome-txt">___________________Welcome to Diabetex Diabetes Prediction Portal (Admin Section)___________________</h1>
        <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
        <div style="padding-left:690px">
          <a href="logout.php" class="info-txt">Click here to go logout</a><br/><br/>
        </div>
        <div class="info-txt" style="padding-left:60px">          
          <p>Select one of the options below to use the features provided by Diabetex.</p>
        </div>
        <div class="red-bg to-txt" style="padding-left:350px">          
          <br><a href="viewdb.php" style="color:#fecc00"> View PIMA Database </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="adddoc.php" style="color:#fecc00"> Add & View Doctors </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="viewfb.php" style="color: #fecc00"> View Patient Feedback </a><br><br> 
        </div>
          <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>   
          
    </body>
</html>  
