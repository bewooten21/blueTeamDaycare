<?php
class user {
    private $ID, $openingID, $isProcessed, $coverLetter, $resume, $userID;
    function __construct($ID, $openingID, $isProcessed, $coverLetter, $resume, $userID) {
        
        $this->ID = $ID;
        $this->openingID = $openingID;
        $this->isProcessed = $isProcessed;
        $this->coverLetter = $coverLetter;
        $this->resume = $resume;
        $this->userID = $userID;
        
    }
    
    function getID() {
        return $this->ID;
    }

    function getOpeningID() {
        return $this->openingID;
    }

    function getIsProcessed() {
        return $this->isProcessed;
    }

    function getCoverLetter() {
        return $this->coverLetter;
    }

    function getResume() {
        return $this->resume;
    }
    
    function getUserID() {
        return $this->userID;
    }

    function setID($ID) {
        $this->ID = $ID;
    }

    function setOpeningID($openingID) {
        $this->openingID = $openingID;
    }

    function setIsProcessed($isProcessed) {
        $this->isProcessed = $isProcessed;
    }

    function setCoverLetter($coverLetter) {
        $this->coverLetter = $coverLetter;
    }

    function setResume($resume) {
        $this->resume = $resume;
    }
    
    
    function setUserID($userID) {
        $this->userID = $userID;
    }

}
