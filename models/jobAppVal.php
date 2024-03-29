<?php
// get the data from the application form
$jobId = filter_input(INPUT_POST, 'jobId', FILTER_VALIDATE_INT);
$coverLetter = filter_input(INPUT_POST, 'coverLetter');
$resume = filter_input(INPUT_POST, 'resume');
$error_message = [];
$error_message['jobId'] = '';
$error_message['coverLetter'] = '';
$error_message['resume'] = '';
$error_message['previousApplication'] = '';
$coverLetter_file_name = '';
$resume_file_name = '';
$job = job_db::get_job($jobId);

// validate job
if ($jobId === null || $jobId === '' || $jobId === false) {
    $error_message['jobId'] = 'You must apply for an existing job';
}
// validate coverLetter
if ($_FILES['coverLetter']['name'] != '') {

    $file_name = $_FILES['coverLetter']['name'];
    $file_size = $_FILES['coverLetter']['size'];
    $file_tmp = $_FILES['coverLetter']['tmp_name'];
    $file_type = $_FILES['coverLetter']['type'];
    $temp = $_FILES['coverLetter']['name'];
    $temp = explode('.', $temp);
    $temp = end($temp);
    $file_ext = strtolower($temp);

    $extensions = array("pdf");

    if (in_array($file_ext, $extensions) === false) {
        $error_message['coverLetter'] = "Uploads must be PDFs";
    } elseif ($file_size === 0) {

        $error_message['coverLetter'] = "Your file needs to be smaller than 2M";
    } else {

        $coverLetter_file_name = $_SESSION['currentUser']->getUName() . '-' . $job->getId() . '-cover-letter' . '.' . $file_ext;
        move_uploaded_file($file_tmp, "coverLetters/" . $coverLetter_file_name);
    }
} else{
    $error_message['coverLetter'] = "You must upload a cover letter";
}
// validate resume
if ($_FILES['resume']['name'] != '') {

    $file_name = $_FILES['resume']['name'];
    $file_size = $_FILES['resume']['size'];
    $file_tmp = $_FILES['resume']['tmp_name'];
    $file_type = $_FILES['resume']['type'];
    $temp = $_FILES['resume']['name'];
    $temp = explode('.', $temp);
    $temp = end($temp);
    $file_ext = strtolower($temp);

    $extensions = array("pdf");

    if (in_array($file_ext, $extensions) === false) {
        $error_message['resume'] = "Uploads must be PDFs";
    } elseif ($file_size === 0) {

        $error_message['resume'] = "Your file needs to be smaller than 2M";
    } else {

        $resume_file_name = $_SESSION['currentUser']->getUName() . '-' . $job->getId() . '-resume' . '.' . $file_ext;
        move_uploaded_file($file_tmp, "resumes/" . $resume_file_name);
    }
} else {
    $error_message['resume'] = "You must upload a resume";
}
// if an error message exists, go to the index page
if ($error_message['resume'] != '' || $error_message['coverLetter'] != '' || $error_message['jobId'] != '') {
    include('views/jobApplication.php');
    exit();
} else {

    $checkPreviousApplications = application_db::check_for_duplicate($job->getId(), $_SESSION['currentUser']->getID());
    if ($checkPreviousApplications !== FALSE) {
        $error_message['previousApplication'] = 'You have already applied for this job, please wait for your application to be processed.';
        include('views/jobApplication.php');
        exit();
    } else {
        $applicationId = application_db::add_application($job->getId(), 0, 0, $coverLetter_file_name, $resume_file_name, $_SESSION['currentUser']->getID());
        if ($applicationId !== null && $applicationId !== '' && $applicationId !== false) {
            $applicationSlots = $job->getApplicationSlots() - 1;
            job_db::update_application_slot($job->getId(), $applicationSlots);
            $confirmationMessage = "You&apos;re application submitted successfully ".  $_SESSION['currentUser']->getFName() . "! Good luck!";
            include('views/confirmation.php');
            exit();
        } else {
            include('views/jobApplication.php');
            exit();
        }
    }
    
}