<?php
session_start();
if(!isset($_SESSION["flag_user_id_error"])){
    $_SESSION["flag_user_id_error"] = 0;
}
if(!isset($_SESSION["flag_register_error"])){
    $_SESSION["flag_register_error"] = 0;
}

if($_SESSION["flag_register_error"]==1){
    echo <<< EOM
    <p>IDとメールアドレス両方を入力してください</p>
    EOM;
    $_SESSION["flag_register_error"]=0;
}
else if($_SESSION["flag_user_id_error"]==1){
    echo <<< EOM
    <p>このIDはすでに使用されています</p>
    EOM;
    $_SESSION["flag_user_id_error"]=0;
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>会員登録</title>
    </head>

    <body>
        <p>登録情報を入力してください</p>
        <form action="../function/check_register_user_infomation.php" method="post">
            <p>ユーザID</p>
            <input type="text" name="register_user_id">
            <p>メールアドレス</p>
            <input type="text" name="register_mail_address"><br><br>
            <input type="submit" value="次へ">    
        </form>
    </body>
</html>