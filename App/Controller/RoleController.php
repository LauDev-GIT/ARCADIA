<?php

namespace App\Controller;
   
   use App\Repository\RoleRepository;
   use App\Entity\Role;
 class RoleController extends Controller
{
    public function route(): void
    {
      try {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'show':
                    $this->show();
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
        if (isset($_GET['id']))
        {

            $id = (int)$_GET['id'];
           
            $roleRepository = new RoleRepository();
            $role = $roleRepository->findOneById($id);

            $this->render('role/show',
             ['role' => $role,
            'pageTitle' => 'Les Différents rôle des utilisateurs  sont:']);  
        } else 
        {
            throw new \Exception ("L'id est manquant en paramètre");
        }
    } catch (\Exception $e) {
        $this->render('errors/default',
        ['error' => $e->getMessage()]);
    }

}
}
?>