<?php
require_once('./check_register_user_infomation_class.php');
require_once('../config/config.php');
require_once('./Connect_DataBase.php');

session_start();
$check = new check_register_user_infomation_class();
if(!empty($_POST["register_user_id"]) && !empty($_POST["register_mail_address"])){
    $user_id=$_POST["register_user_id"];
    $mail_address = $_POST["register_mail_address"];
    if($check->CheckUnusedUserId($user_id)){
        $_SESSION["register_user_id"] = $user_id;
        $_SESSION["register_mail_address"] = $mail_address;
        header("Location: ../html/register_user_infomation_2.php",true,301);
        exit();
    }
    else{
        $_SESSION["flag_user_id_error"] = 1;
        header("Location: ../html/register_user_infomation.php",true,301);
        exit();
    }
}
else{
    $_SESSION["flag_register_error"] = 1;
    header("Location: ../html/register_user_infomation.php",true,301);
    exit();
}


?>
