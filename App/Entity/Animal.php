<?php

namespace App\Entity;
 
class Animal extends Entity
{
    protected ?int $id = null  ;
    protected string $last_name = '';
    protected string $state = '';
    protected int $race_id;
    protected int $habitat_id;

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
     * Get the value of prenom
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of prenom
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of state
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of race_id
     */
    public function getRaceId(): int
    {
        return $this->race_id;
    }

    /**
     * Set the value of race_id
     */
    public function setRaceId(int $race_id): self
    {
        $this->race_id = $race_id;

        return $this;
    }

    /**
     * Get the value of habitat_id
     */
    public function getHabitatId(): int
    {
        return $this->habitat_id;
    }

    /**
     * Set the value of habitat_id
     */
    public function setHabitatId(int $habitat_id): self
    {
        $this->habitat_id = $habitat_id;

        return $this;
    }
    
    public function validate(): array
    {
        $errors = [];
        
        if (empty($this->getLastName())) {
            $errors['last_name'] = 'veuillez saisir le nom de l\'animal s\'il vous plait';
        } 
        if (empty($this->getState())) {
            $errors['state'] = 'veuillez saisir l\'état dans lequel se trouve l\'animal';
        }
        //if (empty($this->getFirstName())) {
        //    $errors['first_name'] = 'Le champ prénom ne doit pas être vide';
        //}
        //if (empty($this->getLastName())) {
         //   $errors['last_name'] = 'Le champ nom ne doit pas être vide';
        //}
        
        
        return $errors;
    }


}
