<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Companies</title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>

        <div class="container">
            <br>
            <div class="jumbotron">
                <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Capacity</th>
      <th scope="col"># Enrolled</th>
      <th scope="col">Rating</th>
      <th scope="col">Openings</th>
     
    </tr>
  </thead>
  <tbody>
      <?php foreach ($companies as $c) : ?>
      <tr>
          <td><a href="index.php?action=viewCompanyProfileUser&amp;id=<?php echo $c->getID(); ?>"><?php echo $c->getCompanyName(); ?></a></td>
          <td><?php echo $c->getChildCapacity(); ?></td>
          <td><?php echo $c->getChildrenEnrolled(); ?></td>
          <td><?php echo $c->getOverallRating(); ?><span> (# of ratings <?php echo $c->getRatingsCount(); ?>)</span></td>
          <td><?php echo $c->getChildCapacity()- $c->getChildrenEnrolled(); ?></td>
          
      </tr>
      <?php endforeach; ?>
  </tbody>
                </table>
            
        </div>
        </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
