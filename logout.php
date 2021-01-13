<?php
session_start();
session_destroy();
ob_start();
session_start();
if (!isset($_SESSION['scm_username'])){
	header("Location: login.php");
	exit();
}
ob_end_flush();
?>