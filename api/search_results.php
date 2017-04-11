<?php
require_once '../includes/db_config.php';
// require_once '../includes/session.php';
$q = $_POST["q"];
$output = array();
$res_text='';
$sql = "SELECT `id`,  `doc_description`, `doc_path` FROM `documents` WHERE doc_description LIKE '%{$q}%'";
$result = mysqli_query($conn, $sql) or die(mysqli_error());
if ($result) {
	if ($result -> num_rows == 0) {
		$output["success"] = FALSE;
		$output["message"] = "No result(s) found!";
	} else {
		$res_text.='<table class="table table-bordered table-hover"><tbody>';
		while ($row = $result -> fetch_assoc()) {
			// $output[] = $row;
			$filename = explode('/', $row["doc_path"]);
			$filepath = 'pages/'.$row["doc_path"];
			$res_text.='<tr><td><i class="fa fa-file-pdf-o"></i> <a href="' . $filepath . '" target="_blank">' . end($filename) . '</a></td><td>' . $row["doc_description"] . '</td></tr>';
		}
		$res_text.='</tbody></table>';
		$output["success"] = TRUE;
		$output["results"]=$res_text;
		$output["message"] = $result -> num_rows. " User(s) found!!";
	}
} else {
    $output["success"] = FALSE;
    $output["message"] = "Error occured while retrieving results!";
}
$conn->close();
echo json_encode($output);
?>