<!DOCTYPE html>
<html>
    <head>
        <title>About the Blue Team</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            
        <div class="container" >
            <h1>Apply To <?php echo $companyName ; ?></h1>
            <div class="jumbotron"> 
<?php if($children!=false){ ?>
                <form  method="post">
                    <input type="hidden" name="action" value="applyChild">
                    <input type="hidden" name="companyId" value="<?php echo $companyId ; ?>">
                <select id="stuId" name="stuId">
                                    
                   
                                  <?php foreach ($children as $c) : ?>
                                    <option value="<?php echo $c['studentId'] ?>"> <?php echo $c['stuFName']. " " . $c["stuLName"]. "  " . "Age:" . $c["age"];?> </option>
                                    <?php endforeach; ?>  
                                    
                                </select>
               
                    
                    <input type="submit" class="btn btn-default" value="Apply"><br>
                </form>
                   <?php } ?><br>
            </div>
        </div>
            <?php include ('footer.php'); ?>
    </body>
</html>