<?php

namespace App\Repository;

use App\Entity\Image;
use App\Db\Mysql;
use App\Tools\StringTools; 

class ImageRepository extends Repository


{
   
 function findOneById(int $image_id):Image|bool
    {
        
        $query = $this->pdo->prepare('SELECT * FROM images WHERE image_id = :image_id');
        $query->bindValue(':image_id', $image_id, $this->pdo::PARAM_INT);
        $query->execute();
        $imageData = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($imageData)
        {
            return Image::createAndHydrate($imageData);
        }
        else{
            return false;
    }
}

public function findAll(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM images");
        $query->execute();
        $images = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $imagesArray = [];

        if ($images) {
            foreach ($images as $image) {
                $imagesArray[] = Image::createAndHydrate($image);
            }
        }
        return $imagesArray;
    }
    
}