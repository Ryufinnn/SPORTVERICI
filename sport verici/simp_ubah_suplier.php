<?php
include "./Config/Connect.php";
$nosuplier      =$_POST['txtnoSuplier'];
$namasuplier    =$_POST['txtNamasuplier'];
$alamat          =$_POST['txtalamat'];
$nohp        	=$_POST['txtnohp'];

$sqlUbah = "update suplier set nm_suplier='$namasuplier', alamat='$alamat',nohp='$nohp' where kd_suplier='$nosuplier'";
$queryMhs = mysql_query($sqlUbah);
if($queryMhs)
{
echo "<script type='text/javascript'>
      alert('Data Berhasil DiUpdate');
      </script>";
  echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=suplier'>";
}
else
{
echo "<script type='text/javascript'>
	alert('Data Gagal DiUpdate');
      </script>";
     echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=suplier'>";
}
?>