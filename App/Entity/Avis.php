<?php
namespace App\Entity;
class Avis extends Entity 
{
    protected ?int $id= null;
    protected string $pseudo = '';
    protected string $comment = '';
    protected string $isVisible = '';
   

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
     * Get the value of pseudo
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of commmentaire
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the value of commment
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of isVisible
     */
    public function getIsVisible(): string
    {
        return $this->isVisible;
    }

    /**
     * Set the value of isVisible
     */
    public function setIsVisible(string $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    
    public function validate(): array
    {
        $errors = [];
        //if (empty($this->getUsername())) {
          //  $errors['first_name'] = 'Le champ prénom ne doit pas être vide';
       // }
        if (empty($this->getPseudo())) {
            $errors['last_name'] = 'Le champ nom ne doit pas être vide';
        }
        if (empty($this->getComment())) {
            $errors['email'] = 'Le champ commentaire ne doit pas être vide';
        }
         //else if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) 
         //{
            //$errors['email'] = 'L\'email n\'est pas valide';
        //}
        
        return $errors;
    }
}