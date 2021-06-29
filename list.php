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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    #buttonCheck{
        border: 1px solid black;
        padding: 5px 20px;
        border-radius: 5px;
    }
    #buttonCheck:hover{
        color: #43A521;
        border-color: #43A521;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <h2 class="text-center topic">
                TO DO LIST
            </h2>
            <div class="text-center">
                <a href="create.php" id="link">Add task</a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 mx-auto">
            <table class="table">
                <thread>
                    <tr>
                        <th scope="col">TASK</th>
                        <th scope="col">CONTENT</th>
                        <th scope="col">DETAIL</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">REMOVE</th>
                        <th scope="col">DONE</th>
                    </tr> 
                </thread>
                <?php
                $pageNo = $_GET['page'] ?? 1;
                $perPage = 5;
                $offSet = ($pageNo - 1) * $perPage;
                $no = $offSet; 
                $sql = "SELECT * FROM to_do_list LIMIT $perPage OFFSET $offSet";
                $result = $connection->query($sql);
                
                while ($to_do = $result->fetch_object())
                {
                    
                    $name = 'checkedDone'.$to_do->id;
                    if (isset($_POST[$name]))
                    {
                        $sql = "UPDATE to_do_list SET status_of_task='done' WHERE id=$to_do->id";
                        $connection->query($sql);
                        header("location: http://localhost:8090/learn_php_database/list.php?page=$pageNo");  
                    }
                    
                   
                    $subStrTask = (strlen($to_do->task) > 30) ? mb_substr($to_do->task, 0, 10).'...' : $to_do->task;
                    $subStrContent = (strlen($to_do->content) > 30) ? mb_substr($to_do->content, 0, 20).'...' : $to_do->content;                  
                    $color = ($to_do->status_of_task == 'done')? '#7CFC7E' : 'white';
                    
                    echo
                    "
                    <tr style='background-color: $color'>
                       
                        <td>$subStrTask</td>
                        <td>$subStrContent</td>
                        <td><a id='link' href='detail.php?id=$to_do->id'>detail</a></td>
                        <td><a id='link' href='edit.php?id=$to_do->id'>edit</a></td>
                        <td><a id='link' href='remove.php?id=$to_do->id&page=$pageNo'>remove</a></td>
                        <td>
                            <form method='post'>
                                <input type='submit' name='checkedDone$to_do->id' id='buttonCheck' value='DONE'>
                            </form>
                        </td>
                    </tr>
                    ";
                }
                ?>
                
  
            </table>
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <form action="index.php">
                        <button class="button" type="submit">BACK</button>
                    </form>
                </div>
                <?php
                    $sql = "SELECT count(*) AS total FROM to_do_list";
                    $resultObj = $connection->query($sql);
                    $totalArticles = $resultObj->fetch_object()->total;
                    $totalPages = ceil($totalArticles / $perPage);
                    for($i = 1; $i <= $totalPages; ++$i)
                    {
                        echo 
                        "
                        <div class='p-2'>
                            <a class='button' id='link' href='list.php?page=$i'>$i</a>
                        </div>
                        ";
                    }
                ?>
            </div>  
        </div>
    </div>
</div>
</body>
</html>