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
    <title>Login</title>
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
    <!--
    <header style="height: 80px;">
        <div class="logo">
            
        <h1 style="color: aqua; font-size: 25px; word-spacing: 10px; line-height: 80px; margin-top: 20px;">DIGITAL LIBRARY MANAGEMENT SYSTEM</h1>
    </div>
   <nav>
       <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="">BOOKS</a></li>
          <li><a href="">LOGIN</a></li>
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
          <li><a href="index.php">HOME</a></li>
          <li><a href="books.php">BOOKS</a></li>
          
          <li><a href="feedback.php">FEEDBACK</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">

            <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
            <li><a href="student_login.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
            
          <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SING UP</span></a></li>

         </ul>
     </div> 
   </nav>-->
    

    <section>
     <div class="log_img">
         <br>
         <div class="box1">
             <h1 style="text-align: center; font-size: 35px; font-family: lucida console;">LIBRARY MANAGEMENT SYSTEM</h1><br>
             <h1 style="text-align: center; font-size: 25px;">USER LOGIN FORM</h1>
           <form name="login" action="" method="post" >
            
            <div class="login">
                <input class="form-control" type="text" name="username" placeholder="type your username" required=""><br>
                <input class="form-control" type="password" name="password" placeholder="type your password" required=""><br>
               <input class="btn btn-default" type="submit" name="submit" value="login" style="color: black; width: 60px; height: 35px;"> </div>

           
           <p style="color: white; padding-left: 10px;">
               <br><br>
               <a style="color: yellow; text-decoration:none;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp
               New to this website? <a style="color: azure;" href="registration.php">Sing Up</a>
           </p>
        </form>
         </div>

     </div>
    </section>
      <?php
      if(isset($_POST['submit']))
      {
         $conut=0;
         $res=mysqli_query($conn,"SELECT * FROM `admin`WHERE username='$_POST[username]' AND password='$_POST[password]';");
         $row=mysqli_fetch_assoc($res);
         $count=mysqli_num_rows($res);
         if($count==0)
         {
             ?>
             <script type="text/javascript">
                 alert("the username and password doesn't match");
             </script>
             <?php
         }
         else{
             /*------------if username and password match--*/

             $_SESSION['login_user'] = $_POST['username'];
             $_SESSION['profile']=$row['pic'];
             
             ?>
             <script type="text/javascript">
                 window.location="index.php"
             </script>
             <?php
         }
      }
      ?>
      
</body>
</html>