<?php
// Local
$hostname = 'localhost';
$username = 'u963382604_root';
$password = 'A8ppaM0jpE0F';
$dbname = 'u963382604_spi';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>