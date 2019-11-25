<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blue&apos;s Daycare</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
            <div id="formWrap">
                <h1>Blue&apos;s Daycare Users</h1>
                <table class="table table-dark">
                    <tr>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>User ID</th>
                    </tr>
                    <?php foreach ($users as $single) : ?>
                        <tr>  
                            <td><?php echo htmlspecialchars($single->getUName()); ?></td>
                            <td><?php echo htmlspecialchars($single->getFName()); ?></td>
                            <td><?php echo htmlspecialchars($single->getLName()); ?></td>
                            <td><?php echo htmlspecialchars($single->getEmail()); ?></td>
                            <td><form action="index.php" method="post">
                                    <input type="hidden" name="action" value="random_display_profile">
                                    <input type="hidden" name="id"  value="<?php echo htmlspecialchars($single->getID()); ?>">
                                    <input type="submit" value="Select">
                                </form></td>
                        </tr>
                    <?php endforeach; ?> 

                </table><br>

            </div>
        <?php include ('footer.php'); ?>
    </body>
</html>