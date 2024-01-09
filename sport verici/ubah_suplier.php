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


<?php
if(! $_GET['Ubahsuplier']=="")
{
include "./Config/Connect.php";
$sqlUbah   = "select * from suplier where kd_suplier='".$_GET['Ubahsuplier']."'";
$queryUbah = mysql_query($sqlUbah);
$data	   = mysql_fetch_array($queryUbah);
}
$nosuplier          =$_POST['txtnoSuplier'];
$namasuplier        =$_POST['txtNamasuplier'];
$alamat         	=$_POST['txtalamat'];
$nohp	        	=$_POST['txtnohp'];

?>

<form name='form_suplier' action='simp_ubah_suplier.php' method='post' onSubmit="return validasi(this)">
<h2><font color=#000><center>UPDATE DATA SUPLIER</center></h2>
<hr></hr>
<table border=0 align='center' width=700>

<tr>
<td>Kode Suplier </td>
<td> : </td>
<td>


<input type="text" name="txtnoSuplier" value='<?php echo "$data[kd_suplier]" ?>'size=16 maxlength=16 disabled >
<input type="text" name="txtnoSuplier" value='<?php echo "$data[kd_suplier]" ?>'hidden >
</td>
</tr>

<tr>
<td>Nama Suplier</td>
<td> : </td>
<td>
<input type="text" name="txtNamasuplier" value=<?php echo "$data[nm_suplier]" ?> size=16 maxlength=16 >

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
<input type="reset" name ="Batal"   class="button green" value="Batal">
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
