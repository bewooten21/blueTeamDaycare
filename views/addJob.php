<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
      <select id="companyId" name="companyId">
                                    
                                    <?php foreach ($companies as $c) : ?>
                                    <option value="<?php echo $c->getID(); ?>"><?php echo $c->getCompanyName(); ?></option>
                                    <?php endforeach; ?>      
                                </select>
        
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Job Title:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobTitle" placeholder="Enter job title">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobD">Job Description:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobD" placeholder="Enter job description">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="jobR">Job Requirements:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobR" placeholder="Enter job requirements">
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