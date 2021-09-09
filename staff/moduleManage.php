<?php
include '../topbar.php';
include 'getModuleDetail.php';
$today = date("Y-m-d");
$state = "";
?>
<html>
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
                    $moduleID = $row ['module_id'];
                    if ($today > $row['start_date'] && $today < $row['end_date']) {
                        $state = "This module is currently active";
                    } elseif ($today < $row['start_date']) {
                        $state = "This module will start at " . $row['start_date'];
                    } elseif ($today > $row['end_date']) {
                        $state = "This module was expired at " . $row['end_date'];
                    }
                    ?>
                    <tr>
                    <form class = "Update-form" method = "POST" action="updateModuleDetail.php">
                        <td> <!<!-- module_name -->
                            <?php echo $row ['module_name']; ?></td>
                        <td><!-- Documents --><?php
                            $getDocument = "SELECT * FROM document d, activity a WHERE d.activity_id = a.activity_id && a.module_id = $moduleID";
                            $resultDocument = $conn->query($getDocument) or die(mysqli_error());
                            if ($resultDocument->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultDocument)) {
                                    ?><p><a href="../pdf/<?php echo $row ['file_path'] ?>"><?php echo $row ['document_name']; ?></p><?php
                                }
                            }
                            ?></td>
                        <td><!-- Activities --><?php
                            $getActivity = "SELECT * FROM activity WHERE module_id = $moduleID";
                            $resultActivity = $conn->query($getActivity) or die(mysqli_error());
                            if ($resultActivity->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultActivity)) {
                                    ?><p><?php echo $row ['activity_name']; ?></p><?php
                                }
                            }
                            ?></td> 
                        <td><!-- Videos --><?php
                            $getVideo = "SELECT * FROM video v, activity a WHERE v.activity_id = a.activity_id && a.module_id = $moduleID";
                            $resultVideo = $conn->query($getVideo) or die(mysqli_error());
                            if ($resultVideo->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultVideo)) {
                                    if ($row['video_type_id'] = 1) {
                                        ?><p><a href="<?php echo $row ['url_link'] ?>"><?php echo $row ['video_name']; ?></a</p><?php
                                    } elseif ($row['video_type_id'] = 2) {
                                        ?><p><!--<a href="localhost"></a>--><?php echo $row ['video_name']; ?></p><?php
                                    }
                                }
                            }
                            ?></td>
                        <td><!--State-->
                            <?php echo $state; ?></td>
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
<button onclick="window.location.href = 'upload.php'">Upload new Video/PDF</button>
<!--<iframe width="420" height="315"
        src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>-->
</body>
</html>