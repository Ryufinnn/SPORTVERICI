<?php
include "./Config/Connect.php";
$nosuplier      =$_POST['txtnoSuplier'];
$namasuplier    =$_POST['txtNamasuplier'];
$alamat         =$_POST['txtalamat'];
$nohp        	=$_POST['txtnohp'];


//query untuk insert data 
$sqlSimpan = "insert into suplier values('$nosuplier','$namasuplier ','$alamat','$nohp ')";


$sqlSimpan=mysql_query($sqlSimpan);
if ($sqlSimpan)
{
echo "<script type ='text/javascript'>
		alert ('Data Berhasil disimpan ');
			</script>";
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=suplier'>";

}
else
{
echo "<script type ='text/javascript'>
		alert ('data Gagal DiSimpan ');
			</script>";
			echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=suplier'>";
}
?>