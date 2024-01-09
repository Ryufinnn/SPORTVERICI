<script language="javascript">
function validasi(form)
{
if(form.txtnoSuplier.value=="")
{
alert("Isikan Nomor Pelanggan Terlebih Dahulu");
form.txtnoSuplier.focus();
return(false);
}
if(form.txtNamasuplier.value=="")
{
alert("Isikan Nama Suplier Terlebih Dahulu");
form.txtNamasuplier.focus();
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
<form name='form_suplier' action='simpan_suplier.php' method='post' Onsubmit="return validasi(this)">
<table border=0 align='center' width=800>
<tr><th colspan=3><font>ENTRY DATA SUPLIER<font></th></tr>
<tr>
<td>Kode Suplier </td>
<td> : </td>
<td>
<input type="text" name="txtnoSuplier" id="nosuplier" size=25 maxlength=14
value="<?php include "./generate_kode.php"; echo get_new_id("kd_suplier","suplier","S-"); ?>">
</td>
</tr>

<tr>
<td>Nama Suplier</td>
<td> : </td>
<td>
<input type="text" name="txtNamasuplier" id="nama" size=25 maxlength=25 placeholder="Input Nama Suplier">
</td>
</tr>

<tr>
<td>Alamat</td>
<td> : </td>
<td>
<input type="text" name="txtalamat" id="alamat" size=25 maxlength=25 placeholder="Input Alamat Suplier">
</td>
</tr>


<tr>
<td>NO HP</td>
<td> : </td>
<td>
<input type="text" name="txtnohp" id="nohp" size=25 maxlength=25 placeholder="Input No HP Suplier">
</td>
</tr>



<td></td>
<td></td>
<tr>
<td>
<input type="submit" name ="Simpan"  class="button blue" value="Simpan" title='Simpan Data' >
<input type="reset" name ="Batal"  class="button green"value="Batal">
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
<center><h3><font>DAFTAR NAMA SUPLIER<font><h3></center>
<hr>
<thead>
<tr>
<th>No.</th>
<th>Kode Suplier</th>
<th>Nama Suplier</th>
<th>Alamat</th>
<th>NO HP</th>
<th>Aksi</th>
</tr>
</thead>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./Config/Connect.php";
$sqljurusan   = mysql_query("select * from suplier order by kd_suplier ASC");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
?>
<tr>
<td align="center"><?php echo "$no" ?></td>
<td align="center"><?php echo "$datajurusan[kd_suplier]"?></td>
<td align="center"><?php echo "$datajurusan[nm_suplier]"?></td>
<td align="center"><?php echo "$datajurusan[alamat]"?></td>
<td align="center"><?php echo "$datajurusan[nohp]"?></td>

<td align="center">
<a href='?module=ubahsuplier&Ubahsuplier=<?php echo $datajurusan[kd_suplier]?>'><img src='./Images/edit.png'></img></a> |
<a href='hapus_suplier.php?KdHapus=<?php echo $datajurusan[kd_suplier]?>' Onclick="return confirm('Apakah Anda Yakin Hapus Record dengan Kode Suplier=<?php echo $datajurusan[kd_suplier]?>')"><img src='./Images/delete.png'></img></a>
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