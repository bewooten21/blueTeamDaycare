<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View <?php echo htmlspecialchars($type); ?></title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>
        <div class="container">
            <h2><?php echo htmlspecialchars($type); ?></h2>
            <br>
            <div style="text-align:center">
                <iframe width="740px" height="500px" src="<?php echo htmlspecialchars($file); ?>" ></iframe>
            </div>
            <br>
            <form action="index.php" method="post">
                  <input type="hidden" name="action" value="processApplications">
                  <input type="hidden" name="applicationID"  value="<?php echo htmlspecialchars($applicationID); ?>">
                  <input type="hidden" name="companyID"  value="<?php echo htmlspecialchars($companyID); ?>">
                  <input type="hidden" name="jobID"  value="<?php echo htmlspecialchars($jobID); ?>">
                  <input type="submit" class="btn btn-default" value="Back to Approval">
              </form>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
