
<html>
<head>
<link rel="stylesheet" media="screen" href="css/jquery.dataTables.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<body>
<table border=1 id="example" class="display" cellspacing="0" width="100%">
<center><h3><font>DAFTAR NAMA USER<font><h3></center>
<hr>
<thead>
<tr>
<th>No.</th>
<th>User Name</th>
<th>Nama Lengkap</th>
<th>Level</th>
<th>Status Blokir</th>
<th>Aksi</th>
</tr>
</thead>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./Config/Connect.php";
$sqljurusan   = mysql_query("select * from admins order by username ASC");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
?>
<tr>
<td align="center"><?php echo "$no" ?></td>
<td align="left"><?php echo "$datajurusan[username]"?></td>

<td align="center"><?php echo "$datajurusan[nama_lengkap]"?></td>
<td align="center"><?php echo "$datajurusan[level]"?></td>
<td align="center"><?php echo "$datajurusan[blokir]"?></td>
<td align="center">
<a href='?module=ubahuser&Ubahuser=<?php echo $datajurusan[username]?>'Title= "Klik Disini Untuk Edit Data  User"><img src='./Images/edit.png'></img></a> |
<a href='hapus_user.php?KdHapus=<?php echo $datajurusan[username]?>'title="Klik Disini Untuk Hapus Data" Onclick="return confirm('Apakah Anda Yakin Hapus Record dengan Username=<?php echo $datajurusan[username]?>')"><img src='./Images/delete.png'></img></a>
</td>
</tr>
<?php
$no++;
}
?>
</table>
<script>
$(document).ready(function(){
$('#example').dataTable();
});
</script>
</body>
</head>
</html>