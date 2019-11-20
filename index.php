<?php

require_once 'models/application.php';
require_once 'models/application_db.php';
require_once 'models/comment.php';
require_once 'models/database.php';
require_once 'models/role.php';
require_once 'models/role_db.php';
require_once 'models/user.php';
require_once 'models/user_db.php';
require_once 'models/company_db.php';
require_once 'models/company.php';
require_once 'models/opening.php';
require_once 'models/job.php';
require_once 'models/job_db.php';
require_once 'models/child_db.php';
require_once 'models/opening_db.php';
require_once 'models/companyApproval_db.php';
require_once 'models/feedback_db.php';
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === null) {
        $action = 'viewLogin';
    }
}


switch ($action) {
    case 'about':
        include('views/about.php');
        die();
        break;

    case 'registration':

        if (!isset($email)) {
            $email = '';
        }

        if (!isset($fName)) {
            $fName = '';
        }

        if (!isset($uName)) {
            $uName = '';
        }

        if (!isset($lName)) {
            $lName = '';
        }

        if (!isset($password)) {
            $password = '';
        }

        if (!isset($error_message)) {
            $error_message = [];
            $error_message['fName'] = '';
            $error_message['lName'] = '';
            $error_message['uName'] = '';
            $error_message['email'] = '';
            $error_message['uNameExists'] = '';
            $error_message['password'] = '';
            $error_message['pwMessage'] = '';
            $error_message['requirements'] = '';
            $error_message['image'] = '';
        }

        include 'views/registration.php';
        die();
        break;
    case 'register':
        // get the data from the registration form
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $uName = filter_input(INPUT_POST, 'uName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
        $uImage = filter_input(INPUT_POST, 'image');
        $error_message = [];
        $error_message['fName'] = '';
        $error_message['lName'] = '';
        $error_message['uName'] = '';
        $error_message['email'] = '';
        $error_message['password'] = '';
        $error_message['pwMessage'] = '';
        $error_message['requirements'] = '';
        $error_message['image'] = '';
        $file_name = '';


        //Create Regex patterns
        $namePattern = '/^[a-zA-Z]/';
        // Only alphanumeric for the second part so that there aren't any conflicts 
        // with special characters when we persist for authentication
        $uNamePattern = '/^[a-zA-Z][a-zA-Z0-9]{3,29}$/';
        $pwLowerPattern = '/(?=.*[[:lower:]])/';
        $pwUpperPattern = '/(?=.*[[:upper:]])/';
        $pwDigitPattern = '/(?=.*[[:digit:]])/';
        $pwPunctPattern = '/(?=.*[[:punct:]])/';
        $pwLengthPattern = '/[[:graph:]]{10,}$/'; //Don't want whitespace character
// validate first name
        $fNameValid = preg_match($namePattern, $fName);

        if ($fName === null || $fName === "") {
            $error_message['fName'] = 'You must enter your first name.';
        } else if ($fNameValid === FALSE || $fNameValid === 0) {
            $error_message['fName'] = 'First name must start with a letter.';
        }
// validate last name
        $lNameValid = preg_match($namePattern, $lName);

        if ($lName === null || $lName === "") {
            $error_message['lName'] = 'You must enter your last name.';
        } else if ($lNameValid === FALSE || $lNameValid === 0) {
            $error_message['lName'] = 'Last name must start with a letter.';
        }

// validate username
        $checkUserName = user_db::get_user_by_username($uName);
        $uNameValid = preg_match($uNamePattern, $uName);

        if ($uName === null || $uName === "") {
            $error_message['uName'] = 'You must enter a user name.';
        } else if ($uNameValid === FALSE || $uNameValid === 0) {
            $error_message['uName'] = 'User name must start with a letter and contain between 4 and 30 alphanumeric characters.';
        } else if ($checkUserName !== FALSE) {
            $error_message['uName'] = 'That User Name Is Taken.';
        } else {
            setcookie('userName', $uName);
        }
// validate email
        $checkEmail = user_db::check_user_by_email($email);
        if ($email === FALSE) {
            $error_message['email'] = 'Email must be a valid email address.';
        } else if ($email === null || $email === "") {
            $error_message['email'] = 'You must enter an e-mail address.';
        } else if ($checkEmail !== FALSE) {
            $error_message['email'] = 'Email address is taken.';
        }

// validate image
        if ($_FILES['image']['name'] != '') {

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $error_message['image'] = "file extension not in whitelist: " . join(',', $extensions);
            } elseif ($file_size === 0) {

                $error_message['image'] = "Your file needs to be smaller than 2M";
            } else {

                $file_name = $uName . '.' . $file_ext;
                move_uploaded_file($file_tmp, "images/" . $file_name);
            }
        }

// validate password
        $pwRequirements = 0;
        $pwLowerPresent = preg_match($pwLowerPattern, $password);
        $pwUpperPresent = preg_match($pwUpperPattern, $password);
        $pwDigitPresent = preg_match($pwDigitPattern, $password);
        $pwPunctPresent = preg_match($pwPunctPattern, $password);
        $pwLengthValid = preg_match($pwLengthPattern, $password);

        if ($pwLowerPresent !== FALSE && $pwUpperPresent !== FALSE && $pwDigitPresent !== FALSE && $pwPunctPresent !== FALSE) {
            $pwRequirements = $pwLowerPresent + $pwUpperPresent + $pwDigitPresent + $pwPunctPresent;
        } else {
            $pwRequirements = 0;
        }

        if ($password === null || $password === "" || $confirmPassword === null || $confirmPassword === "") {
            if ($password === null || $password === "") {
                $error_message['password'] .= 'You must enter a password.';
            }
            if ($confirmPassword === null || $confirmPassword === "") {
                $error_message['password'] .= ' You must confirm your password.';
            }
        } else if ($pwLengthValid === FALSE || $pwLengthValid === 0 || $pwRequirements < 3) {
            $numRequired = 3 - $pwRequirements;
            $error_message['pwMessage'] = 'Your password must be at least 10 characters. And include at least ' . $numRequired . ' of the following:';
            if ($pwLowerPresent === FALSE || $pwLowerPresent === 0) {
                $error_message['requirements'] .= '<li>1 lowercase character</li>';
            }
            if ($pwUpperPresent === FALSE || $pwUpperPresent === 0) {
                $error_message['requirements'] .= '<li>1 uppercase character</li>';
            }
            if ($pwDigitPresent === FALSE || $pwDigitPresent === 0) {
                $error_message['requirements'] .= '<li>1 number</li>';
            }
            if ($pwPunctPresent === FALSE || $pwPunctPresent === 0) {
                $error_message['requirements'] .= '<li>1 punctuation character</li>';
            }
        } else if ($password !== $confirmPassword) {
            $error_message['password'] = 'Your password and confirmation must match.';
        }

// if an error message exists, go to the index page
        if ($error_message['image'] != '' || $error_message['fName'] != '' || $error_message['lName'] != '' || $error_message['uName'] != '' || $error_message['email'] != '' || $error_message['password'] != '' || $error_message['pwMessage'] != '') {
            include 'views/registration.php';
            exit();
        } else {

            $hashedPW = password_hash($password, PASSWORD_DEFAULT);

            if ($file_name != '') {
                user_db::add_user_with_image($fName, $lName, $email, $uName, $hashedPW, $file_name);
            } else {
                user_db::add_user($fName, $lName, $email, $uName, $hashedPW);
            }

            $currentUser = user_db::validate_user_login($uName);
            $_SESSION['currentUser'] = $currentUser;
            include 'views/confirmation.php';
        }
        die();
        break;

    case 'changeInfo':
        $currentUser = $_SESSION['currentUser'];
        $users = user_db::get_user_by_username($currentUser->getUName());
        $error_message = [];
        $error_message['fName'] = '';
        $error_message['lName'] = '';
        $error_message['email'] = '';
        $error_message['password'] = '';
        $error_message['pwMessage'] = '';
        $error_message['requirements'] = '';
        $error_message['image'] = '';
        if (!isset($password)) {
            $password = '';
        }
        include 'views/changeInfo.php';
        die();
        break;

    case 'commitChange':
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
        $uImage = filter_input(INPUT_POST, 'image');

        $hashedPW = '';
        $error_message = [];
        $error_message['fName'] = '';
        $error_message['lName'] = '';
        $error_message['email'] = '';
        $error_message['password'] = '';
        $error_message['pwMessage'] = '';
        $error_message['requirements'] = '';
        $error_message['image'] = '';
        $file_name = $_SESSION['currentUser']->getImage();
        $imageChanged = false;

        if (!isset($password)) {
            $password = '';
        }


//Create Regex patterns
        $namePattern = '/^[a-zA-Z]/';
// Only alphanumeric for the second part so that there aren't any conflicts 
// with special characters when we persist for authentication
        $uNamePattern = '/^[a-zA-Z][a-zA-Z0-9]{3,29}$/';
        $pwLowerPattern = '/(?=.*[[:lower:]])/';
        $pwUpperPattern = '/(?=.*[[:upper:]])/';
        $pwDigitPattern = '/(?=.*[[:digit:]])/';
        $pwPunctPattern = '/(?=.*[[:punct:]])/';
        $pwLengthPattern = '/[[:graph:]]{10,}$/'; //Don't want whitespace character
// validate first name
        $fNameValid = preg_match($namePattern, $fName);

        if ($fName === null || $fName === "") {
            $error_message['fName'] = 'You must enter your first name.';
        } else if ($fNameValid === FALSE || $fNameValid === 0) {
            $error_message['fName'] = 'First name must start with a letter.';
        }
// validate last name
        $lNameValid = preg_match($namePattern, $lName);

        if ($lName === null || $lName === "") {
            $error_message['lName'] = 'You must enter your last name.';
        } else if ($lNameValid === FALSE || $lNameValid === 0) {
            $error_message['lName'] = 'Last name must start with a letter.';
        }


// validate email
        $checkEmail = user_db::check_user_by_email($email);

        if ($email === FALSE) {
            $error_message['email'] = 'Email must be a valid email address.';
        } else if ($email === null || $email === "") {
            $error_message['email'] = 'You must enter an e-mail address.';
        } else if ($email !== $_SESSION['currentUser']->getEmail()) {
            if ($checkEmail !== FALSE) {
                $error_message['email'] = 'Email address is taken.';
            }
        }

// validate image
        if ($_FILES['image']['name'] != '') {

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);


            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $error_message['image'] = "file extension not in whitelist: " . join(',', $extensions);
            } elseif ($file_size === 0) {

                $error_message['image'] = "Your file needs to be smaller than 2M";
            } else {
                $file_name = $_SESSION['currentUser']->getUName() . '.' . $file_ext;
                move_uploaded_file($file_tmp, "images/" . $file_name);
                $imageChanged = TRUE;
            }
        }

// validate password
        $pwRequirements = 0;
        $pwLowerPresent = preg_match($pwLowerPattern, $password);
        $pwUpperPresent = preg_match($pwUpperPattern, $password);
        $pwDigitPresent = preg_match($pwDigitPattern, $password);
        $pwPunctPresent = preg_match($pwPunctPattern, $password);
        $pwLengthValid = preg_match($pwLengthPattern, $password);

        if ($pwLowerPresent !== FALSE && $pwUpperPresent !== FALSE && $pwDigitPresent !== FALSE && $pwPunctPresent !== FALSE) {
            $pwRequirements = $pwLowerPresent + $pwUpperPresent + $pwDigitPresent + $pwPunctPresent;
        } else {
            $pwRequirements = 0;
        }

        if (($password === null || $password === "") && ($confirmPassword === null || $confirmPassword === "")) {
            $hashedPW = $_SESSION['currentUser']->getPWord();
        } else {
            if ($pwLengthValid === FALSE || $pwLengthValid === 0 || $pwRequirements < 3) {
                $numRequired = 3 - $pwRequirements;
                $error_message['pwMessage'] = 'Your password must be at least 10 characters. And include at least ' . $numRequired . ' of the following:';
                if ($pwLowerPresent === FALSE || $pwLowerPresent === 0) {
                    $error_message['requirements'] .= '<li>1 lowercase character</li>';
                }
                if ($pwUpperPresent === FALSE || $pwUpperPresent === 0) {
                    $error_message['requirements'] .= '<li>1 uppercase character</li>';
                }
                if ($pwDigitPresent === FALSE || $pwDigitPresent === 0) {
                    $error_message['requirements'] .= '<li>1 number</li>';
                }
                if ($pwPunctPresent === FALSE || $pwPunctPresent === 0) {
                    $error_message['requirements'] .= '<li>1 punctuation character</li>';
                }
            } else if ($password !== $confirmPassword) {
                $error_message['password'] = 'Your password and confirmation must match.';
            }
        }

//to update DB
        if ($error_message['image'] != '' || $error_message['fName'] != '' || $error_message['lName'] != '' || $error_message['email'] != '' || $error_message['password'] != '' || $error_message['pwMessage'] != '') {
            include 'views/changeInfo.php';
            exit();
        } else {
            if ($hashedPW === '') {
                $hashedPW = password_hash($password, PASSWORD_DEFAULT);
            }


            if ($imageChanged != TRUE) {
                user_db::update_profile($_SESSION['currentUser']->getUName(), $fName, $lName, $email, $file_name, $hashedPW);
                $_SESSION['currentUser'] = user_db::get_user_by_id($_SESSION['currentUser']->getID());
                include 'views/profile.php';
            } else {

                $file_name = "images/" . $file_name;
                user_db::update_profile($_SESSION['currentUser']->getUName(), $fName, $lName, $email, $file_name, $hashedPW);
                $_SESSION['currentUser'] = user_db::get_user_by_id($_SESSION['currentUser']->getID());
                include 'views/profile.php';
            }
        }

        die();
        break;

    case 'displayAllUsers';
        $users = user_db::select_all();
        include 'views/displayAllUsers.php';
        die();
        break;

    case 'viewLogin';
        $users = user_db::newest_users();

        $message = '';

        if (!isset($uName)) {
            $uName = '';
        }
        $pWord = '';
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['uName'] = '';
            $error_message['pWord'] = '';
        }

        include 'views/login.php';
        die();
        break;

    case 'loggingIn';
        $users = user_db::newest_users();

        $uName = filter_input(INPUT_POST, 'uName');
        $pWord = filter_input(INPUT_POST, 'pWord');
        $checkUserName = user_db::get_user_by_username($uName);
        $message = '';

        if ($checkUserName != FALSE) {
            $theUser = user_db::validate_user_login($uName);

            if (password_verify($pWord, $theUser->getPWord())) {
                $_SESSION['currentUser'] = $theUser;
                $comments = user_db::get_user_comments($_SESSION['currentUser']->getID());
                $role = $_SESSION['currentUser']->getRole();
                $children= child_db::get_children_byParentId($_SESSION['currentUser']->getID());
                if($role->getID() != 4 ){
                    include 'views/profile.php';
                }
                else {
                    $pendingCompanies = companyApproval_db::getUnprocessedCompanies();
                     include('views/adminProfile.php');
                }
            } else {
                $error_message['uName'] = '';
                $error_message['pWord'] = '';
                include 'views/login.php';
            }
        } else {
            $error_message['uName'] = 'No User By That Name';
            $error_message['pWord'] = '';
            include 'views/login.php';
        }

        die();
        break;

//display the profile page for user
    case 'displayProfile':
        
        if (isset($_SESSION['currentUser'])) {
            $role = $_SESSION['currentUser']->getRole();
            if($role->getID() != 4 ){
                $users = user_db::get_user_by_username($_SESSION['currentUser']->getUName());
                $comments = user_db::get_user_comments($_SESSION['currentUser']->getID());
                $children= child_db::get_children_byParentId($_SESSION['currentUser']->getID());
                include 'views/profile.php';
                die();
                break;
            } else {
                $pendingCompanies = companyApproval_db::getUnprocessedCompanies();
                include 'views/adminProfile.php';
            }
        } else {
            $users = user_db::newest_users();
            $message = '';
            if (!isset($uName)) {
                $uName = '';
            }
            $pWord = '';
            if (!isset($error_message)) {
                $error_message = [];
                $error_message['uName'] = '';
                $error_message['pWord'] = '';
            }
            include 'views/login.php';
            die();
            break;
        }
    case 'random_display_profile':
        $profileID = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $_SESSION['profileID'] = $profileID;
        $users = user_db::get_user_by_id($profileID);
        $comments = user_db::get_user_comments($profileID);
        $comment = '';

        include 'views/view_profile.php';
        die();
        break;

    case 'submitComment':
        $profileID = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $users = user_db::get_user_by_id($profileID);
        $comment = filter_input(INPUT_POST, 'comment');

        user_db::make_comment($profileID, $comment, $_SESSION['currentUser']->getID(), $_SESSION['currentUser']->getUName());
        $comments = user_db::get_user_comments($profileID);
        $comment = '';
        include 'views/view_profile.php';
        die();
        break;

    case 'logout':
        session_destroy();
        $users = user_db::newest_users();

        $message = "You have successfully logged out!";

        if (!isset($uName)) {
            $uName = '';
        }
        $pWord = '';
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['uName'] = '';
            $error_message['pWord'] = '';
        }

        include 'views/login.php';
        die();
        break;

    case 'viewJobs':
        $jobs = job_db::select_all();
        include 'views/viewJobs.php';
        die();
        break;

    case 'addJob':


        $company = company_db::get_company_by_ownerId($_SESSION['currentUser']->getID());
        $cName = "";
        $tError = "";
        $dError = "";
        $rError = "";
        $jobD = "";
        $jobR = "";
        $jobT = "";
        include 'views/addJob.php';
        die();
        break;

    case "addJobVal":

        include 'models/addJobVal.php';
        die();
        break;

    case 'viewJob':
        $id = filter_input(INPUT_GET, 'id');
        $job = job_db::get_job_by_id($id);
        include ('views/viewJob.php');
        die();
        break;

    case 'register business':

        if (!isset($cName)) {
            $cName = '';
        }

        if (!isset($maxEmp)) {
            $maxEmp = '';
        }

        if (!isset($maxChild)) {
            $maxChild = '';
        }

        if (!isset($childCount)) {
            $childCount = '';
        }

        if (!isset($empCount)) {
            $empCount = '';
        }

        if (!isset($cRate)) {
            $cRate = '';
        }

        if (!isset($error_message)) {
            $error_message = [];
            $error_message['cName'] = '';
            $error_message['maxEmp'] = '';
            $error_message['maxChild'] = '';
            $error_message['empCount'] = '';
            $error_message['childCount'] = '';
            $error_message['cRate'] = '';
            $error_message['image'] = '';
        }
        include'views/businessRegistration.php';
        die();
        break;
    case 'validate business':
        // get the data from the registration form
        $cName = filter_input(INPUT_POST, 'cName');
        $maxChild = filter_input(INPUT_POST, 'maxChild', FILTER_VALIDATE_INT);
        $childCount = filter_input(INPUT_POST, 'childCount', FILTER_VALIDATE_INT);
        $empCount = filter_input(INPUT_POST, 'empCount', FILTER_VALIDATE_INT);
        $cRate = filter_input(INPUT_POST, 'cRate', FILTER_VALIDATE_FLOAT);
        $cImage = filter_input(INPUT_POST, 'image');
        $error_message = [];
        $error_message['cName'] = '';
        $error_message['maxEmp'] = '';
        $error_message['maxChild'] = '';
        $error_message['empCount'] = '';
        $error_message['childCount'] = '';
        $error_message['cRate'] = '';
        $error_message['image'] = '';
        $file_name = '';


        //Create Regex patterns
        $namePattern = '/^[a-zA-Z]/';
        // Only alphanumeric for the second part so that there aren't any conflicts 
        // with special characters when we persist for authentication
        $cNamePattern = '/^[a-zA-Z][a-zA-Z0-9]{3,29}$/';
// validate company name
        $cNameValid = preg_match($namePattern, $cName);

        if ($cName === null || $cName === "") {
            $error_message['cName'] = 'You must enter a company name.';
        } else if ($cNameValid === FALSE || $cNameValid === 0) {
            $error_message['cName'] = 'company name must start with a letter.';
        }
// validate max enrolled children
        if ($maxChild === null || $maxChild === '' || $maxChild === false) {
            $error_message['maxChild'] = 'Max Enrolled Children must be filled out and must be a number';
        }
// validate number of employees
        if ($empCount === null || $empCount === '' || $empCount === false) {
            $error_message['empCount'] = 'Number of Employees must be filled out and must be a number';
        }
// validate number of children
        if ($childCount === null || $childCount === '' || $childCount === false) {
            $error_message['childCount'] = 'Number of Enrolled Children must be filled out and must be a number';
        }
// validate company rating
        if ($cRate === null || $cRate === '' || $cRate === false) {
            $error_message['cRate'] = 'Company Rating must be filled out and must be a number';
        }
// validate image
        if ($_FILES['image']['name'] != '') {

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $error_message['image'] = "file extension not in whitelist: " . join(',', $extensions);
            } elseif ($file_size === 0) {

                $error_message['image'] = "Your file needs to be smaller than 2M";
            } else {

                $file_name = $cName . '.' . $file_ext;
                move_uploaded_file($file_tmp, "images/" . $file_name);
            }
        }
// if an error message exists, go to the index page
        if ($error_message['image'] != '' || $error_message['cName'] != '' || $error_message['maxChild'] != '' || $error_message['empCount'] != '' || $error_message['childCount'] != '' || $error_message['cRate'] != '') {
            include 'views/businessRegistration.php';
            exit();
        } else {
            if ($cImage === '' || $cImage === null) {
                companyApproval_db::addCompany($cName, $maxChild, $empCount, $childCount, $cRate);
                $uName = $_SESSION['currentUser']->getUName();
                include'views/confirmation.php';
                exit;   
            }
            else
            {
                companyApproval_db::addCompanyWithLogo($cName, $maxChild, $empCount, $childCount, $cRate, $file_name);
                $uName = $_SESSION['currentUser'];
                include'views/confirmation.php';
                exit;
            }
            $uName = SESS;

            include'views/confirmation.php';

            exit();

            exit;
        }
        die();
        break;
        
    case 'applyToJob':
        $jobId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $job= job_db::get_job($jobId);
        if (!isset($jobId)) {
            $jobId = '';
        }
        if (!isset($coverLetter)) {
            $coverLetter = '';
        }

        if (!isset($resume)) {
            $resume = '';
        }

        if (!isset($error_message)) {
            $error_message = [];
            $error_message['jobId'] = '';
            $error_message['coverLetter'] = '';
            $error_message['resume'] = '';
            $error_message['previousApplication'] = '';
        }
        include'views/jobApplication.php';
        die();
        break;

    case 'submitJobApp':
        include 'models/jobAppVal.php';
        die();
        break;

    case 'viewCompanies':
        $i = 0;
        $companies = company_db::select_all();
        include('views/allCompanies.php');
        die();
        break;

    case 'viewCompanyProfile':
        $id = filter_input(INPUT_GET, 'id');
        $_SESSION['companyID'] = $id;
        $c = company_db::get_company_by_id($id);
        $jobs = job_db::get_job_by_Companyid($id);
        $owner = user_db::get_user_by_id($c->getOwnerID()->getID());
        include('views/companyProfile.php');
        die();
        break;
    
    case 'ourJobs':
        $company = company_db::get_company_by_ownerId($_SESSION['currentUser']->getID());
        $jobs = job_db::get_job_by_Companyid($company['id']);

        include('views/ourJobs.php');
        die();
        break;
    
    case 'editJob':
        $id = filter_input(INPUT_POST, 'id');
        $job= job_db::get_job_by_id($id);
        
        $tError = "";
        $dError = "";
        $rError = "";
        
        include('views/editJob.php');
        die();
        break;
    
    case 'deleteJob':
        include('models/deleteJob.php');
        die();
        break;
    
    case 'editJobVal':
        include('models/editJobVal.php');
        die();
        break;
    
    case 'viewChildcareOpenings' :
        $openings = opening_db::select_all();
        include('views/childcareOpenings.php');
        die();
        break;
        
    case 'approveCompany' :
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        companyApproval_db::approveCompany($id);
        $pendingCompanies = companyApproval_db::getUnprocessedCompanies();
        include('views/adminProfile.php');
        die();
        break;
    
    case 'declineCompany' :
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        companyApproval_db::declineCompany($id);
        $pendingCompanies = companyApproval_db::getUnprocessedCompanies();
        include('views/adminProfile.php');
        die();
        break;
    
    case 'reviewUser' :
        $_SESSION['targetType'] = 'user';
        include 'views/review.php';
        die();
        break;
    
    case 'reviewCompany' :
        $_SESSION['targetType'] = 'company';
        include 'views/review.php';
        die();
        break;
        
    case 'submitFeedback' :
        $sender = $_SESSION['currentUser']->getID();
        $target = $_SESSION['profileID'];
        $type = $_SESSION['targetType'];
        $feedback = filter_input(INPUT_POST, 'feedback');
        $rating = filter_input(INPUT_POST, 'rating');
        feedback_db::submitFeedback($sender, $target, $feedback, $rating, $type);
        include('views/confirmFeedback.php');
        die();
        break;
    
    case 'addStudent':
        $fName="";
        $lName="";
        $age="";
        $fNError="";
        $lNError="";
        $ageError="";
        include('views/addStudent.php');
        die();
        break;
    
    case 'addStuVal':
        include('models/addStuVal.php');
        die();
        break;
    
    case 'editChild':
        $id = filter_input(INPUT_POST, 'stuId');
        $child= child_db::get_child_byId($id);
        $fNError="";
        $lNError="";
        $ageError="";
        include('views/editChild.php');
        die();
        break;
    case 'editChildVal':
        $id = filter_input(INPUT_POST, 'stuId');
        $child= child_db::get_child_byId($id);
        include('models/editChildVal.php');
        die();
        break;  
     case 'processApplications' :
        $companyID = filter_input(INPUT_POST, 'companyID', FILTER_VALIDATE_INT);
        $jobID = filter_input(INPUT_POST, 'jobID', FILTER_VALIDATE_INT);
        $job = job_db::get_job($jobID);
        $appInfo_arr = application_db::get_applications_by_companyID($companyID, $jobID);
        include('views/jobAppApproval.php');
        die();
        break;
        
    case 'approveJobApp' :
        $applicationID = filter_input(INPUT_POST, 'applicationID', FILTER_VALIDATE_INT);
        $companyID = filter_input(INPUT_POST, 'companyID', FILTER_VALIDATE_INT);
        $jobID = filter_input(INPUT_POST, 'jobID', FILTER_VALIDATE_INT);
        application_db::process_and_approve_application($applicationID, 1, 1);
        
        $job = job_db::get_job($jobID);
        $appInfo_arr = application_db::get_applications_by_companyID($companyID, $jobID);
        include('views/jobAppApproval.php');
        die();
        break; 
    case 'editChildVal':
        $id = filter_input(INPUT_POST, 'stuId');
        $child= child_db::get_child_byId($id);
        include('models/editChildVal.php');
        die();
        break;
        
    
        
        
    case 'declineJobApp' :
        $applicationID = filter_input(INPUT_POST, 'applicationID', FILTER_VALIDATE_INT);
        $companyID = filter_input(INPUT_POST, 'companyID', FILTER_VALIDATE_INT);
        $jobID = filter_input(INPUT_POST, 'jobID', FILTER_VALIDATE_INT);
        
        $application = application_db::get_application_by_id($applicationID);
        $applicant = user_db::get_user_by_id($application->getUserID()); 
        $job = job_db::get_job($jobID);
        
        include('views/jobAppApproval.php');
        die();
        break; 
}
    


     

