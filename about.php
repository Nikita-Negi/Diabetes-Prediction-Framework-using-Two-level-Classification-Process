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
        <h1 class="welcome-txt">___________________________________About Diabetes and Diabetex___________________________________</h1>
        <img class="diabetex-logo" src="final1.png" alt="Diabetex Logo">
        <div style="padding-left:670px">
          <a href="logout.php" class="info-txt" style="padding-left:20px">Click here to go logout</a><br/><br>
          <a href="home.php" class="info-txt">Click here to go to homepage</a><br/><br/><br/>
        </div>
        
        <div class="red-bg to-txt" style="padding-left:210px">          
          <br><a href="http://127.0.0.1:5000/" style="color:#fecc00"> Check Diabetes Status </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="viewdoc.php" style="color:#fecc00"> View Doctor Details </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="sendfb.php" style="color:#fecc00"> Send Feedback </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <a href="about.php" style="color: #fecc00"> About Diabetes and Diabetex </a><br><br> 
        </div>

        <div class="red-bg to-txt" style="padding-left:200px">
                <p style="color:#a5302e">------------------------------------------</p>


                <h3><u>About Type 2 Diabetes:</u></h3>
                <p><img src="type2.png" alt="type2" style="width:250px;height:230px;margin-left:15px;margin-right:200px;float:right;border-radius: 50%">Type 2 diabetes is a condition in which cells cannot use blood sugar (glucose) efficiently for energy. This happens when the cells become insensitive to insulin and the blood sugar gradually gets too high. There are two types of diabetes mellitus, type 1 and type 2. In type 2, the pancreas still makes insulin, but the cells cannot use it very efficiently. In type 1 diabetes, the pancreas cannot make insulin due to auto-immune destruction of the insulin-producing beta cells.It would include both hyper and hypo glycemia. <br><br>Type 2 diabetes is the most common type of diabetes. It is a chronic condition in which blood glucose (sugar) can no longer be regulated. There are two reasons for this. First, the cells of the body become resistant to insulin (insulin resistant). Insulin works like a key to let glucose (blood sugar) move out of the blood and into the cells where it is used as fuel for energy. When the cells become insulin resistant, moving sugar into the cells requires more and more insulin, and too much sugar stays in the blood. Over time, if the cells require more and more insulin, the pancreas can't make enough insulin to keep up and begins to fail.</p><br><br>


                <h3><u>Causes of Type 2 Diabetes:</u></h3>
                <ul><img src="causes.png" alt="type2" style="width:250px;height:230px;margin-left:15px;margin-right:200px;float:right;border-radius: 50%">
                  <li>A person might develop diabetes from being overweight or having high BMI.</li>
                  <li>Eating a lot of foods or drinks with sugar and simple carbohydrates. This would include a diet consisting mainly of fast foods etc.</li>
                  <li>Drinking drinks with a lot of artificial sweeteners (sugar free sodas, sugar free foods) that deviate from natural sugars, and that too in high quantity.</li>
                  <li>Lack of activity or being sedentary including watching more than 2 hours of TV per day.</li>
                  <li>Diabetes can be caused by lack of substancial exercise everyday.</li>
                  <li>Fast paced life's stress and stress hormones can also alleviate the risk of developing diabetes for any person.</li>
                  <li>Genetics can also cause diabetes where this disease can be passed on to the child by their parents.</li>
                </ul><br><br>


                <h3><u>Symptoms of Type 2 Diabetes:</u></h3>
                <ul><img src="symptoms.png" alt="type2" style="width:250px;height:230px;margin-left:15px;margin-right:200px;float:right;border-radius: 50%">
                  <li>Excessive thirst.</li>
                  <li>Excessive hunger.</li>
                  <li>Excessive urination.</li>
                  <li>Gaining or losing weight unintentionally.</li>
                  <li>Dark skin under armpits, chin, or groin.</li>
                  <li>Fatigue and drowsiness.</li>
                  <li>Unusual odor to urine.</li>
                  <li>Blurry vision.</li>
                  <li>Nausea and vomiting.</li>
                  <li>Difficulty in healing infections or cuts.</li>
                  <li>Tingling or numbness in the feet or other appendages.</li>
                </ul><br><br>


                <h3><u>Cures and Treatment for Type 2 Diabetes:</u></h3>
                <ul><img src="cure.png" alt="type2" style="width:250px;height:230px;margin-left:15px;margin-right:200px;float:right;border-radius: 50%">
                  <li>A well rounded and balanced diabetic eating plan.</li>
                  <li>Daily exercise.</li>
                  <li>Losing excess weight.</li>
                  <li>Taking physician approved oral drugs.</li>
                  <li>Taking physician approved injectible drugs.</li>
                  <li>Treating other problems like stress or sleep apnea.</li>
                  <li>Taking dietary supplements.</li>
                  <li>Taking regulated insulin shots.</li>
                  <li>Early and regular consultations with concerned doctors.</li>
                </ul><br><br>


                <h3><u>About Diabetex:</u></h3>
                <p><img src="diabetex.png" alt="type2" style="width:250px;height:230px;margin-left:15px;margin-right:200px;float:right;border-radius: 50%">Diabetex is a web application designed for people concerned about the status of their diabetes diagnosis. This web application is available over the internet, it is free, it is available 24/7 and is very reliable compared to other traditional methods of diagnosing one's diabetes status. India is the second most diabetic country in the world, with the number of diabetic patients and diabetes related deaths only increasing in the past year. A major cause of this is that one out of two diabetes type 2 patients are identified at a very late stage of the disease. Diabetex aims to remove this hurdle by offering a free and simple solution in the form of a machine learing powered and one stop solution application in the form of diabetex. Patients here can check their diabetes status, send queries and feedback to doctors, view nearby doctor details and learn more about the disease.The algorithms deployed in the backend use a two level process of classifiers to ensure high accuracy of results.</p><br><br><br><br>
                 
        </div>

          <p class="creator-txt">-Coded and Created by Nikita Negi for Capstone Project 2020-</p>
      </div>   
          
    </body>
</html>  
