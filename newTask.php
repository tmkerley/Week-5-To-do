<form action="" autocomplete="off">
<div class="card border-info w-auto">
    <div class="card-header bg-info p-2">
    <label for="taskName"></label>
        <input type="text" id="taskName" name="taskName" placeholder="New Task Name" required>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <label for="dueDate">Due Date:</label>
            <input type="date" id="dueDate" name="dueDate">
        </li>  
        <li class="list-group-item">
            <label for="Task Description"></label>
            <textarea name="taskDesc" rows="4" cols="50" placeholder="Description"></textarea>
        </li>
        <li class="list-group-item">
            <button type="submit" class="btn btn-primary"> Submit </button>
        </li>
    </ul>
</div>
</form>