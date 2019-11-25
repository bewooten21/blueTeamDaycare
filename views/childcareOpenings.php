<!DOCTYPE html>
<html>
    <head>
        <title>About the Blue Team</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <h1>Childcare Openings</h1>
        <div class="jumbotron" >
            <div class="container"> 
<table class="table table-dark">
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
                  <input type="hidden" name="companyId"  value="<?php echo htmlspecialchars($o['id']); ?>">
                  <input type="submit" value="Apply">
              </form></td>
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
            </div>
        </div>
    </body>
</html>
