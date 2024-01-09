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
border:1px solid ;
}

.month {
background-color:solid black;
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
<link rel="alternate stylesheet" type="text/css" href="css/skins/green.css" title="orange">
<link rel="alternate stylesheet" type="text/css" href="css/skins/purple.css" title="purple">
<link rel="alternate stylesheet" type="text/css" href="css/skins/yellow.css" title="yellow">
<link rel="alternate stylesheet" type="text/css" href="css/skins/black.css" title="black">
<link rel="alternate stylesheet" type="text/css" href="css/skins/gray.css" title="gray">

</head>
<body onLoad="startclock()">
<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<a id="site-title" href="#"><img src="images/logo.jpg"  height="172" width="1280"></a>
			
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
				<li <?php if($_GET[module]=="home" || $_GET[module]=="" ) { echo "class='current'"; } ?>><a href="index.php">Beranda</a></li>
				<li <?php if($_GET[module]=="kontak") { echo "class='current'"; } ?>><a href="?module=kontak"></a></li>
				<li <?php if($_GET[module]=="login") { echo "class='current'"; } ?>><a href="?module=login">Login</a></li>
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
                                    if (h < 11) { document.write('Selamat Pagi, Pengunjung...'); }
                                    else { if (h < 15) { document.write('Selamat Siang, Pengunjung..'); }
                                    else { if (h < 19) { document.write('Selamat Sore, Pengunjung..'); }
                                    else { if (h <= 23) { document.write('Selamat Malam, Pengunjung..'); }
                                    }}}</SCRIPT>
                                </section>
			</div>			
                       
			
		</aside>
		<section id="main" class="grid_10">
			<center><article id="dashboard">
			
                           <?php 
							if ($_GET['module']=="" || $_GET['module']=="home"){
						//	include"slider.html";
					INCLUDE "home (2).php";
							echo "<div class='information msg' align='left'>Hai <b>$_SESSION[namalengkap]</b>, Selamat datang di Sistem Informasi Pengolahan Data TOKO SPORT VERICI </div>";
							}
							if ($_GET['module']=="logout"){include "logout.php";}
							if ($_GET['module']=="user"){include "user.php";}
							if ($_GET['module']=="kontak"){include "kontak.php";}
							if ($_GET['module']=="login"){echo"<center>";include "login.php";echo"</center>";}
						   ?>
		    </article>
		</section>
</center>
                            
		
		<section id="main" class="grid_3">
			
			<div class="box">
				<h2>Kalender</h2>
				<section>
                                     <?php 
									 include "fungsi_kalender.php";
  $tgl_skrg=date("d");
  $bln_skrg=date("n");
  $thn_skrg=date("Y");
  echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 
  ?>

                                </section>
			</div>			
		
			
		</section>
		
                </section>
        </section>
    


<footer id="bottom">
	<section class="container_12 clearfix">
		<div class="grid_6 push_3 alignright">
			Copyright 2016 <a href="#">&#12288;&#65431;&#65400;&#65403;&#65438;&#65437; Development</a>
		</div>
	</section>
</footer>

</body>
</html>

<?php
}
?>