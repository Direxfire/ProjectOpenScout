<?php
// Set Timezone to New York
date_default_timezone_set('America/New_York');
// Start PHP Session
session_start();
if (!isset($_SESSION['csrf'])) {
	$_SESSION['csrf'] = md5(uniqid(rand(), TRUE));
}
// Require essential files
require('database.php');
require('function/user.php');
require('router.php');
$router = new router;
/*
Only enable if you are using Cloudflare, will forward real client IP Address
if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
	$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
*/
?>
