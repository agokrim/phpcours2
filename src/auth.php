<?php 

namespace App;

require 'user.php';
use PDO;

class Auth{

    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo ;
    }

    public function user(): ?User
    {
        if(session_status()=== PHP_SESSION_NONE)
            {
                session_start();
            }
            
       

        $query = "SELECT * FROM users where id= :id";
        $statment =  $this->pdo->prepare($query);
        $statment->execute(['id'=> $_SESSION['auth']]);  

        $user = $statment->fetchObject(User::class);
       
        return $user?:null;
    }

    public function login(string $username , string $password) : ?User
    {
        $query = "SELECT * FROM users where username= :username";
        $statment =  $this->pdo->prepare($query);
        $statment->execute(['username'=>$username]);  

        $user = $statment->fetchObject(User::class);
        
      
        if($user === false){
            return null;
        }

        if ( $user->password == $password )
        {
            if(session_status()=== PHP_SESSION_NONE)
            {
                session_start();
            }
            
            $_SESSION['auth'] = $user->id;
            
           
            return $user;
        }
        
    }
}