<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <main>
            <div id="formWrap">
                <h1>BranWillTy Profile Page</h1>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($_SESSION['currentUser']->getImage()); ?>" width="200" height="200" class="center"></p>
                </div>
                <h3><?php echo htmlspecialchars($_SESSION['currentUser']->getUName()); ?></h3> 
                <!--need to call variable to the index page, $uName when they log in need to send the #uName variable to line 100 on index.php-->
                <p>First Name: <?php echo htmlspecialchars($_SESSION['currentUser']->getFName()); ?></p></br>
                <p>Last Name: <?php echo htmlspecialchars($_SESSION['currentUser']->getLName()); ?></p></br>
                <p>Email: <?php echo htmlspecialchars($_SESSION['currentUser']->getEmail()); ?></p></br>
                <table>
                    <tr>
                        <th> Comments</th>
                    </tr>
                    <?php foreach ($comments as $single) : ?>
                        <tr>
                            <td>
                                <strong><?php echo htmlspecialchars($single->getCommenterName() . ' said:'); ?></strong><br>
                                <i><?php echo htmlspecialchars($single->getComment()) ?></i><br> 
                                <?php echo  htmlspecialchars(' at ' . $single->getCommentTime()); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table><br>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="changeInfo">
                    <label>&nbsp;</label>
                    <input type="submit" value="Change Profile"><br>
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
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="logout">
                    <label>&nbsp;</label>
                    <input type="submit" value="Logout"><br>
                </form>
            </div>
        </main>
    </body>
</html>
