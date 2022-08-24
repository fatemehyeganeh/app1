<?php
class Login extends Dbh{
    protected function getUser($uid,$pwd){
        $statement=$this->connect()->
            prepare(
                'SELECT username FROM users WHERE username=? AND pwd=?;'
                );

        if(!$statement->execute(array($uid,$Pwd))){
            $statement=null;
            header('location:../index.php?error=selectstatementfailed');
            exit();
        }
        if($statement->rowCount()==0){
            $statement=null;
            header('location:../index.php?error=usernotfounded');
            exit();
        }
        $statement=null;
    }
}