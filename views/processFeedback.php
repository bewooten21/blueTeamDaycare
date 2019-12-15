<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Process Feedback</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php'); ?>   
        <div class='container'>
            <h2>Feedback for Review</h2>
            <div class="jumbotron">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Feedback</th>
                    <th scope="col">Rating</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($feedback as $entry) : ?>
                    <tr>
                        <th>
                            <?php echo htmlspecialchars($entry['feedback']); ?>
                        </th>
                        <td>
                            <?php echo htmlspecialchars($entry['rating']); ?>
                        </td>
                        <td>
                            <?php if($_SESSION['targetType'] === 'company') : ?>
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="removeFeedback">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($entry['cFeedbackID']); ?>">
                                <input type="submit" class="btn btn-danger" style="width: 100px; height: 25px; padding-top: 2px; background-color:red;"  value="Remove">
                            </form>
                            <?php elseif ($_SESSION['targetType'] === 'user') : ?>
                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="removeFeedback">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($entry['uFeedbackID']); ?>">
                                <input type="submit" class="btn btn-danger"  style="width: 100px; height: 25px; padding-top: 2px; background-color:red;" value="Remove">
                            </form>
                            <?php endif; ?>
                        </td>   
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="feedbackEntries">
            <input type="submit" class="btn btn-primary btn-sml" value="View Feedback Entries"><br>
        </form>
        </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
