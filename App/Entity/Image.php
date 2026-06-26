<?php

namespace App\Entity;

class Image extends Entity
{
    protected ?int $image_id = null;
    protected string $image_data = ' ';


    /**
     * Get the value of image_id
     */
    public function getImageId(): ?int
    {
        return $this->image_id;
    }

    /**
     * Set the value of image_id
     */
    public function setImageId(?int $image_id): self
    {
        $this->image_id = $image_id;

        return $this;
    }
    /**
     * Get the value of image_data
     */
    public function getImageData(): string
    {
        return $this->image_data;
    }

    /**
     * Set the value of image_data
     */
    public function setImageData(string $image_data): self
    {
        $this->image_data = $image_data;

        return $this;
    }
   
    public function getImagePath():string
    {
        if ($this->getImageData()) {
            return HABITATS_IMAGES_FOLDER.$this->getImageData();
        } else {
            return ASSETS_IMAGES_FOLDER."default-zoo.jpg";
        }
    }

    
}