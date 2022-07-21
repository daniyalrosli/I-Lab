<?php
if(isset($_POST['submit'])){
    //get all the posted items
    $username=$_POST['username'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];
    
   

    //connect to db
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));

    //construct and run query to check if username is taken
    $q="select * from user where username='$username'";
    $res=mysqli_query($con,$q);
    $num=mysqli_num_rows($res);
    if($num!=0) header("Location: signup.html");

    //construct and run query to store new user
    $q="insert into user(username,password,name,address,telephone,email,levelid) values('$username','$password','$name','$address','$telephone','$email','2')";
    $res=mysqli_query($con,$q);
    echo "<h1>New user created. Please <a href=../login/>Login</a></h1>";

    //clear results and close the connection
//    mysqli_free_result($res);
    mysqli_close($con);
}else{ header("Location: signup.html");}
?>

