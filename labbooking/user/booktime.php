
<doctype html>
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



</style>




<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['ulevel']==2){

 

    //get the parameter
    $lab_id=$_GET['id'];
    $mydate=$_GET['mydate'];

    //connect to db
   
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));


    //construct and run query to list vans
    $q="select * from lab where lab_id=$lab_id";
    $res=mysqli_query($con,$q);
    $r=mysqli_fetch_assoc($res);
    echo "<div class='table' style='margin-left: 590px;' >";
    echo "<h2>Lab ".$r['lab_name']."</h2>\n";
    echo "<p>".$r['lab_location']."\n".$r['lab_capacity']."\n"."</p>\n";
    echo "<form method=get action=booktime.php><input type=hidden name=id value=$lab_id>";
    echo "<input type=date name=mydate><input type=submit></form>";
    echo "$mydate";

    $q="SELECT * FROM (SELECT * FROM booking where (bookdate=$mydate and lab_id=$lab_id and (approval=1 or approval is null))) a right join(select * from slot) b on a.slotid=b.slotid";
   // $q="SELECT * FROM (SELECT * FROM journey where (jdate='$mydate' and van_id=$van_id and (approval=1 or approval is null))) a right join(select * from seat) b on a.seat_id=b.id";
    //echo $q;
    $res=mysqli_query($con,$q);
    echo "<table border=2>\n";
    echo "<tr><th>Lab</th><th>Slot</th></tr>\n";
    while($r=mysqli_fetch_assoc($res)){
        echo "<tr><td>".$r['time']."</td><td>";
        if(($r['udate']!=null)&&($r['approval']==1)) echo 'X'; 
        elseif($r['udate']!=null&&($r['approval']==0 or $r['approval']==NULL)) echo 'A/B <a href=bconfirm.php?lab_id='.$lab_id.'&slotid='.$r['slotid'].'&date='.$mydate.'><button>Book</button></a>'; 
        else echo 'A <a href=bconfirm.php?lab_id='.$lab_id.'&slotid='.$r['slotid'].'&date='.$mydate.'><button>Book</button></a>';
        echo "</td></tr>\n";
    }
    echo "</table>";
    echo "</div>";
    

    //clear results and close the connection
   // mysqli_free_result($res);
    //mysqli_close($con);
}else{ header("Location: index.html");}
?>
    