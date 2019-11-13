<!DOCTYPE html>
<html>
    <head>
        <title>Blue&apos;s Daycare</title>
        <?php include ('css/css.php'); ?>   
    </head>

    <body>
        <?php include ('nav.php'); ?>
        <main>
            <header>Blue&apos;s Daycare</header>
            <div id="formWrap">
            <h1>Congratulations!</h1>
            <p >Thank you <?php echo $_SESSION['currentUser']->getFName(); ?> for registering for Blue&apos;s Daycare! We thank you for using our services and look forward to helping you find what you&apos;re looking for!</p>
            </div>
            <footer>
                <p>Blue Team Daycare @2019</p>
            </footer>
        </main>
    </body>
</html>
