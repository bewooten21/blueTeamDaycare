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
      <th scope="col">Apply</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($jobs as $j) : ?>
    <tr>
      <th scope="row"><a href="index.php?action=viewJob&amp;id=<?php echo $j["id"]; ?>">
                                <?php  echo $j["id"]; ?>
                            </a></th>
      <td><?php echo $j["companyName"] ; ?></td>
      <td><?php echo $j["jobName"] ; ?></td>
      <td><?php echo $j["jobDescription"] ; ?></td>
      <td><?php echo $j["jobRequirements"] ; ?></td>
          <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="applyToJob">
                  <input type="hidden" name="id"  value="<?php echo htmlspecialchars($j["id"]); ?>">
                  <input type="submit" value="Apply">
              </form>
          </td>
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
            </div>
        </div>
    </body>
</html>
