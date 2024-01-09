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

<form name='form_user' action='simpan_user.php' method='post'  onSubmit="return validasi(this)">
<table border=0 align='center' width=800>

<tr><th colspan=3><font>ENTRY DATA USER<font></th></tr>
<tr>
<td>User Name </td>
<td> : </td>
<td>
<input type="text" name="txtusername" id="username" size=25 maxlength=14 placeholder="Input User Name">

</td>
</tr>

<tr>
<td>Password</td>
<td> : </td>
<td>
<input type="text" name="txtpassword" id="password" size=25 maxlength=25 placeholder="Input Password">
</td>
</tr>

<tr>
<td>Nama Lengkap</td>
<td> : </td>
<td>
<input type="text" name="txtnamalengkap" id="namalengkap" size=25 maxlength=25 placeholder="Input Nama Lengkap">
</td>
</tr>


<tr>
			<td>Level</td>
				<td>:</td>
				<td>
			<select name="level" >
				<option value=''>Pilih level</option>
				<option value='admin'>Administrator</option>
					<option value='jual'>Penjualan</option>
					<option value='gudang'> Bagian Gudang</option>
					<option value='pimpinan'>Pimpinan</option>
			<select/>
			</td>
			</tr>


<tr>
<td>Blokir</td><td>:</td><td>
<input type="radio" name="blokir" id="blokir" value="Y">Aktif <input type="radio" name="blokir" id="blokir" value="N">Not Aktif</td>
</tr>
<td></td>
<td></td>
<tr>
<td>
<input type="submit" name ="Simpan"  class="button blue" value="Simpan" title='Simpan Data' >
<input type="reset" name ="Batal"  class="button green" value="Batal">
</td>
</tr>

</table>
</form>




