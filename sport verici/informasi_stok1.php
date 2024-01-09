

<html>
<head>
<link rel="stylesheet" media="screen" href="css/table.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<body>
<table border = 1 id="table-a" class="display" cellspacing="0" width="100%">
<center><h3><font>Informasi Stok Barang<font><h3></center>
<hr>
<head>
<tr>

<a href='cetak_informasi_stok.php?'target=_blank><font color=red><img src="./images/cetak.png" height=20> <tr> <b><u>Cetak</u> </b></font></a></tr>
</tr>
<thead>
<tr>
<th>No.</th>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Satuan</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Stok Minimum</th>
<th>Stok</th>

</tr>
</thead>
<tbody>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./config/Connect.php";
$sqljurusan   = mysql_query("select * from barang order by kd_barang");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
$color="";
$q=mysql_query("select * from tb_eoq where kd_barang='$datajurusan[kd_barang]'");
$r= mysql_fetch_array($q);
if((mysql_num_rows($q))>0){

$stok_min=$r[stok_minimum];

}else{
$stok_min="-";
}

if($stok_min != "-"){

	if($r[stok_minimum] >= $datajurusan[stok]){
	$color="#ff0000";
	{
	echo "<script>alert('stok  dengan kode barang $r[kd_barang] hampir habis')</script>";
	}
	}


}
?>
<tr>
<td align="center"><?php echo "<font color='$color'>$no</font>" ?></td>
<td align="center" bgcolor=#ffff00><?php echo "<font color='$color'>$datajurusan[kd_barang]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[nm_barang]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[satuan]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[harga_beli]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[harga_jual]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$stok_min</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[stok]</font>"?></td>

</tr>
<?php
$no++;
}
?>
<tbody>
</table>
<script>
$(document).ready(function(){
$('#example').dataTable();
});
</script>
</body>
</head>
</html>