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


}
