<?php
error_reporting(0);

switch($_GET[aksi]){

default:
if($_POST[b1]!=""){
$nofak=$_POST[b1];
}elseif($_GET[nofak]!=""){
$nofak=$_GET[nofak];
}elseif($_POST[nofak]!=""){
$nofak=$_POST[nofak];
}
?>
<script src="./js/jsDate/Scripts/DateTimePicker.js" type="text/javascript"></script>

<div align=center><th>EDIT SALES AMBIL BARANG</th></div>
<hr>
<form method=post action="menu_gudang.php?module=editambil">
 
 <table width="100%" border="0" cellspacing="6" cellpadding="6" bgcolor="#dedede">
  <tr>
      <td width="4%" align="left" valign="top">No. Faktur  
	  </td>
      <td width="28%" align="left" valign="top"><label for="b8"></label>
	  
     <input type="text" name="nofak" id="b1" value="<?php echo"$nofak"; ?>" class="tb6">
	 
        <input type="submit" name="button5" value="Cari"></td>
	
		<?php
if($_POST[nofak]!=""){

	  include "./Config/Connect.php";
	  $query=mysql_query("select * from pengambilanbarang where no_bukti='$nofak'");
	  
$del=mysql_query("delete from order_tmp");
while($data=mysql_fetch_array($query)){


$qu=mysql_query("insert into order_tmp values('$data[kd_barang]','$data[jml]')");


}
}
?>
     </tr>
	 </table>
</form>

<form name="form1" method="post" action="">

  <table width="100%" border="0" cellspacing="6" cellpadding="6" bgcolor="#dedede">
    <tr>
      <td width="13%" align="left" valign="top">  
	  </td>
      <td width="28%" align="left" valign="top"><label for="b8"></label>
	  
     <input type="text" name="b1" id="b1" class="tb6" value="<?php echo"$nofak"; ?>" hidden=hidden></td>
      <td width="20%" align="left" valign="top">&nbsp;</td>
      
      <td width="39%" align="left" valign="top"><label for="b6"></label>        <label for="b4"></label></td>
	  
	  
    </tr>
    <tr>
      <td align="left" valign="top">Barang</td>
      <td align="left" valign="top"> &nbsp;<select name="b3" id="b3" class="tb6" onchange="submit()">
      <?php
	  include "./Config/Connect.php";
	  if(isset($_POST[b3]))
	  {
		  $q="Select * from barang where kd_barang='".$_POST[b3]."'";
		  $res=mysql_query($q) or die(mysql_error());
		  $row=mysql_fetch_array($res);
		  echo ' <option value="'.$row['kd_barang'].'">'.$row['nm_barang'].'</option>';		  
	  } else if(isset($_GET[id]))
	  {
		  $q="Select * from barang where kd_barang='".$_GET[id]."'";
		  $res=mysql_query($q) or die(mysql_error());
		  $row=mysql_fetch_array($res);
		  echo ' <option value="'.$row['kd_barang'].'">'.$row['nm_barang'].'</option>';		  
	  }
	  ?>
      <option value="" disabled="disabled">----</option>
         <?php
         include "./Config/Connect.php";
	  $q="Select * from barang where stok > 0";
	  $res=mysql_query($q) or die(mysql_error());
	  while($row=mysql_fetch_array($res))
	  {
	  ?>
        <option value="<?php echo $row['kd_barang']; ?>"><?php echo $row['nm_barang']; ?></option>
        <?php
	  }
		?>
      </select></td>
	  </tr>
	  
	  <tr>
      <td align="left" valign="top">Jumlah</td>
      <?php
	  $q="";
	  if(isset($_POST[b3]))
	  {
		  $q="Select * from barang where kd_barang='".$_POST[b3]."'";
	  }else{
	  $q="Select * from barang where stok > 0";
	  }
	  $res=mysql_query($q,$conn) or die(mysql_error());
	  $row=mysql_fetch_array($res);
	  ?>
      <td align="left" valign="top"><input type="text" name="b5" id="b5" class="tb6">
      <input type="hidden" name="tmpstok" id="tmpstok" value="<?php echo $row['stok']; ?>" />
      <input type="hidden" name="tmpharga" id="tmpharga" value="<?php echo $row['harga_beli']; ?>" /><p>Tersedia <?php echo $row['stok']; ?></td>
    </tr>
	<tr>
	<td align="left" valign="top"><input type="submit" class ="button blue" name="button" id="button" value="Tambahkan"></td>
    </tr>
	<tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
  
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
  <link rel="stylesheet" media="screen" href="css/table.css"/>
  <table width="100%" border="1" cellspacing="0" cellpadding="0"  id="table-1">
    <tr>
      <td width="14%">Kode Barang</td>
      <td width="25%">Nama Barang</td>
      <td width="14%">Harga Beli</td>
      <td width="14%">Jumlah</td>
      <td width="20%">Sub Total</td>
      <td width="20%">Aksi</td>
    </tr>
	
     <?php
 
  $q1="SELECT order_tmp.kd_barang, barang.nm_barang,order_tmp.jml,barang.harga_beli
FROM order_tmp LEFT JOIN barang ON order_tmp.kd_barang = barang.kd_barang";
 
  $res=mysql_query($q1,$conn) or die(mysql_error());
  while($row=mysql_fetch_array($res))
  {
  ?>
    <tr>
      <td><?php echo $row['kd_barang'];?> </td>
      <td><?php echo $row['nm_barang']; ?></td>
      <td><?php echo $row['harga_beli']; ?></td>
      <td><?php echo $row['jml'];?> </td>
	  <td align=left><?php $tot=$row['harga_beli']*$row['jml']; echo"$tot"; echo "<input type='hidden' name='b9' id='b9' class='tb6' value='$row[jml]'>"; ?></td>
     
      <td><a href="?module=editambil&act=hapus&nofak=<?php echo"$nofak"; ?>&id=<?php echo $row['kd_barang']; ?>" title="Klik Disini Untuk Hapus Data "><img src='./Images/delete.png'></a></td>
	  
   
    <?php
  }
  ?>
  
  <?php
 
  $q2="SELECT order_tmp.kd_barang, SUM( order_tmp.jml * barang.harga_beli ) AS tt
FROM barang, order_tmp
WHERE order_tmp.kd_barang = barang.kd_barang";
 
  $re=mysql_query($q2,$conn) or die(mysql_error());
  while($rq=mysql_fetch_array($re))
  {
  ?>
    <tr>
      <td colspan="4" align="center">TOTAL</td>
     
      <td><?php echo $rq['tt']; ?></td>
      <td><input type="hidden" name="total" id="total" value="<?php echo $row['tt']; ?>" /></td>
    </tr>
	  
   
    <?php
  }
  ?>
  
	 </table>
	<hr></hr>
   	<table  cellspacing=1>
    <tr>
	  
      <td >Nama Sales </td>
	     
<td>
<select name='b6'>
<?php
include "koneksi.php";
if(! $_POST['nofak']=="")
{
$sqlUbah   = "select * from pengambilanbarang where no_bukti='$nofak'";
$queryUbah = mysql_query($sqlUbah);
$data1	   = mysql_fetch_array($queryUbah);
$b6=$data1[kd_sales];
}elseif($_GET[nofak]!=""){
$sqlUbah   = "select * from pengambilanbarang where no_bukti='$nofak'";
$queryUbah = mysql_query($sqlUbah);
$data1	   = mysql_fetch_array($queryUbah);
$b6=$data1[kd_sales]; 

}elseif($_POST[nofak]!=""){
$sqlUbah   = "select * from pengambilanbarang where no_bukti='$nofak'";
$queryUbah = mysql_query($sqlUbah);
$data1	   = mysql_fetch_array($queryUbah);
$b6=$data1[kd_sales];
}
elseif($_POST[b1]!=""){
$sqlUbah  = "select * from pengambilanbarang where no_bukti='$nofak'";
$queryUbah = mysql_query($sqlUbah);
$data1	   = mysql_fetch_array($queryUbah);
$b6=$data1[kd_sales];
}

$sqlpelanggan 	= "select * from sales  order by kd_sales ASC";
$querypelanggan	= mysql_query($sqlpelanggan);
while($data1    = mysql_fetch_array($querypelanggan))
{
if($b6=="")
{
echo "<option value=0 selected>-Pilih Kode Sales-</option>";
}
elseif ($b6==$data1[kd_sales])
{
echo "<option value= $data1[kd_sales] selected > $data1[kd_sales] $data1[nm_sales]</option>";
}
else
{
echo "<option value=  $data1[kd_sales]> $data1[kd_sales]  $data1[nm_sales]</option>";
}
}	
?>
</select>
</td>
	  
    </tr>

	
    <tr>
      <td>Tanggal Ambil</td>
<td>
	   <?
	 $query3=mysql_query("select pel.*,p.* from pengambilanbarang p,sales pel where pel.kd_sales=p.kd_sales and no_bukti='$nofak'");
	 $r7=mysql_fetch_array($query3);
	
	 ?>
	 
	  <input type="text" name="b4" id="b4" class="tb6" value="<?php echo"$r7[tgl_ambil]"; ?>">
	  
      <img src="./images/b_calendar.png" style="cursor: pointer;" onclick="javascript:NewCssCal('b4','yyyyMMdd')" /></td>
      </tr>
	  
	  <tr>
	  <td><a href="menu_gudang.php?module=editambil'"></a>
        <input type="submit" name="button2" class="button blue" id="button2" value="Edit Bukti" target=_blank>
      </td>

     	  <td><input type="submit" name="buttonhapus" class="button red" value="Hapus">
      <input type="submit" name="button3"  class="button green" id="button3" value="Batal" ></td>
      </tr>
    
 	</table>
</form>

<?php
include "./Config/Connect.php";
if($_GET['act']=="hapus")
{
	$q="Delete from order_tmp where kd_barang='".$_GET[id]."'";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=editambil&nofak=$_GET[nofak]'>";
		}
}
?>


<?php
if($_POST[button])
{

	$_SESSION['tgl_temp']=$tgl_temp;
	$q="Select * from order_tmp where kd_barang='".$_POST[b3]."'";
	$res=mysql_query($q,$conn) or die(mysql_error());
	$trow=mysql_num_rows($res);
	$jj=$_POST['b5'];
	$hrg=$_POST['tmpharga'];
	$st=$jj*$hrg;
	if($trow==0)
	{
		$q="Insert into order_tmp values ('".$_POST[b3]."','".$_POST[b5]."')";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=editambil&nofak=$nofak'>";
		}
	}else{
	
		$q="Update order_tmp set jml=jml + ".$_POST[b5]." where kd_barang='".$_GET[b3]."'";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=editambil&nofak=$nofak'>";
		}
	}
	
}
?>


<?php
if($_POST[button3])
{
	$q="Delete from order_tmp";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=editambil'>";
		}
}
?>



<?php
include "./Config/Connect.php";
if($_POST[buttonhapus])
{
	if($_POST[b4]=="" || $_POST[b6]=="" )
	{
		echo "<script>alert('Lengkapi data Pengambilan Barang')</script>";
	}else{
		$q="Select * from order_tmp";
		$res=mysql_query($q) or die(mysql_error());
		$trow=mysql_num_rows($res);
		if($trow==0)
		{
			echo "<script>alert('Data Pengambilan Barang belum ada')</script>";
		}else{
		
				$delete=mysql_query("delete from pengambilanbarang where no_bukti='$_POST[b1]'");				
			
			include "Config/Connect.php";
			if($delete)
			{
			include "Config/Connect.php";
				$qdt="Delete from order_tmp";
				$resdt=mysql_query($qdt) or die(mysql_error());
				if($resdt)
			{
			echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=editambil'>";
				echo "<script>alert('Data Berhasil DiHapus')</script>";
			     }
			
			}
		}
	}
}


?>

<?php
include "./Config/Connect.php";
if($_POST[button2])
{
	if($_POST[b4]=="" || $_POST[b6]=="" )
	{
		echo "<script>alert('Lengkapi data Pengambilan Barang')</script>";
	}else{
		$q="Select * from order_tmp";
		$res=mysql_query($q) or die(mysql_error());
		$trow=mysql_num_rows($res);
		if($trow==0)
		{
			echo "<script>alert('Data Pengambilan Barang belum ada')</script>";
		}else{
		
				$delete=mysql_query("delete from pengambilanbarang where no_bukti='$_POST[b1]'");
			$t="Select * from order_tmp";
			$rest=mysql_query($t,$conn) or die(mysql_error());
			while($rowt=mysql_fetch_array($rest))
			{
			
				$qdp="Insert into pengambilanbarang values ('$_POST[b1]','$_POST[b4]','$_POST[b6]','$rowt[kd_barang]','$rowt[jml]')";
			
				$resdp=mysql_query($qdp,$conn) or die(mysql_error());
				//$qub="Update barang set stok=stok + '".$rowt['jml']."' Where kd_barang='".$rowt['kd_barang']."'";
				//$resub=mysql_query($qub,$conn) or die("Error update ".mysql_error());
			}
				
			
			include "Config/Connect.php";
			if($resdp)
			{
			include "Config/Connect.php";
				$qdt="Delete from order_tmp";
				$resdt=mysql_query($qdt) or die(mysql_error());
				if($resdt)
			{
			echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=editambil&aksi=selesai-edit-ambil&idambil=$_POST[b1]'>";
			     }
			
			}
		}
	}
}


?>
<?php
break;
case"selesai-edit-ambil":

include "Config/Connect.php";
	  $q="SELECT * FROM pengambilanbarang  where no_bukti='$_GET[idambil]' ORDER BY no_bukti";
	  $res=mysql_query($q) or die(mysql_error());
	  	  while($r=mysql_fetch_array($res)){ 		
 echo"<p><img src='./images/cetak.png' height=15><a href='cetak-ambilbarang.php?id=$r[no_bukti]' target='_blank' /><font color=red>Cetak</font></a></tr>";
echo "<h3>Detail Pengambilan Barang</h3><hr>";

	  ?>
	  <link rel="stylesheet" media="screen" href="css/table.css"/>
  <table width="100%" border="1" cellspacing="6" cellpadding="6" bgcolor="#dedede"id='table-a' >
	<tr>
	
		<td width="10%" align="left" valign="top">No.Bukti<br/><br/>Tanggal Faktur<br></td>
		<td width="10%" align="left" valign="top">
			<input type="text" name="b1" id="b1" class="tb6" value="<?php echo $r['no_bukti']; ?>"><br/><br/>
			<input type="text" name="b1" id="b1" class="tb6" value="<?php echo $r['tgl_ambil']; ?>"><br/><br/>
			
		</td>
	</tr> 
  </table>
  <table width="100%" cellspacing="3" cellpadding="3" id='table-a'>
	<tr>
		<td width="5%" align="center">No</td>
		<td width="14%">Kode Barang</td>
		<td width="39%">Nama Barang</td>
		<td width="14%">Jumlah </td>
		<td width="14%">Harga </td>
		<td width="20%">Total</td>
	</tr>
	<?php
	include "Config/Connect.php";
	  $q1="SELECT p.*,b.* from pengambilanbarang p, barang b where p.kd_barang=b.kd_barang and p.no_bukti ='$_GET[idambil]'";
 
  $res=mysql_query($q1,$conn) or die(mysql_error());
  $no=1;
  while($row=mysql_fetch_array($res))
  {
  ?>
    <tr>
		<td align="center"><?php echo $no; ?></td>
		<td><?php echo $row['kd_barang']; ?></td>
		<td><?php echo $row['nm_barang']; ?></td>
		<td><?php echo $row['jml']; echo "<input type='hidden' name='b9' id='b9' class='tb6' value='$row[jml]'>"; ?></td>
		<td><?php echo $row['harga_beli']; ?></td>
	   <td ><?php $tot=$row['harga_beli']*$row['jml']; echo"$tot";?> </td>
		<?php $total=$total+$tot;  ?>
    </tr>
<?php 
$no++;
	}
?>
	<tr>
		<td colspan="5" align="center">TOTAL</td>
		<td><?php echo "$total"; ?></td>
	</tr>
	<tr><td colspan="7"></td></tr>
	
	<tr>
	
		<td colspan="4" align="center"></td><td colspan="2" align="center">Hormat Kami,<br><br><br><br><br>( Pimpinan )</td>
	</tr>
  </table>
  <br>

<?php
}
break;

case "selesai-penjualan":
include "Config/Connect.php";
	  $q="SELECT * FROM penjualan_sales where no_faktur='$_GET[idjual]' ORDER BY no_faktur";
	  $res=mysql_query($q) or die(mysql_error());
	  while($r=mysql_fetch_array($res)){ 		
 echo"<p><img src='./images/cetak.png' height=15><a href='cetak-penjualan.php?idjual=$r[no_faktur]' target='_blank' /><font color=red>Cetak</font></a></tr>";
echo "<h3>Detail Penjualan</h3><hr>";

	  ?>
	  <link rel="stylesheet" media="screen" href="css/table.css"/>
  <table width="100%" border="1" cellspacing="6" cellpadding="6" bgcolor="#dedede"id='table-a' >
	<tr>
	
		<td width="10%" align="left" valign="top">No.Faktur<br/><br/>Tanggal Faktur<br></td>
		<td width="10%" align="left" valign="top">
			<input type="text" name="b1" id="b1" class="tb6" value="<?php echo $r['no_faktur']; ?>"><br/><br/>
			<input type="text" name="b1" id="b1" class="tb6" value="<?php echo $r['tgl']; ?>"><br/><br/>
			
		</td>
	</tr> 
  </table>
  <table width="100%" cellspacing="3" cellpadding="3" id='table-a'>
	<tr>
		<td width="5%" align="center">No</td>
		<td width="14%">Kode Barang</td>
		<td width="39%">Nama Barang</td>
		<td width="14%">Jumlah </td>
		<td width="14%">Harga </td>
		<td width="20%">Total</td>
	</tr>
	<?php
	include "Config/Connect.php";
	  $q1="SELECT p.*,b.* from penjualan_sales p, barang b where p.kd_barang=b.kd_barang and p.no_faktur ='$_GET[idjual]'";
 
  $res=mysql_query($q1,$conn) or die(mysql_error());
  $no=1;
  while($row=mysql_fetch_array($res))
  {
  ?>
    <tr>
		<td align="center"><?php echo $no; ?></td>
		<td><?php echo $row['kd_barang']; ?></td>
		<td><?php echo $row['nm_barang']; ?></td>
		<td><?php echo $row['jml']; echo "<input type='hidden' name='b9' id='b9' class='tb6' value='$row[jml]'>"; ?></td>
		<td><?php echo $row['harga_jual']; ?></td>
	   <td ><?php $tot=$row['harga_jual']*$row['jml']; echo"$tot";?> </td>
		<?php $total=$total+$tot;  ?>
    </tr>
<?php 
$no++;
	}
?>
	<tr>
		<td colspan="5" align="center">TOTAL</td>
		<td><?php echo "$total"; ?></td>
	</tr>
	<tr><td colspan="7"></td></tr>
	
	<tr>
	
		<td colspan="4" align="center"></td><td colspan="2" align="center">Hormat Kami,<br><br><br><br><br>( Pimpinan )</td>
	</tr>
  </table>
  <br>

<?php

break;
}
}
?>