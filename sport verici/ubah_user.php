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
if(! $_GET['Ubahuser']=="")
{
include "./Config/Connect.php";
$sqlUbah   = "select * from admins where username='".$_GET['Ubahuser']."'";
$queryUbah = mysql_query($sqlUbah);
$data	   = mysql_fetch_assoc($queryUbah);
}
$username		= $_POST['txtusername'];
$password		= (md5($_POST['txtpassword']));
$namalengkap	= $_POST['txtnamalengkap'];
$level	        = $_POST['level'];
$status		    = $_POST['blokir'];
?>

<form name='form_user' action='simp_ubah_user.php' method='post' onSubmit="return validasi(this)">
<h2><font color=#000><center>UPDATE DATA USER</center></h2>
<hr></hr>
<table border=0 align='center' width=700>

<tr>
<td>User Name</td>
<td> : </td>
<td>
<input type="text" name="txtusername" value=<?php echo "$data[username]" ?>>

</td>
</tr>

<tr>
<td>Password</td>
<td> : </td>
<td>
<input type="text" name="txtpassword" placeholder="*Masukkan Password Baru">

</td>
</tr>


<tr>
<td>Nama Lengkap</td>
<td> : </td>
<td>
<input type="text" name="txtnamalengkap" value="<?php echo "$data[nama_lengkap]" ?>">
</td>
</tr>



<tr>
			<td>Level</td>
				<td>:</td>
				<td>
			<select name="level" >
				<option value=''>Pilih level</option>
				
				<option value='admin' <?php if($data[level]=="admin"){
				echo"selected";
				}
				?>>Administrator</option>
					<option value='jual' <?php if($data[level]=="jual"){
				echo"selected";
				}
				?>>Penjualan</option>
					<option value='gudang' <?php if($data[level]=="gudang"){
				echo"selected";
				}
				?>> Bagian Gudang</option>
					<option value='pimpinan' <?php if($data[level]=="pimpinan"){
				echo"selected";
				}
				?>>Pimpinan</option>
			<select/>
			</td>
			</tr>

	
<tr>
<td>Blokir</td>
<td> : </td>
<td>
<?php
if($blokir=='Y')
{
echo "<input type='radio' name='blokir' value='Y' checked>Aktif";
echo "<input type='radio' name='blokir' value='N'>Non Aktif";
}
else
{
echo "<input type='radio' name='blokir' value='Y'>Aktif";
echo "<input type='radio' name='blokir' value='N' checked>Non Aktif";
}
?>
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
