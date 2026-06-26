<?php

namespace App\Repository;
use App\Db\Mysql;
use App\Entity\Role;
use App\Tools\StringTools;

class RoleRepository extends Repository
{

    public function findOneById(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM roles WHERE id = :id");
        $query->bindParam(':id', $id, $this->pdo::PARAM_INT);
        $query->execute();
        $services = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($services) {
            return Role ::createAndHydrate($services);
        } else {
            return false;
        }
    }

    function findAll(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM roles");
        $query->execute();
        $roles = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $rolesArray = [];
        if ($roles){
            foreach ($roles as $role){
                $rolesArray[] = Role::createAndHydrate($role);
            }
        }
        return $rolesArray;
}


 public function findAllRoleByUserId(string $username): array
 {
     
     $query = $this->pdo->prepare("SELECT * FROM users u
     LEFT JOIN  roles r ON r.id = u.role_id
     WHERE u.username  = :username");
    
     $query->bindParam(':username', $username, $this->pdo::PARAM_INT);
     $query->execute();
     $roles = $query->fetchAll($this->pdo::FETCH_ASSOC);
 
     $rolesArray = [];
 
     if ($roles) {
         foreach ($roles as $role) {
             $rolesArray[] = Role::createAndHydrate($role);
         }
     }
     return $rolesArray;
 }

}