<?php
include "koneksi.php";

$username		= $_POST['txtusername'];
$password		= (md5($_POST[txtpassword]));
$namalengkap	= $_POST['txtnamalengkap'];
$level			= $_POST['level'];
$status			= $_POST['blokir'];

$sqlSimpan		= "insert into admins values('$username','$password','$namalengkap','$level','$status')";
$query3	= mysql_query($sqlSimpan);

if($query3){
    echo "<script type='text/javascript'>
		alert ('Data Berhasil Disimpan...!!!')	
    </script>";
	echo "<meta http-equiv='refresh' content='0; url=menu_admin.php?module=user'>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert ('Data Gagal Disimpan...!!!');
	}
	</script>";
	
	echo "<meta http-equiv='refresh' content='0; url=menu_admin.php?module=user'>";
}
?>