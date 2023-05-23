<?php
 class User {
    private $connection;
    
    public function __construct($conn)
    {
        $this->connection=$conn;
    }

    
    public function login($email, $password) {
        $query = $this->connection->prepare("SELECT * FROM Users WHERE email = :email");
        $query->execute([
            "email" => $email,
        ]);
        $user = $query->fetch();
        if ($user && password_verify($password, $user["password"])) {
            //pass arguments to session in user variable
            $_SESSION["user"]=$user;
            $_SESSION["user_id"]=$user["user_id"];
            $_SESSION["is_admin"]=$user["is_admin"];
            return true;
        }
        else {
            return false;
        }
    }


    public function register($user_id, $username, $email, $password) {
        
        $emailQuery = "SELECT * FROM Users WHERE email = :email";
        $emailStatement = $this->connection->prepare($emailQuery);
        $emailStatement->execute(['email' => $email]);

        $usernameQuery = "SELECT * FROM Users WHERE username = :username";
        $usernameStatement = $this->connection->prepare($usernameQuery);
        $usernameStatement->execute(['username' => $username]);

        $user_idQuery = "SELECT * FROM Users WHERE user_id = :user_id";
        $user_idStatement = $this->connection->prepare($user_idQuery);
        $user_idStatement->execute(['user_id' => $user_id]);

        if ($emailStatement->rowCount() > 0 || $usernameStatement->rowCount() > 0 || $user_idStatement->rowCount() > 0) {
            // Email or Username already exist, quit registration
            return false;
        }
        
        $query = $this->connection->prepare("INSERT INTO Users (user_id, username, email, password, is_admin) VALUES (:user_id, :username, :email, :password, 0)");
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query->execute([
            "user_id" => $user_id,
            "username" => $username,
            "email" => $email,
            "password" => $password_hashed
        ]);

        return $this->login($email, $password);
    }
 }
?>











