<?php

namespace App\Repository; 

use App\Entity\VeterinaryReport;
use App\Db\Mysql;
use App\Tools\StringTools;

class VeterinaryReportRepository extends Repository


{

    public function findOneById(int $id ): VeterinaryReport|bool
    {
        $query = $this->pdo->prepare("SELECT * FROM veterinary_report WHERE id = :id");
        $query->bindValue(':id', $id, $this->pdo::PARAM_INT);


        //$query->bindParam(':date',Date('y-m-d'), $this->pdo::PARAM_STR);
        $query->execute();
        $veterinaryReportData = $query->fetch($this->pdo::FETCH_ASSOC);
        var_dump($veterinaryReportData);

        if ($veterinaryReportData) {
            return VeterinaryReport::createAndHydrate($veterinaryReportData);
        } else {
            return false;
        }
    }
    /**
     * Fonction renvoyant la table concernant les rapports des vetrinaires
     */

    public function findAllReport():array
    {
        $query = $this->pdo->prepare("SELECT * FROM veterinary_report");
        $query->execute();
        $reports = $query->fetchAll($this->pdo::FETCH_ASSOC);

        

        $reportsArray = [];
        
        if ($reports){
            foreach ($reports as $report){
                $reportsArray[] = VeterinaryReport::createAndHydrate($report);
            }
        }
        return $reportsArray;
    }



    public function findOneByDetail(string $detail)
    {
        $query = $this->pdo->prepare("SELECT * FROM veterinary_report WHERE detail = :detail");
        $query->bindParam(':detail', $detail, $this->pdo::PARAM_STR);
        $query->execute();
        $veterinaryReport = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($veterinaryReport) {
            return VeterinaryReport::createAndHydrate($veterinaryReport);
        } else {
            return false;
        }
    }


    /**lors de la saisi d'un nouveau rapport  */
    public function persist(VeterinaryReport $veterinaryReport)
    {
        
        if ($veterinaryReport->getId() !== null) {
            
                $query = $this->pdo->prepare('UPDATE veterinary_Report SET release_date = :release_date, detail = :detail
                                                    WHERE id = :id'
                );
                $query->bindValue(':id', $veterinaryReport->getId(), $this->pdo::PARAM_INT);
           

        } else {
            $query = $this->pdo->prepare("INSERT INTO veterinary_Report (release_date, detail,animal_id,username)
                                                    VALUES (:release_date, :detail, :animal_id, :username)"
            );
            
           $query->bindParam(':release_date', Date('y-m-d '), $this->pdo::PARAM_STR);
            

        }

         
         
          $query->bindValue(':detail', $veterinaryReport->getDetail(), $this->pdo::PARAM_STR);
          $query->bindValue(':animal_id', $veterinaryReport->getAnimalId(), $this->pdo::PARAM_INT);
         $query->bindValue(':username', $veterinaryReport->getUsername(), $this->pdo::PARAM_STR);
        return $query->execute();
    }

    public function deleteOneById(int $id)
    {
        $query = $this->pdo->prepare("DELETE  FROM veterinary_report WHERE id = :id");
        $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $veterinaryReport = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($veterinaryReport) {
            return VeterinaryReport::createAndHydrate($veterinaryReport);
        } else {
            return false;
        }
    }


   
public function findVeterinaryReportByAnimalId(int $animal_id)
{

    $query = $this->pdo->prepare("SELECT * FROM veterinary_report v
    LEFT JOIN  animaux a ON a.id = v.animal_id
    WHERE v.animal_id  = :animal_id");

    $query->bindValue(':animal_id', $animal_id, $this->pdo::PARAM_INT);
    $query->execute();
    $veterinaryReports = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $veterinaryReportsArray = [];

    if ($veterinaryReports) {
        foreach ($veterinaryReports as $veterinaryReport) {
            $veterinaryReportsArray[] = VeterinaryReport::createAndHydrate($veterinaryReport);
        }
    }
    return $veterinaryReportsArray;
}
}