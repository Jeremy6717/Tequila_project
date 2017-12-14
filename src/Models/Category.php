<?php

namespace Models;

use \Doctrine\Common\Collections\ArrayCollection;
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
    
    /**
     * One Category has many Products.
     * @OneToMany(targetEntity="Product", mappedBy="category")
     */
    private $products;
  
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    
    public function __construct() {
        $this->name = new ArrayCollection();
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }


}
