<?php

include "../class/database.php";
include "../class/dd.php";
include "../class/user.php";

$id  = $_GET['id'];
$user = new User();
$user->delete($id);
$url = "./index.php?msg=delete_ok";
header("Location: $url");

?>