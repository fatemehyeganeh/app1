<?php
    class LoginController extends Login {
        private $uid;
        private $pwd;        
        
        public function __construct($uid,$pwd){
          $this->uid = $uid;
          $this->pwd =$pwd ;
        }
//
    public function loginUser(){
        if($this->emptyInput()!==false){
            //echo error emty input
            header("location:../index.php?error=emtyInput");
            exit();
        }
        
        $this->getuser($this->uid,$this->pwd);
    }

///is all files full
        private function emptyInput(){
            $result;
            if(
                empty($this->uid)||
                empty($this->pwd)
            ){$result=true; }
            else {$result=false;}
            return $result;
        }
    }
?>