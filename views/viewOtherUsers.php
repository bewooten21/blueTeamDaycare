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
                            <th>Username</th>
                            


                        </tr>
                        <?php foreach ($users as $u) : ?>
                            <tr>  
                                <td><a href="index.php?action=userViewUser&amp;id=<?php echo $u->getID(); ?>"><?php echo htmlspecialchars($u->getUName()); ?></a></td>

                                

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