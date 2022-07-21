<!DOCTYPE html>
<?php 
include ("../login/session.php");
session_start();

if (!isset($_SESSION['username'])) {
       header('Location: ../login');
		} 
		
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

      <h2>STUDENT LAB BOOKING</h2>
      
      <h2><?php echo $_SESSION['username'];?></h2>

    







    </div>


    

  </body>
</html>


