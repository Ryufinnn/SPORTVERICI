<?php
if(!$_GET['tahun']=="" & !$_GET['bulan']=="" ){
$tahun=$_GET['tahun'];
$bulan=$_GET['bulan'];



$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
include"./Config/Connect.php";


}
?>
<table>
<table border=0 align=center width=700>
<tr><td rowspan=3 align=center></td><th>TOKO SPORT VERICI</th><td rowspan=3 align=center></td></tr>
<tr><th><font size=1>Jl. Dr.Sutomo No.131, Padang</font></th></tr>
<tr><th><font size=2>Pembelian Bulan : <?php echo"$nm_bulan[$bulan] - $tahun"; ?></font></th></tr>
<tr><th bgcolor=#000 colspan=3></th></tr>
 <tr> <hr> </hr>
</tr>
<tr>
</tr>
</table>
<table border=1 align=center width=700>
					<tr>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Jumlah beli</th>
					</tr>
				
					<?php
						include "koneksi.php";
						
$sql3	= mysql_query("SELECT day( pembelian.tgl ) AS hari, SUM( pembelian.jml * barang.harga_beli ) AS pembelian
FROM pembelian, barang
WHERE 
pembelian.kd_barang=barang.kd_barang 
And MONTH( pembelian.tgl) ='$bulan'
AND YEAR( pembelian.tgl) ='$tahun' 
group by day (pembelian.tgl)");
$nomor	= $posisi + 1;
while($data3 = mysql_fetch_array($sql3))
{
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln=$data3[bulan];
$beli=$data3[pembelian];
echo "<tr>";
echo "<td align=center>$nomor</td>";
echo "<td align=center>$data3[hari]</td>";

echo "<td align=right>Rp.";
echo  number_format($beli,2,',','.');
echo"</td>";

$nomor++;
$tot=$tot+$data3[pembelian];
echo "</tr>";
}

echo "<tr>";
echo "<td colspan=2 align='right'> <b>Total Pembelian Bulan : $nm_bulan[$bulan]-$tahun </b></td>";
echo "<th><font>Rp. ";
echo number_format($tot,2,',','.');
echo "</th>";
echo "</tr>";
echo "</table><table align=center width=400>";


$tgl_sekarang = date('d M Y');
echo "<tr><td colspan=3 align='right'>Hormat Kami</td></tr>";
echo "<tr><td colspan=3 align='right'><em>dto,</em></td></tr>";
echo "<tr><td colspan=3 align='right'><b><u>Pimpinan</u></b></td></tr>";
			?>		
		</table>
			