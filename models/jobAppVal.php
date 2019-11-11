<?php
// get the data from the application form
        $cName = filter_input(INPUT_POST, 'cName');
        $maxEmp = filter_input(INPUT_POST, 'maxEmp', FILTER_VALIDATE_INT);
        $maxChild = filter_input(INPUT_POST, 'maxChild', FILTER_VALIDATE_INT);
        $childCount = filter_input(INPUT_POST, 'childCount', FILTER_VALIDATE_INT);
        $empCount = filter_input(INPUT_POST, 'empCount', FILTER_VALIDATE_INT);
        $cRate = filter_input(INPUT_POST, 'cRate', FILTER_VALIDATE_INT);
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
// validate max employees
        if($maxEmp === null || $maxEmp === '' || $maxEmp === false){
            $error_message['maxEmp'] = 'Max Employees must be filled out and must be a number';
        }
// validate max enrolled children
        if($maxChild === null || $maxChild === '' || $maxChild === false){
            $error_message['maxChild'] = 'Max Enrolled Children must be filled out and must be a number';
        }
// validate number of employees
        if($empCount === null || $empCount === '' || $empCount === false){
            $error_message['empCount'] = 'Number of Employees must be filled out and must be a number';
        }
// validate number of children
        if($childCount === null || $childCount === '' || $childCount === false){
            $error_message['childCount'] = 'Number of Enrolled Children must be filled out and must be a number';
        }
// validate company rating
        if($cRate === null || $cRate === '' || $cRate === false){
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
            }elseif ($file_size === 0) {
                
                $error_message['image'] = "Your file needs to be smaller than 2M";
                
            } else {
                
                $file_name = $uName . '.' . $file_ext;
                move_uploaded_file($file_tmp, "images/".$file_name);
            }
        }
// if an error message exists, go to the index page
        if ($error_message['image'] != '' || $error_message['cName'] != '' || $error_message['maxEmp'] != '' || $error_message['maxChild'] != '' || $error_message['empCount'] != '' || $error_message['childCount'] != '' || $error_message['cRate'] != '') {
            include 'views/businessRegistration.php';
            exit();
        } else {
            $uName = $currentUser.getUName();
            include'views/confirmation.php';
            exit();
            
        }