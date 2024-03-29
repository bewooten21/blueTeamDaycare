<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile Page</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <div class="container">
                <h1>Welcome to your profile page <?php echo htmlspecialchars($_SESSION['currentUser']->getFName()); ?>!</h1>
                <?php if ((int) $_SESSION['currentUser']->getRestricted() === 1) { ?> <h2> Your account is currently restricted pending administrator review!</h2> <?php } ?>
                <div id="profileImg">
                    <p><img src="<?php echo htmlspecialchars($_SESSION['currentUser']->getImage()); ?>" width="200"></p>
                </div>
                <h3><?php echo htmlspecialchars($_SESSION['currentUser']->getUName()); ?></h3> 
                <p>Email: <?php echo htmlspecialchars($_SESSION['currentUser']->getEmail()); ?></p></br>
                <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getRestricted() != 1) { ?>
                    <a class="btn btn-primary btn-sml" href="index.php?action=viewOtherUsers" role="button">Others Users</a>
                    <h2>Children</h2>

                    <a href='index.php?action=addStudent'>Add child/student</a>
                    <?php if ($children != false) { ?>
                        <form  method="post">
                            <input type="hidden" name="action" value="editChild">
                            <select id="stuId" name="stuId">


                                <?php foreach ($children as $c) : ?>
                                    <option value="<?php echo $c['studentId'] ?>"> <?php echo $c['stuFName'] . " " . $c["stuLName"] . "  " . "Age:" . $c["age"]; ?> </option>
                                <?php endforeach; ?>  

                            </select>


                            <input type="submit" class="btn btn-primary btn-sml" value="Edit Child"><br>
                        </form><br>
                    <?php }; ?>





                    <table class="table table-dark">
                        <tr>
                            <th> Comments</th>
                        </tr>
                        <?php foreach ($comments as $single) : ?>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($single->getCommenterName() . ' said:'); ?></strong><br>
                                    <i><?php echo htmlspecialchars($single->getComment()) ?></i><br> 
                                    <?php echo htmlspecialchars(' at ' . $single->getCommentTime()); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table><br>

                    <div class="row">
                        <div class="col-sm-2">
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="changeInfo">
                                <input type="submit" class="btn btn-primary btn-sml" value="Change Profile Info"><br>
                            </form>
                        </div>
                        <?php if ($userCompany == false) : ?>
                            <div class="col-sm-2">
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action" value="registerBusiness">
                                    <input type="submit" class="btn btn-primary btn-sml" value="Register Business"><br>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php } ?>

            </div>
        </main>
        <?php include ('footer.php'); ?>
    </body>
</html>
