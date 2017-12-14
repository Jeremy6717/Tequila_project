<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="product")
 */
class Product {
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="prod_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="prod_name", type="string", length=45, nullable=false)
     */
    private $name;
    
    /**
     * @Column(name="prod_description", type="string", length=255, nullable=false)
     */
    private $description;
    
    /**
     * @Column(name="prod_price", type="float", nullable=false)
     */
    private $price;
    
    /**
     * @Column(name="prod_stock", type="integer", nullable=false)
     */
    private $stock;
    
    /**
     * @Column(name="prod_vat", type="integer", nullable=false)
     */
    private $vat;
    
    /**
     * @Column(name="prod_cat_id", type="integer", nullable=false)
     */
    private $catid;
    
    /**
     * Many Products have One Category
     * @ManyToOne(targetEntity="Category", inversedBy="products"
     */
    private $category;
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getVat() {
        return $this->vat;
    }

    public function getCatid() {
        return $this->catid;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    function setVat($vat) {
        $this->vat = $vat;
        return $this;
    }

    function setCatid($catid) {
        $this->catid = $catid;
        return $this;
    }


}
