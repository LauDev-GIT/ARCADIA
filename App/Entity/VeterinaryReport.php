<?php

namespace App\Entity; 
use DateTime;
class VeterinaryReport extends Entity
{
    protected ?int $id= null; 
    protected DateTime $release_date;
    protected string $detail = '';
    protected int $animal_id; 
    protected string $username = '';
   

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    
    /**
     * Get the value of release_date
     */
    public function getReleaseDate(): DateTime
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     */
    public function setReleaseDate(DateTime $release_date): self
    {
        $this->release_date = $release_date; 

        return $this;
    }
    /**
     * Get the value of detail
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * Set the value of detail
     */
    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get the value of animal_id
     */
    public function getAnimalId(): int
    {
        return $this->animal_id;
    }

    /**
     * Set the value of animal_id
     */
    public function setAnimalId(int $animal_id): self
    {
        $this->animal_id = $animal_id;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /*
        Pourrait être déplacé dans une classe UserValidator
    */
    public function validate(): array
    {
        $errors = [];

        if (empty($this->getReleaseDate())) { 
           $errors['date'] = 'Le champ date ne doit pas être vide';
        }

        if (empty($this->getDetail())) { 
           $errors['detail'] = 'Le champ detail ne doit pas être vide';
        }

        /*if (empty($this->getAnimalId())) { 
           $errors['animal_id'] = 'Le champ  identification de l\'animal ne doit pas être vide';
        }*/
        if (empty($this->getUsername())) {
            $errors['username'] = 'Le champ nom de l\'utilisateur ne doit pas être vide';
        }
        
       return $errors;
    }


}