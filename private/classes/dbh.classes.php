<?php
    class Dbh{
        protected function connect(){
            try{
                $user="root";
                $pass='';
                $dbName="php-app1";
                $dbh = new PDO('mysql:host=localhost;dbname=php-app1', $user, $pass);
                return $dbh;
            }
            catch (PDOExeption $e){
                //throw $th
            }
        }
    }
?>