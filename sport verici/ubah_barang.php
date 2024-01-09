<script language="javascript">
function validasi(form)
{
if(form.txtnobarang.value=="")
{
alert("Isikan Nomor Barang Terlebih Dahulu");
form.txtnobarang.focus();
return(false);
}
if(form.txtNamabarang.value=="")
{
alert("Isikan Nama Barang Terlebih Dahulu");
form.txtNamabarang.focus();
return(false);
}
if(form.satuan.value=="")
{
alert("Isikan Satuan Terlebih Dahulu");
form.satuan.focus();
return(false);
}
if(form.txtharga.value=="")
{
alert("Isikan Harga Barang Terlebih Dahulu");
form.txtharga.focus();
return(false);
}
if(form.txtstok.value=="")
{
alert("Isikan Jumlah Stok Barang Terlebih Dahulu");
form.txtstok.focus();
return(false);
}
}
</script>


<?php
if(! $_GET['Ubahbarang']=="")
{
include "./Config/Connect.php";
$sqlUbah   = "select * from barang where kd_barang='".$_GET['Ubahbarang']."'";
$queryUbah = mysql_query($sqlUbah)or mysql_error ();
$data	   = mysql_fetch_array($queryUbah);
}
$nobarang         =$_POST['txtnobarang'];
$namabarang       =$_POST['txtNamabarang'];
$satuan           =$_POST['satuan'];
$hargabeli        =$_POST['txthargabeli'];
$hargajual        =$_POST['txthargajual'];
$stok     	      =$_POST['txtstok'];

?>

<form name='form_suplier' action='simp_ubah_barang.php' method='post' onSubmit="return validasi(this)">
<h2><center><font color=#000 >UPDATE DATA BARANG</h2></center>
<hr></hr>
<table border=0 align='center' width=700>
<tr>
<td>Kode Barang </td>
<td> : </td>
<td>
<input type="text" name="txtnobarang" value=<?php echo "$data[kd_barang]" ?> size="16" maxlength="16">
</td>
</tr>

<tr>
<td>Nama barang</td>
<td> : </td>
<td>
<input type="text" name="txtNamabarang" value=<?php echo "$data[nm_barang]" ?> size="16" maxlength="16">
</td>
</tr>

<tr>
<td>Satuan</td>
<td> : </td>
<td>
<select name='satuan'>
<option value=3 selected>-Pilih Salah Satu-</option>
<option value=Buah selected>Buah</option>
<option value=Kotak selected>Kotak</option>
<option value=Kardus selected>Kardus</option>
</td>
</tr>

<option value='<?php "$data[satuan] selected >$data[satuan]" ?>'> </option>;
</tr>


<tr>
<td>Harga Beli</td>
<td> : </td>
<td>
<input type="text" name="txthargabeli" value=<?php echo "$data[harga_beli]" ?> size="25" maxlength="25">
</td>
</tr>


<tr>
<td>Harga Jual</td>
<td> : </td>
<td>
<input type="text" name="txthargajual" value=<?php echo "$data[harga_jual]" ?> size="25" maxlength="25">
</td>
</tr>

<tr>
<td>Stok</td>
<td> : </td>
<td>
<input type="text" name="txtstok" value= <?php echo "$data[stok]" ?> size="25" maxlength="25">
</td>
</tr>





<td></td>
<td></td>
<tr>
<td>
<input type="submit" name ="UPDATE"  class="button blue" value="UPDATE" title='update' >
<input type="reset" name ="Batal"  class="button green" value="Batal">
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
<center><h3><font>DAFTAR NAMA BARANG<font><h3></center>
<hr>
<thead>
<tr>
<th>No.</th>
<th>Kode Barang</th>
<th>Nama Barang</th>
<th>Satuan</th>
<th>Harga Beli</th>
<th>Harga Jual</th>
<th>Stok</th>
<th>Aksi</th>
</tr>
</thead>
<?php
//Koneksi ke database dan tampilkan data mahasiswa serta buat variable nomor
$no=1;
include "./Config/Connect.php";
$sqljurusan   = mysql_query("select * from barang order by kd_barang ASC");
while($datajurusan = mysql_fetch_array($sqljurusan))
{
?>
<tr>
<td align="center"><?php echo "$no" ?></td>
<td align="center"><?php echo "$datajurusan[kd_barang]"?></td>
<td align="center"><?php echo "$datajurusan[nm_barang]"?></td>
<td align="center"><?php echo "$datajurusan[satuan]"?></td>
<td align="center"><?php echo "$datajurusan[harga_beli]"?></td>
<td align="center"><?php echo "$datajurusan[harga_jual]"?></td>
<td align="center"><?php echo "$datajurusan[stok]"?></td>
<td align="center">
<a href='?module=ubahbarang&Ubahbarang=<?php echo $datajurusan[kd_barang]?>'><img src='./Images/edit.png'></img></a> |
<a href='hapus_barang.php?KdHapus=<?php echo $datajurusan[kd_barang]?>' Onclick="return confirm('Apakah Anda Yakin Hapus Record dengan Kode Barang=<?php echo $datajurusan[kd_barang]?>')"><img src='./Images/delete.png'></img></a>
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