<?php
include "./Config/Connect.php";
$nip_dosen                  =$_POST['txtnoSales'];
$nama_dosen                  =$_POST['txtNamaSales'];
$jk           				=$_POST['txtalamat'];
$jenjang        	    	=$_POST['txtnohp'];


//query untuk insert data 
$sqlSimpan = "insert into sales values     ('$nip_dosen  ',
                                             '$nama_dosen ',
                                            '$jk',
											'$jenjang'
											)";


$sqlSimpan=mysql_query($sqlSimpan);
if ($sqlSimpan)
{
echo "<script type ='text/javascript'>
		alert ('Data Berhasil disimpan ');
			</script>";
		echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=sales'>";

}
else{

echo "<script type ='text/javascript'>
		alert ('data Gagal DiSimpan ');
			</script>";
			echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=sales'>";
}
?>