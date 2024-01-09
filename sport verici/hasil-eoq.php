<?php
$stok=$_POST[stok];
$thn=$_POST[thn];
$stok=$_POST[stok];
$bs=$_POST[txtBySimpan];
$bp=$_POST[txtByPesan];
$kdbarang=$_POST[txtKdBrg];
$lama=$_POST[txtByLama];

$permintaan_perhari=$thn/350;
$stok_minimum=$permintaan_perhari*$lama;

include"koneksi.php";
$cek=mysql_query("select * from tb_eoq where kd_barang='$kdbarang'");
if((mysql_num_rows($cek))>0){
$sqlEoq = mysql_query("update tb_eoq set kb_tahun='$thn',biaya_simpan='$bs',biaya_pesan='$bp',jml_pesan=round(sqrt((2*($bp * $thn))/($bs))),interfal=round((sqrt((2*$bp)/($bs * $thn))*350)),lama_pengiriman='$lama',stok_minimum='$stok_minimum' WHERE kd_barang='$kdbarang'");

}
else{

$sqlEoq = mysql_query("insert into tb_eoq values ('$kdbarang','$thn','$bs','$bp',round(sqrt((2*($bp * $thn))/($bs))),round((sqrt((2*$bp)/($bs * $thn))*350)),'$lama','$stok_minimum')");

}

$r=mysql_fetch_array(mysql_query("select * from tb_eoq where kd_barang='$kdbarang'"));

?>

<form align=center>
<table border=0 align='center' width=800 face=Constantia>
<tr>
<td>Hasil EOQ</td>
</tr>
<tr>
<td>-----------</td>
</tr>


<tr>
<td>Kode Barang</td>
<td> : </td>
<td>
<?php echo"$r[kd_barang]"; ?>
</td>
</tr>


<tr>
<td>Kebutuhan Per-Tahun</td>
<td> : </td>
<td>
<?php echo"$r[kb_tahun]"; ?>
</td>
</tr>


<tr>
<td>Biaya Pesan</td>
<td> : </td>
<td>
<?php echo"$r[biaya_pesan]"; ?>
</td>
</tr>


<tr>
<td>Biaya Sim pan</td>
<td> : </td>
<td>
<?php echo"$r[biaya_simpan]"; ?>
</td>
</tr>

<tr>
<td>Jumlah Pesan Ekonomis / Hari</td>
<td> : </td>
<td>
<?php echo number_format($r[jml_pesan],0,',','.') ; ?>
</td>
</tr>


<tr>
<td>Interval / Unit</td>
<td> : </td>
<td>
<?php echo $r[interfal]; ?>
</td>
</tr>

<tr>
<td>Permintaan Perhari</td>
<td> : </td>
<td>
<?php echo number_format($permintaan_perhari,0,',','.'); ?>
</td>
</tr>

<tr>
<td>Lama Pengiriman</td>
<td> : </td>
<td>
<?php echo $lama; ?>
</td>
</tr>

<tr>
<td>Stok Minimum</td>
<td> : </td>
<td>
<?php echo number_format($stok_minimum,0,',','.'); ?>
</td>
</tr>

<tr></tr>
<tr>
 <td><a href="menu_gudang?=">
        <input type="submit" name="module" value="kembali"  title="Kembali" class="button green">
		</a>
      </td>
</tr>
	  </table>
</form>
