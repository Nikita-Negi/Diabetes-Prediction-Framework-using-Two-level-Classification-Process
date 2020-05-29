<script>
            n =  new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            d = n.getDate();
            document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
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
        <div class="red-bg to-txt" style="padding-left:200px">
          <p style="color:#a5302e">------------------------------------------</p>
          <u style="padding-left:460px">Diabetes Prediction Report</u>
          ______________________________________________________________________________________________________________________
          <br><br><u style="padding-left:490px">Patient Information</u><br><br>
          
          Patient's Name:&emsp;&emsp;&emsp;{{n}}<br>
          Age:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;{{ag}}<br>          
          Date:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{dt}}<br>
          Time:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;{{tm}}<br>
          ______________________________________________________________________________________________________________________
          <br><br><u style="padding-left:525px">Diagnosis</u><br><br>
          
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u>Reference Range</u>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u>Value</u>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<u>Flag</u><br><br>
          Number of pregnancies:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;1-3
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{pr}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;{{f1}}<br>
          Plasma glucose concentration (mg/dl):&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;70-110
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{gl}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{f2}}<br>
          Diastolic blood pressure (mmHg):&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;70-90
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{b}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{f3}}<br>
          Triceps skin fold thickness (mm):&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;12-25
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{sk}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{f4}}<br>
          Two hour serum insulin (mm U/ml):&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;50-230
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;{{i}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{f5}}<br>
          Body Mass Index (BMI):&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;18-24
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{bm}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;{{f6}}<br>
          Diabetes Pedigree Function:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;0.2-0.6
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;{{func}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{f7}}<br>
          Age:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;20 <
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;{{ag}}
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{f8}}<br>
          ______________________________________________________________________________________________________________________
          <br><br><u style="padding-left:540px">Result</u><br><br>

          Diabetes Result:&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;{{res}}<br>  
          Result Accuracy:&emsp;&emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;{{acc}}%<br>
          Probablity of positive result:&emsp;&emsp;&nbsp;{{p2}}<br>
          Probablity of negative result:&emsp;&emsp;{{p1}}<br><br>
          Description:&emsp;{{des1}}<br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{des2}}<br>
          ______________________________________________________________________________________________________________________
                           
          <p style="color:#a5302e">------------------------------------------</p>
        </div>
        <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>           
    </body>
</html>  
