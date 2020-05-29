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
      <br><h1 class="welcome-txt">_________________________________________Administrative Login Page_________________________________________</h1><br>
      <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
      <div style="padding-left:705px">
        <br/><br/><a href="index.php" style="color: #a5302e" class="info-txt">Click here to go back</a><br/><br/>
      </div>
      <form action="checklogindoc.php" method="POST">
        <div class="red-bg to-txt" style="padding-left:605px">
           <br>Enter Admin Username: <input type="text" name="adminusername" required="required" autocomplete="off"/> <br/>
           Enter Admin Password : <input type="password" name="adminpassword" required="required" /> <br/><br>
        </div>
        <div class="red-bg to-txt" style="padding-left:730px">            
           <input style=" text-align:center padding-left:180px" type="submit" value="Admin Login"/><br><br>
        </div>
      </form>
      <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
    </div>
  </body>
</html>


