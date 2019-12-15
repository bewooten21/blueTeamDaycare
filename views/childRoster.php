<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['company']['companyName'] ;?></title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>
        
        <div class="container">
            <h1>Our Students</h1>
            <div class="jumbotron">

        
         
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php foreach ($children as $c) : ?>
                <tbody>

                    <tr>
                        
                        <td><?php echo $c['stuFName']. " ". $c['stuLName']; ?></td>
                        <td> <?php echo $c['age']; ?></td>
                        <td>
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="removeChild">
                                <input type="hidden" name="studentId" value="<?php echo htmlspecialchars($c['studentId']); ?>">
                                <input type="submit" class="btn btn-default" style="background-color: red;" value="Remove"><br>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
                <br>
                <a class="btn btn-primary btn-sml" href="index.php?action=companyPortal" role="button">Back To Portal</a>
         </div>
            
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>

