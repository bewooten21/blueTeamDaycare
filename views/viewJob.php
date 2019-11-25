<!DOCTYPE html>
<html>
    <head>
        <title>About the Blue Team</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <h1>Job Openings</h1>
        <div class="jumbotron" >
            <div class="container"> 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">JobID</th>
      <th scope="col">Company</th>
      <th scope="col">Job Title</th>
      <th scope="col">Job Description</th>
      <th scope="col">Job Requirements</th>
    </tr>
  </thead>
  <tbody>
      
    <tr>
      <th scope="row"><?php echo $job[0] ; ?></th>
      <td><?php echo $job["companyName"] ; ?></td>
      <td><?php echo $job["jobName"] ; ?></td>
      <td><?php echo $job["jobDescription"] ; ?></td>
      <td><?php echo $job["jobRequirements"] ; ?></td>
    </tr>
    
  
  </tbody>
</table>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>

