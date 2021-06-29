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
            <h2 class="text-center topic">EDIT TASK</h2>
            <?php
                $taskId = $_GET['id'] ?? null;
                if(isset($_POST['modifyTask']))
                {
                    $task = $_POST['task'];
                    $content = $_POST['content'];
                    $sqlModify = "UPDATE to_do_list SET task='$task', content = '$content' WHERE id = $taskId";
                    $resultModify = $connection->query($sqlModify);
                    header("location: http://localhost:8090/learn_php_database/list.php?page=1");  
                }
                $sql = "SELECT * FROM to_do_list WHERE id = $taskId";
                $result = $connection->query($sql)->fetch_object();
            ?>
            <form action="edit.php?id=<?php echo $taskId; ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="task" value="<?php echo "$result->task" ?>" />
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="10" name="content"><?php echo "$result->content" ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="modifyTask" class="btn btn-outline-success btn-block">MODIFY</button>
                </div>
            </form>
        </div>
       
    </div>
</div>
</body>
</html>