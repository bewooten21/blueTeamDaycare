<!DOCTYPE html>
<html>
    <head>
        <title>About the Blue Team</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        
            
        <div class="container" >
            <h1>Our Jobs</h1>
            <div class="jumbotron"> 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">JobID</th>
      
      <th scope="col">Job Title</th>
      <th scope="col">Job Description</th>
      <th scope="col">Job Requirements</th>
      
    </tr>
  </thead>
  <tbody>
      <?php foreach ($jobs as $j) : ?>
    <tr>
      <th scope="row"><a href="index.php?action=viewJob&amp;id=<?php echo $j->getId(); ?>">
                                <?php  echo $j->getId(); ?>
                            </a></th>
      
      <td><?php echo $j->getJobName() ; ?></td>
      <td><?php echo $j->getJobDescription() ; ?></td>
      <td><?php echo $j->getJobRequirements() ; ?></td>
          <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="editJob">
                  <input type="hidden" name="id"  value="<?php  echo $j->getId(); ?>">
                  <input type="submit" value="Edit">
              </form>
          </td>
          <?php if ($j->getStatus()==="open") { ?>
          <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="deleteJob">
                  <input type="hidden" name="id"  value="<?php echo htmlspecialchars($j->getId()); ?>">
                  <input type="submit" value="Close" >
              </form>
          </td>
          <?php } ?>
          <?php if ($j->getStatus()==="filled") { ?>
          <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="openJob">
                  <input type="hidden" name="id"  value="<?php echo htmlspecialchars($j->getId()); ?>">
                  <input type="submit" value="Re-open" >
              </form>
          </td>
          <?php } ?>
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>
