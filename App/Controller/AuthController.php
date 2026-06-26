<?php

namespace App\Controller;

use App\Db\Mysql;
use App\Repository\UserRepository;

class AuthController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'login':
                        $this->login();
                        break;
                    
                    case 'logout':
                        $this->logout(); 
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function login()
    {
        $errors = [];

        if (isset($_POST['loginUser'])) {

            $userRepository = new UserRepository(); 

            $user = $userRepository->findOneByUsername($_POST['username']);

            if ($user && $user->verifyPassword($_POST['password'])) {
               
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    
                    'username' => $user->getUsername(),
                    'first_name' => $user->getFirstName(),
                    'last_name' => $user->getLastName(),
                    'roleId' => $user->getRoleId(),
                ];
                header('location: index.php');
            } else {
                $errors[] = 'Le nom utilisateur  ou mot de passe incorrect';
            }
        }

        $this->render('auth/login', [
            'errors' => $errors,
        ]);
    }

    protected function logout()
    {
        
        session_regenerate_id(true);
      
        session_destroy();
        
        unset($_SESSION);
        header ('location: index.php?controller=auth&action=login');
    }
}
