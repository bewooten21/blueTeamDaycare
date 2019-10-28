<!DOCTYPE html>
<html>
    <head>
        <title>Baby&apos;s First</title>
        <?php include ('css/css.php'); ?>   
    </head>

    <body>
        <?php include ('nav.php'); ?>
        <main>
            <header>BranWillTy Social Media Platform</header>
            <div id="formWrap">
            <h1>Congratulations</h1>
            <p >Thank you <?php echo $fName; ?> for registering for the BranWillTy Social Network!</p>
            <form action ="index.php" method="Post">
                <input type='hidden' name='action' value='registration'>
                <label>&nbsp;</label>
                <input type="submit" value="Home Page"><br>
            </form>
            <form action ="index.php" method="Post">
                <input type="hidden" name='action' value='displayAllUsers'>
                <label>&nbsp;</label>
                <input type="submit" value="Display All Users"><br>
            </form>
            </div>
            <footer>
                <p>BranWillTy @2019</p>
            </footer>
        </main>
    </body>
</html>
