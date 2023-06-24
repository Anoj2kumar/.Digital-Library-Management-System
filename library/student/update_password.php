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
    <title>Change password</title>
    <style type="text/css">
        body
        {
            
            height: 650px;
            background-color: red;
            background-image: url("images/imglibrary2.jpeg");
            background-repeat: no-repeat;
        }
        .wrapper
        {
           width: 400px;
           height: 400px;
           margin: 100 auto;
           background-color: black;
           opacity: .8;
           color: white;
           padding: 20px 15px;

        }
        .form-control
        {
            width: 300px;
        }

    </style>
</head>
<body>
     <div class="wrapper">
         <div style="text-align: center;">
          <!--<h1 style="text-align: center; font-size: 35px; font-family: lucida console;">LIBRARY MANAGEMENT SYSTEM</h1><br>-->
          <h1 style="text-align: center; font-size: 20px; font-family: lucida console;">Change your password</h1><br>
          
         </div>
         <div style="padding-left:50px;">
         <form action="" method="post">
             <input type="text" name="username" class="form-control" placeholder="username" required=""><br>
             <input type="text" name="email" class="form-control" placeholder="email" required=""><br>
             <input type="text" name="password" class="form-control" placeholder="new password" required=""><br>
             <button class="btn btn-default" type="submit" name="submit">Update</button>

              
          </form>
        </div>
     </div>
     <?php
       if(isset($_POST['submit']))
       {
           if(mysqli_query($conn,"UPDATE student SET password='$_POST[password]'WHERE username='$_POST[username]' AND email='$_POST[email]' ;"))
           {
               ?>
               <script type="text/javascript">
                     alert("The password updated successful.");
                 </script>
               <?php
               
           }
       }
     ?>
</body>
</html>