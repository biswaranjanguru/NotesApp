<?php
$server="localhost";
$username="root";
$password="";
$database="notes-1";
$con = mysqli_connect($server,$username,$password,$database);
if(!$con){
    echo "NO";
}

?>