<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['ulevel']==1){

    //get the parameters
    if(isset($_POST['mydate'])) $mydate=$_POST['mydate'];
    else $mydate=date("Y-m-d");
    if(isset($_POST['lab_id'])) $lab_id=$_POST['lab_id'];
    else $lab_id=1;

    //connect to db
    $con=mysqli_connect('localhost','root','','labbooking') or die(mysqli_error($con));

    //$q="SELECT * FROM (SELECT * FROM booking where (udate='$mydate' and lab_id=$lab_id and (approval=1 or approval is null))) a right join(select * from slot) b on a.slotid=b.slotid";
    //echo $q;
    //$res=mysqli_query($con,$q);
   // echo "<table border=1>\n";
    //echo "<tr><th>Slot</th><th>Status</th></tr>\n";
    //while($r=mysqli_fetch_assoc($res)){
        //echo "<tr><td>".$r['slot']."</td><td>";
        //if(($r['bookdate']!=null)&&($r['approval']==1)) echo 'X'; 
        //elseif($r['bookdate']!=null&&($r['approval']==0 or $r['approval']==NULL)) echo 'A/B'; 
       // elseif($r['bookdate']!=null && $r['approval']==null) echo 'B'; 
       // else echo 'A';
       // echo "</td></tr>\n";
   // }
    //echo "</table>";

    //construct and run query to list vans
    
    $q="select lab_id,lab_name,lab_location from lab";
    $res=mysqli_query($dbconn,$q);
    echo "<form method=post action=approve.php><select name=lab_id>";
    while($r=mysqli_fetch_assoc($res)) echo "<option value=".$r['lab_id'].">".$r['lab_name']."</option>\n";
    echo "</select>\n";
    echo "<input type=date name=mydate><input type=submit></form>";

    //construct and run query to list new bookings
    $q="select a.booking_id, a.udate, a.bookdate, a.approval, b.lab_id, c.time, d.username, d.levelid from booking a, lab b, slot c, user d where a.udate='$mydate' and b.lab_id=a.lab_id and c.slotid=a.slotid and d.username=a.username order by udate, bookdate asc";
    $res=mysqli_query($dbconn,$q);
    echo "<br><h2>booking List</h2>\n";
    echo "<table border=7>\n";
    echo "<tr><th>journey Date</th><th>book date</th><th>User Name</th><th>Slot Time</th><th>Confirmation</th></tr>\n";
    
    while($r=mysqli_fetch_assoc($res)){
      echo "<tr><td>".$r['udate']."</td><td>".$r['bookdate']."</td><td>".$r['username']."</td><td>".$r['Time']."</td><td><a href=approved.php?lab_id=".$r['lab_id']."&code=0><button>Reject</button></a><a href=approved.php?lab_id=".$r['lab_id']."&code=1><button>Approve</button></a></tr>\n";
  }
  echo "</table>";
    echo "</table>";

    //clear results and close the connection
    mysqli_free_result($res);
    mysqli_close($con);
}else{ header("Location: login.html");}    