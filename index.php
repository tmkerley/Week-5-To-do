<?php 
    include('views\header.php'); 
    require('model\task_db.php');
    // $taskList = null;

    //checks if no action was taken to get to the page, eg first load.
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if($action == NULL) {
            $action = 'listActiveTasks';
        }
    }

    //checks what to run
    switch($action){
        case 'listActiveTasks':    
            // get active task list
            $taskList = get_all_active_tasks();
            // display task list
            include('views\taskListDisplay.php');
            break;
        case 'deleteTask':
            //delete a task
        default:
            echo "Default action taken. There's something wrong.";
            break;
    }
    // delete task
    // show new task page

?>