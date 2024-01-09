<?php
error_reporting(0);

switch($_GET[aksi]){

default:
?>
<script src="./js/jsDate/Scripts/DateTimePicker.js" type="text/javascript"></script>

<div><center/>PEMBELIAN BARANG</div>
<hr>

<form name="form1" method="post" action="">

  <table width="100%" border="0" cellspacing="6" cellpadding="6" bgcolor="#dedede">
    <tr>
       <p> <td width="13%" align="left" valign="top">No. Faktur</td>
      <td width="28%" align="left" valign="top"><label for="b8"></label>
	  
     <input type="text" name="b1" id="b1" class="tb6" value="<?php include "./generate_kode.php"; echo get_new_id("no_order","pembelian","P-"); ?>">
	
      
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
	  
	  $sqljurusan   = mysql_fetch_array(mysql_query("select * from tb_eoq where kd_barang='".$_POST[b3]."'"));

	  
	  ?>
      <td align="left" valign="top"><input type="text" name="b5" id="b5" value="<?php echo"$sqljurusan[jml_pesan]" ; ?>" class="tb6">
      <input type="hidden" name="tmpstok" id="tmpstok" value="<?php echo $row['stok']; ?>" />
      <input type="hidden" name="tmpharga" id="tmpharga" value="<?php echo $row['harga_beli']; ?>" /><p>Tersedia <?php echo $row['stok']; ?></td>
    </tr>
	<tr>
	<td align="left" valign="top"><input type="submit"  class="button blue"name="button" id="button" value="Tambahkan"></td>
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
  <table width="100%" border="0" cellspacing="3" cellpadding="3"  id="table-1">
    <tr>
      <td width="14%">Kode Barang</td>
      <td width="25%">Nama Barang</td>
      <td width="14%">Harga</td>
      <td width="14%">Jumlah </td>
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
     
      <td><a href="?module=beli&act=hapus&id=<?php echo $row['kd_barang']; ?>" title="Klik Disini Untuk Hapus Data "><img src='./Images/delete.png'></a></td>
	  
   
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	  <td>&nbsp;</td>
    <table>
	
    <tr>
      <td>Nama Suplier</td>
     <td align="left" valign="top">&nbsp;<select name="b6" id="b6" class="tb6" onchange="submit()">
      <?php
	  include "./Config/Connect.php";
	  if(isset($_POST[b6]))
	  {
		  $q="Select * from suplier where kd_suplier='".$_POST[b6]."'";
		  $res=mysql_query($q) or die(mysql_error());
		  $row=mysql_fetch_array($res);
		  echo ' <option value="'.$row['kd_suplier'].'">'.$row['nm_suplier'].'</option>';		  
	  } else if(isset($_GET[id]))
	  {
		  $q="Select * from suplier where kd_suplier='".$_GET[id]."'";
		  $res=mysql_query($q) or die(mysql_error());
		  $row=mysql_fetch_array($res);
		  echo ' <option value="'.$row['kd_suplier'].'">'.$row['nm_suplier'].'</option>';		  
	  }
	  ?>
      <option value="" disabled="disabled">----</option>
         <?php
         include "./Config/Connect.php";
	  $q="Select * from suplier";
	  $res=mysql_query($q) or die(mysql_error());
	  while($row=mysql_fetch_array($res))
	  {
	  ?>
        <option value="<?php echo $row['kd_suplier']; ?>"><?php echo $row['nm_suplier']; ?></option>
        <?php
	  }
		?>
      </select></td>
    
      <?php
	  $q="";
	  if(isset($_POST[b6]))
	  {
		  $q="Select * from suplier where kd_suplier='".$_POST[b6]."'";
	  }else{
	  $q="Select * from suplier ";
	  }
	  $res=mysql_query($q,$conn) or die(mysql_error());
	  $row=mysql_fetch_array($res);
	  ?>
      
     
    </tr>

    </tr>
<?php

 include "Config/Connect.php";
	 $q="";
	  if(isset($_POST[b6]))
	  {
		  $q="Select * from suplier where kd_suplier='".$_POST[b6]."'";
	  }else{
	   $q="Select * from suplier ";
	  }
	  $res=mysql_query($q) or die(mysql_error());
	  $row=mysql_fetch_array($res);
	  ?>
	 
    <tr>
      <td>Alamat</td>
      <td colspan="5"><input name="b7" type="text" id="b7" size="30" class="tb6" value="<?php echo $row['alamat']; ?>" />
    </tr>
	<?php

 include "Config/Connect.php";
	 $q="";
	  if(isset($_POST[b6]))
	  {
		  $q="Select * from suplier where kd_suplier='".$_POST[b6]."'";
	  }else{
	   $q="Select * from suplier ";
	  }
	  $res=mysql_query($q) or die(mysql_error());
	  $row=mysql_fetch_array($res);
	  ?> 
  
    <tr>
      <td>Tanggal Pembelian</td>
      <td><input type="text" name="b4" id="b4" class="tb6">
      <img src="./images/b_calendar.png" style="cursor: pointer;" onclick="javascript:NewCssCal('b4','yyyyMMdd')" /></td>
      <td>&nbsp;</td>
	
	  <tr>
      
      <td><a href="menu_gudang.php?dir=entri&module=beli&act=add"></a>
        <input type="submit" name="button2" class="button blue" id="button2" value="Simpan Pembelian">
      <td>&nbsp;</td>
	  <td><input type="submit" name="button3"  class= "button green"id="button3" value="Batal"></td>
      
	  </td>
	  </tr>
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
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=beli'>";
		}
}
?>

<?php
if($_POST[button])
{
$tgl_temp=$_POST['b4'];
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
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=beli'>";
		}
	}else{
	
		$q="Update order_tmp set jml=jml + ".$_POST[b5]." where kd_barang='".$_GET[b3]."'";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=beli'>";
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
		echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=beli'>";
		}
}
?>


<?php
include "./Config/Connect.php";
if($_POST[button2])
{
	if($_POST[b4]=="" || $_POST[b6]=="" || $_POST[b7]=="")
	{
		echo "<script>alert('Lengkapi data pembelian')</script>";
	}else{
		$q="Select * from order_tmp";
		$res=mysql_query($q) or die(mysql_error());
		$trow=mysql_num_rows($res);
		if($trow==0)
		{
			echo "<script>alert('Data Pembelian belum ada')</script>";
		}else{
			$t="Select * from order_tmp";
			$rest=mysql_query($t,$conn) or die(mysql_error());
			while($rowt=mysql_fetch_array($rest))
			{
				$qdp="Insert into pembelian values ('".$_POST[b1]."','".$_POST[b4]."','".$_POST[b6]."','".$rowt['kd_barang']."','".$rowt['jml']."')";
				$resdp=mysql_query($qdp,$conn) or die(mysql_error());
				$qub="Update barang set stok=stok + '".$rowt['jml']."' Where kd_barang='".$rowt['kd_barang']."'";
				$resub=mysql_query($qub,$conn) or die("Error update ".mysql_error());
			}
			
			
			if($res)
			{
			include "Config/Connect.php";
				$qdt="Delete from order_tmp";
				$resdt=mysql_query($qdt) or die(mysql_error());
				if($resdt)
				{
		
						echo "<meta http-equiv='refresh' content='0; url=menu_gudang.php?module=beli&aksi=selesai-pembelian&idbeli=$_POST[b1]'>";
				}
			}
		}
	}
}
?>

<?php
break;
case "selesai-pembelian":
include "Config/Connect.php";
	  $q="SELECT * FROM pembelian where no_order='$_GET[idbeli]' ORDER BY no_order";
	  $res=mysql_query($q) or die(mysql_error());
	  while($r=mysql_fetch_array($res)){ 
echo "<p><img src='./images/cetak.png' height=15><a href='cetak-pembelian.php?idbeli=$r[no_order]' target='_blank'/><font color=red>Cetak</font></a>";


echo "<h3>Faktur Pembelian</h3><hr>";

	  ?>
	  	  <link rel="stylesheet" media="screen" href="css/table.css"/>
  <table width="100%" border="0" cellspacing="6" cellpadding="6" bgcolor="#dedede" id='table-a'>
	<tr>
		
		<td width="10%" align="left" valign="top">No. Order<br/><br/><br/>Tanggal Faktur<br></td>
		<td width="10%" align="left" valign="top">
			<input type="text" name="b1" id="b1" class="tb6" value="<?php echo $r['no_order']; ?>"><br/><br/>
			<input type="text" name="b1" id="b1" class="tb6" value="<?php echo $r['tgl']; ?>"><br/><br/>
			
		</td>
	</tr> 
  </table>
  	  <link rel="stylesheet" media="screen" href="css/table.css"/>
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
	  $q1="SELECT p.*,b.* from pembelian p, barang b where p.kd_barang=b.kd_barang and p.no_order ='$_GET[idbeli]'";
 
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
		<td colspan="4" align="center"></td><td colspan="2" align="center">Hormat Kami,<br><br><br><br><br>( Bagian Gudang )</td>
	</tr>
  </table>
  <br>
<?php
break;
}
}
?>