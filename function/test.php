<?php
require_once('./search_user_infomation.php');
require_once('../config/config.php');
require_once('./ConnectDataBase.php');

$a=new search_user_infomaiton();
if($a->LoginCheck('kenngo',"A")){
    echo $_SESSION["sq"];
    echo "<p>hoge</p>";
}
else{
    echo $_SESSION["sq"];
    var_dump( $_SESSION["ds"]);
}
?>