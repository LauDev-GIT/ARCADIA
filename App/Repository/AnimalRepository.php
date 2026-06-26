<?php

namespace App\Repository;

use App\Entity\Animal;
use App\Db\Mysql;
use App\Entity\Race;
use App\Tools\StringTools;

class AnimalRepository extends Repository


{

    function findOneById(int $id): Animal|bool
    {
        // Appel bdd
       
        $query = $this->pdo->prepare('SELECT * FROM animaux WHERE id = :id'); 
        $query->bindValue(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $animalData = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($animalData)
        {
            return Animal::createAndHydrate($animalData);
        }
        else{
            return false;
    }
}



function findAll(): array
    {
        
        $query = $this->pdo->prepare("SELECT * FROM animaux");
        $query->execute();
        $animaux = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $animauxArray = [];
        if ($animaux){
            foreach ($animaux as $animal){
                $animauxArray[] = Animal::createAndHydrate($animal);
            }
        }
        return $animauxArray;
}

/**
 * fonctiion permettant d'afficher un certain nombre d'animaux du zoo a l'ecran
 * il faut lui fait une route dans le fichier animalController
 * en fait il faut observer la doc de la limit sur google
 * voci le lien:
 * https://sql.sh/cours/limit
 */
/* a retravailler
function getAnimauxPage(int $limit = null): array
    {
        $sql = "SELECT * FROM animaux
        ORDER BY id DESC";

        $query = $this->pdo->prepare($sql);
        if ($limit && !$page)
        {
            $sql .= "LIMIT :limit";
        }
         if($page) {
        $sql .= "LIMIT :offset, :limit";
        }
    if($limit){
        $query->bindValue(":limit,$limit", $this->pdo::PARAM_INT);
    }
    if($page){
        $offset = ($page-1)*$limit;
        $query->bindValue(":loffset, $offset", $this->pdo::PARAM_INT);
    }
    
        $query->execute();
        $animaux = $query->fetchAll($this->pdo::FETCH_ASSOC);
        return $animaux;
    }*/
    
    /**
     * page 1
     * LIMIT 0,2
     * page 2
     * LIMIT 2,2
     * 
     * voici le calcul qu'il faut realiser
     * je dois utiliser comme parametre 
     * param : page et limit
     * offset = (page -1) * 2
     * ou encore 
     * offset = (page * limit)-limit
     * 
     * 
     * 
     */
    function getTotalAnimaux():int{

    $query = $this->pdo->prepare ("SELECT COUNT(*) FROM `animaux`");
    $query->execute();
    $result =$query->fetch($this->pdo::FETCH_ASSOC);
    return $result('total');

    }


    public function findAllAnimal(): array
{
    
     $query = $this->pdo->prepare("SELECT * FROM races
    LEFT JOIN  animaux a ON a.race_id = races.race_id
    ");
    
    $query->execute();
    $animaux = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $animauxArray = [];

    if ($animaux) {
        foreach ($animaux as $animal) {
            $animauxArray[] = Animal::createAndHydrate($animal);
        }
    }
    return $animauxArray;
}

function persist(Animal $animal)
{

if ($animal->getId() !== null)
{
    $query = $this->pdo->prepare('UPDATE animaux SET last_name = :last_name,state=:state
    WHERE id = :id'
);
$query->bindValue(':id',$animal->getId(), $this->pdo::PARAM_INT); 

}
else
{
    $query = $this->pdo->prepare('INSERT INTO animaux (last_name, state, race_id, habitat_id )
                                            VALUES (:last_name, :state, :race_id, :habitat_id)'
);
    }
    $query->bindValue(':last_name',$animal->getLastName(), $this->pdo::PARAM_STR);
    $query->bindValue(':state',$animal->getState(), $this->pdo::PARAM_STR);
    $query->bindValue(':race_id',$animal->getRaceId(), $this->pdo::PARAM_INT); 
    $query->bindValue(':habitat_id',$animal->getHabitatId(), $this->pdo::PARAM_INT);

   
   return $query->execute();
   
     

}
/**
 * 
 * Delete
 */
public function deleteOneById(int $id)
{
    $query = $this->pdo->prepare("DELETE  FROM animaux WHERE id = :id");
    $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
    $query->execute();
    $animaux = $query->fetch($this->pdo::FETCH_ASSOC);
    if ($animaux) {
        return Animal::createAndHydrate($animaux);
    } else {
        return false;
    }
}



function updateOneById(int $id)
{
    
       
    $query = $this->pdo->prepare('UPDATE animaux SET last_name = :last_name,state=:state WHERE id = :id'
);
$query->bindValue(':id', $id, $this->pdo::PARAM_INT);
    $query->execute();
    $animalData = $query->fetch($this->pdo::FETCH_ASSOC);
    if ($animalData)
    {
        return Animal::createAndHydrate($animalData);
    }
    else{
        return false;
}
}

 public function findAllRaceId(int $id): array
 {
     
     $query = $this->pdo->prepare("SELECT * FROM animaux LEFT JOIN  races  ON races.race_id = animaux.race_id
     WHERE id = :$id");
    
 
     $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
     $query->execute();
     $animaux = $query->fetchAll($this->pdo::FETCH_ASSOC);
 
     $animauxArray = [];
 
     if ($animaux) {
         foreach ($animaux as $animal) {
             $animauxArray[] = Animal::createAndHydrate($animal);
         } 
     }
     return $animauxArray;
 }
 

 public function findAllAnimalByHabitatId(int $habitat_id): array
 {
     
     $query = $this->pdo->prepare("SELECT * FROM animaux a
     LEFT JOIN  habitats h ON h.id = a.habitat_id
     WHERE a.habitat_id  = :habitat_id");
    
     $query->bindParam(':habitat_id', $habitat_id, $this->pdo::PARAM_STR);
     $query->execute();
     $animaux = $query->fetchAll($this->pdo::FETCH_ASSOC);
 
     $animauxArray = [];
 
     if ($animaux) {
         foreach ($animaux as $animal) {
             $animauxArray[] = Animal::createAndHydrate($animal);
         }
     }
     return $animauxArray;
 }
 
 public function findVeterinaryReportByAnimalId(int $animal_id): array
 {
    
    $query = $this->pdo->prepare("SELECT * FROM animaux a
    LEFT JOIN  veterinary_report v ON v.animal_id = a.id
    WHERE v.animal_id  = :animal_id");

    $query->bindValue(':animal_id', $animal_id, $this->pdo::PARAM_STR);
    $query->execute();
    $animaux = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $animauxArray = [];

    if ($animaux) {
        foreach ($animaux as $animal) {
            $animauxArray[] = Animal::createAndHydrate($animal);
        }
    }
    return $animauxArray;
 }
}