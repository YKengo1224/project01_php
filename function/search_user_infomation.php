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
        $this->DataBase->select($culummns='password',$tables='user_infomation',$where=('user_id=\''.$user_id.'\''));
        $stmt = $this->DataBase->getStmt();
        $result =$stmt->fetch(PDO::FETCH_COLUMN);
        if(empty($result)){
            return false;
        }
        else{
            if (password_verify($password,$result)){
                return true;
            }
            return false;

        }
    }
}
?>