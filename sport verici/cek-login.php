<?php
include"koneksi.php";
//cek login
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

if($_POST[level]=="admin"){

$username 	= antiinjection($_POST[username]);
$pass     	= antiinjection(md5($_POST[password]));
$level 		= antiinjection($_POST[level]);


$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  session_register("nama_user");
  session_register("nama_lengkap");
  session_register("pass_user");
  session_register("level_user");

  $_SESSION[nama_user]     = $r[user_name];
  $_SESSION[nama_lengkap]  = $r[nama_lengkap];
  $_SESSION[pass_user]     = $r[password];
  $_SESSION[level_user]    = $r[level];
  
  header ("location:./menu_admin.php");
  
}else{
echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
  echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
        Username atau Password Anda tidak benar.<br>";
		echo "<div> <a href='index.php'><img src='images/gembok.jpg'  height=147 width=176><br><br></a>
             </div>";
  echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='index.php?module=login'></a></center>";

}
}elseif($_POST[level]=="jual"){

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));
$level 	  = antiinjection($_POST[level]);


$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  session_register("namauser");
  session_register("namalengkap");
  session_register("passuser");
  session_register("leveluser");

  $_SESSION[namauser]     	= $r[username];
  $_SESSION[namalengkap] 	= $r[namalengkap];
  $_SESSION[passuser]    	= $r[password];
  $_SESSION[level_user]    	= $r[level];
  
  header ("location:menu_penjualan.php");
  
}else{
echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
  echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
        Username atau Password Anda tidak benar.<br>";
		echo "<div> <a href='index.php'><img src='images/gembok.jpg'  height=147 width=176><br><br></a>
             </div>";
  echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='index.php?module=login'></a></center>";

}
}
elseif($_POST[level]=="gudang"){

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));
$level 	  = antiinjection($_POST[level]);


$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  session_register("namauser");
  session_register("namalengkap");
  session_register("passuser");
  session_register("leveluser");

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[namalengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[level_user]   = $r[level];
  
  header ("location:menu_gudang.php");
  
}else{
echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
  echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
        Username atau Password Anda tidak benar.<br>";
		echo "<div> <a href='index.php'><img src='images/gembok.jpg'  height=147 width=176><br><br></a>
             </div>";
  echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='index.php?module=login'></a></center>";

}
}

elseif($_POST[level]=="pimpinan"){

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));
$level = antiinjection($_POST[level]);


$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  session_register("namauser");
  session_register("namalengkap");
  session_register("passuser");
  session_register("leveluser");

  $_SESSION[namauser]     	= $r[username];
  $_SESSION[namalengkap]  	= $r[namalengkap];
  $_SESSION[passuser]     	= $r[password];
  $_SESSION[level_user]    	= $r[level];
  
  header ("location:menu_pimpinan.php");
  
}else{
echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>";
  echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br> 
        Username atau Password Anda tidak benar.<br>";
		echo "<div> <a href='index.php'><img src='images/gembok.jpg'  height=147 width=176><br><br></a>
             </div>";
  echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='index.php?module=login'></a></center>";

}
}

?>