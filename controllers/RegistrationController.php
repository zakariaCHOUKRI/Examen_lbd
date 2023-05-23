<?php
session_start();

include '../models/User.php';
include '../dbconfig.php';

class RegistrationController
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function register()
    {
        try{
            $user = $this->userModel->register($_POST['user_id'], $_POST['username'], $_POST['email'], $_POST['password']);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        if ($user) {
            switch ($_SESSION["is_admin"]) {
                case 1:
                    header("location: ../views/AdminPage.php");
                    break;
                case 0:
                    header("location: ../views/StudentPage.php");
                    break;
            }
            
        } else{
            header("Location: ../views/login_page.php?error=1");
        }
    }
}


$user= new User($conn);
$regController = new RegistrationController($user);
if(isset($_POST['email']))
{
    $regController->register();
}






?>