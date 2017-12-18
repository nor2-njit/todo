<?php 
session_start();
require("../model/database.php");
require("../model/todo_db.php");



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'signup';
	}
}

if ($action == 'signup') {
	include('signup.php');

} else if ($action == 'login') {
	include('login.php');

} else if ($action == 'verify_login') {
	$email = filter_input(INPUT_POST, 'email');
	$_SESSION['email'] = $email;

	$password = filter_input(INPUT_POST, 'password');
	$_SESSION['password'] = $password;

	$users = get_users();
	foreach ($users as $user){
		if ($user['email'] == $email && $user['password'] == $password){
			header("Location: .?action=todo_list");
		}
	}

} else if ($action == 'init_user') {
	$fname = filter_input(INPUT_POST, 'fname');
	$lname = filter_input(INPUT_POST, 'lname');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$birthday = filter_input(INPUT_POST, 'bday');
	$password = filter_input(INPUT_POST, 'password');
	$gender = filter_input(INPUT_POST, 'gender');

	add_user($email, $fname, $lname, $phone, $birthday, $gender, $password);
	header("Location: .?action=todo_list");

} else if ($action == 'todo_list') {
	$incomplete_todos = get_incomplete_todos($_SESSION['email']);
	$complete_todos = get_complete_todos($_SESSION['email']);

	$user = get_user($_SESSION['email']);
	$fname = get_fname($_SESSION['email']);
	$lname = get_lname($_SESSION['email']);

	$_SESSION['name'] = $fname . " " . $lname;
	include('todo_list.php');

} else if ($action = 'isdone_todo') {
	complete_todo($id);
	header("Location: .?action=todo_list");

} else if ($action = 'edit_todo_date') {
	edit_todo_date($id, $duedate);
	header("Location: .?action=todo_list");

} else if ($action = 'edit_todo_message') {
	edit_todo_message($id, $message);
	header("Location: .?action=todo_list");

} else if ($action = 'delete_todo') {
	delete_todo($id);
	header("Location: .?action=todo_list");

} else if ($action = 'sign_out') {
	session_destroy();
	header("Location: .?action=signup");
}


?>