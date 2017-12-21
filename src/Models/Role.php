<?php

namespace Models;
/**
 * @Entity()
 * @Table(name="role")
 */
class Role {
    /**
     * @id()
     * @GeneratedValue()
     * @Column(name="rol_id", type="integer", nullable=false)
     */
    protected $id;
    
    /**
     * @Column(name="rol_label", type="string", length=255, nullable=false)
     */
    private $label;
    
    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setLabel($label) {
        $this->label = $label;
        return $this;
    }

  
}//class Role
