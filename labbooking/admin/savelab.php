<?php
session_start();
if(isset($_SESSION['username'])){
    if(isset($_POST['Submit'])){
        //get all the posted items
        $labname=$_POST['lab_name'];
        $lablocation=$_POST['lab_location'];
        $labcapacity=$_POST['lab_capacity'];
    //echo $labname;
    //echo $lablocation;
        //connect to db
         $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));
    
        //construct and run query to store new van
         $q="insert into lab(lab_name,lab_location,lab_capacity) values('$labname','$lablocation','$labcapacity')";
        $res=mysqli_query($con,$q);
        echo "<h1>New lab saved.  <a href=index.php>Dashboard</a></h1>";
    
        //clear results and close the connection
    //mysqli_free_result($res);
    //mysqli_close($con);
    }else{ header("Location: index.php");}
}
?>