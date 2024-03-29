<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Portal</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?>

        <div class='container'><br>
            <div class="center">
                <h1>Admin Portal</h1>

                <a class="btn btn-primary btn-sml" href="index.php?action=displayAllUsers" role="button">All Users</a>
                <a class="btn btn-primary btn-sml" href="index.php?action=feedbackEntries" role="button">View Feedback Entries</a>

            </div><br>


            <?php if ($pendingCompanies !== null && !empty($pendingCompanies)) : ?>
                <div class="jumbotron">


                    <h2>Companies Pending Approval</h2>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Company Name</th>
                                <th scope="col">Number of Employees</th>
                                <th scope="col">Child Capacity</th>
                                <th scope="col">Enrolled Children</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Decision</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($pendingCompanies as $company) : ?>
                                <tr>
                                    <th>
                                        <?php echo htmlspecialchars($company["companyName"]); ?>
                                    </th>
                                    <td>
                                        <?php echo htmlspecialchars($company["employeeCount"]); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($company["childCapacity"]) ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($company["childrenEnrolled"]) ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($company["ownerID"]); ?>
                                    </td>
                                    <td>
                                        <form action="index.php" method="post">
                                            <input type="hidden" name="action" value="approveCompany">
                                            <input type="hidden" name="ownerID"  value="<?php echo htmlspecialchars($company["ownerID"]); ?>">
                                            <input type="hidden" name="id" value="<?php echo $company["compApprovalID"] ?>">
                                            <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 90px;background-color:green; height: 25px; padding-top: 2px;" value="Approve">
                                        </form>
                                        <form action="index.php" method="post">
                                            <input type="hidden" name="action" value="declineCompany">
                                            <input type="hidden" name="ownerID"  value="<?php echo htmlspecialchars($company["ownerID"]); ?>">
                                            <input type="hidden" name="id" value="<?php echo $company["compApprovalID"] ?>">
                                            <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; background-color:red;width: 90px; height: 25px; padding-top: 2px;" value="Dismiss">
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <br>
                <p><strong> No applications pending at this time! </strong></p>
            <?php endif; ?>  


        </div>


        <?php include ('footer.php'); ?>
    </body>
</html>