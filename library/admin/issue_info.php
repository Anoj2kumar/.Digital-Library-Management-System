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
    <title>Book Request</title>
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
.scroll
{
   width: 100%;
   height: 500px;
   overflow: auto;
}
th,td
{
    width: 10%;
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
    <h2 style="text-align: center;">Information of Borrowed Books</h2>

    <?php
    $c=0;
     if(isset($_SESSION['login_user']))
     {
         $sql="SELECT student.username,roll,books.bid,name,authors,edition,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='yes' ORDER BY `issue_book`.`return` ASC";
         $res=mysqli_query($conn,$sql);
         
         echo "<table class='table table-bordered ' style='width:100%'>";
        echo "<tr style='background-color:#6db6b9e6;'>";
          //table header
         
          echo "<th>";echo "Student Username"; echo"</th>";
          echo "<th>";echo "Roll Number"; echo"</th>";
          echo "<th>";echo "BID"; echo"</th>";
          echo "<th>";echo "Book Name"; echo"</th>";
          echo "<th>";echo "Authors Name"; echo"</th>";
          echo "<th>";echo "Edition"; echo"</th>";
          echo "<th>";echo "Issue Date"; echo"</th>";
          echo "<th>";echo "Return Date"; echo"</th>";
          
        echo"</tr>";
        echo"</table>";
        echo "<div class='scroll'>";
        echo "<table class='table table-bordered '>";

          while($row=mysqli_fetch_assoc($res))
          {
              $d=date("y-m-d");
              if($d > $row['return'])
              {
                $c=$c+1;
                $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

                mysqli_query($conn,"UPDATE issue_book SET approve='$var' WHERE `return`='$row[return]'AND approve='yes' limit $c; ");
                echo $d."</br>";
            }
            echo "<tr>";
            echo "<td>";echo$row['username']; echo"</td>";
            echo "<td>";echo$row['roll']; echo"</td>";
            echo "<td>";echo$row['bid']; echo"</td>";
            echo "<td>";echo$row['name']; echo"</td>";
            echo "<td>";echo$row['authors']; echo"</td>";
            echo "<td>";echo$row['edition']; echo"</td>";
            echo "<td>";echo$row['issue']; echo"</td>";
            echo "<td>";echo$row['return']; echo"</td>";
            
            echo"</tr>";
          }
          
        echo "</table>";
        echo"</div>";
     }
     else
     {
         ?>
         <h2 style="text-align: center;"> Login to see Information of Borrowed Books</h2>
         <?php
     }
    ?>

</div>
</div>
</body>
</html>