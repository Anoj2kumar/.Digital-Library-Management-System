<?php
 include "connection.php";
 include "navbar.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        section{
            margin-top: -20px;
        }
 
    </style>
</head>
<body>
     <!--<header style="height: 80px;">
        <div class="logo">
            
        <h1 style="color: aqua; font-size: 25px; word-spacing: 10px; line-height: 80px; margin-top: 20px;">DIGITAL LIBRARY MANAGEMENT SYSTEM</h1>
    </div>
   <nav>
       <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="">BOOKS</a></li>
          <li><a href="">STUDENT_LOGIN</a></li>
          <li><a href="">REGISTRATION</a></li>
          <li><a href="">FEEDBACK</a></li>
       </ul>
   </nav>
    </header>-->
    <!--
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
         <div class="navbar-header">
            
         <a class="navbar-brand acyive">DIGITAL LIBRARY MANAGEMENT SYSTEM</a>
         </div>
   
         <ul class="nav navbar-nav">
          <li><a href="index.html">HOME</a></li>
          <li><a href="">BOOKS</a></li>
          
          <li><a href="">FEEDBACK</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">

            <li><a href="student_login.html"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
            <li><a href="student_login.html"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
            
          <li><a href="registration.html"><span class="glyphicon glyphicon-user"> SING UP</span></a></li>

         </ul>
     </div> 
   </nav>-->
    
    <section>
        <div class="log_img">
            
            <div class="box2">
                <h1 style="text-align: center; font-size: 35px; font-family: lucida console;">LIBRARY MANAGEMENT SYSTEM</h1>
                <h1 style="text-align: center; font-size: 25px;">USER REGISTRATION FORM</h1>
              <form name="registration" action="" method="post" >
              
               <div class="login">
                <input class="form-control" type="text" name="first" placeholder="Enter your First name" required=""><br>
                <input class="form-control" type="text" name="last" placeholder="Enter your Last name" required=""><br>
                  <input class="form-control" type="text" name="username" placeholder="Enter username" required=""><br>
                  <input class="form-control" type="text" name="password" placeholder="Enter password" required=""><br>
                  <input class="form-control" type="text" name="roll" placeholder="Enter your Roll number" required=""><br>
                  <input class="form-control" type="text" name="email" placeholder="Enter your Email" required=""><br>
                  <input class="form-control" type="text" name="contact" placeholder="Enter your phone no." required=""><br>
                  <input class="form-control" type="text" name="address" placeholder="Enter your Address" required=""><br>
                  <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 65px; height: 35px;"></div>
                  
              </form>
               
            </div>
   
        </div>
   </section>
       <?php
          if(isset($_POST['submit']))
          {
          $fn=$_POST['first'];
          $ln=$_POST['last'];
          $un=$_POST['username'];
          $p=$_POST['password'];
          $rn=$_POST['roll'];
          $em=$_POST['email'];
          $co=$_POST['contact'];
          $ad=$_POST['address'];

               if($fn!="" && $ln!=""&& $un!=""&& $p!="" && $rn!="" && $em!="" && $co!="" && $ad!="")
             {
  
         $query="INSERT INTO STUDENT VALUES ('$fn','$ln','$un','$p','$rn','$em','$co','ad', 'profile.png')";
         $data=mysqli_query($conn,$query);
          if($data)
          {
              echo "data inserted";
          }
            }
          else
          {
              echo "data not inserted";
          }
          }
        ?>
      
</body> 
</html>
       
        
           

          