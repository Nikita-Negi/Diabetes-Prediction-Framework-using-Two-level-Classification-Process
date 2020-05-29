<?php
    session_start();
    $username = ($_POST['adminusername']);
    $password = ($_POST['adminpassword']);
    $bool = true;

    $con=mysqli_connect("localhost", "root", "","diabetex") or die (mysql_error()); //Connect to server
    mysqli_select_db($con,"diabetex") or die ("Cannot connect to database"); //Connect to database
    $query = mysqli_query($con,"Select * from admin WHERE adminusername='$username'"); // Query the users table
    $exists = mysqli_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysqli_fetch_assoc($query)) // display all rows from query
       {
          $table_users = $row['adminusername']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['adminpassword']; // the first password row is passed on to $table_password, and so on until the query is finished
       }
       if(($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
       {
          if($password == $table_password)
          {
             $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
             header("location: dochome.php"); // redirects the user to the authenticated home page
          }
       }
       else
       {
        Print '<script>alert("Incorrect Username or Password! Please try again.");</script>'; // Prompts the user
        Print '<script>window.location.assign("doctorlogin.php");</script>'; // redirects to login.php
       }
    }
    else
    {
        Print '<script>alert("Incorrect Username or Password! Please try again.");</script>'; // Prompts the user
        Print '<script>window.location.assign("doctorlogin.php");</script>'; // redirects to login.php
    }
?>
