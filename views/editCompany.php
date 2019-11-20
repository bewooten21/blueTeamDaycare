<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Job</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
  <h2>Login</h2>
<form class="form-horizontal" method="post">
    <input type="hidden" name="action" value="editCompanyVal">
    <input type="hidden" name="companyId" value="<?php echo $_SESSION['company']['id'] ?>">
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="cName">Company Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="cName" name="cName" placeholder="Enter company name" value="<?php echo htmlspecialchars($_SESSION['company']['companyName']); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $cNameError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobD">Employee Count:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobD" name="jobD" placeholder="Enter job description" value="<?php echo htmlspecialchars($_SESSION['company']['employeeCount']); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $eCError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobR">Child Capacity:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobR" name="jobR" placeholder="Enter job requirements" value="<?php echo htmlspecialchars($_SESSION['company']['childCapacity']); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $cCError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobR">Children Enrolled:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobR" name="jobR" placeholder="Enter job requirements" value="<?php echo htmlspecialchars($_SESSION['company']['childrenEnrolled']); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $cEError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobR">Company Image:</label>
    <div class="col-sm-4">
      <input type="file" name="image" />
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $cIError; ?>
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