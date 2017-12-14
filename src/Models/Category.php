<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="category")
 */
class Category {
   /**
     * @id()
     * @GeneratedValue()
     * @Column(name="cat_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="cat_name", type="string", length=255, nullable=false)
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
