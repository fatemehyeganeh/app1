<?php
class Signup extends Dbh{
    protected function setUser($uid,$pwd,$email){
        $statement=$this->connect()->
            prepare(
                'INSERT INTO users (username,pwd,email) VALUES (?,?,?);'
                );

        $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);

        if(!$statement->execute(array($uid,$hashedPwd,$email))){
            $statement=null;
            header('location:../index.php?error=Insertstatementfailed');
            exit();
        }
        
        $statement=null;
    }

    protected function checkUser($uid,$email){
        $statement=$this->connect()->
            prepare(
                'SELECT username FROM users WHERE username=? OR email=?;'
                );
    
       if(!$statement->execute(array($uid,$email))){
        $statement=null;
        header('location:../index.php?error=statementfailed');
        exit();
       }

       $resultCheck;
       if($statement->rowCount()>0)
        {$resultCheck=false;}
        else{
            $resultCheck=true;
        }
        return $resultCheck;
    }

}