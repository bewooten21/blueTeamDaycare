<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Child</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
  <h2>Edit <?php echo $child["stuFName"]. " " . $child["stuLName"]; ?></h2>
<form class="form-horizontal" method="post">
    <input type="hidden" name="action" value="editChildVal">
    <input type="hidden" name="stuId" value="<?php echo $child["studentId"]; ?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="fName">Child First Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter first name" value="<?php echo htmlspecialchars($child["stuFName"]); ?>">
     </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $fNError; ?>
          </p>
      </div>
    
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="jobTitle">Child Last Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="lName" name="lName" placeholder="Enter last name" value="<?php echo htmlspecialchars($child["stuLName"]); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $lNError; ?>
          </p>
      </div>
  </div>
    
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobR">Child Age:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" value="<?php echo htmlspecialchars($child["age"]); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $ageError; ?>
          </p>
      </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
      
        
    </body>
</html>

