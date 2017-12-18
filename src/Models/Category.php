<?php

namespace Models;

use \Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity()
 * @Table(name="category")
 */
class Category {
   /**
     * @Id()
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
     * @OneToMany(targetEntity="Product", mappedBy="catid")
     */
    private $products;
    
    public function __construct() {
        $this->products = [];
    }
     
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    
    function getProducts() {
        return $this->products;
    }

    function setProducts($products) {
        $this->products = $products;
        return $this;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    

}
