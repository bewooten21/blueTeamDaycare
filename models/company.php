<?php
require_once("user.php");

class company {
    private $ID, $companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, $ownerID;
    function __construct($ID, $companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, user $ownerID = null) {
        
        $this->ID = $ID;
        $this->companyName = $companyName;
        $this->employeeCount = $employeeCount;
        $this->childCapacity = $childCapacity;
        $this->childrenEnrolled = $childrenEnrolled;
        $this->overallRating = $overallRating;
        $this->ownerID = $ownerID;
    }
    
    function getID() {
        return $this->ID;
    }

    function getCompanyName() {
        return $this->companyName;
    }

    function getEmployeeCount() {
        return $this->employeeCount;
    }

    function getChildCapacity() {
        return $this->childCapacity;
    }

    function getChildrenEnrolled() {
        return $this->childrenEnrolled;
    }
    
    function getOverallRating(){
        return $this->overallRating;
    }

    function getOwnerID() {
        return $this->ownerID;
    }
    
    function setID($ID) {
        $this->ID = $ID;
    }

    function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    function setEmployeeCount($employeeCount) {
        $this->employeeCount = $employeeCount;
    }

    function setChildCapacity($childCapacity) {
        $this->email = $childCapacity;
    }

    function setChildrenEnrolled($childrenEnrolled) {
        $this->childrenEnrolled = $childrenEnrolled;
    }
    
    function setOverallRating($overallRating) {
        $this->overallRating = $overallRating;
    }

     function setOwnerID($ownerID) {
        $this->ownerID = $ownerID;
    }
    
}
