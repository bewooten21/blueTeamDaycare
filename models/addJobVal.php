<?php
$compId= filter_input(INPUT_POST, 'cId');
$cName= filter_input(INPUT_POST, 'cName');
$jobT= filter_input(INPUT_POST, 'jobT');
$jobD=filter_input(INPUT_POST, 'jobD');
$jobR=filter_input(INPUT_POST, 'jobR');
$tError="";
$dError="";
$rError="";
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
    include('views/addJob.php');
    exit();
}

if($isValid===true){
    job_db::add_job('', $compId, $jobT, $jobD, $jobR);
    header("Location: index.php?action=viewJobs");
   
    
}