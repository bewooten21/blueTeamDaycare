<!DOCTYPE html>
<html>
    <head>
        <title>Login - Team Blue</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <header>Blue's Daycare Portal</header>
                                
            
            <div id="formWrap">
                <div id="sidemenu">
                
                <h3>Newest Users</h3>
                <table>
                <?php foreach ($users as $single) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($single->getUName()); ?></td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"  value="random_display_profile">
                                       <input type="hidden" name="id"
                                       value="<?php echo htmlspecialchars($single->getID()); ?>">
                                <input type="submit" value="Select">
                            </form></td> 
                    </tr>
                <?php endforeach; ?>
                  </table>
                
            </div>
                <h1>Log In</h1>
                <p><?php echo htmlspecialchars($message) ?></p>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="loggingIn">
                    <div id="data">
                        <label>User Name: </label>
                        <input type="text" name="uName" value="<?php echo htmlspecialchars($uName) ?>"><div id="error"><?php echo htmlspecialchars($error_message['uName']); ?></div><br>
                        <label>Password: </label>
                        <input type="password" name="pWord"><div id="error"><?php echo htmlspecialchars($error_message['pWord']); ?></div><br>
                    </div>

                    <div id="buttons">
                        <label>&nbsp</label>
                        <input type="submit" value="Login"><br>
                        </form>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="registration">
                            <label>&nbsp;</label>
                            <input type="submit" value="Back to Registration"><br>
                        </form>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="logout">
                            <label>&nbsp;</label>
                            <input type="submit" value="Logout"><br>
                        </form>
                    </div>

            </div>
            <footer>
                <p>Team Blue @2019</p>
            </footer>
        </main>
    </body>
</html>
