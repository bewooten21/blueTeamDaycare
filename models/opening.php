<?php
class opening {
    private $ID, $companyID, $type, $openingName, $instanceOfTypeID, $description, $availableCount;
    function __construct($ID, $companyID, $type, $openingName, $instanceOfTypeID, $description, $availableCount) {
        
        $this->ID = $ID;
        $this->companyID = $companyID;
        $this->type = $type;
        $this->openingName = $openingName;
        $this->instanceOfTypeID = $instanceOfTypeID;
        $this->description = $description;
        $this->availableCount = $availableCount;
        
    }
    
    function getID() {
        return $this->ID;
    }

    function getCompanyID() {
        return $this->companyID;
    }

    function getType() {
        return $this->type;
    }

    function getOpeningName() {
        return $this->openingName;
    }

    function getInstanceOfTypeID() {
        return $this->instanceOfTypeID;
    }
    
    function getDescription(){
        return $this->description;
    }
    
    function getAvailableCount() {
        return $this->availableCount;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setCompanyID($companyID) {
        $this->companyID = $companyID;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setOpeningName($openingName) {
        $this->openingName = $openingName;
    }

    function setInstanceOfTypeID($instanceOfTypeID) {
        $this->instanceOfTypeID = $instanceOfTypeID;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }
    
    function setAvailableCount($availableCount) {
        $this->availableCount = $availableCount;
    }

}
