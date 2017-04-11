<?php
require_once '../includes/db_config.php';
require_once '../includes/session.php';
$output = array();
$output["success"] = FALSE;
$output["message"] = "Something went wrong!";

$path = 'documents/';
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$id = mysqli_real_escape_string($conn, $_POST["id"]);
if (isset($_FILES['file'])) {
	if ($_FILES["file"]["error"] > 0) {
		$output["success"] = FALSE;
		$output["message"] = 'Error: ' . $_FILES['file']['error'] . ' Occured!';
	} else {
		$file_path = $path . $_FILES['file']['name'];
		$output["path"] = $file_path;
		$chksum = hash_file('md5', $_FILES['file']['tmp_name']);
		$check = "SELECT `checksum` FROM documents WHERE `checksum`='" . $chksum . "'";
		$result = $conn -> query($check);
		if ($result -> num_rows == 0) {
			move_uploaded_file($_FILES['file']['tmp_name'], realpath(dirname(__FILE__)) . '/../pages/' . $file_path);
			$insertTable = $conn -> query("UPDATE `documents` SET `doc_description`='{$description}',`checksum`='{$chksum}',`doc_path`='{$file_path}' WHERE id='{$id}'");
			$output["success"] = TRUE;
			$output["message"] = "Uploaded File " . $_FILES['file']['name'] . " has been Saved and Data Inserted in Database!";
		} else {
			$output["success"] = FALSE;
			$output["message"] = "This file already Exist";
		}
	}
} else {
	$sql = "UPDATE `documents` SET `doc_description`='{$description}' WHERE id='{$id}'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$output["success"] = TRUE;
		$output["message"] = "Document has been Successfully Updated!";
	} else {
		$output["success"] = FALSE;
		$output["message"] = "Error Occureed While Update Document!";
	}
}
echo json_encode($output);
?>
