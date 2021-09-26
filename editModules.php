<?php
include 'topbar.php';
include 'getModuleDetail.php';
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
                                        <?php
                                        echo "<input type = 'hidden' name = 'moduleID' value = '" . $row ['module_id'] . "'>";
                                        $moduleID = $row ['module_id'];
                                        ?>
                                        <td> <!<!-- module_name -->
                                            <?php
                                            $module_name = $row ['module_name'];
                                            echo "<input type='text' name='module_name' value ='" . $module_name . "'>";
                                            ?>
                                        </td>
                                        <td><!-- start date -->
                                            <?php
                                            $sql = "SELECT * FROM module where module_id = " . $moduleID;
                                            $resultdate = $conn->query($sql) or die(mysqli_error());
                                            $start_date = date('Y-m-d', strtotime($row['start_date']));
                                            echo "<input type='date' name='start_date' value='" . $start_date . "'>";
                                            ?>
                                        </td>
                                        <td><!-- end date -->
                                            <?php
                                            $sql = "SELECT * FROM module where module_id = " . $moduleID;
                                            $resultdate = $conn->query($sql) or die(mysqli_error());
                                            $end_date = date('Y-m-d', strtotime($row['end_date']));
                                            echo "<input type='date' name='end_date' value='" . $end_date . "'>";
                                            ?>
                                        </td>
                                        <td><!-- control -->
                                            <button type = "submit" name = "module_update">Update</button>
                                    </form>
                                    <form class = "module_delete" method = "POST" action="updateModuleDetail.php">
                                        <?php echo "<input type = 'hidden' name = 'moduleID' value = '" . $moduleID . "'>"; ?>
                                        <button type = "submit" name = "module_delete">Delete</button>
                                    </form>
                                    </td>


                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                </div>
            </section>
        </div>
    </body>
</html>
