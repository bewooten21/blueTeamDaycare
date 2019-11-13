<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php'); ?>
<?php foreach($pendingCompanies as $company){ 
    $string = "Name: " + $company.getCompanyName() + ", Employee's: " + $company->getEmployeeCount() + ", Max Children: " + $company->getChildCapacity() + ", Enrolled Children: " + $company->getEnrolledChildren() + ", Owner: " + $company->getOwner();?>
    <p><?php $string;?></p> <form action="index.php" method="post"><input type="hidden" name="action" value="approveCompany"><input type="submit"  value="Approve"></form>
    <form action="index.php" method="post"><input type="hidden" name="action" value="declineCompany"><input type="submit"  value="Decline"></form>
    <?php } ?>
</body>
</html>