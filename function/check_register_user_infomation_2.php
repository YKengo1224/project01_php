<?php
require_once('./check_register_user_infomation_class.php');
require_once('../config/config.php');
require_once('./Connect_DataBase.php');

session_start();
$check = new check_register_user_infomation_class();
if(!empty($_POST["register_password"] && !empty($_POST["check_password"]))){
    $password = $_POST["register_password"];
    $check_password = $_POST["check_password"];
    $user_id = $_SESSION["register_user_id"];
    $mail_address = $_SESSION["register_mail_address"];
    if(strcmp($password,$check_password)==0){
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $check->InsertUserInfomation($user_id,$mail_address,$hash_password);
        echo "登録しました！";
        $text = <<< EOM
        <br/><a href="../html/login.php">ログイン画面へ</a>
        EOM;
        echo $text;
    }
    else{
        $_SESSION["flag_unmatch_password"] = 1;
        header("Location: ../html/register_user_infomation_2.php",true,301);
        exit();
    }
}
else{
    $_SESSION["flag_unmatch_password"] = 1;
    header("Location: ../html/register_user_infomation_2.php",true,301);
    exit();
}
?>