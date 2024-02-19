<form action="" autocomplete="off">
    <div class="container text-center">
        <div class="row">
            <div class="col justify-content-start">
                <label for="taskName">Task Name:</label><br>
                <input type="text" id="taskName" name="taskName" placeholder="New Task" required>
            </div>
            <div class="col justify-content-center">
                <label for="dueDate">Due Date:</label><br>
                <input type="date" id="dueDate" name="dueDate">
            </div>
        </div>
        <div class="row">
            <div class="col jusify-content-center">
                <label for="Task Description">Task Description:</label><br>
                <textarea name="taskDesc" rows="4" cols="50" placeholder="Description"></textarea><br>
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </div>
</form>