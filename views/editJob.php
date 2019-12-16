<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Job</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
  <h2>Edit Job</h2>
  <div class="jumbotron">
<form class="form-horizontal" method="post">
    <input type="hidden" name="action" value="editJobVal">
    <input type="hidden" name="jobId" value="<?php echo $id; ?>">
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="jobTitle">Job Title:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="jobT" name="jobT" placeholder="Enter job title" value="<?php echo htmlspecialchars($job['jobName']); ?>">
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
      <input type="text" class="form-control" id="jobD" name="jobD" placeholder="Enter job description" value="<?php echo htmlspecialchars($job['jobDescription']); ?>">
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
      <input type="text" class="form-control" id="jobR" name="jobR" placeholder="Enter job requirements" value="<?php echo htmlspecialchars($job['jobRequirements']); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $rError; ?>
          </p>
      </div>
  </div>
  
   
    
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-sml">Submit</button>
    </div>
  </div>
</form>
        </div>
    </div>
        <?php include ('footer.php'); ?>
    </body>
</html>