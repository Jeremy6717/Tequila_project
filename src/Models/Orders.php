<?php

namespace Models;

/**
 * @Entity()
 * @Table(name="orders")
 */
class Order {
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
     * @Column(name="ord_cust_id", type="integer", nullable=false)
     */
    private $custid;
    
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


}
