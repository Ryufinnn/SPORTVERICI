<head>
<link rel="stylesheet" media="screen" href="css/table.css"/>
</head>
<div id="isi">

<form method=post>
<table border=1 id='table-a' align=center>
<tr>
  <th colspan=3>Penjualan Per-Tahun</th>
</tr>
<tr>
<td ><label> Tahun</label></td>
<td ><label> : </label></td>
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
<td><input name="cari" type="button" onclick='this.form.submit()' value="cari"></td></tr>

</table>
</form>


			<center>
			  <h3>Penjualan Tahun : <?php echo "$nm_bulan[$bulan]-$_POST[tahun] "; ?></h3>
			</center>
	
	
			<center>
			<a href='cetak_pendapatan_pertahun.php?tahun=<?php echo $_POST['tahun']?>'target=_blank><font color=red><b><u>Cetak</u> </b></font><img src="./images/cetak.png" height=15></a>
			<hr></hr>
			<table border=1  id="table-a" align=center>
					<tr bgcolor=#34a5cf>
						<th>No.</th>
						<th>Bulan</th>
						<th>Penjualan</th>
					</tr>
				
					<?php
						include  "./Config/Connect.php";
						
$sql3	= mysql_query("SELECT MONTH( penjualan.tgl ) AS bulan, SUM( penjualan.jml * barang.harga_jual ) AS penjualan
FROM penjualan, barang
WHERE penjualan.kd_barang = barang.kd_barang
AND YEAR( penjualan.tgl ) ='$_POST[tahun]'
GROUP BY MONTH( penjualan.tgl ) ");
$nomor	= $posisi + 1;
while($data3 = mysql_fetch_array($sql3))
{
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln=$data3[bulan];
echo "<tr>";
echo "<td align=center>$nomor</td>";
echo "<td align=center>$nm_bulan[$bln]</td>";
echo "<td align=center>$data3[penjualan]</td>";
$nomor++;
$tot=$tot+$data3[penjualan];
echo "</tr>";
}

echo"<tr><th colspan=2>Total Penjualan Tahun :$_POST[tahun]</th><td align= 'center'>$tot</td></tr>";
					?>
</center>
			</table>
			