<?php
include "./Config/Connect.php";
$nip_dosen                  =$_POST['txtnoSales'];
$nama_dosen                  =$_POST['txtNamaSales'];
$jk           				=$_POST['txtalamat'];
$jenjang        	    	=$_POST['txtnohp'];

$sqlUbah = "update sales set nm_sales='$nama_dosen', 
                           alamat='$jk',
			 nohp='$jenjang'
			   where kd_sales='$nip_dosen'";
$queryMhs = mysql_query($sqlUbah);
if($queryMhs)
{
echo "<script type='text/javascript'>
      alert('Data Berhasil DiUpdate');
      </script>";
  echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=sales'>";
}
else
{
echo "<script type='text/javascript'>
	alert('Data Gagal DiUpdate');
      </script>";
     echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=sales'>";
}
?>