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
  <h2>Add Child</h2>
<form class="form-horizontal" method="post">
    <input type="hidden" name="action" value="addStuVal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Child First Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter first name" value="<?php echo htmlspecialchars($fName); ?>">
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
      <input type="text" class="form-control" id="lName" name="lName" placeholder="Enter last name" value="<?php echo htmlspecialchars($lName); ?>">
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
      <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" value="<?php echo htmlspecialchars($age); ?>">
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
      
        <?php include ('footer.php'); ?>
    </body>
</html>
