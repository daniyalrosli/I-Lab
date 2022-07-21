<!DOCTYPE html>


  
    <h2>Welcome Admin</h2>
    </div>

   
    

  

    <div id="mySidenav"
    class="sidenav">
    <a href="javascript:void(0)"
    class="closebtn"
    onclick="closeNav()">&times;</a>
   
    <style>



body{
  margin: 10;
  padding:0;
  background: linear-gradient(120deg,#2980b9, #8e44ad);

 
 
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

h2{

    
text-align: center;
}












    </style>
    

    <a href="index.php">Home</a><br>
      <br><a href="addlab.php">Add lab</a><br>
      <br><a href="delete.php">Delete user</a><br>
      <br><a href="../login/">Logout</a><br>
     


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


    
    
</body>

<body>
<?php


session_start();
if(isset($_SESSION['username'])){

    //connect to db
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));

    //construct and run query to list user details
    $q="select username from user where userid=".$_SESSION['username'];
    $res=mysqli_query($con,$q);
   
   

    //construct and run query to list lab
    
    $q="select * from lab";
    $res=mysqli_query($con,$q);
    echo "<div class='table' style='margin-left: 630px;' >";
    echo "<h3>List of Lab</h3>" ;
    echo "<table border=1>\n";
    echo "<tr><th>Lab Name</th><th>Lab location</th><th>Lab Capacity</th></tr>\n";
    while($r=mysqli_fetch_assoc($res)){
        echo "<tr><td>".$r['lab_name']."</td><td>".$r['lab_location']."</td><td>".$r['lab_capacity']."</td></tr>\n";
    }
    echo "</table>";
    echo "</div>";

    //construct and run query to list new bookings
    $q=$q="select * from booking";
    $res=mysqli_query($con,$q);
    echo "<div class='table' style='margin-left: 530px;' >";
    echo "<h3>Booking List</h2>\n";
    echo "<table border=1>\n";
    echo "<tr><th>Booking Startdate</th><th>Booking Enddate</th><th>Booking status</th><th>Booking reason</th></tr>\n";
    while($r=mysqli_fetch_assoc($res)){
        echo "<tr><td>".$r['booking_startdate']."</td><td>".$r['booking_enddate']."</td><td>".$r['booking_status']."</td><td>".$r['booking_reason']."</td></tr>\n";
    }
    echo "</table>";
    echo "</div>";


    //construct and run query to list users
    $q="select * from user";
    $res=mysqli_query($con,$q);
    echo "<div class='table' style='margin-left: 630px;' >";
    echo "<br><h3>User List</h3>\n";
    echo "<table border=1>\n";
    echo "<tr><th>id</th><th>Name</th><th>Username</th><th>password</th></tr>\n";
    while($r=mysqli_fetch_assoc($res)){
        echo "<tr><td>".$r['userid']."</td><td>".$r['name']."</td><td>".$r['username']."</td><td>".$r['password']."</td></tr>\n";
    }
    echo "</table>";
    echo "</div>";

    //clear results and close the connection
    mysqli_free_result($res);
    mysqli_close($con);
}else{ header("Location: index.php");}
?>

</body>