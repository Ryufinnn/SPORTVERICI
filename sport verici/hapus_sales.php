<?php
if(! $_GET['KdHapus']=="")
{
include "./Config/Connect.php";
$sqlHapus = "delete from sales where kd_sales='".$_GET['KdHapus']."'";
$queryHapus = mysql_query($sqlHapus);
if($queryHapus)
{
	echo "<script type='text/javascript'>
	alert('Data Berhasil DiHapus..!!!');
	</script>";
	echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=sales'>";
}
	else
	{
	echo "<script type='text/javascript'>
	alert('Data Gagal DiHapus');
	</script>";
	echo "<meta http-equiv='refresh' content='0; url=menu_sales.php?module=sales'>";
	}
}
?>