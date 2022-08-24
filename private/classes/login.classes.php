<?php
class Login extends Dbh{
    protected function getUser($uid,$pwd){
        $statement=$this->connect()->
            prepare(
                'SELECT * FROM users WHERE username=? OR email=?;'
                );

        if(!$statement->execute(array($uid,$pwd))){
            $statement=null;
            header('location:../index.php?error=selectstatementfailed');
            exit();
        }
        if($statement->rowCount()==0){
            $statement=null;
            header('location:../index.php?error=usernotfounded');
            exit();
        }
        $pwdHashed=$statement->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd=password_verify($pwd,$pwdHashed[0]['pwd']);
        if($checkPwd==false){
            $statement=null;
            header('location:../index.php?error=wrongpassword');
            exit();
        }
        elseif($checkPwd==true){
            $statement=$this->connect()->
                prepare('SELECT * FROM users WHERE username=? OR email=? AND pwd=?;');
            if(!$statement->execute(array($uid,$uid,$pwd))){
                $statement=null;
                header('location:../index.php?error=selectstatementfailed');
                exit();
            }

        }
        $user=$statement->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['username']=$user[0]['username'];
        $_SESSION['id']=$user[0]['id'];
        $statement=null;
    }
}