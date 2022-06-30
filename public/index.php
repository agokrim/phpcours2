<?php
require '../vendor/autoload.php';
session_start();
use App\Auth;
require '../src/auth.php';

    $pdo = new PDO(
        "sqlite:../sqlitedata/dbtuto.db",
        null,
        null,
        [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
      );
      $auth = new Auth($pdo);
      $user = $auth->user();
  
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
  
       <div>
       <br/><br/><br/>
            <p> <a href="/logout.php">admin page</a></p>
            <p> <a href="/logout.php">user page</a></p>
         </div>
       
   
  
</body>
</html>