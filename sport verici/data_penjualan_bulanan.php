
<?php
//koneksi ke server Database
include "./Config/Connect.php";
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$sql	= "SELECT (penjualan.tgl)as bln,sum( detail_penjualan.subtotal ) AS penjualan
FROM penjualan, detail_penjualan, barang
WHERE penjualan.no_faktur = detail_penjualan.no_faktur
AND month( penjualan.tgl ) =  '$_GET[bln]'
AND year( penjualan.tgl ) = '$_GET[thn]'
GROUP BY day(penjualan.tgl)";
$query  = mysql_query($sql);
echo "<graph caption='Grafik Jumlah Penjualan Harian' xAxisName='Tanggal' yAxisName='Jumlah Penjualan' numberPrefix=''>";
$warna  = array('F6BD0F','8BBA00','FFFHGG','FF8E46','008E8E','D64646','8E468E');
$no = 0;
while($dataGrafik = mysql_fetch_array($query))
{
$Kode_jurusan = $dataGrafik['penjualan'];
$Nama_jurusan = $dataGrafik['bln'];
echo "<set name='$Nama_jurusan' value='$dataGrafik[penjualan]' color='$warna[$no]'/>";
$no++;
}
echo "</graph>";
?>