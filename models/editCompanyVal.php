<?php
$cName = filter_input(INPUT_POST, 'cName');
$empC = filter_input(INPUT_POST, 'empC');
$cCap = filter_input(INPUT_POST, 'cCap');
$cEn = filter_input(INPUT_POST, 'cEn');
$cImage = filter_input(INPUT_POST, 'image');

$isValid=true;

if($cName===""){
    $cNameError="Required";
    $isValid=false;
}else{
    $cNameError="";
}

if($empC===""){
    $eCError="Required";
    $isValid=false;
}else if(is_numeric($empC)===false){
    $eCError="Must be number";
    $isValid=false;
}else if($empC < 0){
    $eCError="Must be greater than 0";
    $isValid=false;
}else{
    $eCError="";
}

if($cCap===""){
    $cCError="Required";
    $isValid=false;
}else if(is_numeric($cCap)===false){
    $cCError="Must be number";
    $isValid=false;
}else if($cCap < 0){
    $cCError="Must be greater than 0";
    $isValid=false;
}else{
    $cCError="";
}

if($cEn===""){
    $cEError="Required";
    $isValid=false;
}else if(is_numeric($cEn)===false){
    $cEError="Must be number";
    $isValid=false;
}else if($cEn < 0){
    $cEError="Must be greater than 0";
    $isValid=false;
}else{
    $cEError="";
}

if($cImage===""){
    $cIError="Required";
    $isValid=false;
}


if($isValid===false){
    include('views/editCompany.php');
    exit();
}

 

