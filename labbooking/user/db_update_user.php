<?php
include('../include/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}



	  $update = "UPDATE user SET
				name='$valuearr[0]',
				gender='$valuearr[1]',
				email='$valuearr[2]',
				telephone='$valuearr[3]',
				address='$valuearr[4]',
				password='$valuearr[6]'
				WHERE username='$valuearr[5]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "useracc.php"
	  </script>
	  <?php }       
     
?>