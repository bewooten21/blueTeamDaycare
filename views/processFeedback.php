<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php'); ?>       
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Feedback</th>
      <th scope="col">Rating</th>
    </tr>
  </thead>
  <tbody>
       
      <?php foreach ($feedback as $entry) : ?>
    <tr>
      <th>
            <?php  echo htmlspecialchars($entry[0]); ?>
      </th>
      <td>
          <?php echo htmlspecialchars($entry[1]); ?>
      </td>
          <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="removeFeedback">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($entry[2]); ?>">
                  <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; width: 75px; height: 25px; padding-top: 2px;" value="Remove">
              </form>
          </td>   
    </tr>
    <?php endforeach; ?>
    
  
  </tbody>
</table>
    <?php include ('footer.php'); ?>
</body>
</html>
