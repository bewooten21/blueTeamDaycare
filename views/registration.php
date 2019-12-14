<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blue&apos;s Daycare</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <h2>Register</h2>
            <div class="jumbotron">
            
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="register">
                <div class="form-group <?php echo $error_message['fName'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">First Name: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="fName" value="<?php echo htmlspecialchars($fName) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['fName']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['lName'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Last Name: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="lName" value="<?php echo htmlspecialchars($lName) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['lName']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['email'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Email: </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['email']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['uName'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">User Name: </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="uName" value="<?php echo htmlspecialchars($uName) ?>">
                        <div class="col-sm-12">
                            <span class="help-block">
                                <?php echo htmlspecialchars($error_message['uName']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php if ($error_message['password'] !== ''  || $error_message['pwMessage'] !== '' ):?> has-error <?php endif;?>">
                    <label class="control-label col-sm-2">Password: </label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($password) ?>">
                        <div class="col-sm-12">
                        <span class="help-block">
                            <?php echo htmlspecialchars($error_message['password']) ?>
                            <?php echo htmlspecialchars($error_message['pwMessage']) ?>
                            <ul>
                                <!--http://php.net/manual/en/function.htmlspecialchars-decode.php -->
                                <?php echo htmlspecialchars_decode($error_message['requirements'], ENT_NOQUOTES); ?>
                            </ul>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Confirm: </label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="confirmPassword" >
                    </div>
                </div>
                <div class="form-group <?php echo $error_message['image'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Your Picture: </label>
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
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
