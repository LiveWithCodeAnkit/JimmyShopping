<?php
session_start();
unset($_SESSION['id']);
session_destroy();
echo "<script>alert('logged out successfuly'); window.location.href='seller_login.php';</script>";
?>