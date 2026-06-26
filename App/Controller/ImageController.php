<?php
namespace App\Controller;
   
   use App\Repository\ImageRepository;
   use App\Repository\HabitatRepository;

   use App\Entity\Image;
 class ImageController extends Controller
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
            if (isset($_GET['image_id']))
            {

                $image_id = (int)$_GET['image_id'];

                $imageRepository = new ImageRepository();
                $image = $imageRepository->findOneById($image_id);

                if ($image){
                    $habitatRepository = new HabitatRepository();
                $habitats = $habitatRepository->findAllImageId($image->getImageId());
                }

                $this->render('image/show',
                 ['pageTitle' => 'Annotation de l\'image',
                 'image' => $image,
                 'habitats'=>$habitats
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

