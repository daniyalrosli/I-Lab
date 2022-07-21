<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['ulevel']==2){

    //connect to db
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));

	?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>lab booking</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div id="mySidenav"
    class="sidenav">
    <a href="javascript:void(0)"
    class="closebtn"
    onclick="closeNav()">&times;</a>


    <a href="index.php">HOME</a>
    <a href="useracc.php">MANAGE ACCOUNT</a>
    <a href="labcom.php">COMPUTER LAB</a>
    <a href="booking.php">BOOKING</a>
    <a href="bookinghis.php">BOOKING HISTORY</a>
    <a href="../feedback">FEEDBACK</a>
    <a href="../login">LOGOUT</a>
    
  </div>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

     <script>
       function openNav()
       {

        document.getElementById("mySidenav").style.width="250px";


       }
       function closeNav() {
  document.getElementById("mySidenav").style.width = "0";


}


     </script>
    
<?php

    //construct and run query to list user details
    $q="select name from user where id=".$_SESSION['username'];
    $res=mysqli_query($con,$q);
   

    
    //construct and run query to list vans
	
    $q="select * from lab";
    $res=mysqli_query($con,$q);
    echo "<h2> List of lab</h2>\n";
    echo "<div class='table' style='margin-left: 590px;' >";
    echo "<table border=1>\n";
    echo "<tr><th>Lab Name</th><th>Lab Location</th><th>Lab Capacity</th></tr>\n";
    while($r=mysqli_fetch_assoc($res)){
        echo "<tr><td>".$r['lab_name']."</td><td>".$r['lab_location']."</td><td>".$r['lab_capacity']."</td><td><a href=booktime.php?id=".$r['lab_id']."&mydate=".date("Y-m-d").">Book</a></td></tr>\n";
    }
    echo "</table>";
    echo "</div>";



	 //clear results and close the connection
	 mysqli_free_result($res);
	 mysqli_close($con);
 }else{ header("Location: index.html");}
 ?>
    