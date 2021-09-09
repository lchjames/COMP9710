<?php
$getVideo = "SELECT * FROM video v, activity a WHERE v.activity_id = a.activity_id && a.module_id = $moduleID";
$resultVideo = $conn->query($getVideo) or die(mysqli_error());
?>
<button class="collapsible">Video</button>
<div class="content">
    <?php
    if ($resultVideo->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultVideo)) {
            ?>
            <p><?php echo $row ['video_name']; ?></p>
            <video width="400" controls>
                <source src="video/<?php echo $row ['video_link']; ?>" type="video/mp4">
                Your browser does not support HTML video.
            </video>

            <?php
        }
    } else {
        ?>
        <p>There are no videos yet</p>
    <?php }
    ?></div>