<?php
namespace App\Controller;
use App\Repository\HabitatRepository;
class PageController extends Controller
{
    
    public function route():void 
            {

try
  {
  if (isset ($_GET['action']))
      {
    
            switch ($_GET['action']) 
        {
        case 'about':
            $this->about();
            break;
            case 'home':
                $this->home();
                break;
        default:
              throw new \Exception("Eh!! ben ca alors ..Cette action existe, je pense qu'elle est absente :".$_GET['action']);
            break;
        }

      }
      else
      {
       throw new \Exception("Aucune Action détectée" );
      }
    
  }
    catch (\Exception $e)
  {

$this->render('errors/default',[
  'error' =>$e->getMessage()
 ]);
  }
}
 

protected function about()
{


$params = ['test'=> 'Arcadia',
            'test1'=> 'département de la Bretagne (Forêt de Broceliande)',
            'test2'=> 'tel : 01 32 77 35 78',
            'test3'=> 'Information générales:',
            'test4'=> 'info@arcadia.net',
            'test5'=> 'information pour les groupes',
            'test6'=> '(+ de 20 pers):',
            'test7'=> 'resa@arcadia.net'
            

];

  
$this->render('page/about',$params);

}

 protected function home()
 {
           {
    
    $this->render('page/home', [
        
        'test' => "Présentation du",
         'nom' => "Zoo Arcadia",
        
    ]);
   
}
 }
}

