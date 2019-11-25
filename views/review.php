<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php') ?>
    <form action="index.php" method="post">
        <lable>Feedback</lable></br>
        <input type="textarea" class="form-control" name="feedback">
        <label>Rating</label></br>
        <input type="text" class="form-control" name="rating">
        <input type="hidden" name="action" value="submitFeedback">
        <input type="submit" value="submit">
        <?php include ('footer.php'); ?>
</body>
</html>


