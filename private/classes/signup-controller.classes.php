<?php
    class SignupController extends Signup {
        private $uid;
        private $pwd;
        private $pwdRepeat;
        private $email;  
        
        public function __construct($uid,$pwd,$pwdRepeat,$email){
          $this->uid = $uid;
          $this->pwd =$pwd ;
          $this->pwdRepeat = $pwdRepeat ;
          $this->email=$email;  
        }
//
    public function signupUser(){
        if($this->emptyInput()!==false){
            //echo error emty input
            header("location:../index.php?error=emtyInput");
            exit();
        }
        elseif($this->invalidUid()==false){
            //echo error invalid username
            header("location:../index.php?error=invalid username");
            exit();
        }
        elseif($this->invalidEmail()==false){
            //echo error invalid Email
            header("location:../index.php?error=invalidEmail");
            exit();
        }
        elseif(!$this->pwdMatch()==false){
            //echo error pass didnt match
            header("location:../index.php?error=pass didnt match");
            exit();
        }
        elseif($this->uidTakenCheck()==false){
            //echo error usename taken check 
            header("location:../index.php?error=usernametaken");
            exit();
        }
        
        $this->setuser($this->uid,$this->pwd,$this->email);
    }

///is all files full
        private function emptyInput(){
            $result;
            if(
                empty($this->uid)||
                empty($this->pwd)||
                empty($this->pwdRepeat)||
                empty($this->email)
            )
                {$result=true; }
            else {$result=false;}
            return $result;
        }
//valie username
        private function invalidUid(){
            $result;
            if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid))
                {$result=false;}
            else {$result=true;}
            return $result;
        }

//valid email
        private function invalidEmail(){
            $result;
            if(filter_var($this->email,FILTER_VALIDATE_EMAIL))
                {$result=true;}
            else {$result=false;}
            return $result;
        }


//password and repeat are equall
        private function pwdMatch(){
            $result;
            if($this->pwd == $this->pwdRepeat)
                {$result=false;}
            else {$result=true;}
            return $result;
        }
//uid taken check
        private function uidTakenCheck(){
            $result;
            if(!$this->checkUser($this->uid,$this->email))
                {$result=false;}
            else {$result=true;}
            return $result;
        }

    }
?>