<?php 
header('Access-Control-Allow-Origin: *'); 
require_once("../classes/API.php");	

$return = '';

if (isset($_POST['task']) && isset($_POST['token'])) {
		
	$query_api = new API();
	$student_mobile = new studentAPI();
	
	$user_info = $query_api->check_token($_POST['token']);				
	
	if (isset($user_info->userid)){
		
		$userid = $user_info->userid;
		
		if ($_POST['task'] == 'send_like') {

			$check = $student_mobile->sendLike($userid, $_POST['query'], $_POST['id']);
			
			$return = array('status'=> 'work', 'msg'=> $check);

		} elseif ($_POST['task'] == 'send_comment') {

			$check = $student_mobile->sendComment($userid, $_POST['query'], $_POST['id']);
			if ($check) {
				$return = array('status'=> 'work', 'msg'=> $check);
			}

		} elseif ($_POST['task'] == 'send_message') {

			$check = $student_mobile->sendMsg($userid, $_POST['query'], $_POST['id']);
			if ($check) {
				$return = array('status'=> 'work', 'msg'=> $check);
			}
			
		} elseif ($_POST['task'] == 'update_info') {

			if ($userid) {
				$return = array('status'=> 'work', 'msg'=> 'Your profile updated');
			}
		}

	} else {
		$return = array('status'=> 'no_user');
	}

echo json_encode($return);
		
} else {
	// $return = array('status'=> 'error');
?>	
<form action="" method="POST">
	<select name="task">
		<option value="send_like">Send like</option>
		<option value="remove_order_product">Remove from order</option>
	</select>
	<input type="text" name="id" placeholder="id">
	<input type="text" name="query" placeholder="query">
	<input type="hidden" name="token" value="389f6d4fff43d9ea21214ea1f410f3c1b902e21ba101a6eb1d0692021e89fff50b519c33f1346f7e7ad0bb942f03b0a38d6ae4498029da319b24e79e14c3f57e">
	<input type="submit" value="Submit">
</form>
<?php
}


?>