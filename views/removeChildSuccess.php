<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <?php include ('css/css.php'); ?>   
    </head>

    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <h2><?php echo $message ; ?></h2>
            <a class="btn btn-primary btn-lg" href="index.php?action=viewCompanyProfile&amp;id=<?php echo $_SESSION['company']['companyID']; ?>" role="button">Back To Profile</a>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>