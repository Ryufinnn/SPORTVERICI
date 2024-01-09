
<?php
if(! $_GET['KdHapus']==""){

	  include "./Config/Connect.php";
	  $query=mysql_query("select * from penjualan_sales where no_faktur='$nofak'");
	  
$del=mysql_query("delete from jual_tmp");
while($data=mysql_fetch_array($query)){


$qu=mysql_query("insert into jual_tmp values('$data[kd_barang]','$data[jml]')");

$q="Select * from jual_tmp";
		
				$delete=mysql_query("delete from penjualan_sales where no_faktur='$_POST[b1]'");
			$t="Select * from jual_tmp";
			$rest=mysql_query($t,$conn) or die(mysql_error());
			while($rowt=mysql_fetch_array($rest))
			{
				
				$qub="Update barang set stok=stok + '".$rowt['jml']."' Where kd_barang='".$rowt['kd_barang']."'";
				$resub=mysql_query($qub,$conn) or die("Error update ".mysql_error());
			}
				
			
			if($resub)
			{
			include "Config/Connect.php";
				$qdt="Delete from jual_tmp";
				$resdt=mysql_query($qdt) or die(mysql_error());
				if($resdt)
			{
			echo "<meta http-equiv='refresh' content='0; url=menu_penjualan.php?module=editpenjualan'>";
		echo "<script>alert('Data Berhasil DiHapus')</script>";
			     }			
			}
		}
}



?>



