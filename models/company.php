<?php
require_once("user.php");

class company {
    private $ID, $companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, $ownerID, $image, $ratingsCount;
    function __construct($ID, $companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, user $ownerID = null, $image) {
        
        $this->ID = $ID;
        $this->companyName = $companyName;
        $this->employeeCount = $employeeCount;
        $this->childCapacity = $childCapacity;
        $this->childrenEnrolled = $childrenEnrolled;
        $this->overallRating = $overallRating;
        $this->ownerID = $ownerID;
        $this->image = $image;
        $this->ratingsCount;
    }
    function getRatingsCount() {
        return $this->ratingsCount;
    }

    function setRatingsCount($ratingsCount) {
        $this->ratingsCount = $ratingsCount;
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
    
    function getImage() {
        return $this->image;
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
    
    function setImage($image) {
        $this->image = $image;
    }
    
}
