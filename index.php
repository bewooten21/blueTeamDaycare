<?php

require_once('model/user_db.php');
require_once('model/user.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === null) {
        $action = 'home';
    }
}

switch ($action) {
    case 'home':
        include('home.php');
        die();
        break;

    case 'contact':
        include('view/contact.php');
        die();
        break;
    
    case 'aboutUs':
        include('view/aboutUs.php');
        die();
        break;

    case'register':
        
        $emailClass = "";
        $emailError = "form-group";
        $unClass = "";
        $unError = "form-group";
        $pwClass = "";
        $pwError = "form-group";
        $cpwClass = "";
        $cpwError = "form-group";
        $fnClass = "";
        $fnError = "form-group";
        $lnClass = "";
        $lnError = "form-group";

        $email_error = '';
        $un_error = '';
        $pw_error = '';
        $cpw_error = '';
        $fn_error = '';
        $ln_error = '';
        $email = '';
        $un = '';
        $pw = '';
        $cpw = '';
        $fn = '';
        $ln = '';
        include('view/register.php');
        die();
        break;

    case 'valRegister':
        include('model/valRegister.php');
        die();
        break;
    case 'login':
        $un = '';
        $pw = '';
        $un_error = '';
        $pw_error = '';
        $unClass = "";
        $unError = "form-group";
        $pwClass = "";
        $pwError = "form-group";
        include('view/login.php');
        die();
        break;
    case 'valLogin':
        include('model/valLogin.php');
        die();
        break;
    case 'logout':
        session_destroy();
        unset($_SESSION['username']);
       header("Location: home.php");

    case 'forum':
        include('view/forum.php');
        die();
        break;
    
     case 'viewAccount':
        include('view/account.php');
        die();
        break;
    case 'accountInfo':
       $emailClass = "";
        $emailError = "form-group";
        $unClass = "";
        $unError = "form-group";
        
        $fnClass = "";
        $fnError = "form-group";
        $lnClass = "";
        $lnError = "form-group";

        $email_error = '';
        $un_error = '';
        
        $fn_error = '';
        $ln_error = '';
        $email = '';
        $un = '';
        $pw = '';
        $cpw = '';
        $fn = '';
        $ln = '';
        include('view/accountInfo.php');
        die();
        break;
    
    case 'resetPw':
        $pw="";
        $pwClass = "";
        $pwError = "form-group";
        $cpwClass = "";
        $cpwError = "form-group";
        $pw_error = '';
        $cpw_error = '';
        include('view/resetPw.php');
        die();
        break;
    case 'valUpdateUser':
        include('model/valUpdateUser.php');
        die();
        break;
        
}
     

