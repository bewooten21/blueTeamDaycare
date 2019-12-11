<!DOCTYPE html>
<html lang="en">
<head>
  <title>DeDiSystems</title>
  <?php include ('css/css.php'); ?> 
</head>
<body>
<?php include('nav.php'); ?>
    <div class='container'>
    <?php if($pendingCompanies !== null && !empty($pendingCompanies) ) : ?>
    <h2>Companies Pending Approval</h2>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Company Name</th>
      <th scope="col">Number of Employees</th>
      <th scope="col">Child Capacity</th>
      <th scope="col">Enrolled Children</th>
      <th scope="col">Owner</th>
      <th scope="col">Decision</th>
    </tr>
  </thead>
  <tbody>
       
      <?php foreach ($pendingCompanies as $company) : ?>
    <tr>
      <th>
            <?php  echo htmlspecialchars($company["companyName"]); ?>
      </th>
      <td>
          <?php echo htmlspecialchars($company["employeeCount"]); ?>
      </td>
      <td>
          <?php echo htmlspecialchars($company["childCapacity"]) ?>
      </td>
      <td>
          <?php echo htmlspecialchars($company["childrenEnrolled"]) ?>
      </td>
      <td>
          <?php echo htmlspecialchars($company["ownerID"]); ?>
      </td>
          <td>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="approveCompany">
                  <input type="hidden" name="ownerID"  value="<?php echo htmlspecialchars($company["ownerID"]); ?>">
                  <input type="hidden" name="id" value="<?php echo $company["compApprovalID"]?>">
                  <input type="submit" class="btn btn-info" style="border-radius: 10% 10% 0% 0%; width: 75px; height: 25px; padding-top: 2px;" value="Approve">
              </form>
              <form action="index.php" method="post">
                  <input type="hidden" name="action" value="declineCompany">
                  <input type="hidden" name="ownerID"  value="<?php echo htmlspecialchars($company["ownerID"]); ?>">
                  <input type="hidden" name="id" value="<?php echo $company["compApprovalID"]?>">
                  <input type="submit" class="btn btn-primary" style="border-radius: 0% 0% 10% 10%; width: 75px; height: 25px; padding-top: 2px;" value="Dismiss">
              </form>
          </td>
       
    </tr>
    <?php endforeach; ?>
    
  
  </tbody>
</table>
              <?php else: ?>
        <br>
        <p><strong> No applications pending at this time! </strong></p>
       <?php endif; ?>  
    <div class="row">
        <div class="col-sm-2">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="feedbackEntries">
            <input type="submit" class="btn btn-default" value="View Feedback Entries"><br>
        </form>
        </div>
    </div>
        </div>
    <?php include ('footer.php'); ?>
</body>
</html>