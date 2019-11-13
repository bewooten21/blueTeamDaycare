<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blue&apos;s Daycare</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <div class="container">
            <h2>You are applying for <?php echo htmlspecialchars($job->getJobName());?></h2>
            <p><?php echo htmlspecialchars($job->getJobDescription());?></p>
            <form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submitJobApp">
                <input type="hidden" name="jobId" value="<?php echo htmlspecialchars($job->getId());?>">
                <div class="form-group <?php echo $error_message['coverLetter'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Your Cover Letter: </label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-default">
                                    Browse&hellip; <input type="file" style="display: none;" name="coverLetter" multiple>
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <span class="help-block">
                            <?php echo htmlspecialchars($error_message['coverLetter']); ?>
                        </span>
                    </div>

                </div>
                <div class="form-group <?php echo $error_message['resume'] !== '' ? 'has-error' : '';  ?>">
                    <label class="control-label col-sm-2">Your Resume: </label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-default">
                                    Browse&hellip; <input type="file" style="display: none;" name="resume" multiple>
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <span class="help-block">
                            <?php echo htmlspecialchars($error_message['resume']); ?>
                        </span>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" value="">Apply</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>