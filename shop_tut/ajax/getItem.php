<?php 
require_once '../includes/db.php'; // The mysql database connection script
$status = '%';
$user_id = '1';
if(isset($_GET['status'])){
	$status = $mysqli->real_escape_string($_GET['status']);
}
$query="SELECT ID, USER_ID, ITEM, STATUS, CREATED_AT from shop where status like '$status' AND `user_id` = $user_id order by status,id desc";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>