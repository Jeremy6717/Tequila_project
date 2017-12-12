<?php

namespace Models;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Entity()
 * @Table(name="user")
 */
class UserModel
{
    /**
     * @Column(name="lastname", type="string", length= , nullable=false)
     */
    private $lastname;

    /**
     * @Column(name="firstname", type="string", length= , nullable=false)
     */
    private $firstname;

    /**
     * @Column(name="username", type="text", length= , nullable=false)
     */
    private $username;

    /**
     * @Column(name="password", type="text", length= , nullable=false)
     */
    private $password;



    public function getLastname() {
        return $this->lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }



    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }


    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }



    public function toArray()
    {
        return [
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }



}