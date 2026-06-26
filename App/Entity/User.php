<?php
namespace App\Entity;
;
class User extends Entity
{
    protected ?string $username = null;
    protected string $password = '';
    protected string $first_name = '';
    protected string $last_name = '';
    protected int $service_id;
    protected int $role_id;

    /**
     * Get the value of userame
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the value of userame
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of service_id
     */
    public function getServiceId(): int
    {
        return $this->service_id;
    }

    /**
     * Set the value of service_id
     */
    public function setServiceId(int $service_id): self
    {
        $this->service_id = $service_id;

        return $this;
    }

    /**
     * Get the value of role_id
     */
    public function getRoleId(): int
    {
        return $this->role_id;
    }
 
    /**
     * Set the value of role_id
     */
    public function setRoleId(int $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }

    
    public function validate(): array
    {
        $errors = [];
        
        if (empty($this->getUsername())) {
            $errors['username'] = 'Le champ email ne doit pas être vide';
        } 
        if (empty($this->getPassword())) {
            $errors['password'] = 'Le champ mot de passe ne doit pas être vide';
        }
        if (empty($this->getFirstName())) {
            $errors['first_name'] = 'Le champ prénom ne doit pas être vide';
        }
        if (empty($this->getLastName())) {
            $errors['last_name'] = 'Le champ nom ne doit pas être vide';
        }
        
        
        return $errors;
    }

   
    public function verifyPassword(string $password): bool
    {
        if (password_verify($password, $this->password)) {
            return true;
        } else {
            return false;
        }
    }

    
    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }


    
    public static function isUser(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['roleId'] === 2;
    }

    
    public static function isAdmin(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['roleId'] === 1;
    }

    
    public static function getCurrentUsername(): int|bool
    {
        return (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) ? $_SESSION['user']['username']: false;
    }
}