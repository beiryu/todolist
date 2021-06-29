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
            <h2 class="text-center">LIST ARTICLES</h2>
            <table class="table">
                <thread class="thread-dark">
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">CONTENT</th>
                        <th scope="col">DETAIL</th>
                        <th scope="col">MODIFY</th>
                    </tr>
                </thread>
                <?php
                $pageNo = $_GET['page'] ?? 1;
                $perPage = 5;
                $offSet = ($pageNo - 1) * $perPage;
                $no = $offSet; 
                $sql = "SELECT * FROM articles LIMIT $perPage OFFSET $offSet";
                $result = $connection->query($sql);
                while ($article = $result->fetch_object())
                {
                    $no++;
                    $subStrTitle = (strlen($article->title) > 20) ? mb_substr($article->content, 0, 10).'...' : $article->title;
                    $subStrContent = (strlen($article->content) > 20) ? mb_substr($article->content, 0, 20).'...' : $article->content;
                    echo
                    "
                    <tr>
                        <th>$no</th>
                        <td>$subStrTitle</td>
                        <td>$subStrContent</td>
                        <td><a href='detail.php?id=$article->id'>Learn more...</a></td>
                        <td><a href='edit.php?id=$article->id'>Edit</a></td>
                    </tr>
                    ";
                }
                ?>
            </table>
            <div class="list-group list-group-horizontal">
                <?php
                    $sql = "SELECT count(*) AS total FROM articles";
                    $resultObj = $connection->query($sql);
                    $totalArticles = $resultObj->fetch_object()->total;
                    $totalPages = ceil($totalArticles / $perPage);
                    for($i = 1; $i <= $totalPages; ++$i)
                    {
                        echo "<a class='list-group-item list-group-item-dark' href='list.php?page=$i'>$i</a>";
                    }
                ?>
            </div>
            <div style="margin-top: 20px;">
                <form action="index.php">
                    <button type="submit" class="btn btn-outline-secondary">BACK</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>