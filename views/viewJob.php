<!DOCTYPE html>
<html>
    <head>
        <title>About the Blue Team</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            
        <div class="container" >
            <h1><?php echo $job["jobName"] ; ?></h1>
            <div class="jumbotron"> 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">JobID</th>
      <th scope="col">Company</th>
      <th scope="col">Job Title</th>
      <th scope="col">Job Description</th>
      <th scope="col">Job Requirements</th>
      <th scope="col">Apply</th>
    </tr>
  </thead>
  <tbody>
      
    <tr>
      <td><?php echo $job[0] ; ?></td>
      <td><?php echo $job["companyName"] ; ?></td>
      <td><?php echo $job["jobName"] ; ?></td>
      <td><?php echo $job["jobDescription"] ; ?></td>
      <td><?php echo $job["jobRequirements"] ; ?></td>
      <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="applyToJob">
                  <input type="hidden" name="id"  value="<?php echo htmlspecialchars($job["jobID"]); ?>">
                  <input type="submit" class="btn btn-primary btn-sml" value="Apply">
              </form></td>
    </tr>
    
  
  </tbody>
</table>
                <a class="btn btn-primary btn-lg" href="index.php?action=viewJobs" role="button">Back To Jobs</a>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>

