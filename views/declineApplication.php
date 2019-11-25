<!DOCTYPE html>
<html>
    <head>
        <title>Decline Job</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>

        <h1>Decline <?php echo htmlspecialchars($applicant->getFName() . ' ' . $applicant->getLName()); ?>&apos;s Application</h1>
        <div class="jumbotron" >
            <div class="container"> 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Position Applied</th>
      <th scope="col">Name of Applicant</th>
      <th scope="col">Cover Letter</th>
      <th scope="col">Resume</th>
    </tr>
  </thead>
  <tbody>
       
    <tr>
      <th>
          <a href="index.php?action=viewJob&amp;id=<?php echo $job->getId(); ?>" target="_blank">
            <?php  echo $job->getJobName(); ?>
          </a>
      </th>
      <td><?php echo htmlspecialchars($applicant->getFName() . ' ' . $applicant->getLName()); ?></td>
      <td><?php echo htmlspecialchars($application->getCoverLetter()); ?></td>
      <td><?php echo htmlspecialchars($application->getResume()); ?></td> 
    </tr>
  </tbody>
</table>
        <form action="index.php" method="post">
            <input type="checkbox" name="openSlot" value="isChecked" /> Would you like to reopen this application slot?
            <br>
            <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($application->getApplicationId()); ?>">
            <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($job->getCompanyID()); ?>">
            <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($job->getId()); ?>">
            <input type="hidden" name="action" value="finishAppDecline">
            
            <input type="submit" class="btn btn-default" value="Confirm">
        </form> 
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="processApplications">
                <input type="hidden" name="companyID" value="<?php echo htmlspecialchars($job->getCompanyId()); ?>">
                <input type="hidden" name="jobID" value="<?php echo htmlspecialchars($job->getId()); ?>">
                <input type="submit" class="btn btn-default" value="Cancel">
            </form>
            </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>



