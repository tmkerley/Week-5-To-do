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
                            <a href="#" class="btn btn-success">Complete</a>
                            <a href="#" class="btn btn-primary">Update</a>
                            <span class="badge rounded-pill">
                            <a href="#" class="btn btn-danger">Delete</a>
                        </span>
                        </span>
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