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
        case 'addNewTask':
            // filter & get form data
            //add task
            //rediect to display tasks
            //future add for checking date input validations
            $taskName = filter_input(INPUT_POST, 'taskName');
            $taskDesc = filter_input(INPUT_POST, 'taskDesc');
            $dueDate = filter_input(INPUT_POST, 'dueDate');
            
            if($taskName == NULL || $taskName ==  FALSE) {
                $error = "Invalid task name. Check all fields and try again.";
                include ('views\error.php');
            }
            else {
                create_task($taskName, $dueDate, $taskDesc);
                header("Location: .");
            }
            break;

        case 'listActiveTasks':    
            // get active task list and display
            $updateID = NULL;
            $taskList = get_all_active_tasks();
            include('views\taskListDisplay.php');
            break;

        case 'Update':
            // filter and get task ID
            // validate input
            // select old data
            // compare and if updated data
            $updateID = filter_input(INPUT_POST, 'updateID', FILTER_VALIDATE_INT);
            if(!$updateID){
                // if updateID isn't set, assign to the task
                $updateID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
                $taskList = get_all_active_tasks();
                include('views\taskListDisplay.php');
            }
            else if($updateID != FALSE) {
                // perform update
                //future add for checking date input validations
                $taskName = filter_input(INPUT_POST, 'taskName');
                $dueDate = filter_input(INPUT_POST, 'dueDate');
                $taskDesc = filter_input(INPUT_POST, 'taskDesc');
                update_task($updateID, $taskName, $dueDate, $taskDesc);
                // clear update
                $updateID = NULL;
                // redirect
                header("Location: .");
            }
            break;

        case 'Complete':
            // filter id
            // send task complete update
            // redirect
            $taskID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
            if($taskID != NULL && $taskID != FALSE) {
                complete_task($taskID);
                header("Location: .");
            }    

        case 'Delete':
            //delete a task using the PRG pattern
            // assign inputs
            // filter inputs
            // delete and redirect
            $taskID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
            if($taskID != NULL && $taskID != FALSE) {
                delete_task($taskID);
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