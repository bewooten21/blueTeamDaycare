<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Job</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
  <h2>Login</h2>
<form class="form-horizontal" method="post">
    <input type="hidden" name="action" value="addJobVal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Company:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="cName" name="cName" placeholder="Enter company name" value="<?php echo htmlspecialchars($company['companyName']); ?>">
      <input type="hidden" name="cId" value="<?php echo htmlspecialchars($company['id']); ?>">
    </div>
    
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="jobTitle">Job Title:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobT" name="jobT" placeholder="Enter job title" value="<?php echo htmlspecialchars($jobT); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $tError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobD">Job Description:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobD" name="jobD" placeholder="Enter job description" value="<?php echo htmlspecialchars($jobD); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $dError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobR">Job Requirements:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobR" name="jobR" placeholder="Enter job requirements" value="<?php echo htmlspecialchars($jobR); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $rError; ?>
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