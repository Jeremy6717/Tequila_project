<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="orders")
 */
class Orders {
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="ord_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="ord_date", type="string", length=10, nullable=false)
     */
    private $date;
    
    /**
     * @Column(name="ord_payment", type="string", length=15, nullable=false)
     */
    private $payment;
    
       
    /**
    * @ManyToOne(targetEntity="Customer")
    * @JoinColumn(name="ord_cust_id", referencedColumnName="cust_id")
    */
    private $custid;
    
    
    // ...
    /**
    * One Order has Many Orderlines.
    * @OneToMany(targetEntity="Orderline", mappedBy="order")
    */
    private $orderlines;
    
    public function __construct() {
        $this->orderlines = new ArrayCollection();
    }
    
    
    function getId() {
        return $this->id;
    }

    function getDate() {
        return $this->date;
    }

    function getPayment() {
        return $this->payment;
    }

    function getCustid() {
        return $this->custid;
    }

    function setDate($date) {
        $this->date = $date;
        return $this;
    }

    function setPayment($payment) {
        $this->payment = $payment;
        return $this;
    }

    function setCustid($custid) {
        $this->custid = $custid;
        return $this;
    }


}//class Orders
