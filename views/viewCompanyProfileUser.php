<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $c->getCompanyName(); ?></title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>
        <div style='text-align: center;'><img  height="200" src="<?php echo htmlspecialchars($c->getImage()); ?>"></div>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-2">
                        <h3></h3>
                    </div>
                    <div class="col-md-2">
                        <h3>Owner</h3>
                    </div>
                    <div class="col-md-2">
                        <h3>Capacity</h3>
                    </div>
                    <div class="col-md-2">
                        <h3># Enrolled</h3>
                    </div>
                    <div class="col-md-2">
                        <h3>Rating</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h3><a href="index.php?action=viewCompanyProfileUser&amp;id=<?php echo $c->getID(); ?>"><?php echo $c->getCompanyName(); ?></a></h3>
                        <p>

                        </p>
                    </div>
                    <div class="col-md-2">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $owner->getFName() . ' ' . $owner->getLName(); ?></h3>
                        <p></p>
                    </div>
                    <div class="col-md-2">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getChildCapacity(); ?></h3>
                        <p></p>
                    </div>
                    <div class="col-md-2">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getChildrenEnrolled(); ?></h3>
                        <p>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <span class="" aria-hidden="true"></span>
                        <h3><?php echo $c->getOverallRating(); ?></h3>
                        <p>
                        </p>
                    </div>
                    <?php if (isset($_SESSION['currentUser'])): if ($_SESSION['currentUser']->getID() !== $owner->getID()) : ?>

                            <form action="index.php" method="post">
                                <input type="hidden" name="action" value="reviewCompany">
                                <input type="submit" class="btn btn-primary btn-sml" style="margin-top: 15px" value="Leave a Review"><br>
                            </form>
                        <?php
                        endif;
                    endif;
                    ?>
                </div>
                </div>
            
        <?php if (isset($_SESSION['currentUser'])) : if($_SESSION['currentUser']->getRestricted() != 1) :  ?>
        
        <h3>Active Positions At Our Company</h3>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Job Name</th>
                    
                    
                    <th scope="col"></th>
                </tr>
            </thead>
            <?php foreach ($jobs as $j) : ?>
                <tbody>

                    <tr>
                        <th scope="row"><a href="index.php?action=viewJob&amp;id=<?php echo $j->getId(); ?>">
                                <?php echo $j->getJobName(); ?>
                            </a></th>
                       
                        
                        <td>
                            <form action="index.php" method="post">
                  <input type="hidden" name="action" value="applyToJob">
                  <input type="hidden" name="id"  value="<?php echo htmlspecialchars($j->getId()); ?>">
                  <input type="submit" class="btn btn-primary btn-sml" value="Apply">
              </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php endif;
       
        endif;?>
        

        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>