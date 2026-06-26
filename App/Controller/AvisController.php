<?php
namespace App\Controller;
use App\Repository\AvisRepository;
use App\Entity\Avis;

 class AvisController extends Controller
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
                    case 'avisUnique':
                        $this->avisUnique();
                       
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

                $avisRepository = new AvisRepository();
                $avis = $avisRepository->findOneById($id);

                $this->render('avis/show',
                 ['pageTitle' => 'Avis du Visiteur',
                 'avis' => $avis
                 
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
           
            $avisRepository = new AvisRepository();
            $avies = $avisRepository->findAll();
            $this->render('avis/list', [
                'pageTitle' => 'liste d\'eventuelle avis :',
                'avies' => $avies
            ]);
        } catch (\Exception $e) {
            
            $this->render('errors/default', [
                'avies' => $avies,
                'error'=> $e->getMessage()
        ]);
        }
    }

    protected function avisUnique()
    {
        try {

            $avisRepository = new AvisRepository();
            $avies = $avisRepository->findAll();
            $this->render('avis/avisUnique', [
                'pageTitle' => ' avis d\'un visteur:',
                'avies' => $avies
            ]);
        } catch (\Exception $e) {
           
            $this->render('errors/default', [
                'avies' => $avies,
                'error'=> $e->getMessage()
        ]);
        }
    }
   
    protected function add()
    {
        try {
            $messages =[];
            $errors = [];
            $avis = new Avis();

            if (isset($_POST['saveAvis'])) {
                
                $avis->hydrate($_POST);
                $errors = $avis->validate();

                if (empty($errors)) {
                    $avisRepository = new AvisRepository();
                    
                    $avisRepository->persist($avis);
                    if($avis){
                        $messages[] = "Votre avis a bien ete enregistrer";
                    }
                    else
                    {
                        $errors[] = " Une erreur s'est intoduite durant l'ajout de l'avis";
                    }
                  
                }
            }

            $this->render('avis/add_edit', [
                
                'pageTitle' => 'Votre avis Compte',
                'errors' => $errors,
                'messages'=>$messages
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

                $avisRepository = new AvisRepository();
                $avis = $avisRepository->deleteOneById($id);
                header('Location: index.php?controller=avis&action=list');

                $this->render('avis/delete',
                 ['pageTitle' => 'Etat des lieux ',
                 'pageResume' =>'La suppresion de l\' avis',
                 'avis' => $avis
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
