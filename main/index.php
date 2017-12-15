<?php 
require("../model/database.php");
require("../model/todo_db.php");


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_POST, 'action');
	if ($action == NULL) {
		$action = 'init_user';
	}
}

if ($action == 'init_user') {
	$fname = filter_input(INPUT_POST, 'fname',
		FILTER_VALIDATE_INT);
	$lname = filter_input(INPUT_POST, 'lname',
		FILTER_VALIDATE_INT);
	$email = filter_input(INPUT_POST, 'email',
		FILTER_VALIDATE_INT);
	$phone = filter_input(INPUT_POST, 'phone',
		FILTER_VALIDATE_INT);
	$birthday = filter_input(INPUT_POST, 'bday',
		FILTER_VALIDATE_INT);
	$password = filter_input(INPUT_POST, 'password',
		FILTER_VALIDATE_INT);
	$gender = filter_input(INPUT_POST, 'gender',
		FILTER_VALIDATE_INT);
	$id = '';

	add_user($id, $email, $fname, $lname, $phone, $birthday, $gender, $password);
	header("Location: todo_list.php");
}

if ($action == 'login') {
	$email = filter_input(INPUT_POST, 'email',
		FILTER_VALIDATE_INT);
	$password = filter_input(INPUT_POST, 'password',
		FILTER_VALIDATE_INT);
	foreach ($users as $user){
		if ($user['email'] == $email){
			if ($user['password'] == $password){
				header("Location: todo_list.php");
			}
		}
	}
}

if ($action == 'todo_list') {
	$name = get_name($email);
	$users = get_user($email);
	$todos = get_todos($email);
	include('todo_list.php');
}
?>