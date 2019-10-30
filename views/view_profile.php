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
                <h1>BranWillTy Profile Page</h1>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($users->getImage()); ?>" width="200" height="200" class="center"></p>
                </div>
                <h3><?php echo htmlspecialchars($users->getUName()); ?></h3>
                <?php if (isset($_SESSION['currentUser'])): if ($_SESSION['currentUser']->getID() !== $users->getID()) : ?>
                        <h4>Leave a comment!</h4>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="submitComment">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($users->getID()); ?>">
                            <input type="textarea" name="comment" value="<?php echo htmlspecialchars($comment); ?>">
                            <div id="buttons">
                                <label>&nbsp</label>
                                <input type="submit" value="Submit"><br>
                            </div>      
                        </form>
                    <?php endif;
                endif;
                ?>

                <table>
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
                </table>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="registration">
                    <label>&nbsp;</label>
                    <input type="submit" value="Back to Registration"><br>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="displayAllUsers">
                    <label>&nbsp;</label>
                    <input type="submit" value="Display All Users"><br>
                </form>
                <form action="index.php" method="Post">
                    <input type="hidden" name="action" value="displayProfile">
                    <label>&nbsp;</label>
                    <input type="submit" value="Profile Page"></br>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="logout">
                    <label>&nbsp;</label>
                    <input type="submit" value="Logout"><br>
                </form>
            </div>
        </main>
        <?php
        // put your code here
        ?>
    </body>
</html>