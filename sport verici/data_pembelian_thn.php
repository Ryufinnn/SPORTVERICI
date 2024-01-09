
<?php
//koneksi ke server Database
include "./Config/Connect.php";
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$sql	= "SELECT month(pembelian.tgl)as bln,sum( detail_pembelian.subtotal ) AS pembelian
FROM pembelian, detail_pembelian, barang
WHERE pembelian.no_order = detail_pembelian.no_order
AND year( pembelian.tgl ) = '$_GET[thn]'
GROUP BY month(pembelian.tgl)";
$query  = mysql_query($sql);
echo "<graph caption='Grafik Jumlah pembelian Bulanan' xAxisName='Bulan' yAxisName='Jumlah pembelian Per Bulanan ' numberPrefix=''>";
$warna  = array('F6BD0F','8BBA00','FFFHGG','FF8E46','008E8E','D64646','8E468E');
$no = 0;
while($dataGrafik = mysql_fetch_array($query))
{
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln=$dataGrafik[bln];
$Kode_jurusan = $dataGrafik['pembelian'];
$Nama_jurusan = $nm_bulan[$bln];
echo "<set name='$Nama_jurusan' value='$dataGrafik[pembelian]' color='$warna[$no]'/>";
$no++;
}
echo "</graph>";
?>