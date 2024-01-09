<div id="isi">
<form method=post>
<table id=form align=center>
<tr>
  <th colspan=3> Grafik Pendapatan Per-Tahun Pada Tahun : <?php echo "$_POST[tahun]"; ?></th>
</tr>
<tr>
<td width=100><label>Tahun</label></td>
<td width=10><label> : </label></td>
<td>
<?php

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
		data: "data_penjualan_thn.php?thn=<?php echo"$_POST[tahun]"; ?>",
		dataFormat: "URIData"
	});
	</script>
	</center>