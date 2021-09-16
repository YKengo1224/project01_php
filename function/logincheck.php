<?php
    session_start();
    if(isset($_POST["user_ID"])){
        $user_id = $_POST["user_ID"];
        switch($user_id){
            case "kenngo":
                header("Location: ../html/loginsacsess.html" ,true,301);
                exit();
            default:
                $_SESSION["flag_loginerror"]=1;
                header("Location: ../html/login.php",true,301);
                exit();
        }
    }
?>