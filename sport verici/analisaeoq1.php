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


<form name='form_pelanggan' action='' method='post'>
<table border=0 align='center' width=800 face=Constantia>
<tr><th colspan=3><font face=Constantia><h3>ENTRY ANALISA EO<h3></font></th></tr>
<script src="./js/jsDate/Scripts/DateTimePicker.js" type="text/javascript"></script>


<tr>
<td><label>Kode Barang</label></td><td>	:	</td>
<td>

<select name=kode onchange='submit()'>

<?php
echo"<option value=0>-Pilih Kode Barang-</option>";
include "koneksi.php";
$sqlkelas = mysql_query("select * from barang order by kd_barang");
while ($si13= mysql_fetch_array($sqlkelas))
{
?><option value=<?php echo $si13[kd_barang] ; if(($_POST[kode] || $_GET[kdbarang])==$si13[kd_barang]){ ?> selected <?php } ?>> <?php echo"$si13[kd_barang]-$si13[nm_barang]"; ?></option><?php
}
echo "</select>";
?>
</td>
</tr>

</form>

<?php

echo"<form method=post action='menu_admin.php?module=analisa&kdbarang=$_POST[kode]'>";
$thn=date('Y');


$t=mysql_fetch_array(mysql_query("SELECT *,sum(jml)as tot FROM penjualan_sales WHERE kd_barang='$_POST[kode]' and year(tgl)='$thn' group by kd_barang"));
?>
<tr>
<td>Kebutuhan Per tahun</td>
<td> : </td>
<td>
<input type="text" name="txtkebutuhan" id="nama" value="<?php echo $t[tot] ; ?>" size=25 maxlength=25>
</td>
</tr>

<tr>
<td>Biaya Simpan</td>
<td> : </td>
<td>
<input type="text" name="txtalamat" id="alamat" size=25 maxlength=25">
</td>
</tr>


<tr>
<td>Biaya Pesan</td>
<td> : </td>
<td>
<input type="text" name="txtbiaya" id="nohp" size=25 maxlength=25">


</td>
</tr>
<tr><td></td><td></td><td><input type="submit" name="Proses" value="proses">
</td></tr>
<tr>
<td>Jumlah Pesan</td>
<td> : </td>
<td>
<input type="text" name="txtjumlah" id="nohp" size=25 maxlength=25>

</td>
</tr>

<tr>
<td>Interval</td>
<td> : </td>
<td>
<input type="text" name="txtinterval" id="nohp" size=25 maxlength=25>
</td>
</tr>

<td></td>
<td></td>
<tr>
<td>
<input type="submit" name ="Simpan" value="Simpan" title='Simpan Data' >
<input type="reset" name ="Batal" value="Batal">
</td>
</tr>

</table>
</form>
