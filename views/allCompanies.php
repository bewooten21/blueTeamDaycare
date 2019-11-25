<!DOCTYPE html>
<html lang="en">
    <head>
        <title>DeDiSystems</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>

        <div class="jumbotron">
            <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h3></h3>
                </div>
                <div class="col-md-3">
                    <h3>Capacity</h3>
                </div>
                <div class="col-md-3">
                    <h3># Enrolled</h3>
                </div>
                <div class="col-md-3">
                    <h3>Rating</h3>
                </div>
                <div class="col-md-1">
                    <h3>Openings</h3>
                </div>
            </div>
            <?php foreach ($companies as $c) : ?>
                <div class="row">
                    <div class="col-md-2">
                        <span class="<?php echo $c->getImage(); ?>" aria-hidden="true"></span>
                        <h3><a href="index.php?action=viewCompanyProfile&amp;id=<?php echo $c->getID(); ?>"><?php echo $c->getCompanyName(); ?></a></h3>
                        <p>

                        </p>
                    </div>
                    <div class="col-md-3">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getChildCapacity(); ?></h3>
                        <p></p>
                    </div>
                    <div class="col-md-3">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getChildrenEnrolled(); ?></h3>
                        <p>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getOverallRating(); ?></h3>
                        <p>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getChildCapacity()- $c->getChildrenEnrolled(); ?></h3>
                        <p>
                        </p>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
