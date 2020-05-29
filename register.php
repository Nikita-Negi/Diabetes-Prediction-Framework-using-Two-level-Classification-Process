<html>
    <head>
        <title>Diabetex</title>
    </head>
    <body>
        <style>
          .welcome-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 28px;
            text-align: center;
          }
          .info-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 18px;
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
          .to-txt
          {
            color:#fecc00;
            font-family: Britannic Bold;
            font-size: 18px;
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
          <br><h1 class="welcome-txt">____________________________________________Patient Registration Page____________________________________________</h1><br>
          <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
          <div style="padding-left:705px">
            <br/><br/><a href="patient.php" style="color: #a5302e" class="info-txt">Click here to go back</a><br/><br/>
          </div>          
            <div class="red-bg to-txt" style="padding-left:640px">
              <form action="register.php" method="POST">
                 <br>Enter Username: <input  type="text" name="username" required="required" autocomplete="off"/> <br/>
                 Enter Password : <input  type="password" name="password" required="required" /> <br/><br><div class="red-bg to-txt" style="padding-left:100px">            
                    <input style=" text-align:center padding-left:200px" type="submit" value="Register"/><br><br>
                 </div>        
              </form>
            </div>
            <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
        </div>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = ($_POST['username']);
  $password = ($_POST['password']);

  $bool = true;

  $con=mysqli_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysqli_select_db($con,"diabetex") or die("Cannot connect to database"); //connect to database
  $query = mysqli_query($con,"Select * from users");  //query the users table
  while($row = mysqli_fetch_array($query)) //display all rows fron query
  {
    $table_users = $row['username'];  //the first username row is passed on to $table_users, and so on
    if($username == $table_users) //checks if there are any matching fields
    {
      $bool = false;  //sets bool to false
      Print '<script>alert("Sorry, this username has been taken! Please select a new one.");</script>';//prompts the user
      Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
    }
  }
  if($bool) //checks if bool id true
  {
    mysqli_query($con,"INSERT INTO users (username, password) VALUES ('$username','$password')"); //inserts the value to table users
    Print '<script>alert("Successfully registered! Proceed to login.");</script>';//prompts the user
    Print '<script>window.location.assign("login.php");</script>'; //redirects to register.php
  }
}
?>