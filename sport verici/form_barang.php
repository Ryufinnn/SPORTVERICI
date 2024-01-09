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

<form name='form_barang' action='simpan_barang.php' method='post'  onSubmit="return validasi(this)">
<table border=0 align='center' width=800>
<div>
<tr><th colspan=3><font>ENTRY DATA BARANG<font></th></tr>

<tr>

<td>Kode Barang </td>
<td> : </td>
<td>
<input type="text" name="txtnobarang" id="nobarang" size=25 maxlength=14
value="<?php include "./generate_kode.php"; echo get_new_id("kd_barang","barang","B-"); ?>">
</td>
</tr>

<tr>
<td>Nama Barang</td>
<td> : </td>
<td>
<input type="text" name="txtNamabarang" id="nama" size=25 maxlength=25
placeholder="Input Nama barang">
</td>
</tr>

<tr>
<td>Satuan</td>
<td> : </td>
<td>
<select name="satuan" >
				<option value=''>Pilih Jenis</option>
				<option value='kardus'>kardus</option>
				<option value='Pcs'>Pcs</option>
</td>
</tr>


<tr>
<td>Harga Beli</td>
<td> : </td>
<td>
<input type="text" name="txthargabeli" id="hargabeli" size=25 maxlength=25
placeholder="Input Harga Barang Beli">
</td>
</tr>


<tr>
<td>Harga Jual</td>
<td> : </td>
<td>
<input type="text" name="txthargajual" id="hargajual" size=25 maxlength=25
placeholder="Input Harga Barang Jual">
</td>
</tr>


<tr>
<td>Stok</td>
<td> : </td>
<td>
<input type="text" name="txtstok" id="stok" size=25 maxlength=25
placeholder="Input Stok">
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
</div>
</table>
</form>



<html>
<head>
<link rel="stylesheet" media="screen" href="css/table.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<body>
<table border = 1 id="example" class="display" cellspacing="0" width="100%">
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