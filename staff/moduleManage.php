<?php
include '../topbar.php';
include 'getModuleDetail.php';
?>
<html>
    <!--        <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="../css/styleBG2.css">
            </head>-->
    <body>
        <h1> Modules List</h1>
        <table>
            <tr>
                <th>Modules Name</th>
                <th>Documents</th>
                <th>Activities</th>
                <th>Videos</th>
                <th>State</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $moduleID = $row ['modules'];
                    $moduleState = $row ['active'];
                    ?>
                    <tr>
                    <form class = "Update-form" method = "POST" action="updateModuleDetail.php">
                        <td><?php echo $row ['module_name']; ?></td>
                        <td><?php
                            $getDocument = "SELECT * FROM documents WHERE module = $moduleID";
                            $resultDocument = $conn->query($getDocument) or die(mysqli_error());
                            if ($resultDocument->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultDocument)) {
                                    ?><p><a href="../pdf/<?php echo $row ['document_link'] ?>"><?php echo $row ['document_name']; ?></p><?php
                                }
                            }
                            ?></td>
                        <td><?php
                            $getActivity = "SELECT * FROM activities WHERE module = $moduleID";
                            $resultActivity = $conn->query($getActivity) or die(mysqli_error());
                            if ($resultActivity->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultActivity)) {
                                    ?><p><?php echo $row ['activity_name']; ?></p><?php
                                }
                            }
                            ?></td> <td><?php
                            $getVideo = "SELECT * FROM videos WHERE module = $moduleID";
                            $resultVideo = $conn->query($getVideo) or die(mysqli_error());
                            if ($resultVideo->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultVideo)) {
                                    ?><p><!--<a href="../video/<?php //echo $row ['video__link'] ?>">--><?php echo $row ['video_name']; ?></p><?php
                                    }
                                }
                                ?></td>

                        <td>
                            <?php if ($moduleState == "true") { ?>
                                <select name="modulestate">
                                    <option value="true" selected>Active</option>
                                    <option value="false">Not active</option>
                                </select>
                            <?php } else if ($moduleState == "false") { ?>
                                <select name="modulestate">
                                    <option value="true">Active</option>
                                    <option value="false" selected>Not active</option>
                                </select>
                            <?php } ?>
                            <?php echo "<input type = 'hidden' name = 'moduleID' value = '" . $moduleID . "'>"; ?>
                            <button type = "submit" name = "module_update">Update</button>
                    </form>
                    <!--                    <form class = "Delete-form" method = "POST" action="updateModuleDetail.php">
                    <?php echo "<input type = 'hidden' name = 'moduleID' value = '" . $moduleID . "'>"; ?>
                                            <button type = "submit" name = "module_delete">Delete</button>
                                        </form>-->
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<button onclick="window.location.href='upload.php'">Upload new Video/PDF</button>
</body>
</html>