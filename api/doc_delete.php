<?php
require_once '../includes/db_config.php';
require_once '../includes/session.php';
$output["success"] = FALSE;
$output["message"] = "Something went Wrong!";
$id = $_POST["id"];
$doc_name = $_POST["doc_name"];

$sql = "DELETE FROM documents WHERE id='{$id}'";
$result = mysqli_query($conn, $sql);
if ($result) {
	$output["success"] = TRUE;
	$output["message"] = "Document (" . $_POST["doc_name"] . ") has been Successfully Deleted!";
} else {
	$output["success"] = FALSE;
	$output["message"] = "Error Occured While Delete Document!";
}
echo json_encode($output);
?>
