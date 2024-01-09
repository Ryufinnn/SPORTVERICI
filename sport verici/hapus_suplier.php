<?php
if(! $_GET['KdHapus']=="")
{
include "./Config/Connect.php";
$sqlHapus = "delete from suplier where kd_suplier='".$_GET['KdHapus']."'";
$queryHapus = mysql_query($sqlHapus);
if($queryHapus)
{
	echo "<script type='text/javascript'>
	alert('Data Berhasil DiHapus..!!!');
	</script>";
	echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=suplier'>";
}
	else
	{
	echo "<script type='text/javascript'>
	alert('Data Gagal DiHapus');
	</script>";
	echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=suplier'>";
	}
}
?>