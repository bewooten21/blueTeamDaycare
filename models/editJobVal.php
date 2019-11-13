<?php
$id= filter_input(INPUT_POST, 'jobId');
$cName= filter_input(INPUT_POST, 'cName');
$jobT= filter_input(INPUT_POST, 'jobT');
$jobD=filter_input(INPUT_POST, 'jobD');
$jobR=filter_input(INPUT_POST, 'jobR');
$tError="";
$dError="";
$rError="";
$job= job_db::get_job_by_id($id);
$company= company_db::get_company_by_ownerId($_SESSION['currentUser']->getID());

$isValid=true;

if($jobT===""){
    $tError="Enter job title";
    $isValid=false;
}

if($jobD===""){
    $dError="Enter job description";
    $isValid=false;
}

if($jobR===""){
    $rError="Enter job requirements";
    $isValid=false;
}

if($isValid===false){
    include('views/editJob.php');
    exit();
}

if($isValid===true){
    job_db::update_job($id, $jobT, $jobD, $jobR);
    header("Location: index.php?action=ourJobs");
   
    
}