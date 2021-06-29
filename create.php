<?php
require 'includes/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2 class="text-center">ADD ARTICLE</h2>
            <form action="create.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Title" />
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="10" placeholder="Content"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submitNewArticle" class="btn btn-outline-success btn-block">ADD</button>
                </div>
            </form>
            <?php
            if(isset($_POST['submitNewArticle']))
            {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $sql = "INSERT INTO articles(title, content) VALUES('$title', '$content')";
                $result = $connection->query($sql);
                if($result)
                {
                    echo "<div class='alert alert-success text-center'>ADD SUCCESS</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>