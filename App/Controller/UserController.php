<?php
namespace App\Controller;

use App\Entity\Service;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Repository\RoleRepository;
use App\Repository\ServiceRepository;

 class UserController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                            break;
                    case 'list':
                        $this->list();
                        break;

                        case 'detail':
                            $this->detail();
                            
                    case 'register':
                        $this->register();
                            break;
                    case 'admin':
                        $this->admin();
                        break;
                    case 'employee':
                        $this->employee();
                            break;
                    case 'veterinaire':
                        $this->veterinaire();
                            break;
                    case 'delete':
                        
                        $this->delete();
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
    
    protected function show()
    {
        try {
            if (isset($_GET['username']))
            {
                $username = $_GET['username'];
               
                $userRepository = new UserRepository();
                $user = $userRepository->findOne($username);


                $roleRepository = new RoleRepository();
                $roles = $roleRepository->findAllRoleByUserId( $user->getUsername());


                $serviceRepository = new ServiceRepository();
                $services = $serviceRepository->findAllServiceByUserId($user->getUsername());

                $this->render('user/show',
                 ['pageTitle' => 'Utilisateur du site:',
                 'user' => $user,
                 'roles' => $roles,
                 'services'=> $services
                ]);
            }
             else 
            {
                throw new \Exception ("L'id est manquant en paramètre");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', 
            ['error' => $e->getMessage()]);
        } 

    }
   
    protected function list()
    {
        try {
            
            $userRepository = new UserRepository();
            $users = $userRepository->findAll();


            $this->render('user/list', [
                'pageTitle' => 'Utilisateurs du site:',
                'users' => $users
                
            ]); 
        } catch (\Exception $e) {
            
            $this->render('errors/default', [
                'users' => $users,
                'error'=> $e->getMessage()
        ]);
        }
    }
    protected function register()
    {
        try {
            $errors = [];
            $user = new User();
            
            
            $roleRepository = new RoleRepository();
            $roles = $roleRepository->findAll();

            
            $serviceRepository = new ServiceRepository();
            $services = $serviceRepository->findAll();

            if (isset($_POST['saveUser'])) {
                
                $user->hydrate($_POST);
                
                $errors = $user->validate();

                if (empty($errors)) {
                    $userRepository = new UserRepository();
                    
                    $userRepository->persist($user);
                   header('Location: index.php?controller=auth&action=login');
                }
            }

            $this->render('user/add_edit', [
                'user' => '',
                'pageTitle' => 'Inscription',
                'errors' => $errors,
                'roles'=> $roles,
                'services'=> $services,
                'user'=>$user
            ]);

        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    
    protected function  admin()
    {
        try {
            $errors = [];
            $user = new User();

            if (isset($_POST['saveAdmin'])) {
                
                $user->hydrate($_POST);
            
                $user->getRoleId(); 
                $errors = $user->validate();

                if (empty($errors)) {
                    $userRepository = new UserRepository();
                    
                    $userRepository->persist($user);
                   header('Location: index.php?controller=admin');
                }
            }

            $this->render('user/espace_administrateur', [
                'user' => '',
                'pageTitle' => 'Droit Administrateur',
                'errors' => $errors,
                'user'=>$user
                
            ]);

        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

   
    protected function employee()
    {
        try
        {
            $errors = [];
            $user = new User();

            if (isset($_POST['saveEmployee']))
            {
                
                $user->hydrate($_POST);
        
                $user->getRoleId();
                $errors = $user->validate();

                if (empty($errors)) {
                    $userRepository = new UserRepository();
                    
                    $userRepository->persist($user);
                   header('Location: index.php?controller=user&action=employee');
                }
            }

            $this->render('user/espace_employee', [
                'user' => '',
                'pageTitle' => 'Espace De L\'employee ',
                'errors' => $errors,
                'user'=>$user
            ]);

        }
        catch (\Exception $e)
        {
            $this->render('errors/default',
             [
                'error' => $e->getMessage()]);
        }
    }
   
    protected function veterinaire()
    {
        try
        {
            $errors = [];
            $user = new User();

            if (isset($_POST['saveVeterinaire']))
            {
                
                $user->hydrate($_POST);
               

                $user->getRoleId(); 
                $errors = $user->validate();

                if (empty($errors)) {
                    $userRepository = new UserRepository();
                    
                    $userRepository->persist($user);
                   header('Location: index.php?controller=user&action=veterinaire');
                }
            }

            $this->render('user/add_edit_rapport', [
                'pageTitle' => 'Espace Du Veterinaire ',
                'user' => '',
                'errors' => $errors,
                'user'=>$user
            ]);

        }
        catch (\Exception $e)
        {
            $this->render('errors/default',
             [
                'error' => $e->getMessage()]);
        }
    }


    protected function delete()
    {
        try {
            if (isset($_GET['username']))
            {
    
                $username = (string)$_GET['username'];
            
                $userRepository = new UserRepository();
                $users = $userRepository->deleteOneByUsername($username);
                header('Location: index.php?controller=user&action=list');

                $this->render('avis/delete',
                 ['pageTitle' => 'Etat des lieux ',
                 'pageResume' =>'La suppresion d\'un utilisateur',
                 'username' => $username,
                 'users'=>$users
                ]);
            } else
            {
                throw new \Exception ("L'id est manquant en paramètre");
            }
        } catch (\Exception $e) {
            $this->render('errors/default',
            ['error' => $e->getMessage()]);
        }
}


    protected function detail()
    {
        try {
            if (isset($_GET['username']))
            {

                $username = $_GET['username'];
                
                $userRepository = new UserRepository();
                
                $user = $userRepository->findOne($username);

                 $roleRepository = new RoleRepository(); 
                 $roles = $roleRepository->findAllRoleByUserId( $user->getUsername());



                 $serviceRepository = new ServiceRepository();
                 $services = $serviceRepository->findAllServiceByUserId($user->getUsername());
                
                $this->render('user/detail',
                 ['pageTitle' => 'Habitat du Zoo ',
                 'roles' => $roles,
                 'user' => $user,
                 'services'=> $services
                
                ]);
            } else
            {
                throw new \Exception ("Le username  est manquant en paramètre");
            }
        } catch (\Exception $e) {
            $this->render('errors/default',
            ['error' => $e->getMessage()]);
        }

    }
}
