
<?php
include "./Config/Connect.php";
$nobarang           =$_POST['txtnobarang'];
$namabarang         =$_POST['txtNamabarang'];
$satuan           	=$_POST['satuan'];
$hargabeli        	=$_POST['txthargabeli'];
$hargajual        	=$_POST['txthargajual'];
$stok     	    	=$_POST['txtstok'];

$sqlUbah = "update barang set nm_barang='$namabarang', satuan='$satuan',harga_beli ='$hargabeli', harga_jual ='$hargajual', stok='$stok'where kd_barang='$nobarang'";
$queryMhs = mysql_query($sqlUbah);
if($queryMhs)
{
echo "<script type='text/javascript'>
      alert('Data Berhasil DiUpdate');
      </script>";
  echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=barang'>";
}
else
{
echo "<script type='text/javascript'>
	alert('Data Gagal DiUpdate');
      </script>";
     echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=barang'>";
}
?>