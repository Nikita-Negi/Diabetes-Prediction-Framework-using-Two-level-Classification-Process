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
        <h1 class="welcome-txt">_____________________________________Check Diabetes Status_____________________________________</h1>
        <div style="padding-left:660px">
          <a href="http://localhost/DPS/folder/logout.php" class="info-txt" style="padding-left:20px">Click here to go logout</a><br/><br>
          <a href="http://localhost/DPS/folder/home.php" class="info-txt">Click here to go to homepage</a><br/><br/><br/>
        </div>
        <div class="red-bg to-txt" style="padding-left:210px">          
          <br><a href="http://127.0.0.1:5000/" style="color:#fecc00"> Check Diabetes Status </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="http://localhost/DPS/folder/viewdoc.php" style="color:#fecc00"> View Doctor Details </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="http://localhost/DPS/folder/sendfb.php" style="color:#fecc00"> Send Feedback </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="http://localhost/DPS/folder/about.php" style="color: #fecc00"> About Diabetes and Diabetex </a><br><br> 
        </div>
        <div class="red-bg to-txt" style="padding-left:560px">
              <form name="passdata" action="." method="POST">
                <p style="color:#a5302e">------------------------------------------</p>
                 Patient's Name:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;
                 <input type="text" name="pn" required="required" autocomplete="off"/> <br/>
                 Number of Pregnancies:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                 <input type="text" name="preg" required="required" autocomplete="off"/> <br/>
                 Plasma Glucose Conc. (mg/dl): &emsp;&nbsp;&nbsp;
                 <input type="text" name="gluc" required="required" autocomplete="off"/> <br/>
                 Diastolic Blood Pressure (mm Hg): 
                 <input type="text" name="bp" required="required" autocomplete="off"/> <br/>
                 Triceps Skin Fold Thickness (mm): 
                 <input type="text" name="skin" required="required" autocomplete="off"/> <br/>
                 2 Hour Serum Insulin (mu U/ml): &nbsp;&nbsp;
                 <input type="text" name="ins" required="required" autocomplete="off"/> <br/>
                 Body Mass Index (BMI): &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="bmi" required="required" autocomplete="off"/> <br/>
                 Diabetes Pedigree Function: &emsp;&emsp;&nbsp;&nbsp;
                 <input type="text" name="dpf" required="required" autocomplete="off"/> <br/>
                 Age: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="age" required="required" autocomplete="off"/> <br/><br><br>
                 <div style="padding-left:140px">            
                    <input style=" text-align:center" type="submit" value="Check My Diabetes Status"/><br><br>
                 </div>        
              </form>
        </div>

          <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>   
          
    </body>
</html>  

