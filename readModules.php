<?php
include 'DBConnect.php';
$sql = "SELECT * FROM module WHERE start_date < UTC_DATE()  && end_date > UTC_DATE()"; //UTC_DATE() current date in UTC
$result = $conn->query($sql) or die(mysqli_error());
while ($row = mysqli_fetch_array($result)) {
    $moduleID = $row ['module_id'];
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
           

