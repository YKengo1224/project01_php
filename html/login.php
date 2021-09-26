<?php
    session_start();
    if(!isset($_SESSION["flag_empty_login_infomation"])){ 
        $_SESSION["flag_empty_login_infomation"]=0;
        $_SESSION["flag_loginerror"]=0;
    }
    if($_SESSION["flag_empty_login_infomation"]==1){
        echo <<< EOM
        <p>IDとパスワード両方を入力してください</p>
        EOM;
        $_SESSION["flag_empty_login_infomation"]=0;
    }else if($_SESSION["flag_loginerror"]==1){
        echo <<< EOM
        <p>入力したID、またはパスワードが間違っています</p>
        EOM;
        $_SESSION["flag_loginerror"]=0;
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン画面</title>
    </head>

    <body>
        <p>IDを入力してください</p>
        <form action="../function/login_check.php" method="post">
            <p>ユーザID</p>
            <input type="text" name="user_id">
            <p>パスワード</p>
            <input type="password" name="password"><br><br>
            
            <input type="submit" value="ログイン">    
        </form>
        <a href="./register_user_infomation.php">会員登録はこちらから</a>
    </body>
</html>