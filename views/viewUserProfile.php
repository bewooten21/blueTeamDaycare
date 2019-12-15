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
                <h1><?php echo $user->getFName(). " ". $user->getLName() ; ?></h1>
                <?php if ((int)$_SESSION['currentUser']->getRestricted() === 1) { ?> <h2> Your account is currently restricted pending administrator review!</h2> <?php } ?>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($user->getImage()); ?>" width="200"></p>
                </div>
                <h3><?php echo htmlspecialchars($user->getUName()); ?></h3> 
                <p>Email: <?php echo htmlspecialchars($user->getEmail()); ?></p></br>
               
                   
                   
                
                
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
                <?php if (isset($_SESSION['currentUser'])): if ($_SESSION['currentUser']->getID() !== $user->getID()) : if($_SESSION['currentUser']->getRestricted() != 1) :  ?>
                        <h4>Leave a comment!</h4>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="submitComment">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->getID()); ?>">
                            <div class="form-group col-sm-4">
                                <input type="textarea" class="form-control" name="comment" value="<?php echo htmlspecialchars($comment); ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sml" value="Submit"><br>
                            </div>      
                        </form>
                        
                    <?php
                    endif;
                endif;
                endif;
                ?>
            </div>
        </main>
        <?php include ('footer.php'); ?>
    </body>
</html>
