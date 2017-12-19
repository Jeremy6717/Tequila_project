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
     * Many Product have One Category.
     * @ManyToOne(targetEntity="Models\Category", inversedBy="products")
     * @JoinColumn(name="prod_cat_id", referencedColumnName="cat_id")  
     */
    private $catid;
    
        /**
    * One Product has Many Orderlines.
    * @OneToMany(targetEntity="Orderline", mappedBy="product")
    */
    private $orderlines;
    
    public function __construct() {
        $this->orderlines = new ArrayCollection();
    }
      
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
    
    public function toArrayComplete()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'vat' => $this->vat,
            'catname'=> $this->catid->getName()
        ];
    } // end of function toArray of Class Product

    public function toArray()
    {
        return [
            'name' => $this->name,
            'stock' => $this->stock
        ];
    } // end of function toArray of Class Product
}
