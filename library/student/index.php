<?php
 session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE LIBRARY MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">
<style type="text/css">
    nav{ 
    float: right;
    word-spacing: 30px;
    padding: 20px;
}
nav li{
    display: inline-block;
    line-height: 80px;
}
</style>

</head>
<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="images/download.png" width="200" height="100">
             <h1 style="color: aqua;">DIGITAL LIBRARY MANAGEMENT SYSTEM</h1>
         </div>
         <?php
         if(isset($_SESSION['login_user']))
         {
             ?>
               <nav>
                  <ul>
                      <li><a href="index.php">HOME</a></li>
                      <li><a href="books.php">BOOKS</a></li>
                      <li><a href="logout.php">LOGOUT</a></li>
                      <li><a href="feedback.php">FEEDBACK</a></li>
                  </ul>
               </nav>
           <?php
         }
           else
           {
               ?>
                    <nav>
                       <ul>
                          <li><a href="index.php">HOME</a></li>
                          <li><a href="books.php">BOOKS</a></li>
                          <li><a href="student_login.php">LOGIN</a></li>
                         <li><a href="feedback.php">FEEDBACK</a></li>
                        </ul>
                    </nav>
           <?php
           }
         ?>
       
        </header>
        <section>
        <div class="sec_img">
            <br><br><br>
          <div class="box">
              <br><br><br><br>
              <h1 style="text-align: center; font-size: 35px;">Welcome to Library</h1><br><br>
              <h1 style="text-align: center; font-size: 25px;">Open at: 09:00 AM</h1><br>
              <h1 style="text-align: center; font-size: 25px;">Close at:6:00 PM</h1><br>

          </div>
        </div>
        </section>
       <footer>
       <p style="color: aliceblue; text-align: center;">
     <br>
        Email: anojyadav383@gmail.com <br><br>
        Phone: 7480847622
    </p>
       </footer>
    </div>
    <?php
     include "footer.php";
    ?>
</body>
</html>