<?php
    session_start();
    if(!isset($_SESSION["flag_loginerror"])){
        $_SESSION["flag_loginerror"]=0;
    }
    if($_SESSION["flag_loginerror"]==1){
        echo <<<EOM
        <script type="text/javascript">
        alert("間違っています")
        </script>
        EOM;    
    }
    $_SESSION["flag_loginerror"] = null;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン画面</title>
    </head>

    <body>
        <p>IDを入力してください</p>
        <form action="../function/login.php" method="post">
            <input type="text" name="user_ID">
            <input type="submit" value="ログイン">    
        </form>

    </body>
</html>