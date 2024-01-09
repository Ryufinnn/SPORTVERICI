<?php
include "./Config/Connect.php";
$nobarang           =$_POST['txtnobarang'];
$namabarang         =$_POST['txtNamabarang'];
$satuan           	=$_POST['satuan'];
$hargabeli        	=$_POST['txthargabeli'];
$hargajual          =$_POST['txthargajual'];
$stok     	    	=$_POST['txtstok'];

//query untuk insert data 
$sqlSimpan = "insert into barang values  ('$nobarang','$namabarang','$satuan','$hargabeli','$hargajual','$stok')";


$sqlSimpan=mysql_query($sqlSimpan);
if ($sqlSimpan)
{
echo "<script type ='text/javascript'>
		alert ('Data Berhasil disimpan ');
			</script>";
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=barang'>";

}
else
{
echo "<script type ='text/javascript'>
		alert ('data Gagal DiSimpan ');
			</script>";
			echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=barang'>";
}
?>