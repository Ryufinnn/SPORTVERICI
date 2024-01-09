

<table border=0 align=center width=600>
<tr><td rowspan=6 align=center></td><th>TOKO SPORT VERICI</th><td align=center></td></tr>
<tr><th><font size=1>Jl. Dr.Sutomo No.131, Padang</i></font></th></tr>
<tr><th><font size=1>Laporan Stok Pesediaan Barang</font></th></tr>
<tr><th><font size=2>Tanggal Cetak : <?php $tgl_sekarang = date('d M Y'); echo $tgl_sekarang ?></font></th></tr>

<tr><th bgcolor=#000 colspan=6></th></tr>


<table border=1 align=center width=600>
					<tr>
						<th>No.</th>
						<th>Kode Barang</th>
						<th>Nama Barang</th>
						<th>Satuan</th>
						<th>Harga Beli</th>
						<th>Harga Jual</th>
						<th>Jumlah Stok</th>
		</tr>
				
					<?php
						include "koneksi.php";
						
$sql3	= mysql_query("select * from barang order by kd_barang asc");
$nomor	= $posisi + 1;
while($data3 = mysql_fetch_array($sql3))
{

echo "<tr>";
echo "<td align=center>$nomor</td>";
echo "<td align=center>$data3[kd_barang]</td>";
echo "<td align=center>$data3[nm_barang]</td>";
echo "<td align=center>$data3[satuan]</td>";
echo "<td align=center>$data3[harga_beli]</td>";
echo "<td align=center>$data3[harga_jual]</td>";
echo "<td align=center>$data3[stok]</td>";


$nomor++;
$tot=$tot+$data3[stok];
echo "</tr>";
}

echo "<tr>";
echo "<td colspan=6 align='center'> <b>Total Stok  : $tgl_sekarang </b></td>";
echo "<th>$tot</th>";
echo "</tr>";
echo "</table>";

echo "	<br /><table align=right width=500><tr ><td  colspan=9>Hormat Kami</td></tr>";


echo "<tr><td height=100  colspan=9><b><u>Pimpinan</u></b></td></tr></table>";
			
		echo "</table>";
			?>
			