
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form action="" method="post" name="frmhome">
<table width="600" cellpadding="2" cellspacing="2">
  <tr align="center">
    <td><?php if($_SESSION['typelog']=="guru"){
   echo "-==Selamat Datang ". $_SESSION['nmguru']."==-"; }
   else if($_SESSION['typelog']=="admin"){
   echo "-== Selamat Datang Admin ==-"; }
   else {
   echo "<b> </b>";} ?>
    <object classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000
codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,2,0
width=700
height=300>
<param name=movie value=cybertrick.swf>
<param name=quality value=high>
<param name=BGCOLOR value=#00d100>
<param name=SCALE value=showall>
<embed src=cybertrick.swf
quality=high
pluginspage=http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash type=application/x-shockwave-flash
width=600
height=300
bgcolor=#00d100
scale= showall>
</embed>
</object></td>

  </tr>
</table>
</form>
</body>
</html>
