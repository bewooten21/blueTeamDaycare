<!DOCTYPE html>
<html>
    <head>
        <title>Childcare Openings</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        
            
        <div class="container" >
            <h1>Childcare Openings</h1>
            <div class="jumbotron"> 
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Company</th>
      <th scope="col">Openings</th>
      
      
    </tr>
  </thead>
  <tbody>
      <?php foreach ($openings as $o) : ?>
    <tr>

      <td><?php echo $o['companyName'] ; ?></td>
      <td><?php echo $o['childCapacity'] - $o['childrenEnrolled'] ?></td>

      <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="applyToChildcare">
                  <input type="hidden" name="companyId"  value="<?php echo htmlspecialchars($o['companyID']); ?>">
                  <input type="hidden" name="companyName" value="<?php echo $o['companyName'] ;?>">
                  <input type="submit" class="btn btn-primary btn-sml" value="Apply">
              </form></td>
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>
