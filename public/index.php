<?php
require '../vendor/autoload.php';
session_start();
use App\Auth;
use App\App;
require '../src/app.php';
require '../src/auth.php';

      $user =  App::getAuth()->user();
        if($user === null){
        header('location:login.php');
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
    <h1><?=$user->username ?>  is Connected</h1><a href="./logout.php">se deconnecter</a>
 
    <?php if(isset($_GET['forbid'])):?> 
      <div class="alert alert-danger">vous n'avez pas le droit pour acceder a la page </div>
    <?php endif ?>
    
  
       <div>
       <br/><br/><br/>
            <p> <a href="./admin.php">admin page</a></p>
            <p> <a href="./user.php">user page</a></p>
         </div>
       
   
  
</body>
</html>