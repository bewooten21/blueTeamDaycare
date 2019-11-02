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
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <header></header>
        <main>
            <div id="formWrap">
                <h1>Welcome to your profile page <?php echo htmlspecialchars($_SESSION['currentUser']->getFName()); ?>!</h1>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($_SESSION['currentUser']->getImage()); ?>" width="200" height="200" class="center"></p>
                </div>
                <h3><?php echo htmlspecialchars($_SESSION['currentUser']->getUName()); ?></h3> 
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
                    <input type="hidden" name="action" value="register business">
                    <label>&nbsp;</label>
                    <input type="submit" value="Register Business"><br>
                </form>
                <form action="index.php" method="post">
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="logout">
                    <label>&nbsp;</label>
                    <input type="submit" value="Logout"><br>
                </form>
            </div>
        </main>
    </body>
</html>
