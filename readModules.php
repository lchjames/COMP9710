<?php
include 'DBConnect.php';
$sql = "SELECT * FROM modules WHERE active = \"true\"";
$result = $conn->query($sql) or die(mysqli_error());
while ($row = mysqli_fetch_array($result)) {
    $moduleID = $row ['modules'];
    ?>
    <button class="collapsible"><?php
        echo $row ['module_name'];
        ?></button><div class="content">
        <?php
        include 'getDocument.php';
        include 'getVideo.php';
        include 'getActivity.php';
        include 'setTest.php';
        ?> 

    </div><?php
}
$conn->close();
?>
           

