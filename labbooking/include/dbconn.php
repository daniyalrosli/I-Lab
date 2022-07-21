<?php

/* php& mysqldb connection file */

$user = "root"; //mysqlusername

$pass = ""; //mysqlpassword

$host = "localhost"; //server name or ipaddress

$dbname= "labbooking"; //your db name

$dbconn= mysqli_connect($host, $user, $pass, $dbname);

if(isset($dbconn)){

mysqli_select_db($dbconn,$dbname) or die("<center>Error: " .
mysql_error($dbconn) . "</center>");

}

else{

echo "<center>Error: Could not connect to the database.</center>";

}

?>