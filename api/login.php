<?php
$page = 'login';
require_once '../includes/db_config.php';
require_once '../includes/session.php';
$output = array();
$output["success"] = FALSE;
$output["message"] = "Something went wrong!";
$username = $_POST["username"];
$password = $_POST["password"];
$qry = "SELECT * FROM users WHERE client_id = '{$username}' LIMIT 1";
$result = $conn -> query($qry);
if ($result -> num_rows == 0) {
	$output["success"] = FALSE;
	$output["message"] = "User does not found!!";
} else {
	$user = $result -> fetch_assoc();
	if (crypt($password, $user["password"]) != $user["password"]) {
		$output["success"] = FALSE;
		$output["message"] = "You have entered incorrect password!";
	} else {
		$_SESSION['name'] = $user["name"];
		$_SESSION['registered'] = $user["registered_at"];
		$_SESSION['user_id'] = $user["id"];
		$_SESSION['client_id'] = $user["client_id"];
		$_SESSION['is_admin'] = $user["is_admin"];
		$result = $conn -> query("UPDATE users SET last_login_at=NOW() WHERE client_id = '{$username}'");
		$output["success"] = TRUE;
		$output["message"] = "Logging in as " . $user["name"] . "!";
	}
}

echo json_encode($output);
?>