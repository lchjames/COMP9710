<?php
include 'topbar.php';
$today = date("Y-m-d");
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
                        <h1> User List</h1>

                        <table>
                            <tr>
                                <th>Role</th>
                                <th>Title</th>
                                <th>First Name</th>
                                <th>Middle date</th>
                                <th>Family date</th>
                                <th>Control</th>
                            </tr>
                            <?php
                            if ($_SESSION["usertype"] == 1 || $_SESSION["usertype"] == 2) {
                                include_once 'DBConnect.php';
                                $sql = "SELECT * FROM users";
                                $result = $conn->query($sql) or die(mysqli_error());
                            }
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>

                                    <tr>
                                    <form class = "user_update" method = "POST" action="updateUserDetail.php">
                                        <?php
                                        echo "<input type = 'hidden' name = 'UserID' value = '" . $row ['user_id'] . "'>";
                                        ?>
                                        <td> <!<!-- Role -->
                                            <?php
                                            $role_id = $row ['role_id'];
                                            if ($role_id == "1") {
                                                ?>
                                                <select name="role">
                                                    <option value="1" selected>Topic Coordinator</option>
                                                    <option value="2">Tutor</option>
                                                    <option value="3">Student</option>
                                                </select>
                                            <?php } else if ($role_id == "2") {
                                                ?>
                                                <select name="role">
                                                    <option value="1">Topic Coordinator</option>
                                                    <option value="2" selected>Tutor</option>
                                                    <option value="3">Student</option>
                                                </select>
                                            <?php } else if ($role_id == "3") {
                                                ?>
                                                <select name="role">
                                                    <option value="1">Topic Coordinator</option>
                                                    <option value="2">Tutor</option>
                                                    <option value="3" selected>Student</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td><!-- title -->
                                            <?php
                                            echo $row['title'];
                                            ?>
                                        </td>
                                        <td><!-- first name -->
                                            <?php
                                            echo $row['first_name'];
                                            ?>
                                        </td>
                                        <td><!-- middle name -->
                                            <?php
                                            echo $row['middle_name'];
                                            ?>
                                        </td>
                                        <td><!-- family name -->
                                            <?php
                                            echo $row['family_name'];
                                            ?>
                                        </td>
                                        <td><!-- control -->
                                            <?php echo "<input type = 'hidden' name = 'UserID' value = '" . $row['user_id'] . "'>"; ?>
                                            <button type = "submit" name = "user_update">Update</button>
                                    </form>
                                    <form class = "user_delete" method = "POST" action="updateUserDetail.php">
                                        <?php echo "<input type = 'hidden' name = 'UserID' value = '" . $row['user_id'] . "'>"; ?>
                                        <button type = "submit" name = "user_delete">Delete</button>
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
