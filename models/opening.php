<?php
class opening {
    private $ID, $companyID, $type, $openingName, $jobID, $description, $availableCount;
    function __construct($ID, $companyID, $type, $openingName, $jobID, $description, $availableCount) {
        
        $this->ID = $ID;
        $this->companyID = $companyID;
        $this->type = $type;
        $this->openingName = $openingName;
        $this->jobID = $jobID;
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

    function getJobID() {
        return $this->jobID;
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

    function setJobID($jobID) {
        $this->jobID = $jobID;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }
    
    function setAvailableCount($availableCount) {
        $this->availableCount = $availableCount;
    }

}
