<?php
require_once('../config/config.php');
class  Connect_DataBase{
    private $stmt;
    private $pdo;

    public function getStmt(){
        return $this->stmt;
    } 

    public function connect(){  //データベースに接続
        try{
            $this->pdo = new PDO(DB_NAME,DB_USER,DB_PASSWORD);
        }catch(PDOException $e){
            header("Location: ../html/acsesserror.html",true,301);
            exit($e->getMessage());
        }

    }

    public function execute($sql){  //作成したSQL文を実行
        try{
            $this->connect();
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute();
            return; 
        }catch(PDOException $e){
            header("Location: ../html/acsesserror.html",true,301);
            exit($e->getMessage());  
        } 
    }

    public function select($culumns,$tables,$where='1',$order_by=null,$group_by=null){  //SELECT文を作成
        if(!empty($order_by)){
            $order_by = 'ORDER BY '.$order_by;
        }
        if(!empty($group_by)){
            $group_by = 'GROUP BY '.$group_by;
        }
        $sql = ('SELECT '.$culumns.' FROM '.$tables." WHERE ".$where.$order_by.$group_by.";");
        $this->execute($sql);
        return;
    }

    public function insert($culumns,$tables,$values){     //INSERT文を実行
        $sql = ('INSERT INTO '.$tables.'('.$culumns.')'.'VALUES'.$values);
        $this->execute($sql);
        return;
    }
}
?>