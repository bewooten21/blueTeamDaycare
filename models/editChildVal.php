<?php

$fName= filter_input(INPUT_POST, 'fName');
$lName= filter_input(INPUT_POST, 'lName');
$age= filter_input(INPUT_POST, 'age');



$isValid=true;

if($fName===""){
    $fNError="First name required";
    $isValid=FALSE;
}else{
    $fNError="";
}

if($lName===""){
    $lNError="Last name required";
    $isValid=false;
}else{
    $lNError="";
}

if($age===""){
    $ageError="Age required";
    $isValid=false;
}else if(is_numeric($age)===false){
    $ageError="Enter valid age";
    $age="";
    $isValid=false;
}else if ($age <=0){
    $ageError="Enter valid age";
    $isValid=false;
}else{
    $ageError="";
}

if($isValid===false){
    include('views/editChild.php');
    exit();
}

if($isValid===true){
    
    child_db::edit_child($child['studentId'],$fName, $lName, $age);
    header("Location: index.php?action=displayProfile");
}

