<?php

namespace App\Controller;
   
   use App\Repository\ServiceRepository;
   use App\Entity\Service;
 class ServiceController extends Controller
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
                case 'edit':
                    break;
                case 'add':
                    $this->add();
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
        if (isset($_GET['id']))
        {

            $id = (int)$_GET['id'];
            $serviceRepository = new ServiceRepository();
            $service = $serviceRepository->findOneById($id);

            $this->render('service/show',
             ['pageTitle' => 'Les différents services proposés par le Zoo sont:',
             'service' => $service
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

   
    protected function list()
    {
        try {
           
            $serviceRepository = new ServiceRepository();
            $services = $serviceRepository->findAll();
            $this->render('service/list', [
                'pageTitle' => 'Tableau representant tous les services proposees :',
                'services' => $services
            ]);
        } catch (\Exception $e) {
           
            $this->render('errors/default', [
                
                'error'=> $e->getMessage()
        ]);
        }
    }
  

    protected function add()
    {
        try {
            $errors = [];
            $service = new Service();

            if (isset($_POST['saveService'])) {
                
                $service->hydrate($_POST);
  

                $errors = $service->validate();

                if (empty($errors)) {
                    $serviceRepository = new ServiceRepository();
                    
                    $serviceRepository->persist($service);
                   header('Location: index.php?controller=service&action=add');
                }
            }

            $this->render('service/add_service', [
                
                'pageTitle' => 'Modification d\'un service',
                'errors' => $errors
            ]);

        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

   
    protected function delete()
    
    {
        try {
            if (isset($_GET['id']))
            {
    
                $id = (int)$_GET['id'];
                
                $serviceRepository = new ServiceRepository();
                $services = $serviceRepository->deleteOneById($id);
                header('Location: index.php?controller=service&action=list');

                $this->render('service/delete',
                 ['pageTitle' => 'Etat des lieux ',
                 'pageResume' =>'La suppresion du service',
                 'services' => $services
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

}