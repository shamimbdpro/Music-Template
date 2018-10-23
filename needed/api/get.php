<?php 
header('Access-Control-Allow-Origin: *'); 
require_once("../classes/API.php");	

$return = '';

if (isset($_POST['task']) && isset($_POST['token'])) {
		
	$query_api = new API();
	$student_mobile = new studentAPI();
	
	$user_info = $query_api->check_token($_POST['token']);				
	
	if (isset($user_info->id)){
		
		$required_task = $_POST['task'];
		$required_query = isset($_POST['query']) ? $_POST['query'] : 0;
		
		if ($required_task == 'student_home') {

			$return = $student_mobile->latestSocialPosts($user_info->userid);

		} elseif ($required_task == 'class_routine') {
			
			$return = $student_mobile->class_routine($user_info->userid);

		} elseif ($required_task == 'events') {
			
			$return = $student_mobile->events($user_info->userid);

		} elseif ($required_task == 'event') {
			
			$return = $student_mobile->event($required_query);

		} elseif ($required_task == 'teachers') {
			
			$return = $student_mobile->teachers($user_info->userid);

		} elseif ($required_task == 'teacher') {
			
			$return = $student_mobile->teacher($required_query, $user_info->userid);

		} elseif ($required_task == 'userpage') {
			
			$return = $student_mobile->userpage($required_query);

		} elseif ($required_task == 'messages') {
			
			$return = $student_mobile->get_messages($user_info->userid);

		} elseif ($required_task == 'get_chat') {
			
			$return = $student_mobile->get_chat($user_info->userid, $_POST['query']);

		} elseif ($required_task == 'get_notes') {
			
			$return = $student_mobile->get_notes($user_info->userid, $_POST['query']);

		} elseif ($required_task == 'get_post') {
			
			$return = $student_mobile->get_post($user_info->userid, $required_query);

		} elseif ($required_task == 'get_position') {
			
			$data = $student_mobile->get_position($required_query);

			$return = $data;

		} else {

			$return = array('msg'=> 'task_not_allowed');
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
		<option value="get_notes">Get notes</option>
		<option value="get_chat">Get chat</option>
		<option value="get_post">Get post</option>
		<option value="class_routine">Student class routine</option>
		<option value="student_home">Student Home page</option>
		<option value="userpage">User page</option>
		<option value="events">Events</option>
		<option value="event">single Event</option>
		<option value="teachers">My Teachers</option>
		<option value="teacher">Teacher</option>
		<option value="get_position">Get location</option>
		<option value="messages">Get Messages</option>
	</select>
	<input type="text" name="query" placeholder="query">
	<input type="hidden" name="lastitem" placeholder="lastitem">
	<input type="hidden" name="token" value="389f6d4fff43d9ea21214ea1f410f3c1b902e21ba101a6eb1d0692021e89fff50b519c33f1346f7e7ad0bb942f03b0a38d6ae4498029da319b24e79e14c3f57e">
	<input type="submit" value="Submit">
</form>
<?php
}

//-----------------------
// Return in json_encode
//-----------------------
// print_r(json_encode($return));

?>