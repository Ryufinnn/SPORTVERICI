
<?php
include "Config/Connect.php";
	  $q="SELECT * FROM penjualan ";
	  $res=mysql_query($q) or die(mysql_error());
	  $r=mysql_fetch_array($res);
	  echo "<th><center>TOKO SPORT VERICI</center><th>";
	  echo "<th><center>Jl. Dr.Sutomo No.131, Padang</center></th>";
	  	  echo "<th><center>Faktur Penjualan</center><th>";
	  echo "<hr></hr>";
	  ?>
  <table width="120%" border="0" cellspacing="2" cellpadding="2">
  <tr>
	<tr>
	<td>No. Faktur    :<?php echo"$r[no_faktur]"; ?></td> </tr>
	<tr><td>Tanggal Faktur :<?php echo"$r[tgl]"; ?></td>  </tr>
		<td width="10%"  valign="top" height="5%">
			
		</td>
		
		
		<td width="10%" align="left" valign="top">
		
	
  </table>
  <table border=1 width="100%" cellspacing="0" cellpadding="">
	<tr>
		<td width="5%" align="center">No</td>
		<td width="14%" align="center">Kode Barang</td>
		<td width="39%" align="center">Nama Barang</td>
		<td width="14%" align="center">Jumlah </td>
		<td width="14%" align="center">Harga </td>
		<td width="20%" align="center">Total</td>
	</tr>
	<?php
	include "Config/Connect.php";
	  $q1="SELECT p.*,b.* from penjualan p, barang b where p.kd_barang=b.kd_barang and p.no_faktur ='$_GET[idjual]'";
 
  $res=mysql_query($q1,$conn) or die(mysql_error());
  $no=1;
  while($row=mysql_fetch_array($res))
  {
  ?>
    <tr>
		<td align="center"><?php echo $no; ?></td>
		<td align=right><?php echo $row['kd_barang']; ?></td>
		<td align=right><?php echo $row['nm_barang']; ?></td>
		<td align=right><?php echo $row['jml']; echo "<input type='hidden' name='b9' id='b9' class='tb6' value='$row[jml]'>"; ?></td>
		<td align=right> Rp. <?php  echo $row['harga_jual']; ?></td>
		
		<?php $tot=$row['harga_jual']*$row['jml']  ?>
		
		<td align="right"> Rp. <?php echo number_format($tot,2,',','.'); ?></td>
		
		<?php $total=$total+$tot;  ?>
    </tr>
<?php 
$no++;
	}
?>
	<tr>
		<td colspan="5" align="center">TOTAL KESELURUHAN</td>
		<td align="right"> Rp. <?php echo number_format($total,2,',','.'); ?></td>
	</tr>
	
  </table>
  <table border=0 align=right>
  <br />
	<tr><td colspan="7"></td></tr>
	<tr>
		<td colspan="4" align="center"></td><td colspan="2" align="center">Hormat Kami,<br><br><br><br><br>(Pimpinan )</td>
	</tr>
  </table>
  <br>
</body>