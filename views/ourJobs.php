<!DOCTYPE html>
<html>
    <head>
        <title>Our Jobs</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>


        <div class="container" >
            <h1>Our Jobs</h1>
            <div class="jumbotron"> 
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">JobID</th>

                            <th scope="col">Job Title</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Job Requirements</th>
                            <th scope="col"></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jobs as $j) : ?>
                            <tr>
                                <td><a href="index.php?action=viewJob&amp;id=<?php echo $j->getId(); ?>">
                                        <?php echo $j->getId(); ?>
                                    </a></td>

                                <td><?php echo $j->getJobName(); ?></td>
                                <td><?php echo $j->getJobDescription(); ?></td>
                                <td><?php echo $j->getJobRequirements(); ?></td>
                                <td>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="processApplications">
                                        <input type="hidden" name="companyID" value="<?php echo htmlspecialchars($j->getCompanyId()); ?>">
                                        <input type="hidden" name="jobID" value="<?php echo htmlspecialchars($j->getId()); ?>">
                                        <input type="submit" class="btn btn-link" value="View Apps"><br>
                                    </form>

                                </td>
                                <td><form action="index.php" method="post">
                                        <input type="hidden" name="action" value="editJob">
                                        <input type="hidden" name="id"  value="<?php echo $j->getId(); ?>">
                                        <input type="submit" value="Edit">
                                    </form>
                                </td>

                                <?php if ($j->getStatus() === "open") { ?>
                                    <td><form action="index.php" method="post">
                                            <input type="hidden" name="action" value="deleteJob">
                                            <input type="hidden" name="id"  value="<?php echo htmlspecialchars($j->getId()); ?>">
                                            <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; width: 100px; height: 25px; padding-top: 2px; background-color:red;" value="Close" >
                                        </form>
                                    </td>
                                <?php } ?>
                                <?php if ($j->getStatus() === "filled") { ?>
                                    <td><form action="index.php" method="post">
                                            <input type="hidden" name="action" value="openJob">
                                            <input type="hidden" name="id"  value="<?php echo htmlspecialchars($j->getId()); ?>">
                                            <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; width: 100px; height: 25px; padding-top: 2px; background-color:green;" value="Re-open" >
                                        </form>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <a class="btn btn-primary btn-lg" href="index.php?action=addJob" role="button">Add Job</a>
                <br>
                <br><a class="btn btn-primary btn-sml" href="index.php?action=companyPortal" role="button">Back To Portal</a>
            </div>


        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
