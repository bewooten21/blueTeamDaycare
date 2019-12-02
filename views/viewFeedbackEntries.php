<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php'); ?>
    <?php if($users !== null && !empty($users) ) : ?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Negative Feedback Entries</th>
    </tr>
  </thead>
  <tbody>
       
      <?php $count = 0;
      foreach ($users as $user) : ?>
    <tr>
      <th>
            <?php  echo htmlspecialchars($user[0]); ?>
      </th>
      <td>
          <?php $reviews = feedback_db::getReviewCount($user[0], 'user');
            echo htmlspecialchars($reviews[0])?>
          <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="processFeedback">
                  <input type="hidden" name="type"  value="<?php echo htmlspecialchars('user'); ?>">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($user[0]) ?>">
                  <input type="submit" class="btn btn-primary" style="border-radius: 10% 10% 0% 0%; width: 75px; height: 25px; padding-top: 2px;" value="View">
              </form>
          </td>
       
    </tr>
    <?php endforeach; ?>
    
  
  </tbody>
</table>
              <?php else: ?>
        <br>
        <p><strong> No users have negative feedback at the moment! </strong></p>
       <?php endif; ?>  
        
<?php if($companies !== null && !empty($companies) ) : ?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Company ID</th>
      <th scope="col">Negative Feedback Entries</th>
    </tr>
  </thead>
  <tbody>
       
      <?php $count = 0;
      foreach ($companies as $company) : ?>
    <tr>
      <th>
            <?php  echo htmlspecialchars($company[0]); ?>
      </th>
      <td>
          <?php $reviews = feedback_db::getReviewCount($company[0], 'company');
          echo htmlspecialchars($reviews[0])?>
      </td>
          <td>

              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="processFeedback">
                  <input type="hidden" name="type"  value="<?php echo htmlspecialchars('company'); ?>">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($company[0])?>">
                  <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; width: 75px; height: 25px; padding-top: 2px;" value="View">
              </form>
          </td>
       
    </tr>
    <?php endforeach; ?>
    
  
  </tbody>
</table>
              <?php else: ?>
        <br>
        <p><strong> No companies have negative feedback at the moment! </strong></p>
       <?php endif; ?>  
    
    <?php include ('footer.php'); ?>
</body>
</html>
