<!DOCTYPE html>
<html>
    <head>
        <title>Our Child Apps</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            
            
        <div class="container" >
            <h1>Pending Childcare Apps</h1>
            <div class="jumbotron"> 
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
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 100px; height: 25px; padding-top: 2px; background-color:green;" value="Approve">
              </form>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="denyChildApp">
                  <input type="hidden" name="id"  value="<?php echo $a['studentId']  ?>">
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 100px; height: 25px; padding-top: 2px; background-color:red;" value="Deny">
              </form>
          </td>
          
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
                <p class='error'> <?php echo $message; ?> </p>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>
