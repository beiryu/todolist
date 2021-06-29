<?php
require 'includes/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOLIST</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2 class="text-center topic">ADD TASK</h2>
            <form action="create.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="task" placeholder="Task" />
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="10" placeholder="Content"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submitNewTask" class="btn btn-outline-success btn-block">ADD TASK</button>
                </div>
            </form>
            <?php
            if(isset($_POST['submitNewTask']))
            {
                $task = $_POST['task'];
                $content = $_POST['content'];
                $sql = "INSERT INTO to_do_list(task, content, status_of_task) VALUES('$task', '$content', 'processing')";
                $result = $connection->query($sql);
                if ($result)
                {
                    echo "<div>ADD SUCCESS</div>";
                }
                header("location: http://localhost:8090/learn_php_database/list.php?page=1");
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>