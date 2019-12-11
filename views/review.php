<!DOCTYPE html>
<html lang="en">
<head>
  <title>Submit Feedback</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php') ?>
    <div class="container">
        <h2>Rate <?php echo $_SESSION['targetType'] ?></h2>
    <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="feedback" class="control-label col-sm-2">Feedback</label>
            <div class="col-sm-4">
                <textarea id="feedback" class="form-control" name="feedback" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group <?php echo $error_message['rating'] !== '' ? 'has-error' : ''; ?>">
            <label for="rating" class="control-label col-sm-2">Rating: </label>
            <div class="col-sm-4">
                <select class="form-control" id="rating" name="rating">
                    <?php foreach ($ratings_arr as $value) { ?>
                        <option <?php if ($value == $rating) { echo ' selected="selected"'; } ?> value="<?php echo htmlspecialchars($value); ?>"><?php echo htmlspecialchars($value); ?></option>
                    <?php } ?>
                </select>
                <div class="col-sm-12">
                    <span class="help-block">
                        <?php echo htmlspecialchars($error_message['rating']); ?>
                    </span>
                </div>
            </div>
        </div>
        <input type="hidden" name="action" value="submitFeedback">
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
        </div>
    </form>
        </div>
        <?php include ('footer.php'); ?>
</body>
</html>


