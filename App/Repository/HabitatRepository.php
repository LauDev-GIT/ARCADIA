<?php

namespace App\Repository;

use App\Entity\Habitat;
use App\Db\Mysql;
use App\Tools\StringTools;

class HabitatRepository extends Repository


{
    
 function findOneById(int $id):Habitat|bool
    {
        $query = $this->pdo->prepare('SELECT * FROM habitats WHERE id = :id');
        $query->bindValue(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $habitatData = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($habitatData)
        {
            return Habitat::createAndHydrate($habitatData);
        }
        else{
            return false;
    }
}

public function findAll(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM habitats');
        $query->execute();
        $habitats = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $habitatsArray = [];

        if ($habitats) {
            foreach ($habitats as $habitat) {
                $habitatsArray[] = Habitat::createAndHydrate($habitat);
            }
        }
        return $habitatsArray;
    }


public function findAllHabitatId(int $animal_id): array
{
    
    $query = $this->pdo->prepare("SELECT * FROM habitats
    LEFT JOIN  animaux a ON a.habitat_id = habitats.id
    WHERE a.habitat_id  = :habitat_id");
   

    $query->bindParam(':animal_id', $animal_id, $this->pdo::PARAM_INT);
    $query->execute();
    $habitats = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $habitatsArray = [];

    if ($habitats) {
        foreach ($habitats as $habitat) {
            $habitatsArray[] = Habitat::createAndHydrate($habitat);
        }
    }
    return $habitatsArray;
}

public function findAllImageId(int $image_id): array
{
    $query = $this->pdo->prepare("SELECT * FROM habitats
    LEFT JOIN  contain c ON c.habitat_id = habitats.id
    WHERE c.habitat_id  = :image_id");
    $query->bindParam(':image_id', $image_id, $this->pdo::PARAM_STR);
    $query->execute();
    $habitats = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $habitatsArray = [];

    if ($habitats) {
        foreach ($habitats as $habitat) {
            $habitatsArray[] = Habitat::createAndHydrate($habitat);
        }
    }
    return $habitatsArray;
}


public function findAnimalHabitatById(int $animal_id): array
{
    
    $query = $this->pdo->prepare("SELECT * FROM habitats
    LEFT JOIN  animaux a ON a.habitat_id = habitats.id
    WHERE a.id  = :animal_id");
   
    $query->bindParam(':animal_id', $animal_id, $this->pdo::PARAM_STR);
    $query->execute();
    $habitats = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $habitatsArray = [];

    if ($habitats) {
        foreach ($habitats as $habitat) {
            $habitatsArray[] = Habitat::createAndHydrate($habitat);
        }
    }
    return $habitatsArray;
}

public function findAllAnimalId(int $animal_id): array
{
    
    $query = $this->pdo->prepare("SELECT * FROM habitats
    LEFT JOIN  animaux a ON a.habitat_id = habitats.id
    WHERE a.habitat_id  = :animal_id");
   
    $query->bindParam(':animal_id', $animal_id, $this->pdo::PARAM_STR);
    $query->execute();
    $habitats = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $habitatsArray = [];

    if ($habitats) {
        foreach ($habitats as $habitat) {
            $habitatsArray[] = Habitat::createAndHydrate($habitat);
        } 
    }
    return $habitatsArray;
}

}
