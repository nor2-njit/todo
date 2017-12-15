<?php
    $dsn = 'mysql:host=sql2.njit.edu;dbname=nor2';
    $username = 'nor2';
    $password = 'cfMHFGRQu';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>