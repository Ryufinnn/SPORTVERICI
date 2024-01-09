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
if(! $_GET['Ubahsales']=="")
{
include "./Config/Connect.php";
$sqlUbah   = "select * from sales where kd_sales='".$_GET['Ubahsales']."'";
$queryUbah = mysql_query($sqlUbah);
$data	   = mysql_fetch_array($queryUbah);
}
$nip_dosen      =$_POST['txtnoSales'];
$nama_dosen     =$_POST['txtSales'];
$jk           	=$_POST['txtalamat'];
$jenjang       	=$_POST['txtnohp'];
?>

<form name='form_pelanggan' action='simp_ubah_sales.php' method='post' onSubmit="return validasi(this)">
<center><h4><font>UPDATE DATA PELANGGAN</h4></center>
<hr></hr>
<table border=0 align='center' width=700>

<tr>
<td>Kode Sales </td>
<td> : </td>
<td>
<input type="text" name="txtnoSales" value= <?php echo "$data[kd_sales]" ?> hidden>

<input type="text" name="txtnoSales" value= <?php echo "$data[kd_sales]" ?> size=16 maxlength=16  disabled >
</td>
</tr>

<tr>
<td>Nama Sales</td>
<td> : </td>
<td>
<input type="text" name="txtNamaSales" value=<?php echo "$data[nm_sales]" ?> size=16 maxlength=16 >

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
<input type="reset" name ="Batal"  class="button green"value="Batal">
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
<center><h3><font>DAFTAR NAMA SALES<font><h3></center>
<hr>
<thead>
<tr>
<th>No.</th>
<th>Kode Sales</th>
<th>Nama Sales</th>
<th>Alamat</th>
<th>NO HP</th>
<th>Aksi</th>
</tr>
</thead>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./Config/Connect.php";
$sqljurusan   = mysql_query("select * from sales order by kd_sales ASC");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
?>
<tr>
<td align="center"><?php echo "$no" ?></td>
<td align="center"><?php echo "$datajurusan[kd_sales]"?></td>
<td align="center"><?php echo "$datajurusan[nm_sales]"?></td>
<td align="center"><?php echo "$datajurusan[alamat]"?></td>
<td align="center"><?php echo "$datajurusan[nohp]"?></td>

<td align="center">
<a href='?module=ubahsales&Ubahsales=<?php echo $datajurusan[kd_sales]?>'Title= "Klik Disini Untuk Edit Data"><img src='./Images/edit.png'></img></a> |
<a href='hapus_sales.php?KdHapus=<?php echo $datajurusan[kd_sales]?>'title="Klik Disini Untuk Hapus Data" Onclick="return confirm('Apakah Anda Yakin Hapus Record dengan Kode Sales=<?php echo $datajurusan[kd_sales]?>')"><img src='./Images/delete.png'></img></a>
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