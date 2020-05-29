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
        <h1 class="welcome-txt">___________________________________Add and View Doctor Details___________________________________</h1>
        <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
        <div style="padding-left:670px">
          &nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" class="info-txt">Click here to go logout</a><br/><br/>          
          <a href="dochome.php" class="info-txt">Click here to go to homepage</a><br/><br/><br/>
        </div>
        <div class="red-bg to-txt" style="padding-left:350px">          
          <br><a href="viewdb.php" style="color:#fecc00"> View PIMA Database </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="tobe.php" style="color:#fecc00"> Add & View Doctors </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="viewfb.php" style="color: #fecc00"> View Patient Feedback </a><br><br> 
        </div>

        <div class="red-bg to-txt" style="padding-left:200px">
                <p style="color:#a5302e">------------------------------------------</p>
                <u>Add Doctor Details:</u><br><br><br>
                <form method="POST" style="padding-left:400px">
                   Doctor Name:&emsp;&emsp;&emsp;&emsp;
                   <input type="text" name="docname" required="required" autocomplete="off" maxlength="30" /> <br/>
                   Address: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                   <input type="text" name="address" required="required" autocomplete="off" maxlength="50" /> <br/>
                   Contact Number:&emsp;&emsp;&nbsp;&nbsp;&nbsp;
                   <input type="number" name="contactno" required="required" autocomplete="off" maxlength="10" /> <br/>
                   Email Address:&emsp;&emsp;&emsp;&nbsp;&nbsp;
                   <input type="text" name="email" required="required" autocomplete="off" maxlength="50" /> <br/>
                   Age: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                   <input type="number" name="age" required="required" autocomplete="off" maxlength="3" /> <br/>
                   Gender: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                   <input type="text" name="gender" required="required" autocomplete="off" maxlength="10" /> <br/><br><br>
                   <div style="padding-left:120px">            
                      <input style=" text-align:center" type="submit" value="Add Doctor Details"/><br><br>
                   </div>
                </form>
        </div>
        <div class="red-bg to-txt" style="padding-left:200px">
                <p style="color:#a5302e">------------------------------------------</p>
                <u>View Doctor Details:</u><br><br><br>
                <table style="margin-right:500px">
                <col width="200">
                <col width="500">
                <col width="60">
                <col width="220">
                <col width="30">
                <col width="70">
                <tr>
                  <th>Doctor Name</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Email Address</th>
                  <th>Age</th>
                  <th>Gender</th>
                </tr>
                <?php
                    $con=mysqli_connect("localhost", "root", "") or die(mysql_error()); //connect to server
                    mysqli_select_db($con,"diabetex") or die("Cannot connect to database"); //connect to db                    
                    $sql = "SELECT docname,address,contactno,email,age,gender FROM doctors";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) // output data of each row
                    {                    
                        while($row = $result->fetch_assoc()) 
                        {
                          echo "</td><td>".$row["docname"]."</td><td>".$row["address"]."</td><td>".$row["contactno"]."</td><td>".$row["email"]."</td><td>".$row["age"]."</td><td>".$row["gender"]. "</td></tr>";
                        }
                        echo "</table>";
                    } 
                    else 
                      { 
                        echo "No Doctor Records Found"; 
                      }
                    $con->close();
                ?>
        <br><br></div>
          <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>   
          
    </body>
</html>  

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $docname = ($_POST['docname']);
    $address = ($_POST['address']);
    $contactno = ($_POST['contactno']);
    $email = ($_POST['email']);
    $age = ($_POST['age']);
    $gender = ($_POST['gender']);
    $con=mysqli_connect("localhost", "root", "") or die(mysql_error()); //connect to server
    mysqli_select_db($con,"diabetex") or die("Cannot connect to database"); //connect to database
      mysqli_query($con,"INSERT INTO doctors (docname,address,contactno,email,age,gender) VALUES ('$docname','$address','$contactno','$email','$age','$gender')"); //inserts the value to table 
      Print '<script>alert("Details added successfully!");</script>';//prompts the user
      Print '<script>window.location.assign("adddoc.php");</script>'; //redirects to adddoc.php
    
  }
?>  
