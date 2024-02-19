<?php include('views\header.php'); 
    $tasklist = null;
?>
    <section id="runningList">
        <ul>
            <?php if(!$tasklist) { foreach($tasklist as $task) : ?>
                <li>
                    <h5>
                        <?php echo $task['taskName']; ?>
                    </h5>
                    <p> 
                        <?php echo $task['taskDesc']; ?>
                    </p>
                </li>
            <?php endforeach; }
            else { ?>
                <p class="text-center">
                    No items in the list.
                </p>
            <?php } ?>
        </ul>
    </section>
    <section id="newTaskForm">
        <?php include('newTask.php'); ?>
    </section>
<br>
<?php include('views\footer.php'); ?>