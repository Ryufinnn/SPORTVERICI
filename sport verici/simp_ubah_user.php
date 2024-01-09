<?php
include "./Config/Connect.php";
$username			= $_POST['txtusername'];
$password	        = (md5($_POST['txtpassword']));
$namalengkap		= $_POST['txtnamalengkap'];
$level				= $_POST['level'];
$status				= $_POST['blokir'];
$sqlUbah = "update admins set password='$password',nama_lengkap='$namalengkap',	level='$level', blokir ='$status' where username='$username'";
$queryMhs = mysql_query($sqlUbah);
if($queryMhs)
{
echo "<script type='text/javascript'>
      alert('Data Berhasil DiUpdate');
      </script>";
  echo "<meta http-equiv='refresh' content='0; url=menu_admin.php?module=user'>";
}
else
{
echo "<script type='text/javascript'>
	alert('Data Gagal DiUpdate');
      </script>";
     echo "<meta http-equiv='refresh' content='0; url=menu_admin.php?module=user'>";
}
?>