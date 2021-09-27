<?php
include 'topbar.php';
include 'getModuleDetail.php';
include 'updateModuleDetail.php';
$today = date("Y-m-d");
$state = "";
?>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Admin Panel</title>
        <link rel='stylesheet' type='text/css' href='css/style.css' />
        <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
        <script type='text/javascript' src='js/dynamicpage.js'></script>
    </head>
    <body>
        <div id="page-wrap">
            <header>
                <h1>Admin Panel</h1>
                <nav>
                    <ul class="group">
                        <li><a href="editModules.php">Edit Modules</a></li>
                        <li><a href="editUser.php">Edit User</a></li>
                        <li><a href="viewMenu.php">Module Menu</a></li>
                    </ul>
                </nav>
            </header>
            <section id="main-content">
                <div id="guts">
                    <body>
                        <h1> Modules List</h1>
                        <?php
                        echo $dateErr;
                        ?>
                        <table>
                            <tr>
                                <th>Modules Name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Control</th>
                            </tr>

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                    <form class = "module_update" method = "POST" action="updateModuleDetail.php">
                                        <input type = 'hidden' name = 'moduleID' value = '<?php echo $row ['module_id']; ?>'>
                                        <?php $moduleID = $row ['module_id']; ?>
                                        <td> <!-- module_name -->
                                            <?php
                                            $modulename = $row ['module_name'];
                                            ?>
                                            <input type='text' name='module_name' value ='<?php echo $modulename; ?>'>
                                        </td>
                                        <td> <!--  start date -->
                                            <?php
                                            $sql = "SELECT * FROM module where module_id = " . $moduleID;
                                            $resultdate = $conn->query($sql) or die(mysqli_error());
                                            $startdate = date('Y-m-d', strtotime($row['start_date']));
                                            ?>
                                            <input type='date' name='start_date' value='<?php echo $startdate; ?>' min='<?php echo $today; ?>'>
                                        </td>
                                        <td> <!-- end date -->
                                            <?php
                                            $sql = "SELECT * FROM module where module_id = " . $moduleID;
                                            $resultdate = $conn->query($sql) or die(mysqli_error());
                                            $enddate = date('Y-m-d', strtotime($row['end_date']));
                                            ?>
                                            <input type='date' name='end_date' value='<?php echo $enddate; ?>' min='<?php echo $start_date ?>'>
                                        </td>
                                        <td><!-- control -->
                                            <input type = "submit" name = "module_update" value="Update">
                                    </form>
                                    <form class = "module_delete" method = "POST" action="updateModuleDetail.php" >
                                        <?php echo "<input type = 'hidden' name = 'moduleID' value = '" . $moduleID . "'>"; ?>
                                        <input type = "submit" name = "module_delete" value="Delete">
                                    </form>
                                    </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                        <br>
                </div>
            </section>
        </div>
    </body>
</html>
