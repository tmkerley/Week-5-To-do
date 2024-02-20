<?php
    $dsn = 'mysql:host=localhost; dbname=taskProject';
    $username = '';
    $password = '';

    try{
        $db = new PDO($dsn, $username, $password);
    }
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('..\views\databaseError.php');
        exit();
    }
?>