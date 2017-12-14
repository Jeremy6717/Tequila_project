<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="orderline")
 */
class Orderline {
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="ol_ord_id", type="integer", nullable=false)
     */
    protected $orderid;
    
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="ol_prod_id", type="integer", nullable=false)
     */
    protected $prodid;
    
    /**
     * @Column(name="ol_quantity", type="integer", nullable=false)
     */
    private $quantity;
    
    public function getOrderid() {
        return $this->orderid;
    }

    public function getProdid() {
        return $this->prodid;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }


}
