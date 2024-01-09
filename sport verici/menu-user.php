<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman Administrator</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
 echo "<div> <a href='login.php'><img src='images/gembok.jpg'  height=176 width=143></a>
             </div>";
echo "<input type=button class=btnsimpan value='LOGIN DI SINI' onclick=location.href='login.php'></a></center>";
}
 
else{

echo"Halaman user <a href='logout.php'>logout</a>";
}
?>