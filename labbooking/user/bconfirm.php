<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['ulevel']==2){

    //get the parameters
    $lab_id=$_GET['lab_id'];
    $slotid=$_GET['slotid'];
    $udate=$_GET['date'];
    $username=$_SESSION['username'];

    //connect to db
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));

    //construct and run query to list vans
    $q="insert into booking(lab_id, slotid, userid,udate) values($lab_id,$slotid,$username,'$udate')";
    //echo $q;
    $res=mysqli_query($con,$q);
    echo "<h1>New booking saved. <a href=booking.php>Dashboard</a></h1>";

    //clear results and close the connection
    //mysqli_free_result($res);
    mysqli_close($con);
}else{ header("Location: index.html");}
?>