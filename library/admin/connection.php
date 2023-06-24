<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    /*echo "connected";*/
}
else
{
    echo "not connected".mysqli_connect_error();
}

?>