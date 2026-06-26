<?php

namespace App\Entity;
class Role extends Entity
{
    protected ?int $id = null;
    protected ?string $label = 'null';
      

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
     * Get the value of role
     */
    public function getlabel(): ?string
    {
        return $this->label;
    }

    /**
     * Set the value of role
     */
    public function setlabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }
}