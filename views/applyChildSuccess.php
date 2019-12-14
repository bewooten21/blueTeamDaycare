<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <?php include ('css/css.php'); ?>   
    </head>

    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <h2><?php echo $success ; ?></h2>
            <p><?php echo $message ; ?></p>
            <a class="btn btn-primary btn-lg" href="index.php?action=viewChildcareOpenings" role="button">Back To Openings</a>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>


