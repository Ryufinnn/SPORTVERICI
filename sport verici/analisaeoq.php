<script language="javascript">
function validation(form)
{
if(form.txtKebutuhan.value=="")
{
alert("Isikan Kebutuhan Terlebih Dahulu");
form.txtKebutuhan.focus();
return(false);
}
if(form.txtBYSimpan.value=="")
{
alert("Isikan Biaya Simpan Terlebih Dahulu");
form.txtBySimpan.focus();
return(false);
}
if(form.txtByPesan.value=="")
{
alert("Isikan Biaya Pesan Terlebih Dahulu");
form.txtByPesan.focus();
return(false);
}
}
</script>

<script type="text/javascript">function startCalc(){interval=setInterval("calc()",1)}
function calc(){one=document.frm_eoq.txtKebutuhan.value;
				two=document.frm_eoq.txtBySimpan.value;
				three=document.frm_eoq.txtByPesan.value;
				document.frm_eoq.txtPesanEco.value=(2*(three)*(one))/(two);
				document.frm_eoq.txtInterval.value=((2*(three))/((two*(one))*360);}
function stopCalc(){clearInterval(interval)}</script>

<form  align= 'center' name='frm_eoq'  action='menu_gudang.php?module=hasil-eoq' method='post' onSubmit="return validation(this)">
<h2><font>ANALISA EOQ</h2>
<hr></hr>
<tr align='center'>
<table border=1 align='center' width=1000 cellspacing="1" >

<tr >
<td>Barang</td>
</tr>
<tr>
<td>-----------</td>
</tr>

<tr>
<td>Kode Barang</td>
<td> : </td>
<td>
<?php  
include "koneksi.php"; 
$tgl_sekarang = date('Y');
$sqlBarang = mysql_query("SELECT *,sum(jml)as tot FROM penjualan ,barang  WHERE barang.kd_barang=penjualan.kd_barang and year(tgl)='$tgl_sekarang' group by barang.kd_barang");  
$jsArray = "var prdName = new Array();\n";  
echo '<select name="txtKdBrg" onchange="changeValue(this.value)">';  
echo '<option>-Pilih Barang-</option>';  
while ($dataBarang = mysql_fetch_array($sqlBarang)) {  
    echo '<option value="' . $dataBarang['kd_barang'] . '">' . $dataBarang['kd_barang'] . '=>' . $dataBarang['nm_barang'] . '</option>';  
    $jsArray .= "prdName['" . $dataBarang['kd_barang'] . "'] = {tot:'" . addslashes($dataBarang['tot']) . "',kd_barang:'" . addslashes($dataBarang['kd_barang']) . "', nama:'" . addslashes($dataBarang['nm_barang']) . "',satuan:'" . addslashes($dataBarang['tot']) . "',konversi:'" . addslashes($dataBarang['konversi']) . "',name:'" . addslashes($dataBarang['harga']) . "',desc:'".addslashes($dataBarang['stok'])."'};\n";  
}  
echo '</select>';  
?>  
<tr>
<td>Nama Barang</td>
<td> : </td>
<td>
<input disabled type=text name="txtNmBrg" id="nm_brg" value="" onFocus="startCalc();" onBlur="stopCalc();">
</td>
</tr>

<tr>
<td>Kebutuhan Per-Tahun</td>
<td> : </td>
<td>
<input type=text name="thn" id="satuan" value="" onFocus="startCalc();" onBlur="stopCalc();">
</td>
</tr>


<script type="text/javascript">  
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('nm_brg').value = prdName[id].nama;
document.getElementById('satuan').value = prdName[id].satuan;
document.getElementById('konversi').value = prdName[id].konversi;
document.getElementById('harga').value = prdName[id].name;
document.getElementById('stok').value = prdName[id].desc;
document.getElementById('tot').value = prdName[id].tot;

};
</script>
</td>
</tr>

<tr>
<td>Input EOQ</td>
</tr>
<tr>
<td>-----------</td>
</tr>


<tr>
<td>Biaya Simpan</td>
<td> : </td>
<td>
<input type=text name="txtBySimpan" value="" onFocus="startCalc();" onBlur="stopCalc();">
</td>
</tr>

<tr>
<td>Biaya Pesan</td>
<td> : </td>
<td>
<input type=text name="txtByPesan" value="" onFocus="startCalc();" onBlur="stopCalc();">
</td>
</tr>


<tr>
<td>Lama Pengiriman</td>
<td> : </td>
<td>
<input type=text name="txtByLama">
</td>
</tr>

<tr>
<td></td>
<td></td>
<td>
<input type="submit" name="PROSES" value="Proses" class="button blue">
<input type="reset" name="Batal" value="Batal " class="button green">
</td>
</tr>
</tr>
</table>
</form>
