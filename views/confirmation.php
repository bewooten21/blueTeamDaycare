<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <?php include ('css/css.php'); ?>   
    </head>

    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <h2>Success!</h2>
            <p><?php echo $confirmationMessage; ?></p>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
