<?php

namespace App\Entity;

class Race extends Entity
{
    protected ?int $race_id= null;
    protected string $abel = ' ' ;


    /**
     * Get the value of race_id
     */
    public function getRaceId(): ?int
    {
        return $this->race_id;
    }

    /**
     * Set the value of race_id
     */
    public function setRaceId(?int $race_id): self
    {
        $this->race_id = $race_id;

        return $this;
    }

    /**
     * Get the value of abel
     */
    public function getAbel(): string
    {
        return $this->abel;
    }

    /**
     * Set the value of abel
     */
    public function setAbel(string $abel): self
    {
        $this->abel = $abel;

        return $this;
    }

    
}