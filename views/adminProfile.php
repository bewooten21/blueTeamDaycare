<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php'); ?>
    <table>
<?php foreach($pendingCompanies as $company){ 
    $string = "Name: " . $company[1] . ", Employee's: " . $company[3] . ", Max Children: " . $company[2] . ", Enrolled Children: " . $company[4] . ", Owner: " . $company[7];?>
    <tr><?php $string;?> <form action="index.php" method="post"><input type="hidden" name="action" value="approveCompany"><input type="submit"  value="Approve"></form>
    <form action="index.php" method="post"><input type="hidden" name="action" value="declineCompany"><input type="hidden" name="id" value="<?php $company[0] ?>"<input type="submit"  value="Decline"></form>
    <?php } ?></tr>
</body>
</html>