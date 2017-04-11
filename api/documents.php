<?php
require_once '../includes/db_config.php';
require_once '../includes/session.php';
$row = array();
$aaData = array();
$sql = "SELECT `id`, `doc_path`, `doc_description`, `uploaded_date` FROM `documents`";
$result = $conn -> query($sql);
$num_rows = $result -> num_rows;
if ($num_rows > 0) {
	while ($row = $result -> fetch_array()) {
		$filename = explode('/', $row["doc_path"]);

		$filepath = $row["doc_path"];
		$aaData[] = array('<i class="fa fa-file-pdf-o"></i> <a href="' . $filepath . '" target="_blank">' . end($filename) . '</a>', $row["doc_description"], '<span class="badge bg-red" id="delete_doc" data-id="' . $row["id"] . '" data-doc_name="' . end($filename) . '" data-id="' . $row["id"] . '" title="Click to Delete"><i class="fa fa-trash"></i></span> <span class="badge bg-primary" id="edit_doc" data-id="' . $row["id"] . '" data-doc_name="' . end($filename) . '" data-id="' . $row["id"] . '" title="Click to Edit"><i class="fa fa-pencil"></i></span>');
	}
}

$response = array('aaData' => $aaData, 'iTotalRecords' => count($aaData), 'iTotalDisplayRecords' => count($aaData));
if (isset($_REQUEST['sEcho'])) {
	$response['sEcho'] = $_REQUEST['sEcho'];
}

header('Content-type: application/json');
echo json_encode($response);
?>