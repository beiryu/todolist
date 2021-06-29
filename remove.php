<?php
require 'includes/database.php';
$idRemove = $_GET['id'] ?? null;
$pageNo = $_GET['page'] ?? 1;
$sql = "DELETE FROM to_do_list WHERE id=$idRemove;";
$connection->query($sql);
header("location: http://localhost:8090/learn_php_database/list.php?page=$pageNo");  
?>
