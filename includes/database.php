<?php
$connection = new mysqli('localhost', 'root' , '', 'todolist_db');
if($connection->connect_errno)
{
    echo 'Have error';
}
