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


<?php
if(! $_GET['Ubahpelanggan']=="")
{
include "./Config/Connect.php";
$sqlUbah   = "select * from pelanggan where kd_pelanggan='".$_GET['Ubahpelanggan']."'";
$queryUbah = mysql_query($sqlUbah);
$data	   = mysql_fetch_array($queryUbah);
}
$kdpelanggan        =$_POST['txtnopelanggan'];
$namapelanggan      =$_POST['txtNamapelanggan'];
$alamat           	=$_POST['txtalamat'];
$nohp        	    =$_POST['txtnohp'];
?>

<form name='form_pelanggan' action='simp_ubah_pelanggan.php' method='post' onSubmit="return validasi(this)">
<center><h4><font>UPDATE DATA PELANGGAN</h4></center>
<hr></hr>
<table border=0 align='center' width=700>

<tr>
<td>Kode Pelanggan </td>
<td> : </td>
<td>
<input type="text" name="txtnopelanggan" value= <?php echo "$data[kd_pelanggan]" ?> hidden>

<input type="text" name="txtnopelanggan1" value= <?php echo "$data[kd_pelanggan]" ?> size=16 maxlength=16  disabled >
</td>
</tr>

<tr>
<td>Nama pelanggan</td>
<td> : </td>
<td>
<input type="text" name="txtNamapelanggan" value=<?php echo "$data[nm_pelanggan]" ?> size=16 maxlength=16 >

</td>
</tr>

<tr>
<td>Alamat</td>
<td> : </td>
<td>
<input type="text" name="txtalamat" value=<?php echo "$data[alamat]" ?> size=16 maxlength=16 >
</td>
</tr>


<tr>
<td>NO HP</td>
<td> : </td>
<td>
<input type="text" name="txtnohp" value=<?php echo "$data[nohp]" ?> size=16 maxlength=16 >
</td>
</tr>



<td></td>
<td></td>
<tr>
<td>
<input type="submit" name ="UPDATE" class="button blue" value="UPDATE" title='update' >
<input type="reset" name ="Batal" class="button green"value="Batal">
</td>
</tr>
</table>



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