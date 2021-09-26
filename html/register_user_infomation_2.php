<?php
    session_start();

    if(isset($_SESSION["register_user_id"]) && isset($_SESSION["register_mail_address"])){
    $user_id=$_SESSION["register_user_id"];
    $mail_address = $_SESSION["register_mail_address"];
    echo 'ユーザID:'.$user_id.'<br/>';
    echo 'メールアドレス:'.$mail_address.'<br/>';
    }

    if(!isset($_SESSION["flag_unmatch_password"])){
        $_SESSION["flag_unmatch_password"]=0;
    }

    if($_SESSION["flag_unmatch_password"]==1){
        echo "<p>パスワードが一致しません</p>";
        $_SESSION["flag_unmatch_password"]=0;
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>会員登録</title>
    </head>

    <body>
        <p>パスワードを設定してください</p>
        <form action="../function/check_register_user_infomation_2.php" method="post">
            <p>パスワード</p>
            <input type="password" name="register_password">
            <p>パスワードをもう一度入力してください（確認用）</p>
            <input type="password" name="check_password"><br><br>
            <input type="submit" value="登録">    
        </form>
    </body>
</html>