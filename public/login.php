<?php
require '../vendor/autoload.php';
session_start();
use App\Auth;
use App\App;
require '../src/auth.php';
require '../src/app.php';

$error=null;

if(!empty($_POST)){
 
     
      $user = App::getAuth()->login($_POST['username'],$_POST['password']);
      
      if($user === null){
        
        $error =true;
      }
      else{
        header('location:index.php?login=1');
        $error =false;
      }
      
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="p-4">
    <h1>Se connecter </h1>
    <?php if($error): ?>
        <div class="alert alert-danger">identifiant ou mot de passe incorect</div>
    <?php endif ?>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="pseudo">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        </div>
   <button class="btn btn-primary">Se connecter</button>

    </form>
  
</body>
</html>