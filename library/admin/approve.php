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
    <title>Approve Request</title>
    <style type="text/css">
         .srch
         {
            padding-left: 750px;
         }
         .form-control
         {
             width: 300px;
             height: 40px;
             background-color: black;
             color: white;
         }
         body {
             background-image: url("images/imglibrary2.jpeg");
             background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
  margin-left: 80px;
}
.h:hover
{
  color: white;
  width: 250px;
  height: 50px;
  background-color: #00544c;
}
.container
{
    height: 500px;
    background-color: black;
    opacity: .7;
    color: white;
}
.Approve
{
    margin-left: 450px;
}
     </style>
</head>
<body>
    <!-----sidenav var-->
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
           <div style="color: white; margin-left:30px; font-size:30px;"> 
                   
               
               <?php
                  if(isset($_SESSION['login_user']))
                  {

                  
                      echo "<img class='img-circle profile_img' height=100 width=100 src='images/".$_SESSION['profile']."'>";
                     echo "</br></br>";
                     echo  "WELCOME " . $_SESSION['login_user'];
                  }
                ?>
           </div><br><br>
  <div class="h"><a href="books.php">Books</a></div>
  <!--<div class="h"><a href="delete.php">Delete bOOKS</a></div>-->
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
  </div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<div class="container">
    <h3 style="text-align: center;">Approve Request</h3>


    <form class="Approve" action="" method="POST">
        <input class="form-control" type="text" name="approve" placeholder="Approve or Not" required=""><br>
        <input   type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
        <input  type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <button class="btn btn-default" type="submit" name="submit">Approve</button>

    </form>
</div>
</div>
<?php
    if(isset($_POST['submit']))
    {
        mysqli_query($conn,"UPDATE `issue_book`SET `approve`='$_POST[approve]',`issue`='$_POST[issue]',`return`='$_POST[return]'  WHERE username='$_SESSION[name]' AND bid='$_SESSION[bid]';");
        mysqli_query($conn,"UPDATE books SET quantity = quantity-1 WHERE bid='$_SESSION[bid]';");

        $res=mysqli_query($conn,"SELECT quantity FROM books WHERE bid='$_SESSION[bid]';");
        while($row=mysqli_fetch_assoc($res))
        {
            if($row['quantity']==0)
            {
                mysqli_query($conn,"UPDATE books SET status='not-available' WHERE bid='$_SESSION[bid]';");

            }
        }
        ?>
          <script type="text/javascript">
              alert("Updated successful");

              window.location="request.php"
          </script>
        <?php

    }
?>

</body>
</html>