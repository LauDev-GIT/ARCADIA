<?php

namespace App\Repository;

use App\Entity\User;
use App\Db\Mysql;


class UserRepository extends Repository
{

    public function findOne(string $username):User|bool
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(':username', $username, $this->pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($user) {
            return User::createAndHydrate($user);
        } else {
            return false;
        }
    }
    public function findOneByUsername(string $username):User|bool
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->bindParam(':username', $username, $this->pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($user) {
            return User::createAndHydrate($user);
        } else {
            return false;
        }
    }

    public function persist(User $user)
    {
        /*
        if ($user->getUsername() !== null) {
                $query = $this->pdo->prepare('UPDATE users SET username = :username, password = :password,
                                                first_name = :first_name, last_name = :last_name
                                            WHERE username = :username'
                                            );
                $query->bindValue(':username', $user->getUsername(), $this->pdo::PARAM_STR);
           

        } else {*/
         
            $query = $this->pdo->prepare("INSERT INTO users (username,password,first_name,last_name,role_id,service_id)
                                                    VALUES (:username,:password,:first_name,:last_name,:role_id,:service_id)"
                                                    );
            $query->bindValue(':role_id', $user->getRoleId(), $this->pdo::PARAM_INT);
            $query->bindValue(':service_id', $user->getServiceId(), $this->pdo::PARAM_INT);

       // }
        $query->bindValue(':username', $user->getUsername(), $this->pdo::PARAM_STR);
        $query->bindValue(':first_name', $user->getFirstName(), $this->pdo::PARAM_STR);
        $query->bindValue(':last_name', $user->getLastName(), $this->pdo::PARAM_STR);
        $query->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT), $this->pdo::PARAM_STR);

        return $query->execute();
    }

    public function findAll(): array
    {
        $query = $this->pdo->prepare("SELECT * FROM users");
        $query->execute();
        $users = $query->fetchAll($this->pdo::FETCH_ASSOC);

        $usersArray = [];
        if ($users){
            foreach ($users as $user){
                $usersArray[] = User::createAndHydrate($user);
            }
        }
        return $usersArray;
    }


    public function deleteOneByUsername(string $username)
    {
        $query = $this->pdo->prepare("DELETE  FROM users WHERE username = :username");
        $query->bindParam(':username', $username, $this->pdo::PARAM_STR);
        $query->execute();
        $users = $query->fetch($this->pdo::FETCH_ASSOC);
        if ($users) {
            return User::createAndHydrate($users);
        } else {
            return false;
        }
    }

    


     public function findVeterinaryReportByUsername(int $username): array
 {
    
    $query = $this->pdo->prepare("SELECT * FROM users u
    LEFT JOIN veterinary_report v  ON v.username = u.username
    WHERE v.username  = :username");

    $query->bindParam(':username', $username, $this->pdo::PARAM_STR);
    $query->execute();
    $users = $query->fetchAll($this->pdo::FETCH_ASSOC);

    $usersArray = [];

    if ($users) {
        foreach ($users as $user) {
            $usersArray[] = User::createAndHydrate($user);
        }
    }
    return $usersArray;
 }

 
}
