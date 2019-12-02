<!DOCTYPE html>
<html>
    <head>
        <title>Business Registration - Team Blue</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <h2>Register Business</h2>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="validateBusiness">
                <div class="form-group <?php echo $error_message['cName'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Company Name: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="cName" value="<?php echo htmlspecialchars($cName) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['cName']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['maxChild'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Max Enrolled Children: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="maxChild" value="<?php echo htmlspecialchars($maxChild) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['maxChild']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['empCount'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Number of Employees: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="empCount" value="<?php echo htmlspecialchars($empCount) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['empCount']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['childCount'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Number of Enrolled Children: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="childCount" value="<?php echo htmlspecialchars($childCount) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['childCount']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['image'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Company Image/Logo: </label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-default">
                                    Browse&hellip; <input type="file" style="display: none;" name="image" multiple>
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <span class="help-block">
                            <?php echo htmlspecialchars($error_message['image']); ?>
                        </span>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" value="">Register</button>
                    </div>
                </div>

            </form>

        </div>
        
        <?php include ('footer.php'); ?>
    </body>
</html>