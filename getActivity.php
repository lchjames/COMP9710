<?php
$getActivity = "SELECT * FROM activities WHERE module = $moduleID";
$resultActivity = $conn->query($getActivity) or die(mysqli_error());
?>
<button class="collapsible">Activity</button>
<div class="content">
    <?php
    if ($resultActivity->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultActivity)) {
            ?>
                <a href="lab.html">Start <?php echo $row ['activity_name'] ?></a>
            <?php
        }
    } else {
        ?><p>There are no activities yet</p>
        <?php
    }
    ?></div>