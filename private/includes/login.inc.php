<?php
   // if(isset($_POST['submit'])){
        //grabing the data
        $uid=$_POST['uid'];
        $pwd=$_POST['pwd'];
        
        //instantiate signup class
            include '../../private/classes/dbh.classes.php';
            include('../../private/classes/login.classes.php');
            include('../../private/classes/login-controller.classes.php');
            $login= new LoginController($uid ,$pwd);

        //running error handler and user signup

            $login->loginUser();
           
        //going back to front page
            header('no error!');
  //  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome <?php echo('hi from login'.$uid);?></h1>
</body>
</html>