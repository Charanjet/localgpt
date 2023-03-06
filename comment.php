<?php
include './config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$today = date("Y-m-d H:i:s");  

$insert = mysqli_query($con,"INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `created_at`, `updated_at`) VALUES (NULL, '".$name."', '".$email."', '".$comment."', '".$today."', '".$today."')");
if (!$insert)
    echo json_encode(["msg"=>"Success","code"=>"200"]);
else
    echo json_encode(["msg"=>"Failed","code"=>"500"]);