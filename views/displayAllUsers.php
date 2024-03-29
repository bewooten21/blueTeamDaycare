<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <br>
            <div class="jumbotron">
            <div id="formWrap">
                <h1>Blue&apos;s Daycare Users</h1>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                       
                    </tr>
                    <?php foreach ($users as $single) : ?>
                        <tr>  
                            <td><a href="index.php?action=viewUserProfile&amp;id=<?php echo $single->getID(); ?>"><?php echo htmlspecialchars($single->getUName()); ?></a></td>
                            <td><?php echo htmlspecialchars($single->getFName()); ?></td>
                            <td><?php echo htmlspecialchars($single->getLName()); ?></td>
                            <td><?php echo htmlspecialchars($single->getRole()->getType()); ?></td>
                            <td><form action="index.php" method="post">
                                    <input type="hidden" name="action" value="adminEditUser">
                                    <input type="hidden" name="userId"  value="<?php echo htmlspecialchars($single->getID()); ?>">
                                    <input type="submit" value="Edit">
                                </form></td>
                                <?php if((int)$single->getRestricted()===1) { ?>
                                <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="removeSuspension">
                  <input type="hidden" name="userId"  value="<?php echo $single->getID(); ?>">
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 100px; height: 25px; padding-top: 2px; background-color:green;" value="Reinstate">
              </form></td>
                                <?php }   ?> 
              <?php if((int)$single->getRestricted()!=1) { ?>
                                <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="suspend">
                  <input type="hidden" name="userId"  value="<?php echo $single->getID(); ?>">
                  
                  <input type="submit" class="btn btn-primary"  style="border-radius: 0% 0% 10% 10%; width: 100px; height: 25px; padding-top: 2px; background-color:red;" value="Suspend">
              </form></td>
                                 <?php } ?>
                        </tr>
                    <?php endforeach; ?> 

                </table><br>

            </div>
                            <a class="btn btn-primary btn-sml" href="index.php?action=displayProfile" role="button">Back To Portal</a>

            </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>