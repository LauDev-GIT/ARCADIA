<?php

namespace App\Repository;
use App\Entity\Avis; 


class AvisRepository extends Repository


{
    public function findOneById(int $id): Avis|bool
    {
        $query = $this->pdo->prepare("SELECT * FROM avis WHERE id = :id");
        $query->bindParam(':id', $id, $this->pdo::PARAM_STR); 
        $query->execute();
        $avisData = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($avisData) {
            return Avis::createAndHydrate($avisData);
        } else {
            return false;
        }
    }

    public function findAll(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM avis");
        $query->execute();
        $avis = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $avisArray = [];

        if ($avis) {
            foreach ($avis as $avi) {
                $avisArray[] = Avis::createAndHydrate($avi);
            }
        }
        return $avisArray;
    }

    

    public function persist(Avis $avis)
    {
        
        if ($avis->getId() !== null) {
           
                $query = $this->pdo->prepare('UPDATE avis SET  comment= :comment,
                                                    isVisible = :isVisible
                                                    WHERE id = :id'
                );
                $query->bindValue(':id', $avis->getId(), $this->pdo::PARAM_INT);
           

        } else {
            $query = $this->pdo->prepare('INSERT INTO avis (pseudo, comment, isVisible)
                                                    VALUES (:pseudo, :comment, :isVisible)'
            );
            $query->bindValue(':pseudo', $avis->getPseudo(), $this->pdo::PARAM_STR);

        }

        $query->bindValue(':comment', $avis->getComment(), $this->pdo::PARAM_STR);
        $query->bindValue(':isVisible', $avis->getIsVisible(), $this->pdo::PARAM_STR);
        

        return $query->execute();
    }

    public function deleteOneById(int $id)
    {
        $query = $this->pdo->prepare("DELETE  FROM avis WHERE id = :id");
        $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $avis = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($avis) {
            return Avis::createAndHydrate($avis);
        } else {
            return false;
        }
    }
}
