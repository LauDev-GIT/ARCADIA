<?php

namespace App\Controller;


class Controller
    {
     
public function route():void
            {

              try
              {
               
                if (isset ($_GET['controller']))
              {
                
                switch ($_GET['controller'])
                {
                    case 'page':

                    
                        
                        $pageController = new PageController();
                       
                        $pageController->route();
                        break;
                        case 'auth':
                          
                          $controller = new AuthController();
                          $controller->route();
                          break;

                        case 'habitat':
                            
                          
                            $pageController = new HabitatController();
                            
                             $pageController->route();
                            break;

                            case 'image':
                           
                              $pageController = new ImageController();
                              $pageController->route();

                            break;

                            
                            case 'animal':
                           
                              $pageController = new AnimalController();
                              $pageController->route();

                            break;

                            case 'race':
                              
                              $pageController = new RaceController();
                              $pageController->route();

                            break;

                            case 'veterinaryReport':
                              
                              $pageController = new VeterinaryReportController();
                              $pageController->route();
                            break;

                            case 'avis':
                            
                              $pageController = new AvisController();
                              $pageController->route();
                              break;

                            case 'service':
                             
                              $pageController = new ServiceController();
                              $pageController->route();

                            break;

                            case 'user':
                              
                              $pageController = new UserController();
                              $pageController->route();

                            break;

                            case 'role':
                              
                              $pageController = new RoleController();
                              $pageController->route();
                              
                            break;
                           
                    default:
                       
                        throw new \Exception ("Le controleur Existe ? cela m'étonne a mon avis il est absent");

                        break;
                    }
                }
                    else 
                    {
                        $pageController = new PageController();
                        $pageController->home();
                    }
                  }
      
                            catch (\Exception $e)
                              {
                                $this->render('errors/default',[
                                  'error' =>$e->getMessage()
                                 ]);
                                 
                              }
                            }
protected function render(string $path, array $params = []):void
{
                
$filePath = _ROOTPATH_.'/templates/'.$path.'.php';
try
{
  if (!file_exists($filePath))
  {
  throw new \Exception ("Fichier non trouvé :" .$filePath);
  }
  else
  {
    extract($params);
    require_once $filePath;
  }
}
  catch (\Exception $e) {
  $this->render('errors/default',[
    'error' => $e->getMessage()
   ]);
}

}

}
