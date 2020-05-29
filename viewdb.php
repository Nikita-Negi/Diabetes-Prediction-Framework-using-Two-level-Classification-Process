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
          table 
          {
            
            width: 85%;
            color: #fecc00;
            font-size: 20px;  
            text-align: center;          
          }
          th 
          {
            text-align: center;
            background-color: #e6b800;
            color: #a5302e;
          }
          tr:nth-child(even) 
          {
            background-color: #9f2f2d;
          }
      </style>

      <div class="yellow-bg">
        <h2 class="welcome-txt2">Hello Admin!</h2> <!--Display's user name-->
        <h1 class="welcome-txt">______________________________________View PIMA Database______________________________________</h1>
        <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
        <div style="padding-left:670px">
          &nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" class="info-txt">Click here to go logout</a><br/><br/>          
          <a href="dochome.php" class="info-txt">Click here to go to homepage</a><br/><br/><br/>
        </div>
        <div class="red-bg to-txt" style="padding-left:350px">          
          <br><a href="viewdb.php" style="color:#fecc00"> View PIMA Database </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="adddoc.php" style="color:#fecc00"> Add & View Doctors </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="viewfb.php" style="color: #fecc00"> View Patient Feedback </a><br><br> 
        </div>
        <div class="red-bg to-txt" style="padding-left:200px">
                <p style="color:#a5302e">------------------------------------------</p>
                <table style="margin-right:500px">
                <col width="80">
                <col width="100">
                <col width="200">
                <col width="200">
                <col width="100">
                <col width="100">
                <col width="300">
                <col width="100">
                <col width="100">
                <tr>
                  <th>Pregnancies</th>
                  <th>Glucose</th>
                  <th>Blood Pressure</th>
                  <th>Skin Thickness</th>
                  <th>Insulin</th>
                  <th>BMI</th>
                  <th>Diabetes Pedigree Function</th>
                  <th>Age</th>
                  <th>Outcome</th>
                </tr>
                <?php
                    $con=mysqli_connect("localhost", "root", "") or die(mysql_error()); //connect to server
                    mysqli_select_db($con,"diabetex") or die("Cannot connect to database"); //connect to db                    
                    $sql = "SELECT Pregnancies,Glucose,BloodPressure,SkinThickness,Insulin,BMI,DiabetesPedigreeFunction,Age,Outcome FROM pima";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) // output data of each row
                    {                    
                        while($row = $result->fetch_assoc()) 
                        {
                          echo "</td><td>".$row["Pregnancies"]."</td><td>".$row["Glucose"]."</td><td>".$row["BloodPressure"]."</td><td>".$row["SkinThickness"]."</td><td>".$row["Insulin"]."</td><td>".$row["BMI"]."</td><td>".$row["DiabetesPedigreeFunction"]."</td><td>".$row["Age"]."</td><td>".$row["Outcome"]. "</td></tr>";
                        }
                        echo "</table>";
                    } 
                    else 
                      { 
                        echo "No Records Found"; 
                      }
                    $con->close();
                ?>
        <br><br></div>
          <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>   
          
    </body>
</html>  
