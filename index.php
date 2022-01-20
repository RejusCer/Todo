<?php

$todos = [];

if (file_exists('todo.json'))
{
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>
<body>
    <form action="newTodo.php" method="POST">
        <input type="text" name="todo_name" placeholder="Enter todo name">
        <button>New todo</button>
    </form>

    <?php foreach ($todos as $todoName => $todo): ?>
        <div>
            <form action="change_status.php" method="POST">
                <?php include "includes/hidden.php"; ?>
                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''; ?>>
            </form>

            <?php echo $todoName ?>

            <form action="delete.php" method="POST">
                <?php include "includes/hidden.php"; ?>
                <button>Delete todo</button>
            </form>
        </div>
    <?php endforeach; ?>

<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]')
    checkboxes.forEach(ch => {
        ch.onclick = function(){
            this.parentNode.submit()
        }
    })
</script>
</body>
</html>