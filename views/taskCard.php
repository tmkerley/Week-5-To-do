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
            <form action="." method="post" name="action" id="alter<?php echo $task['taskID']; ?>">
                <input type="hidden" name="taskID" 
                        value="<?php echo $task['taskID']; ?>">
            </form>
            <input type="submit" name="action" value="Complete" class="btn btn-success"
                    form="alter<?php echo $task['taskID']; ?>">
            <input type="submit" name="action" value="Update" class="btn btn-primary"
                    form="alter<?php echo $task['taskID']; ?>">
            <span class="badge rounded-pill">
            <input type="submit" name="action" value="Delete" class="btn btn-danger"
                    form="alter<?php echo $task['taskID']; ?>">
            </span>
        </li>
    </ul>
</div>