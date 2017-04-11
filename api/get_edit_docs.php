<?php
require_once '../includes/db_config.php';
require_once '../includes/session.php';
$id = $_POST["id"];
$output = array();

$sql = "SELECT `id`, `doc_path`, `doc_description`, `uploaded_date` FROM `documents` WHERE id='{$id}'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
if ($result) {
	while ($row = $result -> fetch_assoc()) {
		$output[] = $row;
	}
}

header('Content-type: application/json');
echo json_encode($output);
?>