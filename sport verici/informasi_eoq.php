

<html>
<head>
<link rel="stylesheet" media="screen" href="css/table.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<body>
<table border = 1 id="table-a" class="display" cellspacing="0" width="100%">
<center><h3><font>Informasi Analisa Eoq<font><h3></center>
<hr>
<head>
<tr>


</tr>
<thead>
<tr>
<th>No.</th>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Kebutuhan Pertahun</th>
<th>Biaya Simpan</th>
<th>Biaya Pesan</th>
<th>Stok Minimum</th>
<th>Stok</th>

</tr>
</thead>
<tbody>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./Config/Connect.php";
$sqljurusan   = mysql_query("select b.*,e.* from barang b,tb_eoq e where b.kd_barang=e.kd_barang order by b.kd_barang ASC");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
if($datajurusan[stok_minimum] <= $datajurusan[stok]){
$color="#000";
}else{
$color="#ff0000";
}

?>


<tr>
<td align="center"><?php echo "<font color='$color'>$no</font>" ?></td>
<td align="center" bgcolor=#ffff00><?php echo "<font color='$color'>$datajurusan[kd_barang]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[nm_barang]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[kb_tahun]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[biaya_simpan]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[biaya_pesan]</font>"?></td>
<td align="center"><?php echo "<font color='$color'>$datajurusan[stok_minimum]</font>"?></td>
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