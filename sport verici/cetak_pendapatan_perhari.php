<?php
if(!$_GET['tahun']=="" & !$_GET['bulan']=="" ){
$tahun=$_GET['tahun'];
$bulan=$_GET['bulan'];
$tanggal=$_GET['tanggal'];


$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
include"./Config/Connect.php";
echo"<body onload='javascript:window:print()'>";

}
?>
<table>
<table border=0 align=center width=500>
<tr><td rowspan=3 align=center></td><th>TOKO SPORT VERICI</th><td rowspan=3 align=center></td></tr>
<tr><th><font size=1><i>Jl. Dr.Sutomo No.131, Padang</i></font></th></tr>
<tr><th><font size=2>Pendapatan Tanggal : <?php echo " $tanggal-$nm_bulan[$bulan] - $tahun"; ?></font></th></tr>


<tr><th bgcolor=#000 colspan=3></th></tr>

</table>
<table border=1 align=center width=500>
					<tr>
						<th>No.</th>
						<th>No Faktur</th>
						<th>Kode Barang </th>
						<th>Nama barang</th>
							<th>Jumlah</th>
						<th> Total</th>
					</tr>
				
					<?php
						include "koneksi.php";
						
$sql3	= mysql_query("SELECT penjualan_sales.no_faktur AS faktur, barang.kd_barang, barang.nm_barang, penjualan_sales.jml , penjualan_sales.jml*barang.harga_jual AS penjualan
FROM penjualan_sales , barang
WHERE penjualan_sales.kd_barang=barang.kd_barang
and day (penjualan_sales.tgl)= '$tanggal'
AND YEAR( penjualan_sales.tgl ) =  '$tahun'
AND MONTH( penjualan_sales.tgl ) =  '$bulan'
 order by penjualan_sales.no_faktur ");
$nomor	= $posisi + 1;
$kdp="";
while($data3 = mysql_fetch_array($sql3))
{
$nm_bulan= array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln=$data3[bulan];

echo "<tr>";
echo "<td align=center>$nomor</td>";

if($data3[faktur]!=$kdp){
echo"<td>$data3[faktur]</td>";
echo"<td>$data3[kd_barang]</td>";
echo"<td>$data3[nm_barang]</td>";
echo"<td>$data3[jml]</td>";
$kdp=$data3[faktur];
}else{
echo"<td></td>";
echo"<td>$data3[kd_barang]</td>";
echo"<td>$data3[nm_barang]</td>";
echo"<td>$data3[jml]</td>";
$kdp=$data3[faktur];
}
$jual =$data3[penjualan];
echo "<td align=right>Rp.";
echo  number_format($jual,2,',','.');
echo"</td>";
$nomor++; 
$tot=$tot+$data3[penjualan];
echo "</tr>";
}


echo "<tr>";
echo "<td colspan=5 align='center'> <b>Total Pendapatan Tanggal :$tanggal $nm_bulan[$bulan] $tahun </b></td>";
echo "<th><font>Rp. ";
echo number_format($tot,2,',','.');
echo "</th>";
echo "</tr>";
echo "</table><table align=center width=400>";


$tgl_sekarang = date('d M Y');
echo "<tr><td colspan=3 align='right'>Padang, $tgl_sekarang</td></tr>";
echo "<tr><td colspan=3 align='right'><em>dto,</em></td></tr>";
echo "<tr><td colspan=3 align='right'><b><u>Pimpinan</u></b></td></tr>";
			?>		
		</table>
			