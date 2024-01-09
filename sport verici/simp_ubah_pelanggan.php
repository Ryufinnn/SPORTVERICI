<?php
include "./Config/Connect.php";
$nip_dosen                  =$_POST['txtnopelanggan'];
$nama_dosen                  =$_POST['txtNamapelanggan'];
$jk           				=$_POST['txtalamat'];
$jenjang        	    	=$_POST['txtnohp'];

$sqlUbah = "update pelanggan set nm_pelanggan='$nama_dosen', 
                           alamat='$jk',
			 nohp='$jenjang'
			   where kd_pelanggan='$nip_dosen'";
$queryMhs = mysql_query($sqlUbah);
if($queryMhs)
{
echo "<script type='text/javascript'>
      alert('Data Berhasil DiUpdate');
      </script>";
  echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=pelanggan'>";
}
else
{
echo "<script type='text/javascript'>
	alert('Data Gagal DiUpdate');
      </script>";
     echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=pelanggan'>";
}
?>