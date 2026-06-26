<?php

namespace App\Entity;

class Habitat extends Entity
{

/**
 Propriétés de la class Habitat
 */

    protected ?int $id = null;
    protected string $name = ' ' ;
    protected string $description = ' ' ;
    protected  string $habitat_commentary ='';
    

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
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
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

    /**
     * Get the value of commentaireHabitat
     */
    public function getHabitatCommentary(): string
    {
        return $this->habitat_commentary;
    }

    /**
     * Set the value of commentaireHabitat
     */
    public function setHabitatCommentary(string $habitat_commentary): self
    {
        $this->habitat_commentary = $habitat_commentary;

        return $this;
    }
  
}
?>