<?php
include './config.php';

$email = $_POST['email'];
$fname = $_POST['fname'];
$proceed = false;
$today = date("Y-m-d H:i:s");  

$user = mysqli_query($con,"select * from users where email = '".$email."'");

if (mysqli_num_rows($user) > 0){//check if email exit
    $proceed = true;
}else{
    $user = mysqli_query($con,"INSERT INTO `users` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL, '".$fname."', '".$email."', '".$today."', '".$today."')");
    if ($user){
        $proceed = true;
    }
}

if ($proceed){
    echo json_encode(['response'=>"Success"]);
}


