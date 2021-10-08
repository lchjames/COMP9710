<?php
$getVideo = "SELECT * FROM video v, activity a WHERE v.activity_id = a.activity_id && a.module_id = $moduleID";
$resultVideo = $conn->query($getVideo) or die(mysqli_error());
?>
<button class="collapsible">Video</button>
<div class="content">
    <?php
    if ($resultVideo->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultVideo)) {
            if ($row['video_type_id'] == 2) {
                ?>
                <p><?php echo $row ['video_name']; ?></p>
                <video width="400" controls>
                    <source src="video/<?php echo $row ['file_path']; ?>" type="video/mp4">
                    Your browser does not support HTML video.
                </video>
                <br>
                <?php
            } elseif ($row['video_type_id'] == 1) {
                ?>
                <p><?php echo $row ['video_name']; ?></p>
                <iframe width="400" height="315" src="https://www.youtube.com/embed/<?php echo $row['url_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
                <?php
            }
        }
    } else {
        ?>
        <p>There are no videos yet</p>
    <?php }
    ?></div>