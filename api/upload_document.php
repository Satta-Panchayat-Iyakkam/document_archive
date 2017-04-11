<?php
require_once ("../includes/db_config.php");
require_once '../includes/session.php';
$output["success"] = FALSE;
$output["message"] = "Something Went Wrong!";
if (isset($_FILES['file'])) {
	$path = 'documents/';
	$description = mysqli_real_escape_string($conn, $_POST["description"]);
	if ($_FILES["file"]["error"] > 0) {
		$output["success"] = FALSE;
		$output["message"] = 'Error: ' . $_FILES['file']['error'] . ' Occured!';
	} else {
		// $file = explode(".", $_FILES['file']['name']);
		// $extension = array_pop($file);
		// if (strtolower($extension) == 'pdf') {
			$file_path = $path . $_FILES['file']['name'];
			$output["path"] = $file_path;
			$chksum = hash_file('md5', $_FILES['file']['tmp_name']);
			$check = "SELECT `checksum` FROM documents WHERE `checksum`='".$chksum."'";
			$result = $conn -> query($check);
			if ($result -> num_rows == 0) {
				move_uploaded_file($_FILES['file']['tmp_name'], realpath(dirname(__FILE__)) . '/../pages/'.$file_path);
				$insertTable = $conn -> query("INSERT INTO `documents`(`doc_description`, `doc_path`, `checksum`, `uploaded_date`) VALUES ('{$description}','{$file_path}','{$chksum}',NOW())");
			$output["success"] = TRUE;
				$output["message"] = "Uploaded File " . $_FILES['file']['name'] . " has been Saved and Data Inserted in Database!";
		} else {
			$output["success"] = FALSE;
				$output["message"] = "This file already Exist";
		}
			
		// } else {
		// 	$output["success"] = FALSE;
		// 	$output["message"] = 'Please Upload Document in PDF format!';
		// }
	}
}
echo '(' . json_encode($output) . ')';
?>