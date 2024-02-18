<?php 

function create_task($taskName, $taskDesc, $dueDate) {
    global $db;
    
    //a new task isn't completed
    $completed = FALSE;

    $query = 'INSERT INTO task
            (name, description, dueDate, completed)
                VALUES
                (:taskName, :taskDesc, :dueDate, :completed)';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskName, $taskName');
    $statement->bindValue(':taskDesc, $taskDesc');
    $statement->bindValue(':dueDate, $dueDate');
    $statement->bindValue(':completed, $completed');
}

function delete_task($taskName) {
    global $db;

    $query = 'DELETE on task (name)';
    $statement = $db->prepare($query);
}
?>