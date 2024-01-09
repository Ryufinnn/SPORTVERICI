
<?php
//koneksi ke server Database
include "./Config/Connect.php";
$sql	= "SELECT penjualan.tgl, sum( detail_penjualan.subtotal ) AS penjualan
FROM penjualan, detail_penjualan, barang
WHERE penjualan.no_faktur = detail_penjualan.no_faktur
AND month( penjualan.tgl ) = '06'
AND year( penjualan.tgl ) = '2015'
GROUP BY penjualan.tgl";
$query  = mysql_query($sql);
echo "<graph caption='Grafik Jumlah Penjualan Harian' xAxisName='Tanggal' yAxisName='Jumlah Penjualan' numberPrefix=''>";
$warna  = array('F6BD0F','8BBA00','FFFHGG','FF8E46','008E8E','D64646','8E468E');
$no = 0;
while($dataGrafik = mysql_fetch_array($query))
{
$Kode_jurusan = $dataGrafik['penjualan'];
$Nama_jurusan = $dataGrafik['tgl'];
echo "<set name='$Nama_jurusan' value='$dataGrafik[penjualan]' color='$warna[$no]'/>";
$no++;
}
echo "</graph>";
?>