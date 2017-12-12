<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="customer")
 */
class Customer {
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="cat_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="cust_firstname", type="string", length=45, nullable=false)
     */
    private $firstname;
    
    /**
     * @Column(name="cust_lastname", type="string", length=45, nullable=false)
     */
    private $lastname;
    
    /**
     * @Column(name="cust_email", type="string", length=45, nullable=false)
     */
    private $email;
    
    /**
     * @Column(name="cust_address", type="string", length=45, nullable=false)
     */
    private $address;
    
    /**
     * @Column(name="cust_postcode", type="string", length=10, nullable=false)
     */
    private $postcode;
    
    /**
     * @Column(name="cust_city", type="string", length=45, nullable=false)
     */
    private $city;
    
    /**
     * @Column(name="cust_cou_id", type="integer", nullable=false)
     */
    private $couid;
    
    public function getId() {
        return $this->id;
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

    public function getAddress() {
        return $this->address;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCouid() {
        return $this->couid;
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

    function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    function setPostcode($postcode) {
        $this->postcode = $postcode;
        return $this;
    }

    function setCity($city) {
        $this->city = $city;
        return $this;
    }

    function setCouid($couid) {
        $this->couid = $couid;
        return $this;
    }


          
}
