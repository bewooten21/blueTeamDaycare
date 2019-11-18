<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blue&apos;s Daycare</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <div class="container">
                <h1>Say Hello!</h1>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($users->getImage()); ?>" width="200" height="200" class="center"></p>
                </div>
                <h3><?php echo htmlspecialchars($users->getUName()); ?></h3>

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
                </table>
                <?php if (isset($_SESSION['currentUser'])): if ($_SESSION['currentUser']->getID() !== $users->getID()) : ?>
                        <h4>Leave a comment!</h4>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="submitComment">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($users->getID()); ?>">
                            <div class="form-group col-sm-4">
                                <input type="textarea" class="form-control" name="comment" value="<?php echo htmlspecialchars($comment); ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" value="Submit"><br>
                            </div>      
                        </form>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="reviewUser">
                            <input type="submit" class="btn btn-default" value="Leave a Review"><br>
                        </form>
                    <?php
                    endif;
                endif;
                ?>
                
            </div>
        </main>
    </body>
</html>
