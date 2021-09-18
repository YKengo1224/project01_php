<?php
    require_once('./search_user_infomation.php');
    session_start();
    if(!empty($_POST["user_id"]) && !empty($_POST["password"])){
        $user_id = $_POST["user_id"];
        $password = $_POST["password"];
        $search_database = new search_user_infomaiton();
        $_SESSION["user_id"] = $user_id;
        $_SESSION["password"] = $password;
        if($search_database->LoginCheck($user_id,$password)){      //入力されたIDとパスワードの組み合わせをデータベースから検索
            $_SESSION["user_id"] = $user_id;
            $_SESSION["password"] = $password;
            header("Location: ../html/login_sacsess.html" ,true,301);
            exit();
        }
        else{
            $_SESSION["flag_loginerror"]=1;
            header("Location: ../html/login.php",true,301);
            exit();
        }
    }

    else{
        $_SESSION["flag_empty_login_infomation"]=1;
        header("Location: ../html/login.php",true,301);
    }
?>