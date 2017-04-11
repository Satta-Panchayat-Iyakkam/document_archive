<?php
session_start();
function check_login() {
	if (!isset($_SESSION["client_id"])) {
		session_destroy();
		header('location: ../index.php');
	}
}

if (!isset($page)) {
	check_login();
}
?>