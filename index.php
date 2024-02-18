<?php include('./views/header.php'); ?>
    <section id="runningList">
        <ul>
            <?php foreach($tasklist as $task) : ?>
                <li>
                    <h5>
                        <?php echo $task['taskName']; ?>
                    </h5>
                    <p> 
                        <?php echo $task['taskDesc']; ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section id="newItemForm">
        <?php include('todoForm.php'); ?>
    </section>
<br>
<?php include('./views/footer.php'); ?>