<?php

session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === null) {
        $action = 'viewLogin';
    }
}

switch ($action) {
    case 'home':
        include('home.php');
        die();
        break;


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
                $error_message['pwMessage'] = 'Your password must be at least 10 characters. And include:';
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
            include 'view/changeInfo.php';
            exit();
        } else {
            if ($hashedPW === '') {
                $hashedPW = password_hash($password, PASSWORD_DEFAULT);
            }


            if ($imageChanged != TRUE) {
                user_db::update_profile($_SESSION['currentUser']->getUName(), $fName, $lName, $email, $file_name, $hashedPW);
                $_SESSION['currentUser'] = user_db::get_user_by_id($_SESSION['currentUser']->getID());
                include 'view/profile.php';
            } else {

                $file_name = "images/" . $file_name;
                user_db::update_profile($_SESSION['currentUser']->getUName(), $fName, $lName, $email, $file_name, $hashedPW);
                $_SESSION['currentUser'] = user_db::get_user_by_id($_SESSION['currentUser']->getID());
                include 'view/profile.php';
            }
        }

        die();
        break;

    case 'displayAllUsers';
        $users = user_db::select_all();
        include 'view/displayAllUsers.php';
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

        include 'view/login.php';
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
                include 'view/profile.php';
            } else {
                $error_message['uName'] = '';
                $error_message['pWord'] = '';
                include 'view/login.php';
            }
        } else {
            $error_message['uName'] = 'No User By That Name';
            $error_message['pWord'] = '';
            include 'view/login.php';
        }

        die();
        break;

//display the profile page for user
    case 'displayProfile':

        if (isset($_SESSION['currentUser'])) {
            $users = user_db::get_user_by_username($_SESSION['currentUser']->getUName());
            $comments = user_db::get_user_comments($_SESSION['currentUser']->getID());
            include 'view/profile.php';
            die();
            break;
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
            include 'view/login.php';
            die();
            break;
        }
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

        include 'view/login.php';
        die();
        break;
}
    


     

