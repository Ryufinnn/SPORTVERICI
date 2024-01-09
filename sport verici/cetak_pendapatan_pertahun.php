<?php
if(!$_GET['tahun']=="" ){
$tahun=$_GET['tahun'];



$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
include"./Config/Connect.php";


}
?>
<table>
<table border=0 align=center width=500>
<tr><td rowspan=3 align=center></td><th>TOKO SPORT VERICI</th><td rowspan=3 align=center></td></tr>
<tr><th><font size=2>Jl. Dr.Sutomo No.131, Padang</font></th></tr>
<tr>
  <th><font size=2>Pendapatan Tahun : <?php echo $tahun ?></font></th>
</tr>


<tr><th bgcolor=#000 colspan=3></th></tr>

</table>
<table border=1 align=center width=500>
					<tr>
						<th>No.</th>
						<th>Bulan</th>
						<th>Pendapatan</th>
					</tr>
				
					<?php
						include "koneksi.php";
						
$sql3	= mysql_query("SELECT MONTH( penjualan.tgl ) AS bulan, SUM( penjualan.jml * barang.harga_jual ) AS penjualan
FROM penjualan, barang
WHERE penjualan.kd_barang = barang.kd_barang
AND YEAR( penjualan.tgl ) =  '$tahun'

GROUP BY MONTH( penjualan.tgl ) ");
$nomor	= $posisi + 1;
while($data3 = mysql_fetch_array($sql3))
{
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln=$data3[bulan];
$jual=$data3[penjualan];
echo "<tr>";
echo "<td align=center>$nomor</td>";
echo "<td align=center>$nm_bulan[$bln]</td>";
echo "<td align=right>Rp.";
echo  number_format($jual,2,',','.');
echo"</td>";
$nomor++;
$tot=$tot+$data3[penjualan];
echo "</tr>";
}


echo "<tr>";
echo "<td colspan=2 align='right'> <b>Total Penjualan Tahun : $tahun </b></td>";
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
			