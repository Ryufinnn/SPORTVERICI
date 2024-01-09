
<?php
//koneksi ke server Database
include "./Config/Connect.php";
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$sql	= "SELECT month(penjualan.tgl)as bln,sum( detail_penjualan.subtotal ) AS penjualan
FROM penjualan, detail_penjualan, barang
WHERE penjualan.no_faktur = detail_penjualan.no_faktur

AND year( penjualan.tgl ) = '$_GET[thn]'
GROUP BY month(penjualan.tgl)";
$query  = mysql_query($sql);
echo "<graph caption='Grafik Jumlah Penjualan Tahunan' xAxisName='Bulan' yAxisName='Jumlah Penjualan erbulan' numberPrefix=''>";
$warna  = array('F6BD0F','8BBA00','FFFHGG','FF8E46','008E8E','D64646','8E468E');
$no = 0;
while($dataGrafik = mysql_fetch_array($query))
{
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln=$dataGrafik[bln];
$Kode_jurusan = $dataGrafik['penjualan'];
$Nama_jurusan = $nm_bulan[$bln];
echo "<set name='$Nama_jurusan' value='$dataGrafik[penjualan]' color='$warna[$no]'/>";
$no++;
}
echo "</graph>";
?>