<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
class UserEntity extends Entity
{
    /**
     * @param int|null $id
     * 
     * @return UserEntity
     */
    public function setId(int|null $id) : UserEntity
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() : int | null
    {
        return $this->attributes['id'];
    }

    /**
     * @param string $firstName
     * 
     * @return UserEntity
     */
    public function setFirstName(string $firstName) : UserEntity
    {
        $this->attributes['first_name'] = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName() : string
    {
        return $this->attributes['first_name'];
    }

    /**
     * @param string $lastName
     * 
     * @return UserEntity
     */
    public function setLastName(string $lastName) : UserEntity
    {
        $this->attributes['last_name'] = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->attributes['last_name'];
    }

    /**
     * @param string $email
     * 
     * @return UserEntity
     */
    public function setEmail(string $email) : UserEntity
    {
        $this->attributes['email'] = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->attributes['email'];
    }

    /**
     * @param string $password
     * 
     * @return UserEntity
     */
    public function setPassword(string $password) : UserEntity
    {
        $this->attributes['pass'] = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->attributes['pass'];
    }

    /**
     * @param string $createdAt
     * 
     * @return UserEntity
     */
    public function setCreatedAt(string $createdAt) : UserEntity
    {
        $this->attributes['created_at'] = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt() : string
    {
        return $this->attributes['created_at'];
    }
}