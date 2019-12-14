<!DOCTYPE html>
<html>
    <head>
        <title>Job Approval</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>

        <div class="container" ><br>
            <div class="jumbotron"> 
                <h2>Applications for <?php echo htmlspecialchars($job->getJobName()); ?> position</h2>
                <p><?php echo $message; ?></p>
                <?php if($appInfo_arr !== null && !empty($appInfo_arr) ) : ?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Position Applied</th>
      <th scope="col">Name of Applicant</th>
      <th scope="col">Cover Letter</th>
      <th scope="col">Resume</th>
      <th scope="col">Contact</th>
      <th scope="col">Decision</th>
    </tr>
  </thead>
  <tbody>
       
      <?php foreach ($appInfo_arr as $appInfo) : ?>
    <tr>
      <th>
          <a href="index.php?action=viewJob&amp;id=<?php echo $job->getId(); ?>" target="_blank">
            <?php  echo $job->getJobName(); ?>
          </a>
      </th>
      <td><?php echo htmlspecialchars($appInfo["fName"] . ' ' . $appInfo["lName"]); ?></td>
      <td>
        <form action="index.php" method="post">
                  <input type="hidden" name="action" value="viewAppDoc">
                  <input type="hidden" name="type"  value="Cover Letter">
                  <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($appInfo["applicationID"]); ?>">
                  <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($appInfo["companyID"]); ?>">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($appInfo["jobID"]); ?>">
                  <input type="hidden" name="file"  value="coverLetters/<?php echo htmlspecialchars($appInfo["coverLetter"]); ?>">
                  <input type="submit" class="btn btn-link" value="View">
        </form>/<a href="<?php echo htmlspecialchars("coverLetters/" . $appInfo["coverLetter"]); ?>" download="<?php echo htmlspecialchars($appInfo["coverLetter"]); ?>">Download</a>
      </td>
      <td>
          <form action="index.php" method="post">
                  <input type="hidden" name="action" value="viewAppDoc">
                  <input type="hidden" name="type"  value="Resume">
                  <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($appInfo["applicationID"]); ?>">
                  <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($appInfo["companyID"]); ?>">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($appInfo["jobID"]); ?>">
                  <input type="hidden" name="file"  value="resumes/<?php echo htmlspecialchars($appInfo["resume"]); ?>">
                  <input type="submit" class="btn btn-link" value="View">
        </form>/<a href="<?php echo htmlspecialchars("resumes/" . $appInfo["resume"]); ?>" download="<?php echo htmlspecialchars($appInfo["resume"]); ?>">Download</a>
      </td>
      <td><a href="mailto:<?php echo htmlspecialchars($appInfo["email"]); ?>?subject=Concerning your recent application for the <?php echo htmlspecialchars($job->getJobName());?> position"><?php echo htmlspecialchars($appInfo["email"]); ?></a></td>
          <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="approveJobApp">
                  <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($appInfo["applicationID"]); ?>">
                  <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($appInfo["companyID"]); ?>">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($job->getId()); ?>">
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 100px; height: 25px; padding-top: 2px; background-color:green;" value="Approve">
              </form>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="declineJobApp">
                  <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($appInfo["applicationID"]); ?>">
                  <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($appInfo["companyID"]); ?>">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($appInfo["jobID"]); ?>">
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 100px; height: 25px; padding-top: 2px; background-color:red;" value="Dismiss">
              </form>
          </td>
       
    </tr>
    <?php endforeach; ?>
    
  
  </tbody>
</table>
              <?php else: ?>
        <br>
        <p><strong> No applications pending at this time! </strong></p>
       <?php endif; ?>  
        
        <a class="btn btn-primary btn-sml" href="index.php?action=viewCompanyProfile&amp;id=<?php echo htmlspecialchars($job->getCompanyId()); ?>">Company Home</a>
            </div>
        </div>
         <?php include ('footer.php'); ?>   
    </body>
</html>

