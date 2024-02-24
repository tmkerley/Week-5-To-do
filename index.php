<?php 
    require('model\database.php');
    require('model\task_db.php');
    
    // move to view
    include('views\header.php'); 

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
        case 'addNewTask':
            // filter & get form data
            //add task
            //rediect to display tasks
            $taskName = filter_input(INPUT_POST, 'taskName');
            $taskDesc = filter_input(INPUT_POST, 'taskDesc');
            //future add for checking date input validations
            $dueDate = filter_input(INPUT_POST, 'dueDate');
            
            if($taskName == NULL || $taskName ==  FALSE) {
                $error = "Invalid task name. Check all fields and try again.";
                include ('views\error.php');
            }
            else {
                create_task($taskName, $taskDesc, $dueDate);
                header("Location: .");
            }
            break;
        case 'deleteTask':
            //delete a task using the PRG pattern
            // assign inputs
            // filter inputs
            // delete and redirect
            $taskID = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            if($taskID != NULL && $taskID != FALSE) {
                detele_task($taskID);
                header("Location: .");
            }
            break;
        default:
            echo "Default action taken. There's something wrong.";
            break;
    }

    // move to view
    include('views\footer.php');
?>