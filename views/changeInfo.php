<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Baby&apos;s First</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <div id="formWrap">
                <h1>Change Profile</h1>
                <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitChange">
                    <div class="form-group">
                        <label class="control-label col-sm-2">First Name: </label>
                        <div class="col-sm-4">
                        <input type="text" name="fName" value="<?php echo htmlspecialchars($_SESSION['currentUser']->getFName()) ?>"><div id="error"><?php echo htmlspecialchars($error_message['fName']); ?></div><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Last Name: </label>
                        <div class="col-sm-4">
                        <input type="text" name="lName" value="<?php echo htmlspecialchars($_SESSION['currentUser']->getLName()) ?>"><div id="error"><?php echo htmlspecialchars($error_message['lName']); ?></div><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Email: </label>
                    <div class="col-sm-4">
                        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['currentUser']->getEmail()) ?>"><div id="error"><?php echo htmlspecialchars($error_message['email']); ?></div><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Password: </label>
                        <div class="col-sm-4">
                        <input type="password" name="password" value="<?php echo $password ?>"><div id="error" class="align-right">
                                            <?php echo htmlspecialchars($error_message['password']) ?>
                                            <?php echo htmlspecialchars($error_message['pwMessage']) ?>
                                            <ul>
                                                <!--http://php.net/manual/en/function.htmlspecialchars-decode.php -->
                                                <?php echo htmlspecialchars_decode($error_message['requirements'], ENT_NOQUOTES); ?>
                                            </ul>
                                        </div></br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Confirm: </label>
                        <div class="col-sm-4">
                        <input type="password" name="confirmPassword" ></br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Your Picture: </label>
                        <div class="col-sm-4">
                        <input type="file" name="image">
                        </div>
                        <div id="error"><?php echo htmlspecialchars($error_message['image']); ?></div>
                        
                    </div>
                    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" value="">Change Profile</button>
    </div>
  </div>

                </form>
                        
        </main>
        
    </body>
</html>
