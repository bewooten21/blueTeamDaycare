<?php
class job {
    private $Id, $companyId, $jobName, $jobDescription, $jobRequirements, $applicationSlots, $status;
    function __construct($Id,$companyId, $jobName, $jobDescription, $jobRequirements, $applicationSlots, $status) {
        
        $this->Id = $Id;
        $this->companyId=$companyId;
        $this->jobName=$jobName;
        $this->jobDescription=$jobDescription;
        $this->jobRequirements=$jobRequirements;
        $this->applicationSlots=$applicationSlots;
        $this->status=$status;
    }
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        function getId() {
        return $this->Id;
    }

    function getCompanyId() {
        return $this->companyId;
    }

    function getJobName() {
        return $this->jobName;
    }

    function getJobDescription() {
        return $this->jobDescription;
    }

    function getJobRequirements() {
        return $this->jobRequirements;
    }

    function getApplicationSlots() {
        return $this->applicationSlots;
    }
    
    function setId($Id) {
        $this->Id = $Id;
    }

    function setCompanyId($companyId) {
        $this->companyId = $companyId;
    }

    function setJobName($jobName) {
        $this->jobName = $jobName;
    }

    function setJobDescription($jobDescription) {
        $this->jobDescription = $jobDescription;
    }

    function setJobRequirements($jobRequirements) {
        $this->jobRequirements = $jobRequirements;
    }

    function setApplicationSlots($applicationSlots) {
        $this->applicationSlots = $applicationSlots;
    }
    
   

}
