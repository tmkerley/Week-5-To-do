<?php 

function create_task($taskName, $taskDesc, $dueDate) {
    global $db;
    
    //a new task isn't completed
    $completed = 0;
    //a due date wasn't assigned
    if(!$dueDate) {
        $dueDate = date('m/d/Y h:i:s a', time());
    }

    $query = 'INSERT INTO "tasks"
            (name, description, dueDate, completed)
                VALUES
                (:taskName, :taskDesc, :dueDate, :completed)';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskName, $taskName');
    $statement->bindValue(':taskDesc, $taskDesc');
    $statement->bindValue(':dueDate, $dueDate');
    $statement->bindValue(':completed, $completed');
    $statement->execute();
    $statement->closeCursor();
}

function delete_task($taskName) {
    global $db;

    $query = 'DELETE FROM tasks 
                WHERE taskName = :taskName';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskName', $taskName);
    $statement->execute();
    $statement->closeCursor();
}

function get_all_active_tasks() {
    global $db;

    $query = 'SELECT * FROM tasks
                WHERE completed = 0';
    $statement = $db->prepare($query);
    //$statement->bindValue(':completed', $completed);
    $statement->execute();
    $taskList = $statement->fetchAll();
    $statement->closeCursor();
    return $taskList;
}
?>