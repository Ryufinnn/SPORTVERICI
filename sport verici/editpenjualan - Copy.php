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

<div align=center><th>PENJUALAN BARANG</th></div>
<hr>
<form method=post action="menu_penjualan.php?module=editpenjualan">
 
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
	  $query=mysql_query("select * from penjualan_sales where no_faktur='$nofak'");
	  
$del=mysql_query("delete from jual_tmp");
while($data=mysql_fetch_array($query)){


$qu=mysql_query("insert into jual_tmp values('$data[kd_barang]','$data[jml]')");


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
      <input type="hidden" name="tmpharga" id="tmpharga" value="<?php echo $row['harga_jual']; ?>" /><p>Tersedia <?php echo $row['stok']; ?></td>
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
      <td width="14%">Harga Jual</td>
      <td width="14%">Jumlah</td>
      <td width="20%">Sub Total</td>
      <td width="20%">Aksi</td>
    </tr>
	
     <?php
 
  $q1="SELECT jual_tmp.kd_barang, barang.nm_barang,jual_tmp.jml,barang.harga_jual
FROM jual_tmp LEFT JOIN barang ON jual_tmp.kd_barang = barang.kd_barang";
 
  $res=mysql_query($q1,$conn) or die(mysql_error());
  while($row=mysql_fetch_array($res))
  {
  ?>
    <tr>
      <td><?php echo $row['kd_barang'];?> </td>
      <td><?php echo $row['nm_barang']; ?></td>
      <td><?php echo $row['harga_jual']; ?></td>
      <td><?php echo $row['jml'];?> </td>
	  <td align=left><?php $tot=$row['harga_jual']*$row['jml']; echo"$tot"; echo "<input type='hidden' name='b9' id='b9' class='tb6' value='$row[jml]'>"; ?></td>
     
      <td><a href="?module=editpenjualan&act=hapus&nofak=<?php echo"$nofak"; ?>&id=<?php echo $row['kd_barang']; ?>" title="Klik Disini Untuk Hapus Data "><img src='./Images/delete.png'></a></td>
	  
   
    <?php
  }
  ?>
  
  <?php
 
  $q2="SELECT jual_tmp.kd_barang, SUM( jual_tmp.jml * barang.harga_jual ) AS tt
FROM barang, jual_tmp
WHERE jual_tmp.kd_barang = barang.kd_barang";
 
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
    <tr></tr>

	<tr>
	<tr>
	</tr>
      </td>
    
     
    </tr>


	
    <tr>
      <td>Tanggal Penjualan</td>
      <td><input type="text" name="b4" id="b4" class="tb6">
      <img src="./images/b_calendar.png" style="cursor: pointer;" onclick="javascript:NewCssCal('b4','yyyyMMdd')" /></td>
      <td>&nbsp;</td>
	  <tr>
	  <td><a href="menu_penjualan.php?module=jual_sales'"></a>
        <input type="submit" name="button2" class="button blue" id="button2" value="Edit Penjualan" target=_blank>
      </td>
	  <td>&nbsp;</td>
      <td><input type="submit" name="button3"  class="button green" id="button3" value="Batal"></td>
      <td>&nbsp;</td>
      </tr>
    </tr>
 	</table>
</form>

<?php
include "./Config/Connect.php";
if($_GET['act']=="hapus")
{
	$q="Delete from jual_tmp where kd_barang='".$_GET[id]."'";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=editpenjualan&nofak=$_GET[nofak]'>";
		}
}
?>

<?php
if($_POST[button])
{
	$a=$_POST['b5'];
	$z=$_POST['tmpstok'];
	if($a > $z || $a=="" || $a =='0')
	{
		echo "<script>alert('stok yg tersedia tak mencukupi')</script>";
	}else{
	$tgl_temp=$_POST['b4'];
	$_SESSION['tgl_temp']=$tgl_temp;
	$q="Select * from  jual_tmp where kd_barang='".$_POST[b3]."'";
	$res=mysql_query($q,$conn) or die(mysql_error());
	$trow=mysql_num_rows($res);
	$jj=$_POST['b5'];
	$hrg=$_POST['tmpharga'];
	$st=$jj*$hrg;
	
	$stk=$_POST['tmpstok'] - $_POST['b5'];
	$a = mysql_fetch_array(mysql_query("select b.*,e.* from barang b,tb_eoq e where b.kd_barang=e.kd_barang and e.kd_barang='".$_POST[b3]."' order by b.kd_barang ASC"));

	if($q[stok_minimum] >= $stk){
	echo "<script>alert('stok $a[nm_barang] hampir habis')</script>";
	}
	if($trow==0)
	{
		$q="Insert into jual_tmp values ('".$_POST[b3]."','".$_POST[b5]."')";
		$res=mysql_query($q,$conn) or die(mysql_error());
		
		
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=jual_sales'>";
		}
	}else{
		$q="Update  jual_tmp set jml=jml + ".$_POST[b5]." where kd_barang='".$_GET[b3]."'";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=jual_sales'>";
		}
	}
	}
}
?>


<?php
if($_POST[button3])
{
	$q="Delete from jual_tmp";
		$res=mysql_query($q,$conn) or die(mysql_error());
		if($res)
		{
		echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=jual_sales'>";
		}
}
?>


<?php
include "./Config/Connect.php";
if($_POST[button2])
{
	if($_POST[b4]=="" || $_POST[b6]=="" )
	{
		echo "<script>alert('Lengkapi data penjualan')</script>";
	}else{
		$q="Select * from jual_tmp";
		$res=mysql_query($q) or die(mysql_error());
		$trow=mysql_num_rows($res);
		if($trow==0)
		{
			echo "<script>alert('Data Penjualan belum ada')</script>";
		}else{
			$t="Select * from jual_tmp";
			$rest=mysql_query($t,$conn) or die(mysql_error());
			while($rowt=mysql_fetch_array($rest))
			{
				$re=mysql_fetch_array(mysql_query("select * from penjualan_sales where no_faktur='$_POST[b1]'"));

				while($dat=mysql_fetch_array($re)){
				$stok_lama=mysql_fetch_array(mysql_query("select * from barang where kd_barang='$dat[kd_barang]'"));
				$stok2=$stok_lama + $re[jml];
				$update1=mysql_query("update barang set stok='$stok2' where and kd_barang='$dat[kd_barang]'");
				}
				$delete=mysql_query("delete from penjualan_sales where no_faktur='$_POST[b1]'");
				
				$qdp="Insert into penjualan_sales values ('".$_POST[b1]."','".$_POST[b4]."','".$_POST[ns]."','".$_POST[b6]."','".$rowt['kd_barang']."','".$rowt['jml']."')";
				$resdp=mysql_query($qdp,$conn) or die(mysql_error());
				$qub="Update barang set stok=stok - '".$rowt['jml']."' Where kd_barang='".$rowt['kd_barang']."'";
				$resub=mysql_query($qub,$conn) or die("Error update ".mysql_error());
			}
				
			
			
			if($resub)
			{
			include "Config/Connect.php";
				$qdt="Delete from jual_tmp";
				$resdt=mysql_query($qdt) or die(mysql_error());
				if($resdt)
			{
			echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=editpenjualan&aksi=selesai-edit-penjualan&idjual=$_POST[b1]'>";
			     }
			
			}
		}
	}
}

?>
<?php
break;
case"selesai-edit-penjualan":
echo"aa";

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