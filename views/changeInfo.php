<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Baby&apos;s First</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <div id="formWrap">
                <h1>BranWillTy Change Profile</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="commitChange">
                    <div id="data">
                        <label>First Name: </label>
                        <input type="text" name="fName" value="<?php echo htmlspecialchars($_SESSION['currentUser']->getFName()) ?>"><div id="error"><?php echo htmlspecialchars($error_message['fName']); ?></div><br>

                        <label>Last Name: </label>
                        <input type="text" name="lName" value="<?php echo htmlspecialchars($_SESSION['currentUser']->getLName()) ?>"><div id="error"><?php echo htmlspecialchars($error_message['lName']); ?></div><br>

                        <label>Email: </label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['currentUser']->getEmail()) ?>"><div id="error"><?php echo htmlspecialchars($error_message['email']); ?></div><br>

                         <label>Password: </label>
                        <input type="password" name="password" value="<?php echo $password ?>"><div id="error" class="align-right">
                                            <?php echo htmlspecialchars($error_message['password']) ?>
                                            <?php echo htmlspecialchars($error_message['pwMessage']) ?>
                                            <ul>
                                                <!--http://php.net/manual/en/function.htmlspecialchars-decode.php -->
                                                <?php echo htmlspecialchars_decode($error_message['requirements'], ENT_NOQUOTES); ?>
                                            </ul>
                                        </div></br>

                        <label>Confirm: </label>
                        <input type="password" name="confirmPassword" ></br>
                        
                        <label>Your Picture: </label>
                        <input type="file" name="image">
                        <div id="error"><?php echo htmlspecialchars($error_message['image']); ?></div>
                        
                        <div id="buttons">
                        <label>&nbsp;</label>
                        <input type="submit" value="Change Profile"><br>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="registration">
                    <label>&nbsp;</label>
                    <input type="submit" value="Back to Registration"><br>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="displayAllUsers">
                    <label>&nbsp;</label>
                    <input type="submit" value="Display All Users"><br>
                </form>
                <form action="index.php" method="Post">
                    <input type="hidden" name="action" value="displayProfile">
                    <label>&nbsp;</label>
                    <input type="submit" value="Profile Page"></br>
                </form>
            </div>
            
        </main>
        
    </body>
</html>
