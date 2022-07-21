<!doctype html>
<html>
<head>
<body>




<style>

body{
  margin: 0;
  padding: 0;
  background: linear-gradient(120deg,#2980b9, #8e44ad);
  height: 100vh;
  overflow: hidden;
}

h1
{

  text-align: center;
  font-size: 300%;
  font-family: 'Times New Roman', Times, serif;
  font-style: oblique;



}

.sidenav
{

  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden ;
  padding: 0px;
}


.sidenav a
{

  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover
{
  color: rgb(49, 9, 251);
}

.sidenav .closebtn {
  position: absolute;
  top: 5;
  right: 25px;
  font-size: 36px;
  margin-left: 40px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


.center{

    position: absolute;
}





</style>





<?php
if(isset($_POST['submit'])){
    //get all the posted items
    
   
    
    
   

    //connect to db
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));

    //construct and run query to check if username is taken
    $q="select * from feedback where feedback_name=";
    $res=mysqli_query($con,$q);
   


    //construct and run query to store new user
    
    $res=mysqli_query($con,$q);
    echo "<h1>Thank you for your feedback !!! Please. <a href=index.html>Home</a></h1>";

    //clear results and close the connection
//    mysqli_free_result($res);
    mysqli_close($con);
}else{ header("Location: signup.html");}
?>