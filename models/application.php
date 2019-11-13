<?php
class application {
    private $applicationId, $jobId, $isProcessed, $isApproved, $coverLetter, $resume, $userID;
    function __construct($applicationId, $jobId, $isProcessed, $isApproved, $coverLetter, $resume, $userID) {
        
        $this->applicationId = $applicationId;
        $this->jobId = $jobId;
        $this->isProcessed = $isProcessed;
        $this->isApproved = $isApproved;
        $this->coverLetter = $coverLetter;
        $this->resume = $resume;
        $this->userID = $userID;
        
    }
    
    function getApplicationId() {
        return $this->applicationId;
    }

    function getJobId() {
        return $this->jobId;
    }

    function getIsProcessed() {
        return $this->isProcessed;
    }
    
    function getIsApproved() {
        return $this->isApproved;
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

    function setApplicationId($applicationId) {
        $this->applicationId = $applicationId;
    }

    function setOpeningID($jobId) {
        $this->jobId = $jobId;
    }

    function setIsProcessed($isProcessed) {
        $this->isProcessed = $isProcessed;
    }

    function setIsApproved($isApproved) {
        $this->isApproved = $isApproved;
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
