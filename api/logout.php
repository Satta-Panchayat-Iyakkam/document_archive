<?php
require_once '../includes/db_config.php';
require_once '../includes/session.php';
session_destroy();
header('location: ../index.php');
?>