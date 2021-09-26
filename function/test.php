<?php
require_once('./search_user_infomation.php');
require_once('../config/config.php');
require_once('./Connect_DataBase.php');
require_once('./check_register_user_infomation.php');

$a=new search_user_infomaiton();
if($a->LoginCheck('kenngo',"qa")){
    echo $_SESSION["sq"];
    echo "<p>hoge</p>";
}
else{
   echo "error";
}

/*
$b = new check_register_user_infomation_class();
if($b->CheckUnusedUserId("kenno")){
    echo "使用されていません";
}
else{

    echo "使用されています";
}*/

?>