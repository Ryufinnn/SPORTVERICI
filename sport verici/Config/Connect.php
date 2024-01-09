<?php
 $hostname		="localhost";
 $username		="root";
 $password		="";
 $dbname		="sport_verici";
 $prefix="";
 //langkah 1
 $conn	=mysql_connect($hostname, $username, $password);
 if(! $conn)

 die ("Data Base not connect");
 
 // Langkah2
 $database= mysql_select_db($dbname, $conn);
 if(! $database)
 die ("Data Base Not selected") ;

?>