<?php 
    include "../../admin/class/database.php";
    include "../../admin/class/user.php";
    session_start();
    
    $input = $_POST;
    $user = new User();
    $result = $user->check($input);
    if ($result == "error"){
        $url = "../login.php?msg=account_password_error";
        header("Location: $url");
    }else{
        $_SESSION['loginUser'] = $result['name'];
        $url = "../index.php";
        header("Location: $url");
    }
    


?>