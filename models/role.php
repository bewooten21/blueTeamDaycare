<?php
class role {
    private $ID, $type;
    function __construct($ID, $type) {
        
        $this->ID = $ID;
        $this->type = $type;
        
    }
    
    function getID() {
        return $this->ID;
    }

    function getType() {
        return $this->type;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setType($type) {
        $this->type = $type;
    }

}
