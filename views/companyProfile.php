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
                        <span class="<?php echo $c->getImage(); ?>" aria-hidden="true"></span>
                        <h3><a href="index.php?action=viewCompanyProfile&amp;id=<?php echo $c->getID(); ?>"><?php echo $c->getCompanyName(); ?></a></h3>
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
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="reviewCompany">
                        <input type="submit" class="btn btn-default" value="Leave a Review"><br>
                    </form>
                </div>
  </div>
</div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Job</th>
      <th scope="col">Applications Available</th>
      <th scope="col">Pending Applications</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php foreach ($jobs as $j) : ?>
  <tbody>
      
    <tr>
      <th scope="row"><a href="index.php?action=viewJob&amp;id=<?php echo $j->getId(); ?>">
                                <?php  echo $j->getJobName(); ?>
                            </a></th>
      <td><?php echo $j->getApplicationSlots() ; ?></td>
      <td>
          <form action="index.php" method="post">
                <input type="hidden" name="action" value="processApplications">
                <input type="hidden" name="companyID" value="<?php echo htmlspecialchars($j->getCompanyId()); ?>">
                <input type="hidden" name="jobID" value="<?php echo htmlspecialchars($j->getId()); ?>">
                <input type="submit" class="btn btn-link" value="View Job Applications"><br>
            </form>
          
      </td>
      <td><input type='submit' class="btn btn-default" value='Edit'></td>
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
    
</body>
</html>

