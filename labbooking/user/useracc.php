<!DOCTYPE html>
<?php 
// Include database connection settings
include('../include/dbconn.php');
include ("../login/session.php");
session_start();

$user = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
        header('Location: ../login');
		} 
//$user = $_GET['user'];		
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
    
<div>
      <h2>I-Lab</h2>
      
      <h2><?php echo $_SESSION['username'];?></h2>

    
  <?php
	$query = "SELECT * FROM user WHERE username='$user'";
	$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
	$row = mysqli_fetch_array($result);
?>

<fieldset>
<center>

<form name="edit_user" method="post" action="db_update_user.php" enctype="multipart/form-data">
  
    <table width="70%" border="0" text-align="center">
      
      <tr>
        <td width="1%">Name</td>  
        <td width="110%"><input type="text" name="name" value="<?php echo ucwords (strtolower($row['name'])); ?>"></td>  
      </tr>  
      <tr> 
        <td width="16%">Gender</td>
        <td>
        <input name="gender" type="radio" value="1" <?php if($row['gender']==1) { echo 'checked'; } ?> />Men
		<input name="gender" type="radio" value="2" <?php if($row['gender']==2) { echo 'checked'; } ?>/>Women
        </td>
      </tr>
	  <tr>
        <td width="16%">Email</td>
        <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
      </tr>
	  <tr>
        <td width="16%">Phone No</td>
        <td><input type="text" name="telephone" value="<?php echo $row['telephone']; ?>"></td>
      </tr>
      <tr>
        <td width="16%">Address</td>
        <td><input type="text" name="address" value="<?php echo ucwords (strtolower($row['address'])); ?>"></td>
      </tr>
      <tr>
        <td width="16%">Username</td>
        <td><input type="text" name="username" value="<?php echo $row['username']; ?>" readonly></td> 
      </tr>
      <tr>
        <td width="16%">Password</td>
        <td><input type="text" name="password" value="<?php echo $row['password']; ?>"></td> 
      </tr>
	  	  

	  
      <tr> 
        <td colspan="1">
          <input type="submit" name="submit" value="Update">
          
          
        </td>
      </tr>
	  
    </table>
</form>
</center>
</fieldset>






    </div>


    

  </body>
</html>


