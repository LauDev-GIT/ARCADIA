<?php

namespace App\Entity;
class Service extends Entity
{
    protected ?int $id = null;
    protected string $name = ' ' ;
    protected string $description = ' ' ;

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
     * Get the value of nom
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of nom
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /*
        Pourrait être déplacé dans une classe ServiceValidator
    */
    public function validate(): array
    {
        $errors = [];
        //if (empty($this->getUsername())) {
          //  $errors['first_name'] = 'Le champ prénom ne doit pas être vide';
       // }
        if (empty($this->getName())) {
            $errors['last_name'] = 'Le champ nom ne doit pas être vide';
        }
        if (empty($this->getDescription())) {
            $errors['email'] = 'Le champ description ne doit pas être vide';
        }
         
        
        return $errors;
    }
}
