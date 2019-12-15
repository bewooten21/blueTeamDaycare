<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Company Portal</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?>
        <div class='container'>
            <br>
            <div class="jumbotron">
                <div class="center">
                    <h2 ><?php echo $_SESSION['company']['companyName']; ?> Portal</h2>



                    <a class="btn btn-primary btn-sml" href="index.php?action=viewCompanyProfile&amp;id=<?php echo $_SESSION['company']['companyID']; ?>" role="button">Company Profile</a>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sml" href="index.php?action=childRoster" role="button">Child Roster</a>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sml" href="index.php?action=viewChildApps" role="button">Childcare Apps</a>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sml" href="index.php?action=ourJobs" role="button">Our Jobs</a>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sml" href="index.php?action=viewEmployees" role="button">Our Employees</a>
                </div>
            </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>