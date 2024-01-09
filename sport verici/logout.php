<?php
  session_start();
  session_destroy();
  
  echo "<script>alert('Anda telah keluar dari halaman administrator')</script>";
  echo "<meta http-equiv='Refresh' content='2; URL=index.php?module=login'>";
  echo "Please Wait<img src=./images/loading.gif>";
?>