<?php
namespace App\Controller;

use App\Entity\Animal;
use App\Repository\HabitatRepository;

use App\Repository\AnimalRepository;


   use App\Entity\Habitat;
 class HabitatController extends Controller
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
                        break;

                    case 'edit':
                        $this->edit();
                        break;
                    case 'add':
                        break;
                    case 'delete':

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

                $habitatRepository = new HabitatRepository();
                $habitat = $habitatRepository->findOneById($id);
                 
                $this->render('habitat/show',
                 ['pageTitle' => 'Habitat du Zoo ',
                 'habitat' => $habitat
                
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

                $id = (int)$_GET['id'];

                $habitatRepository = new HabitatRepository();
                $id = (int)$_GET['id'];
                $habitat = $habitatRepository->findOneById($id);
                
                
                 $animalRepository = new AnimalRepository(); 
                 $animaux = $animalRepository->findAllAnimalByHabitatId( $habitat->getId());

                
                $this->render('habitat/edit',
                 ['pageTitle' => 'Animaux de l\'habitat du Zoo ',
                 'habitat' => $habitat,
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


?>

