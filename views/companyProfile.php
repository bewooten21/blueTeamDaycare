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
                <div class="col-md-3">
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
            </div>
<div class="row">
                    <div class="col-md-3">
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
                </div>
  </div>
</div>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">JobID</th>
      <th scope="col">Company</th>
      <th scope="col">Job Title</th>
      <th scope="col">Job Description</th>
      <th scope="col">Job Requirements</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php foreach ($jobs as $j) : ?>
  <tbody>
      
    <tr>
      <th scope="row"><a href="index.php?action=viewJob&amp;id=<?php echo $j->getId(); ?>">
                                <?php  echo $j->getId(); ?>
                            </a></th>
      <td><?php echo $c->getCompanyName(); ?></td>
      <td><?php echo $j->getJobName();?></td>
      <td><?php echo $j->getJobDescription() ; ?></td>
      <td><?php echo $j->getJobRequirements() ; ?></td>
      <td><input type='submit' value='Edit'></td>
    </tr>
    <?php endforeach; ?>
  
  </tbody>
</table>
</body>
</html>

