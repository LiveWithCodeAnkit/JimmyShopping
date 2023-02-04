<?php
session_start();
unset($_SESSION['userid']);
session_destroy();
echo "<script>alert('logged out successfuly'); window.location.href='index.php';</script>";
?>