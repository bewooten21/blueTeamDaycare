<!DOCTYPE html>
<html>
    <head>
        <title>Business Registration - Team Blue</title>
        <?php include ('css/css.php'); ?>   
    </head>
    <body>
        <?php include ('nav.php'); ?>
        <main>
            <header>Blue's Daycare Business Registration</header>
            <div id="formWrap">
                <h1>Enter Information</h1>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="validate business">
                    <div id="data">
                        <div id="formTable">
                            <table id="formTable">
                                <tr style="background-color: white;">
                                    <td><label>Company Name: </label></td>
                                    <td><input type="text" name="cName" value="<?php echo htmlspecialchars($cName) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['cName']); ?></div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Max Enrolled Children: </label></td>
                                    <td><input type="text" name="maxChild" value="<?php echo htmlspecialchars($maxChild) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['maxChild']); ?></div></td>
                                </tr>
                                <tr>

                                    <td><label>Number of Employees: </label></td>
                                    <td><input type="text" name="empCount" value="<?php echo htmlspecialchars($empCount) ?>"></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['empCount']); ?></div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Number of Enrolled Children: </label></td>
                                    <td><input type="text" name="childCount" value="<?php echo htmlspecialchars($childCount) ?>"></td>
                                    <td><div id="error" class="align-right">
                                            <?php echo htmlspecialchars($error_message['childCount']) ?>
                                        </div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Company Rating: </label></td>
                                    <td><input type="text" name="cRate" value="<?php echo htmlspecialchars($cRate) ?>"></td>
                                    <td><div id="error" class="align-right">
                                            <?php echo htmlspecialchars($error_message['cRate']) ?>
                                        </div></td>
                                </tr>
                                <tr style="background-color: white;">
                                    <td><label>Company Image/Logo: </label></td>
                                    <td><input type="file" name="image" /></td>
                                    <td><div id="error"><?php echo htmlspecialchars($error_message['image']); ?></div></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="buttons">
                        <label>&nbsp</label>
                        <input type="submit" value="Submit"><br>
                    </div>
                </form>

            </div>
        </main>
        <?php include ('footer.php'); ?>
    </body>
</html>