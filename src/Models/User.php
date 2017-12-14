<?php
namespace Models;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User is a Class for the table User where User are those connecting to the
 * reporting application
 *
 * @author Tam
 */

/**
 * @Entity()
 * @Table(name="user")
 */
class User implements UserInterface{
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="user_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="usr_username", type="string", length=45, nullable=false)
     */
    private $username;
  
    
    /**
     * @Column(name="usr_firstname", type="string", length=45, nullable=false)
     */
    private $firstname;
    
    /**
     * @Column(name="usr_lastname", type="string", length=45, nullable=false)
     */
    private $lastname;
    
    /**
     * @Column(name="usr_email", type="string", length=45, nullable=false)
     */
    private $email;
          
    /**
     * @Column(name="usr_password", type="string", length=45, nullable=false)
     */
    private $password;
    
    /**
     * @Column(name="usr_newsletter", type="boolean", length=1, nullable=false)
     */
    private $newsletter;
    
    /**
     * @Column(name="usr_report", type="boolean", length=1, nullable=false)
     */
    private $report;
    
    private $roles = [];
    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNewsletter() {
        return $this->newsletter;
    }

    public function getReport() {
        return $this->report;
    }

    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;
        return $this;
    }

    function setReport($report) {
        $this->report = $report;
        return $this;
    }
    
    function setRoles(array $roles) {
        $this->roles = [];
        foreach ($roles as $role) {
            $this->addRole($role);
        }
        return $this;
    }
    
    function addRole(Role $role)
    {
        if (in_array($role, $this->roles)) {
            return $this;
        }
        
        $this->roles[] = $role;
        return $this;
    }

    public function getRoles()
    {
        $roles = [];
        foreach ($this->roles as $role) {
            $roles[] = $role->getLabel();
        }
        
        return $roles;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'newsletter'=> $this->newsletter,
            'report' => $this->report,
            'roles' => $this->getRoles()
        ];
    }
    
      public function eraseCredentials()
    {
        return;
    }
    
    public function getPassword() {
        return $this->password;
    }

     public function getSalt()
    {
        return;
    }
    
}
