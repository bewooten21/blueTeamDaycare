<!DOCTYPE html>
<html>
    <head>
        <title>Our Child Apps</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <h1>Our Apps</h1>
        <div class="jumbotron" >
            <div class="container"> 
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Student Name</th>
      
      <th scope="col">Age</th>
     
      
    </tr>
  </thead>
  <tbody>
      <?php foreach ($apps as $a) : ?>
    <tr>
     
      
      <td><?php echo $a['stuFName'] . " ".$a['stuLName']  ; ?></td>
      <td><?php echo $a['age'] ; ?></td>
      
          <td><form action="index.php" method="post">
                  <input type="hidden" name="action" value="approveChildApp">
                  <input type="hidden" name="id"  value="<?php  echo $a['studentId'] ?>">
                  <input type="submit" value="Approve">
              </form>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="denyChildApp">
                  <input type="hidden" name="id"  value="<?php echo $a['studentId']  ?>">
                  <input type="submit" value="Deny">
              </form>
          </td>
          
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>
