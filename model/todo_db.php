<?php

function add_user($email, $fname, $lname, $phone, $birthday, $gender, $password) {
	global $db;
	$query = 'INSERT INTO accounts
			  (email, fname, lname, phone, birthday, gender, password)
			  VALUES
			  (:email, :fname, :lname, :phone, :birthday, :gender, :password)';
	$statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':password', $password);
    $statement->execute();    
    $statement->closeCursor(); 
}

function get_users() {
    global $db;
    $query = 'SELECT * FROM accounts';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;    
}

function get_user($email) {
	global $db;
	$query = 'SELECT * FROM accounts
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;    
}

function get_fname($email) {
	global $db;
	$query = 'SELECT * FROM accounts
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $fname = $result['fname'];
    return $fname;    
}

function get_lname($email) {
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $lname = $result['lname'];
    return $lname;   
}

function get_incomplete_todos($owneremail) {
	global $db;
	$query = 'SELECT * FROM todos
              WHERE owneremail = :owneremail AND isdone=0
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->execute();
    $todos = $statement->fetchAll();
    $statement->closeCursor();
    return $todos; 
}

function get_complete_todos($owneremail) {
    global $db;
    $query = 'SELECT * FROM todos
              WHERE owneremail = :owneremail AND isdone = 1
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->execute();
    $todos = $statement->fetchAll();
    $statement->closeCursor();
    return $todos; 
}

function add_todo($owneremail, $createddate, $message, $duedate) {
	global $db;
	$query = 'INSERT INTO todos
			  (owneremail, createddate, duedate, message, isdone)
              VALUES
              (:owneremail, :createddate, :duedate, :message, 0)';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->bindValue(":message", $message);
    $statement->bindValue(":createddate", $createddate);
    $statement->bindValue(":duedate", $duedate);

    $statement->execute();
}

function edit_todo_message($id, $message) {
	global $db;
	$query = "UPDATE todos
			  SET message = :message
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(":message", $message);
    $statement->bindValue('id', $id);
    $statement->execute();
}

function edit_todo_date($id, $duedate) {
	global $db;
	$query = "UPDATE todos
			  SET duedate = :duedate
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':duedate', $duedate);
    $statement->bindValue('id', $id);
    $statement->execute();
    $statement->closeCursor(); 
}

function complete_todo($id) {
	global $db;
	$query = "UPDATE todos
			  SET isdone = 1
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $statement->closeCursor(); 
}

function delete_todo($id) {
	global $db;
    $query = 'DELETE FROM todos
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();    
    $statement->closeCursor(); 
}


?>