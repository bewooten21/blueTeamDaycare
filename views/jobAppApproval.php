<!DOCTYPE html>
<html>
    <head>
        <title>Job Approval</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>

        <h1>Applications for <?php echo htmlspecialchars($job->getJobName()); ?></h1>
        <?php if($appInfo_arr !== null && $appInfo_arr !== "" ) : ?>
        <div class="jumbotron" >
            <div class="container"> 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Position Applied</th>
      <th scope="col">Name of Applicant</th>
      <th scope="col">Cover Letter</th>
      <th scope="col">Resume</th>
      <th scope="col">Decision</th>
    </tr>
  </thead>
  <tbody>
       
      <?php foreach ($appInfo_arr as $appInfo) : ?>
    <tr>
      <th>
          <a href="index.php?action=viewJob&amp;id=<?php echo $job->getId(); ?>">
            <?php  echo $job->getJobName(); ?>
          </a>
      </th>
      <td><?php echo htmlspecialchars($appInfo["fName"] . ' ' . $appInfo["lName"]); ?></td>
      <td><?php echo htmlspecialchars($appInfo["coverLetter"]); ?></td>
      <td><?php echo htmlspecialchars($appInfo["resume"]); ?></td>
     
          <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="approveJobApp">
                  <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($appInfo["applicationID"]); ?>">
                  <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($appInfo["companyID"]); ?>">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($job->getId()); ?>">
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 75px; height: 25px; padding-top: 2px;" value="Approve">
              </form>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="dismissJobApp">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($appInfo["jobID"]); ?>">
                  <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; width: 75px; height: 25px; padding-top: 2px;" value="Dismiss">
              </form>
          </td>
       
    </tr>
    <?php endforeach; ?>
    
  
  </tbody>
</table>
              
            </div>
        </div>
            <?php else: ?>
          <p> No applications pending at this time </p>
       <?php endif; ?>  
    </body>
</html>

