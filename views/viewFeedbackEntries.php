<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Feedback</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?>
        <div class='container'>
            <h2>Negative Feedback</h2>
            <br>
            <?php if ($users !== null && !empty($users)) : ?>
                <h4>Users</h4>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Negative Feedback Entries</th>
                            <th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        $count = 0;
                        foreach ($users as $user) :
                            ?>
                        
                            <tr>
                                
                                <td><a href="index.php?action=viewUserProfile&amp;id=<?php echo $user['userID']; ?>"><?php echo htmlspecialchars($user['uName']); ?></a>
                                <?php if ((int)$userReviews[$user[0]] >=5 ) { ?>
                                    <div class="flagged">
                                    <?php echo "   FLAGGED!"; ?>
                                    <?php } ?></div></td>
                                
                                <td>
                                        <?php echo htmlspecialchars($userReviews[$user[0]]); ?>
                                    
                                <td>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="processFeedback">
                                        <input type="hidden" name="type"  value="user">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user[0]) ?>">
                                        <input type="submit" class="btn btn-primary btn-sml" value="View">
                                    </form>
                                </td>

                            </tr>
    <?php endforeach; ?>


                    </tbody>
                </table>
<?php else: ?>
                <br>
                <p><strong> No users have negative feedback at the moment! </strong></p>
            <?php endif; ?>  

<?php if ($companies !== null && !empty($companies)) : ?>
                <h4>Companies</h4>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Company ID</th>
                            <th scope="col">Negative Feedback Entries</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 0;
                        foreach ($companies as $company) :
                            ?>
                            <tr>
                                <th>
                                    <?php echo htmlspecialchars($company[0]); ?>
                                    <?php if ((int)$companyReviews[$company[0]] >=5 ) { ?>
                                    <div class="flagged">
                                    <?php echo "   FLAGGED!"; ?>
                                    <?php } ?>
                                </th>
                                <td>
        <?php echo htmlspecialchars($companyReviews[$company[0]]) ?>
                                </td>
                                <td>

                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action" value="processFeedback">
                                        <input type="hidden" name="type"  value="company">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($company[0]) ?>">
                                        <input type="submit" class="btn btn-primary btn-sml" value="View">
                                    </form>
                                </td>

                            </tr>
    <?php endforeach; ?>


                    </tbody>
                </table>
            <?php else: ?>
                <br>
                <p><strong> No companies have negative feedback at the moment! </strong></p>
        <?php endif; ?>  
            <a class="btn btn-primary btn-sml" href="index.php?action=displayProfile" role="button">Back To Portal</a>
        </div>
<?php include ('footer.php'); ?>
    </body>
</html>
