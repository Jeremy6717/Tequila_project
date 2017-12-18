<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="orderline")
 */
class Orderline {
    /**
     * @id()
     * @Column(name="ol_ord_id", type="integer", nullable=false)
     */
    protected $orderid;
    
    /**
     * Many Orderlines have One Order.
     * @ManyToOne(targetEntity="Orders", inversedBy="orderlines")
     * @JoinColumn(name="ol_ord_id", referencedColumnName="ord_id")
     */
    private $order;
    
    
    /**
     * @id()
     * @Column(name="ol_prod_id", type="integer", nullable=false)
     */
    protected $prodid;
    
    /**
     * @Column(name="ol_quantity", type="integer", nullable=false)
     */
    private $quantity;
    
    
    /**
     * Many Orderlines have One Product.
     * @ManyToOne(targetEntity="Product", inversedBy="orderlines")
     * @JoinColumn(name="ol_prod_id", referencedColumnName="prod_id")
     */
    private $product;
    
    public function getOrder() {
        return $this->order;
    }
    
    public function getOrderid() {
        return $this->orderid;
    }

    public function getProdid() {
        return $this->prodid;
    }

    public function getQuantity() {
        return $this->quantity;
    }
    
    public function getProduct() {
        return $this->product;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }


}
