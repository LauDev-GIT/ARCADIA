<?php
namespace App\Controller;
use App\Entity\Animal;
use App\Repository\AnimalRepository;
use App\Repository\HabitatRepository;
use App\Repository\RaceRepository;
use App\Repository\VeterinaryReportRepository;

 class AnimalController extends Controller
{
    public function route(): void
    {

        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    case 'only':
                        $this->only();
                        break;
                    case 'list':
                        $this->list();
                        break;
                    case 'listOnly':
                        $this->listOnly();
                        break;
                        
                    case 'page':
                        break;
                    case 'add':
                        $this->add();
                        break;
                    case 'update':
                        
                        $this->update();
                        break;
                    case 'delete':
                        
                        $this->delete();
                        break;
                    case 'vu':
                        
                        $this->edit();
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
    /** 
 * -Read
 */
protected function show()
{
    try {
        if (isset($_GET['id']))
        {
            $animalRepository = new AnimalRepository();
            $id = (int)$_GET['id'];
            $animal = $animalRepository->findOneById($id);

             if ($animal){
                $raceRepository = new RaceRepository();
                $races = $raceRepository->findAnimalByRaceId($animal->getId());
                       
                $habitatRepository = new HabitatRepository();
            $habitats = $habitatRepository->findAnimalHabitatById($animal->getId());

            $veterinaryReportRepository = new VeterinaryReportRepository();
            $veterinaryReports = $veterinaryReportRepository->findVeterinaryReportByAnimalId($animal->getId());

            }

            $this->render('animal/show',
             ['pageTitle' => 'Présentation des animaux du ZOO',
             'animal' => $animal,
             'races' => $races,
             'habitats'=>$habitats,
             'veterinaryReports'=>$veterinaryReports
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

protected function only()
{
    try {
        if (isset($_GET['id']))
        {
            $animalRepository = new AnimalRepository();
            $id = (int)$_GET['id'];
            $animal = $animalRepository->findOneById($id);

             

            $this->render('animal/only',
             ['pageTitle' => ' Consultation de l\'animal',
             'animal' => $animal
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

protected function edit()
{
    try {
        if (isset($_GET['id']))
        {

            $animalRepository = new AnimalRepository();
            $id = (int)$_GET['id'];
            $animal = $animalRepository->findOneById($id);
            
            if ($animal){
                $raceRepository = new RaceRepository();
                $races = $raceRepository->findAnimalByRaceId($animal->getId());

          
            }
            $this->render('animal/edit',
             ['pageTitle' => 'Descriptif de l\'animal du Zoo ',
             'animal' => $animal,
             'races'=> $races

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
            
            $animalRepository = new AnimalRepository();
            $animaux = $animalRepository->findAll();

            $this->render('animal/list', [
                'pageTitle' => ' Page  de tous les animaux present dans le Zoo',
                'animaux' => $animaux
              
            ]);
        } catch (\Exception $e) {
           
            $this->render('errors/default', [
                'animaux' => $animaux,
                'error'=> $e->getMessage()
        ]);
        }
    }
    
    protected function listOnly()
    {
        try {
            
            $animalRepository = new AnimalRepository();
            $animaux = $animalRepository->findAll();

            $this->render('animal/listOnly', ['pageTitle' => 'Animaux actuellement present',
                'pageTitle1' => ' Residant du Zoo',
                'animaux' => $animaux
              
            ]);
        } catch (\Exception $e) {
           
            $this->render('errors/default', [
                'animaux' => $animaux,
                'error'=> $e->getMessage()
        ]);
        }
    }

/**
 * Creat et -Update
 */
protected function add()
{
    try {
        $messages = [];
        $errors = [];
        $animal = new Animal();
          
           $raceRepository = new RaceRepository();
           $races = $raceRepository->findAll();

           $habitatRepository = new HabitatRepository();
           $habitats =  $habitatRepository->findAll();

           $animalRepository = new AnimalRepository();
           $animaux =  $animalRepository->findAll();

        if (isset($_POST['saveAnimal'])) {
           $animal->hydrate($_POST);
            $errors = $animal->validate();

            if (empty($errors)) {
                $animalRepository = new AnimalRepository();
                
                $animalRepository->persist($animal);
                
                
                if($animal){

                    $messages[] = "Votre enregistrement a bien ete enregistrer";
                   
                    if ($animal){
                        header('Location: index.php?controller=animal&action=add');
                        
                    }else{
                        $messages[] = "la modification n'as pas pu s'effectuer";

                    }
            }
              
            }
        }

        $this->render('animal/ajout_modification_animal', [
            
            'pageTitle' => 'Ajout  d\'un animal',
            'errors' => $errors,
            'messages'=> $messages,
            'races'=> $races,
            'habitats'=> $habitats,
            'animaux' => $animaux
        ]);

    } catch (\Exception $e) {
        $this->render('errors/default', [
            'error' => $e->getMessage()
        ]);
    }
}
 
  /**
   * -Delete
*/
    protected function delete()
    
    {
        try {
            if (isset($_GET['id']))
            {
    
                $id = (int)$_GET['id'];
                
                $animalRepository = new AnimalRepository();
                $animaux = $animalRepository->deleteOneById($id);
                header('Location: index.php?controller=animal&action=list');

                $this->render('animal/delete',
                 ['pageTitle' => 'Etat des lieux ',
                 'pageResume' =>'La suppresion de l\' animal',
                 'animaux' => $animaux
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

