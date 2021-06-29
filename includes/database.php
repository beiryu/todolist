<?php
$connection = new mysqli('localhost', 'root' , '', 'news');
if($connection->connect_errno)
{
    echo 'Have error';
}