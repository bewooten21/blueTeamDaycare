<!DOCTYPE html>
<html>
    <head>
        <title>Decline Job</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>

        <h1>Decline <?php echo htmlspecialchars($applicant["fName"] . ' ' . $applicant["lName"]); ?>&apos;s Application</h1>
        <?php if($appInfo_arr !== null || $appInfo_arr !== '' ) : ?>
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
       
      <?php foreach ($appInfo_arr as $appInfo) : ?>
    <tr>
      <th>
          <a href="index.php?action=viewJob&amp;id=<?php echo $job->getId(); ?>" target="_blank">
            <?php  echo $job->getJobName(); ?>
          </a>
      </th>
      <td><?php echo htmlspecialchars($applicant["fName"] . ' ' . $applicant["lName"]); ?></td>
      <td><?php echo htmlspecialchars($application["coverLetter"]); ?></td>
      <td><?php echo htmlspecialchars($application["resume"]); ?></td>
       
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <form action="index.php" method="post">
            <select name="list">
         <option value="-1">Select One</option>
         <option value="1">One</option>
         <option value="2">Two</option>
</select>
<input type="submit" name="submit">
</form>      
            </div>
        </div>
            <?php else: ?>
          <p> No applications pending at this time </p>
       <?php endif; ?>  
    </body>
</html>



