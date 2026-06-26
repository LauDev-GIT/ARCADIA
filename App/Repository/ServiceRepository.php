<?php

namespace App\Repository;

use App\Entity\Service;
use App\Db\Mysql;
use App\Tools\StringTools;

class ServiceRepository extends Repository
{
    public function findOneById(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM services WHERE id = :id");
        $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $services = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($services) {
            return Service ::createAndHydrate($services);
        } else {
            return false;
        }
    }

    function findAll(): array
    {
      
        $query = $this->pdo->prepare("SELECT * FROM services");
        $query->execute();
        $services = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $servicesArray = [];
        if ($services){
            foreach ($services as $service){
                $servicesArray[] = Service::createAndHydrate($service);
            }
        }
        return $servicesArray;
}


    public function persist(Service $service)
    {
        
        if ($service->getId() !== null) {
                $query = $this->pdo->prepare('UPDATE services SET name = :name, description = :description,
                                                
                                            WHERE id = :id'
                                            );
                $query->bindValue(':id', $service->getid(), $this->pdo::PARAM_INT);

        } else {
            $query = $this->pdo->prepare("INSERT INTO services (name,description)
                                                    VALUES (:name,:description)"
                                                    );

       
        $query->bindValue(':name', $service->getname(), $this->pdo::PARAM_STR);
        $query->bindValue(':description', $service->getDescription(), $this->pdo::PARAM_STR);
        
        return $query->execute();
    }

}


 public function deleteOneById(int $id)
 {
     $query = $this->pdo->prepare("DELETE  FROM services WHERE id = :id");
     $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
     $query->execute();
     $service = $query->fetch($this->pdo::FETCH_ASSOC);
     if ($service) {
         return Service::createAndHydrate($service);
     } else {
         return false;
     }
 }



 

 public function findAllServiceByUserId (string $username): array
 {
  
     $query = $this->pdo->prepare("SELECT * FROM users u
     LEFT JOIN  services s ON s.id = u.service_id
     WHERE u.username  = :username");
    
     $query->bindParam(':username', $username, $this->pdo::PARAM_STR);
     $query->execute();
     $services = $query->fetchAll($this->pdo::FETCH_ASSOC);
 
     $servicesArray = [];
 
     if ($services) {
         foreach ($services as $service) {
             $servicesArray[] = Service::createAndHydrate($service);
         }
     }
     return $servicesArray;
 }


}