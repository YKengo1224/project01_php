<?php
require_once('../config/config.php');
require_once('./Connect_DataBase.php');
class search_user_infomaiton{
    private $DataBase;
    public function __construct()
    {
        $this->DataBase = new Connect_DataBase;
    }

    public function LoginCheck($user_id,$password){  
        echo (empty($this->DataBase));
        $this->DataBase->select($culummns='*',$tables='user_infomation',$where=('user_id=\''.$user_id.'\' AND password=\''.$password.'\''));
        $stmt = $this->DataBase->getStmt();
        $result =$stmt->fetchall(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return true;
        }
        else{
            return false;
        }

    }
}
?>