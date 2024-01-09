<script language="javascript">
function validasi(form)
{
if(form.txtnopelanggan.value=="")
{
alert("Isikan Nomor Pelanggan Terlebih Dahulu");
form.txtnopelanggan.focus();
return(false);
}
if(form.txtNamapelanggan.value=="")
{
alert("Isikan Nama Pelanggan Terlebih Dahulu");
form.txtNamapelanggan.focus();
return(false);
}
if(form.txtalamat.value=="")
{
alert("Isikan Alamat Terlebih Dahulu");
form.txtalamat.focus();
return(false);
}
if(form.txtnohp.value=="")
{
alert("Isikan NoHP Terlebih Dahulu");
form.txtnohp.focus();
return(false);
}
}
</script>


<form name='form_pelanggan' action='simpan_pelanggan.php' method='post' Onsubmit="return validasi(this)">
<table border=0 align='center' width=800 face=Constantia>
<tr><th colspan=3><font face=Constantia><h3>ENTRY DATA PELANGGAN<h3></font></th></tr>
<script src="./js/jsDate/Scripts/DateTimePicker.js" type="text/javascript"></script>
<tr>
<td>Kode pelanggan </td>
<td> : </td>
<td>
<input type="text" name="txtnopelanggan" id="nopelanggan" size=25 maxlength=14
value="<?php include "./generate_kode.php"; echo get_new_id("kd_pelanggan","pelanggan","P-"); ?>">
</td>
</tr>

<tr>
<td>Nama pelanggan</td>
<td> : </td>
<td>
<input type="text" name="txtNamapelanggan" id="nama" size=25 maxlength=25
placeholder="Input Nama Pelanggan">
</td>
</tr>

<tr>
<td>Alamat</td>
<td> : </td>
<td>
<input type="text" name="txtalamat" id="alamat" size=25 maxlength=25
placeholder="Input Alamat Pelanggan">
</td>
</tr>


<tr>
<td>NO HP</td>
<td> : </td>
<td>
<input type="text" name="txtnohp" id="nohp" size=25 maxlength=25
placeholder="Input No HP Pelanggan">
</td>
</tr>

<td></td>
<td></td>
<tr>
<td>
<input type="submit" name ="Simpan" class="button blue" value="Simpan" title='Simpan Data' >
<input type="reset" name ="Batal" class="button green"value="Batal">
</td>
</tr>

</table>
</form>



<html>
<head>
<link rel="stylesheet" media="screen" href="css/jquery.dataTables.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<body>
<table border=1 id="example" class="display" cellspacing="0" width="100%">
<center><h3><font>DAFTAR NAMA PELANGGAN<font><h3></center>
<hr>
<thead>
<tr>
<th>No.</th>
<th>Kode pelanggan</th>
<th>Nama pelanggan</th>
<th>Alamat</th>
<th>NO HP</th>
<th>Aksi</th>
</tr>
</thead>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./Config/Connect.php";
$sqljurusan   = mysql_query("select * from pelanggan order by kd_pelanggan ASC");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
?>
<tr>
<td align="center"><?php echo "$no" ?></td>
<td align="center"><?php echo "$datajurusan[kd_pelanggan]"?></td>
<td align="center"><?php echo "$datajurusan[nm_pelanggan]"?></td>
<td align="center"><?php echo "$datajurusan[alamat]"?></td>
<td align="center"><?php echo "$datajurusan[nohp]"?></td>

<td align="center">
<a href='?module=ubahpelanggan&Ubahpelanggan=<?php echo $datajurusan[kd_pelanggan]?>'Title= "Klik Disini Untuk Edit Data"><img src='./Images/edit.png'></img></a> |
<a href='hapus_pelanggan.php?KdHapus=<?php echo $datajurusan[kd_pelanggan]?>'title="Klik Disini Untuk Hapus Data" Onclick="return confirm('Apakah Anda Yakin Hapus Record dengan Kode Pelanggan=<?php echo $datajurusan[kd_pelanggan]?>')"><img src='./Images/delete.png'></img></a>
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