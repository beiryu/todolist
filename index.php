<?php
require 'includes/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>TODOLIST</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container h-100 ">
    <div class="row">
        <div class="col-8 mx-auto topic">
            <h2 class="text-center">TO DO LIST</h2>
        </div>  
    </div> 
    <div class="row">
        <div class="col-8 mx-auto d-flex justify-content-center topic">
            <form action="list.php">
                <button type="submit" class="button">WELCOME</button>
            </form> 
        </div>    
    </div>
</div>
</body>
</html>