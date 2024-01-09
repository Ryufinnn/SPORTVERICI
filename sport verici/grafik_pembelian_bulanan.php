<div id="isi">
<form method=post>
<table id=form align=center>

<tr><th colspan=3>Grafik Pembelian Per-Hari Pada Bulan : <?php echo "$_POST[bulan]"; ?> / <?php echo "$_POST[tahun]"; ?> </th></tr>
<tr>
<td width=100><label>Bulan / Tahun</label></td>
<td width=10><label> : </label></td>
<td>
<?php
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bulan=$_POST[bulan];
echo "<select name='bulan'>
<option value=0>-Pilih Bulan-</option>";
for($bln=1; $bln<=12; $bln++)
{
echo "<option value=$bln>$nm_bulan[$bln]</option>";
}
echo "</select>";

$tahun_skrg = date('Y');
$thn=$_POST[tahun];
echo "<select name='tahun'>
<option value=0>-Pilih Tahun-</option>";
for ($thn=2014; $thn<=$tahun_skrg; $thn++)
{
echo "<option value=$thn>$thn</option>";
}
echo "</select>";

?>

</td>
</tr>
<tr><td></td><td></td>
<td><input name="cari" type="button" onclick='this.form.submit()' value="Lihat Grafik"></td></tr>
</table>

</form>


<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/jquery.fusioncharts.js"></script>
<style type="text/css">
</style>
<body>
	<center>

	<span id="myChart1Container"></span>
	<script type="text/javascript">
	$('#myChart1Container').insertFusionCharts({
		swfPath: "Charts/",
		id: "chart1",
		width: "600",
		height: "400",		
		type: "Column3D",
		data: "data_pembelian_bulanan.php?bln=<?php echo"$_POST[bulan]"; ?>&thn=<?php echo"$_POST[tahun]"; ?>",
		dataFormat: "URIData"
	});
	</script>
	</center>
