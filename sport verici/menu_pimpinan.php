<?php

session_start();
error_reporting(0);
include"timeout.php";

include "config/library.php";
include "config/fungsi_combobox.php";
include "config/fungsi_indotgl.php";

if (($_SESSION['nama_user']) AND ($_SESSION['pass_user'])){
			 header('Location:media_user.php?module=home');
}
 
else{

?>
<html>
<head>
<title>TOKO SPORT VERICI</title>
<style type="text/css">

.main {
width:200px;
border:1px solid black;
}

.month {
background-color:black;
font:bold 12px verdana;
color:white;
}

.daysofweek {
background-color:gray;
font:bold 12px verdana;
color:white;
}

.days {
font-size: 12px;
font-family:verdana;
color:black;
background-color: lightyellow;
padding: 2px;
}

.days #today{
font-weight: bold;
color: red;
}

</style>


<script type="text/javascript" src="js/basiccalendar.js"> </script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/skins/blue.css" title="red">

<link rel="alternate stylesheet" type="text/css" href="css/skins/orange.css" title="orange">
<link rel="alternate stylesheet" type="text/css" href="css/skins/red.css" title="red">
<link rel="alternate stylesheet" type="text/css" href="css/skins/green.css" title="green">
<link rel="alternate stylesheet" type="text/css" href="css/skins/purple.css" title="purple">
<link rel="alternate stylesheet" type="text/css" href="css/skins/yellow.css" title="yellow">
<link rel="alternate stylesheet" type="text/css" href="css/skins/black.css" title="black">
<link rel="alternate stylesheet" type="text/css" href="css/skins/gray.css" title="gray">

<link rel="stylesheet" type="text/css" href="css/superfish.css">
<link rel="stylesheet" type="text/css" href="css/uniform.default.css">
<link rel="stylesheet" type="text/css" href="css/jquery.wysiwyg.css">
<link rel="stylesheet" type="text/css" href="css/facebox.css">
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.8.custom.css">


<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Delicious_500.font.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/clock.js"></script>

<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/switcher.js"></script>

<link rel="shortcut icon" type="image/x-icon" href="admin/images/Chat.ico">
</head>
<body onLoad="startclock()">
<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<a id="site-title" href="#"><img src="images/logo.jpg"  height="170" width="1240"></a>
			
		</div>

		

		<div id="userinfo" class="grid_3 push_4">
                    <?php
                    
			
                    
                    ?>
		</div>
	</div>
</header>

<nav id="topmenu">
	<div class="container_12 clearfix">
		<div class="grid_12">
			<ul id="mainmenu" class="sf-menu">
				<li <?php if($_GET[module]=="home" || $_GET[module]=="" ) { echo "class='current'"; } ?>><a href="menu_pimpinan.php">Beranda</a></li>
				<li <?php if($_GET[module]=="laporan" || $_GET[module]=="laporan" ) { echo "class='current'"; } ?>><a href="#">Laporan Penjualan</a>
					<ul>
					
						<li><a href="?module=lapbulantunai">Penjualan Bulanan</a></li>
					<li><a href="?module=laptahun">Penjualan Tahunan</a></li>
					</ul>
				</li>
				<li <?php if($_GET[module]=="informasi") { echo "class='current'"; } ?>><a href="?module=informasi">Informasi Stok</a></li>
				
					<li <?php if($_GET[module]=="beli") { echo "class='current'"; } ?>><a href="">Laporan Pembelian</a>
					<ul>
						<li><a href="?module=lapbelibln">Pembelian Bulanan</a></li>
					<li><a href="?module=labelithn">Pembelian Tahunan</a></li>
					</ul></li>
					<li <?php if($_GET[module]=="informasieoq") { echo "class='current'"; } ?>><a href="?module=informasieoq">Informasi EOQ</a></li>
			
				<li <?php if($_GET[module]=="logout") { echo "class='current'"; } ?>><a href="?module=logout">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<section id="content">
	<section class="container_12 clearfix">
		<aside id="sidebar" class="grid_3">
                        <div class="box info">
				<h2>Assalamuallaikum</h2>
				<section>
                                    <SCRIPT language=JavaScript>var d = new Date();
                                    var h = d.getHours();
                                    if (h < 11) { document.write('Selamat Pagi, Pimpinan...'); }
                                    else { if (h < 15) { document.write('Selamat Siang, Pimpinan...'); }
                                    else { if (h < 19) { document.write('Selamat Sore, Pimpinan..'); }
                                    else { if (h <= 23) { document.write('Selamat Malam, Pimpinan...'); }
                                    }}}</SCRIPT>
                                </section>
			</div>			
                       
			
		</aside>
		<section id="main" class="grid_10">
			<article id="dashboard">
			
                           <?php 
							if ($_GET['module']=="" || $_GET['module']=="home"){
							
							echo "<div class='information msg'>Hai <b>$_SESSION[namalengkap]</b>, Selamat datang Pimpinan</div>";
					}
							if ($_GET['module']=="lapbulan"){include "pendapatan_bln.php";}
							if ($_GET['module']=="laptahun"){include "pendapatan_thn.php";}
							if ($_GET['module']=="laphari"){include "pendapatan_perhari.php";}
							if ($_GET['module']=="lapbulantunai"){include "pendapatan_bln.php";}
							
							if ($_GET['module']=="lapbelibln"){include "pembelian_bln.php";}
							if ($_GET['module']=="labelithn"){include "pembelian_thn.php";}
						
								if ($_GET['module']=="informasieoq"){include "informasi_eoq.php";}
								if ($_GET['module']=="informasi"){include "informasi_stok1.php";}
							if ($_GET['module']=="logout"){echo"<center>";include "logout.php";echo"</center>";}
						   ?>
		    </article>
		</section>

                            
		
		<section id="main" class="grid_3">
			
			<div class="box">
				<h2>Kalender</h2>
				<section>
                                    
				<script type="text/javascript">
					var todaydate=new Date()
					var curmonth=todaydate.getMonth()+1 //get current month (1-12)
					var curyear=todaydate.getFullYear() //get current year
					document.write(buildCal(curmonth ,curyear, "main", "month", "daysofweek", "days", 1));
				</script>
				<?php 
									echo "<p>$hari_ini,
  <span id='date'></span>, <span id='clock'></span></p>";
									?>
                                </section>
			</div>			
		
			
		</section>
		
                </section>
        </section>
    


<footer id="bottom">
	<section class="container_12 clearfix">
		<div class="grid_6 push_3 alignright">
			Copyright &copy; 2016 <a href="#">&#12288;&#65431;&#65400;&#65403;&#65438;&#65437; Development</a>
		</div>
	</section>
</footer>

</body>
</html>

<?php
}
?>