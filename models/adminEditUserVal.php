<?php

$fn = filter_input(INPUT_POST, 'fn');
$ln = filter_input(INPUT_POST, 'ln');
$role = filter_input(INPUT_POST, 'roleId');
$userId=filter_input(INPUT_POST, 'userId');
$user= user_db::get_user_by_id($userId);

$fnError = "";
$lnError = "";
$roleError = "";


$isValid = true;


if ($fn === "") {
    $fnError = "First name required";
   
    $isValid = FALSE;
} else if(preg_match('/^.{1,30}$/',$fn)===0){
    $fnError ="Must be 30 characters or less";
    $isValid = FALSE;
}

if ($ln === "") {
    $lnError = "Last name required";
    $isValid = FALSE;
}else if(preg_match('/^.{1,30}$/',$ln)===0){
    $lnError ="Must be 30 characters or less";

    $isValid = FALSE;
} 

if($role===""){
    $roleError="Role required";
    $isValid=false;
}

if($isValid===false){
    include("views/adminEditUser.php");
    exit();
    
}else if($isValid===true){
    user_db::adminUpdateUser($fn, $ln, $role, $userId);
}