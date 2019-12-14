<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit User</title>
        <?php include ('css/css.php');  ?> 
    </head>
    <body>
        <?php include('nav.php'); ?> 
        <div class="container">
  <h2>Edit <?php echo $user->getFName(). " ". $user->getLName() ; ?></h2>
  <div class="jumbotron">
  <form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="action" value="adminEditUserVal">
    <input type="hidden" name="userId" value="<?php echo $userId ?>">
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="fn">First Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="fn" name="fn"  value="<?php echo htmlspecialchars($user->getFName()); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $fnError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="ln">Last Name:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="ln" name="ln"  value="<?php echo htmlspecialchars($user->getLName()); ?>">
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $lnError; ?>
          </p>
      </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="role">Role:</label>
    <div class="col-sm-4">
      <select id="roleId" name="roleId" >
<option value="<?php echo $user->getRole()->getID(); ?>"> <?php echo $user->getRole()->getType(); ?> </option>

                                <?php foreach ($roles as $r) : ?>
                                    <option value="<?php echo $r->getID(); ?>"> <?php echo $r->getType(); ?> </option>
                                <?php endforeach; ?>  


                            </select>
    </div>
    <div class="col-sm-2">
          <p class="error">
              <?php echo $roleError; ?>
          </p>
      </div>
  </div>
    
    
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-sml">Update</button>
    </div>
  </div>
</form>
        </div>
        </div>
      
        <?php include ('footer.php'); ?>
    </body>
</html>
