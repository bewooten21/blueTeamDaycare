<!DOCTYPE html>
<html>
    <head>
        <title>Login - Team Blue</title>
        <?php include ('css/css.php'); ?>   
        <link href="css/signin.css" rel="stylesheet">
    </head>
    <body>
        <?php include ('nav.php'); ?>
        
        <main class="text-center">
                            
                <form class="form-signin" action="index.php" method="post">
                    <h1 class='h3 mb-3 font-weight-normal'>Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" name="uName" class="form-control" placeholder="User Name" required="" autofocus="" value="<?php echo htmlspecialchars($uName) ?>">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="pWord" id="inputPassword" class="form-control" placeholder="Password" required="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <input type="hidden" name="action" value="loggingIn">
                    <div class='h3 mb-3 font-weight-normal'>
            <p><?php echo htmlspecialchars($message) ?></p>
                <div id="error"><?php echo htmlspecialchars($error_message['uName']); ?></div>
                <div id="error"><?php echo htmlspecialchars($error_message['pWord']); ?></div>
            </div>
                    
</form>
            
        </main>
        <?php include ('footer.php'); ?>
    </body>
</html>
