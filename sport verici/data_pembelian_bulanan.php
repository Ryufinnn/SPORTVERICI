
<?php
//koneksi ke server Database
include "./Config/Connect.php";
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$sql	= "SELECT (pembelian.tgl)as bln,sum( detail_pembelian.subtotal ) AS pembelian
FROM pembelian, detail_pembelian, barang
WHERE pembelian.no_order = detail_pembelian.no_order
AND month( pembelian.tgl ) = '$_GET[bln]'
AND year( pembelian.tgl ) = '$_GET[thn]'
GROUP BY day(pembelian.tgl)";
$query  = mysql_query($sql);
echo "<graph caption='Grafik Jumlah pembelian Harian' xAxisName='Tanggal' yAxisName='Jumlah pembelian' numberPrefix=''>";
$warna  = array('F6BD0F','8BBA00','FFFHGG','FF8E46','008E8E','D64646','8E468E');
$no = 0;
while($dataGrafik = mysql_fetch_array($query))
{

$Kode_jurusan = $dataGrafik['pembelian'];
$Nama_jurusan = $dataGrafik['bln'];
echo "<set name='$Nama_jurusan' value='$dataGrafik[pembelian]' color='$warna[$no]'/>";
$no++;
}
echo "</graph>";
?>