<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\VeterinaryReport;
use App\Repository\VeterinaryReportRepository;
use App\Repository\AnimalRepository;


 class VeterinaryReportController extends Controller
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
                    throw new \Exception("Cette action du controller n'existe pas : " . $_GET['action']);
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
            $veterinaryReportRepository = new VeterinaryReportRepository();
            $veterinaryReport = $veterinaryReportRepository->findOneById($id);

            
             
            if ($veterinaryReport){
                $animalRepository = new AnimalRepository();
                $animaux = $animalRepository->findVeterinaryReportByAnimalId($veterinaryReport->getId());

                $userRepository = new UserRepository();
                $users = $userRepository->findVeterinaryReportByUsername($veterinaryReport->getId());
            }
            

            $this->render('veterinaryReport/show',
             ['pageTitle' => 'Descriptif du rapport du Vétérinaire',
             'veterinaryReport' => $veterinaryReport,
             'animaux'=>$animaux,
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

protected function list()
    {
        try {
           
            $veterinaryReport = new VeterinaryReportRepository();
            $veterinary_report = $veterinaryReport->findAllReport();
            
            $this->render('veterinaryReport/report',
            [
                'pageTitle' => 'Recapitulatif des Rapports de tous les Veterinaires du Zoo Arcadia',
                'veterinary_report' => $veterinary_report
            ]);
        } catch (\Exception $e) {
           
            $this->render('errors/default', [
                'veterinary_report' => $veterinary_report,
                'error'=> $e->getMessage()
        ]);
        }
    }


protected function add()
    {
        try {
            
            $errors = [];
            $veterinaryReport = new VeterinaryReport();
            
           $animalRepository = new AnimalRepository();
           $animaux =  $animalRepository->findAll();

            if (isset($_POST['saveVeterinaryReport'])) {
                 
                $veterinaryReport->hydrate($_POST);

                $errors = $veterinaryReport->validate();

                if (empty($errors)) {
                    $veterinaryReportRepository = new VeterinaryReportRepository();
                    
                    $veterinaryReportRepository->persist($veterinaryReport);

                   header('Location: index.php?controller=veterinaryReport&action=list');
                }
            }

            $this->render('veterinaryReport/add_edit_rapport', [
                'veterinaryReport' => $veterinaryReport,
                'pageTitle' => 'formulaire Espace vétérinaire',
                'errors' => $errors,
                'animaux'=>$animaux
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
                $veterinaryReportRepository = new VeterinaryReportRepository();
                $veterinaryReport = $veterinaryReportRepository->deleteOneById($id);

                header('Location: index.php?controller=veterinaryReport&action=list');
                
                $this->render('veterinaryReport/delete',
                 ['pageTitle' => 'Etat des lieux ',
                 'pageResume'=>'La suppresion du rapport a bien ete effectue',
                 'veterinaryReport' => $veterinaryReport
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

?>
    
