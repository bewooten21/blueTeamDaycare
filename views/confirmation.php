<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <?php include ('css/css.php'); ?>   
    </head>

    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <br>
            <div class="jumbotron">
            <h2>Success!</h2>
            <p><?php echo $confirmationMessage; ?></p>
        </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
