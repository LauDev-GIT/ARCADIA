<?php

namespace App\Repository;

use App\Entity\Race;
use App\Db\Mysql;
use App\Tools\StringTools;

class RaceRepository extends Repository


{

    function findOneById(int $race_id):Race|bool
    {
       
        $query = $this->pdo->prepare('SELECT * FROM races WHERE race_id = :race_id');
        $query->bindValue(':race_id', $race_id, $this->pdo::PARAM_INT);
        $query->execute();
        $raceData = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($raceData)
        {
            return Race::createAndHydrate($raceData);
        }
        else{
            return false;
    }
}


public function findAll(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM races');
        $query->execute();
        $races = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $racesArray = [];

        if ($races) {
            foreach ($races as $race) {
                $racesArray[] = Race::createAndHydrate($race);
            }
        }
        return $racesArray;
    }

    
public function findAllAnimalId(int $id): array
{
    
     $query = $this->pdo->prepare("SELECT * FROM races r
    LEFT JOIN  animaux a ON a.race_id = r.race_id
    WHERE a.id  = :$id");
    

    $query->bindParam(':id', $id, $this->pdo::PARAM_STR);
    $query->execute();
    $races = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $racesArray = [];

    if ($races) {
        foreach ($races as $race) {
            $racesArray[] = Race::createAndHydrate($race);
        }
    }
    return $racesArray;
}

public function findAnimalByRaceId(int $id): array
{
    
     $query = $this->pdo->prepare("SELECT * FROM races r
    LEFT JOIN  animaux a ON a.race_id = r.race_id
    WHERE a.id  = :id");
    

    $query->bindParam(':id', $id, $this->pdo::PARAM_STR);
    $query->execute();
    $races = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $racesArray = [];

    if ($races) {
        foreach ($races as $race) {
            $racesArray[] = Race::createAndHydrate($race);
        }
    }
    return $racesArray;
}
}