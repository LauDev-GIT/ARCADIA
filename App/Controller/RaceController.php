<?php
namespace App\Controller;

use App\Entity\Race;
use App\Repository\RaceRepository;

 class RaceController extends Controller
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
            if (isset($_GET['race_id']))
            {

                $race_id = (int)$_GET['race_id'];
                $raceRepository = new RaceRepository();
                $race = $raceRepository->findOneById($race_id);

                $this->render('race/show',
                 ['pageTitle' => 'Race de l\'animal en question de ce Zoo ',
                 'race' => $race
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
            $raceRepository = new RaceRepository();
            $races = $raceRepository->findAll();

            $this->render('race/list', [
                'pageTitle' => 'Recuperer  toutes les races :',
                'races' => $races
            ]);
        } catch (\Exception $e) 
        {
            $this->render('errors/default', [
                'races' => $races,
                'error'=> $e->getMessage()
        ]);
        }
    }
}