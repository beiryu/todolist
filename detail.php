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
            <h2 class="text-center">DETAIL ARTICLE</h2>
            <?php
                $articleId = $_GET['id'] ?? null;
                $sql = "SELECT * FROM articles WHERE id = $articleId";
                $result = $connection->query($sql)->fetch_object();
            ?>
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo "$result->title" ?>" />
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="10"><?php echo "$result->content" ?></textarea>
                </div>
            </form>
            <div style="margin-top: 20px;">
                <form action="list.php">
                    <button type="submit" class="btn btn-outline-secondary">BACK</button>
                </form>
            </div>
        </div>
       
    </div>
</div>
</body>
</html>