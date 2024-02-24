    <section id="taskList" class="container-lg justify-content-center bg-secondary-subtle">
        <ul>
            <?php if($taskList) { foreach($taskList as $task) : ?>
                <div class="card border-info w-auto">
                    <div class="card-header bg-info p-2">
                        <?php echo $task['taskName']; ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($task['taskDesc']) { ?>
                            <li class="list-group-item"><?php echo $task['dueDate']; ?></li>
                        <?php } ?>
                        <li class="list-group-item"><?php echo $task['taskDesc']; ?></li>
                        <li class="list-group-item">
                            <form action="." method="post">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="taskID" 
                                       value="<?php echo $task['taskID']; ?>">
                                <input type="submit" value="Complete" class="btn btn-success">
                            </form>
                            <form action="." method="post">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                            <form action="." method="post">    
                                <span class="badge rounded-pill">
                                <input type="submit" value="Delete" class="btn btn-danger">
                                </span>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endforeach; }
            else { ?>
                <p class="text-center">
                    No items in the list.
                </p>
            <?php } ?>
            <?php include('newTask.php'); ?>
        </ul>
    </section>