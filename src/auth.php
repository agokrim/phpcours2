<?php 
namespace App;
use PDO;
class Auth{

    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo ;
    }

    public function user(): ?User
    {
        return null;
    }

    public function login(string $username , string $password) : ?User
    {
        return null;
    }
}