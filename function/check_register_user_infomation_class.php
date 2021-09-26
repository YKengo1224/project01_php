<?php
require_once('../config/config.php');
require_once('./Connect_DataBase.php');
 class check_register_user_infomation_class{
    private $database;

    public function __construct(){
        $this->database = new Connect_DataBase();
    }

    public function CheckUnusedUserId($user_id){
        $this->database->select($culummns='*',$tables='user_infomation',$where=('user_id=\''.$user_id.'\''));
        $stmt = $this->database->getStmt();
        $result =$stmt->fetchall(PDO::FETCH_ASSOC);
        if(empty($result)){
            return true;
        }
        else{
            return false;
        }
    }
    public function InsertUserInfomation($user_id,$mail_address,$password){

        $this->database-> select($culumns='*',$tables='user_infomation');
        $stmt = $this->database->getstmt();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = 1;
        foreach($result as $i){
            $count++;
        }
        $culumns = 'id_number,user_id,mail_address,password';
        $values = '"'.$count.'","'.$user_id.'","'.$mail_address.'","'.$password.'"';
        $this->database->insert($culumns,'user_infomation',$values);
    }
 }
?>