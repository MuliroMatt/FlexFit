<?php 
session_start();
session_destroy();
echo "<script>window.location.href='loginadm.php';</script>";
?>