<?php
include "./Config/Connect.php";
$kdpelanggan            =$_POST['txtnopelanggan'];
$namapelanggann         =$_POST['txtNamapelanggan'];
$alamat           		=$_POST['txtalamat'];
$nohp        	    	=$_POST['txtnohp'];


//query untuk insert data 
$sqlSimpan = "insert into pelanggan values     ('$kdpelanggan  ',
												'$namapelanggan ',
												'$alamat',
												'$nohp')";


$sqlSimpan=mysql_query($sqlSimpan);
if ($sqlSimpan)
{
echo "<script type ='text/javascript'>
		alert ('Data Berhasil disimpan ');
			</script>";
		echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=pelanggan'>";

}
else
{
echo "<script type ='text/javascript'>
		alert ('data Gagal DiSimpan ');
			</script>";
			echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=pelanggan'>";
}
?>