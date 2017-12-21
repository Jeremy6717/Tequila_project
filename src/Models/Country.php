<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="country")
 */
class Country {
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="cou_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="cou_name", type="string", length=255, nullable=false)
     */
    private $name;
    
    /**
     * One Country has Many Customers.
     * @OneToMany(targetEntity="Customer", mappedBy="country")
     */
    private $customers;
    
    public function __construct() {
        $this->customers = new ArrayCollection();
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }    

    function setName($name) {
        $this->name = $name;
        return $this;
    }


}//class Country
