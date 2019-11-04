<?php
class job {
    private $Id, $companyId, $jobName, $jobDescription, $jobRequirements;
    function __construct($Id,$companyId, $jobName, $jobDescription, $jobRequirements) {
        
        $this->Id = $Id;
        $this->companyId=$companyId;
        $this->jobName=$jobName;
        $this->jobDescription=$jobDescription;
        $this->jobRequirements=$jobRequirements;
        
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


    
   

}
