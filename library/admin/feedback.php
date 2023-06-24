<?php
  include "navbar.php";
  include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body
        {
            background-image: url("images/imglibrary2.jpeg");
        }
        .wrapper
        {
            padding: 10px;
            margin: -20px auto;
            width:900px;
            height: 600px;
            background-color: black;
            opacity: .7;
            color: white;
        }
        .form-control
        {
            height: 70px;
            width: 60%;
        }
        
    </style>
</head>
<body>
    <div class=wrapper>
        <h1>If you have any suggesions or question please comment below.</h1>
        
        <form style="" action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="write something..."><br>
            <input class="btn btn-default" type="submit" name="submit" value="comment" style="width: 100px; height: 30px;">

        </form>
        <br><br>
    
    <div class=""scroll>
        <?php
          if(isset($_POST['submit']))
          {
              $sql="INSERT INTO comment VALUES('','$_POST[comment]');";
              if(mysqli_query($conn,$sql));
              {
                  $q="SELECT * FROM `comment` ORDER by `comment`,'id' DESC;";
                  $result=mysqli_query($conn,$q);
                  echo"<table class='table table-bordered'>";
                    
                  while ($row=mysqli_fetch_assoc($result))
                  {
                     echo "<tr>";
                         echo"<td>"; echo $row['comment']; echo"</td>";
                     echo"</tr>";
                  }
                 
              }
              
                  
              
          }
          else
          {
            $q="SELECT * FROM `comment` ORDER by `comment`,'id' DESC;";
            $result=mysqli_query($conn,$q);
            echo"<table class='table table-bordered'>";
                
            while ($row=mysqli_fetch_assoc($result))
            {
               echo "<tr>";
                   echo"<td>"; echo $row['comment']; echo"</td>";
               echo"</tr>";
            }
          }
        ?>
        
    </div>
    </div>
</body>
</html>