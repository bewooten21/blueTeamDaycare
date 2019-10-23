<!DOCTYPE html>
<html>
    <head>
        <title>Team S</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <main>
            <header>BranWillTy Social Media Platform</header>
            <div id="formWrap">
                <h1>Enter Information</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="register">
                    <div id="data">
                        <div id="formTable">
                            <table id="formTable">
                                <tr style="background-color: white;">
                                    <td><label>First Name: </label></td>
                                    <td><input type="text" name="fName" value="<?php echo htmlspecialchars($fName) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['fName']); ?></div></td>
                                </tr>

                                <tr>
                                    <td><label>Last Name: </label></td>
                                    <td><input type="text" name="lName" value="<?php echo htmlspecialchars($lName) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['lName']); ?></div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Email: </label></td>
                                    <td><input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['email']); ?></div></td>
                                </tr>
                                <tr>

                                    <td><label>User Name: </label></td>
                                    <td><input type="text" name="uName" value="<?php echo htmlspecialchars($uName) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['uName']); ?></div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Password: </label></td>
                                    <td><input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>"></td>
                                    <td><div id="error" class="align-right">
                                            <?php echo htmlspecialchars($error_message['password']) ?>
                                            <?php echo htmlspecialchars($error_message['pwMessage']) ?>
                                            <ul>
                                                <!--http://php.net/manual/en/function.htmlspecialchars-decode.php -->
                                                <?php echo htmlspecialchars_decode($error_message['requirements'], ENT_NOQUOTES); ?>
                                            </ul>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><label>Confirm: </label></td>
                                    <td><input type="password" name="confirmPassword"></td>
                                    <td><div id="error"><?php ?></div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Your Picture: </label></td>
                                    <td><input type="file" name="image" /></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['image']); ?></div></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="buttons">
                        <label>&nbsp</label>
                        <input type="submit" value="Submit"><br>
                    </div>
                </form>

                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="displayAllUsers">
                    <label>&nbsp</label>
                    <input type="submit" value="Display All Users"><br>
                </form>
                <form action="index.php" method="Post">
                    <input type="hidden" name="action" value="displayProfile">
                    <label>&nbsp;</label>
                    <input type="submit" value="Profile Page"></br>
                </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="viewLogin">
                        <label>&nbsp</label>
                        <input type="submit" value="Login"><br>
                    </form>
            </div>
            <footer>
                <p>BranWillTy @2019</p>
            </footer>
        </main>
    </body>
</html>
