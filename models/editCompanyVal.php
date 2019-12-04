<?php
$cName = filter_input(INPUT_POST, 'cName');
$empC = filter_input(INPUT_POST, 'empC');
$cCap = filter_input(INPUT_POST, 'cCap');
$cEn = filter_input(INPUT_POST, 'cEn');

$extensions = array("jpeg", "jpg", "png", "gif");

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


if((int)$cEn > (int)$cCap){
    $cEError="# enrolled must be less than capacity";
    $isValid=false;
}

if (!empty($_FILES['image']['name'])) {
    $image = $_FILES['image'];
    $temp = $_FILES['image']['name'];
    $temp = explode('.', $temp);
    $temp = end($temp);
    $file_ext = strtolower($temp);
    $file_size = $_FILES['image']['size'];
    $imageName = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    if ($file_size > 128000000 || $file_size === 0) {
        $isValid = false;
        $cIError = 'Image uploaded is too large.';
    } else if (in_array($file_ext, $extensions) === false) {
        $isValid = false;
        $cIError = "Use file extensions : " . join(',', $extensions);
    } else {

        $cIError = "";
    }
} else {
    $cIError = "";
}


if($isValid===false){
    
    include('views/editCompany.php');
    exit();
}else if($isValid===true){
    if ((empty($_FILES['image']['name']))) {
        company_db::updateCompany_noImage($cName, $empC, $cCap, $cEn, $_SESSION['company']['companyID']);
        $company= company_db::get_company_by_ownerId($_SESSION['currentUser']->getID());
        $_SESSION['company']= $company;
       header("Location: index.php?action=editCompany");
    } else if (($_FILES['image']['name'] != "")) {
        $newName = $_SESSION['company']['companyID'] . '.' . $file_ext;
        move_uploaded_file($file_tmp, "images/" . $newName);
        $image = 'images/' . $newName;
        company_db::updateCompany_withImage($cName, $empC, $cCap, $cEn, $image, $_SESSION['company']['companyID']);
        
        $company= company_db::get_company_by_ownerId($_SESSION['currentUser']->getID());
        $_SESSION['company']= $company;
        header("Location: index.php?action=editCompany");
    }
}

 

