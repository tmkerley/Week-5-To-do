<?php 

function create_task($taskName, $taskDesc, $dueDate) {
    global $db;
    //a new task isn't completed by default
    $completed = 0;
    //due date wasn't assigned
    if(!$dueDate) {
        $dueDate = date('m/d/Y h:i:s a', time());
    }
    $query = 'INSERT INTO tasks
            (taskName, taskDesc, dueDate, completed)
                VALUES
                (:taskName, :taskDesc, :dueDate, :completed)';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskName', $taskName);
    $statement->bindValue(':taskDesc', $taskDesc);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':completed', $completed);
    $statement->execute();
    $statement->closeCursor();
}

function get_all_active_tasks() {
    global $db;
    $query = 'SELECT * FROM tasks
                WHERE completed = 0';
    $statement = $db->prepare($query);
    $statement->execute();
    $taskList = $statement->fetchAll();
    $statement->closeCursor();
    return $taskList;
}

function update_task($taskID, $name, $date, $desc) {
    global $db;

    // select old task
    $query = 'SELECT * FROM tasks
                WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->execute();
    $oldTask = $statement->fetch();

    // update to newer data
    if($oldTask['taskName'] != $name) {
        $taskName = $name;
    }
    else{
        $taskName = $oldTask['taskName'];
    }
    if($oldTask['dueDate'] != $name) {
        $dueDate = $date;
    }
    else{
        $dueDate = $oldTask['dueDate'];
    }
    if($oldTask['taskDesc'] != $name) {
        $taskDesc = $desc;
    }
    else{
        $taskDesc = $oldTask['taskDesc'];
    }
    $query = 'UPDATE tasks
            SET (taskName = :taskName, 
                taskDesc = :taskDesc, 
                dueDate = :dueDate)
            WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->bindValue(':taskName', $taskName);
    $statement->bindValue(':taskDesc', $taskDesc);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->execute();
    $statement->closeCursor();
}

function complete_task($taskID) {
    $query = 'UPDATE tasks
            SET completed = 1
            WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}

function delete_task($taskID) {
    global $db;
    $query = 'DELETE FROM tasks 
                WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}
?>