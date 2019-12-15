<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['company']['companyName'] ;?></title>
        <?php include ('css/css.php'); ?> 
    </head>
    <body>
        <?php include('nav.php') ?>
       
        <div class="container">
            <h1>Our Employees</h1>
            <div class="jumbotron">
      
        
        
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Name of Employee</th>
                    <th scope="col">Date Hired</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($employees as $employee) : ?>
                    <tr>
                        <th>
                            <a href="index.php?action=viewJob&amp;id=<?php echo $employee["jobID"]; ?>" target="_blank">
                                <?php echo $employee["jobName"]; ?>
                            </a>
                        </th>
                        <td><?php echo htmlspecialchars($employee["fName"] . ' ' . $employee["lName"]); ?></td>
                        <td><?php echo htmlspecialchars($employee["hireDate"]); ?></td>     
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
        <br><a class="btn btn-primary btn-sml" href="index.php?action=companyPortal" role="button">Back To Portal</a>
            </div>
         </div>
        <?php include ('footer.php'); ?>
    </body>
</html>
