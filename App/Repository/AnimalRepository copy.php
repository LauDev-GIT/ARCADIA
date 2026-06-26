<?php

namespace App\Repository;

use App\Entity\Animal;
use App\Db\Mysql;
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
    LEFT JOIN  animaux a ON a.race_id = races.race_id");
    
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