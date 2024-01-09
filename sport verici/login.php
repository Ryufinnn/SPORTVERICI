<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>	
	<script language="javascript">
function kondisi(form)
{
if(form.username.value=="")
 {
	alert("Inputkan Username Terlebih Dahulu");
	form.username.focus();
	return(false);
	 }
if(form.password.value=="")
{
	alert("Inputkan Password Terlebih Dahulu");
	form.password.focus();
	return(false);
}
return(true);
}
</script>
	<form  align=center class="form-login" name="login-user" method="post" action="cek-login.php" method="post" onSubmit="return kondisi(this)">
	<fieldset>	
			<p size=3>
			Username
			<input type="text" name="username" placeholder="Username">
			</p>
			<p>
			Password
			<input type="password" name="password" placeholder="Password" class="showpassword">
			</p>
			<p>
			Level
			<select name="level" >
				<option value=''>Pilih level</option>
				<option value='admin'>Administrator</option>
					<option value='jual'>SuperVisor</option>
					<option value='gudang'> Bagian Gudang</option>
					<option value='pimpinan'>Pimpinan</option>
			<select/>
			</p>
			<p> 
			<td></td><input type="submit" name="submit" class="button blue" value="Masuk">
			<input type="reset" name="Reset" class="button green" value="Reset" > 
			</p>
	</fieldset>
	</form>
</body>
</html>