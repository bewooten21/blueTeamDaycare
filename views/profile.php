<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <div class="container">
                <h1>Welcome to your profile page <?php echo htmlspecialchars($_SESSION['currentUser']->getFName()); ?>!</h1>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($_SESSION['currentUser']->getImage()); ?>" width="200" height="200" class="center"></p>
                </div>
                <h3><?php echo htmlspecialchars($_SESSION['currentUser']->getUName()); ?></h3> 
                <p>Email: <?php echo htmlspecialchars($_SESSION['currentUser']->getEmail()); ?></p></br>
                <table class="table table-dark">
                    <tr>
                        <th> Comments</th>
                    </tr>
                    <?php foreach ($comments as $single) : ?>
                        <tr>
                            <td>
                                <strong><?php echo htmlspecialchars($single->getCommenterName() . ' said:'); ?></strong><br>
                                <i><?php echo htmlspecialchars($single->getComment()) ?></i><br> 
                                <?php echo  htmlspecialchars(' at ' . $single->getCommentTime()); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table><br>
                <div class="row">
                    <div class="col-sm-2">
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="changeInfo">
                    <input type="submit" class="btn btn-default" value="Change Profile"><br>
                </form>
                        </div>
                    <div class="col-sm-2">
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="register business">
                    <input type="submit" class="btn btn-default" value="Register Business"><br>
                </form>
                    </div>
                    </div>
            </div>
        </main>
    </body>
</html>
