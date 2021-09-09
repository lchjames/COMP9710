<?php
$getDocument = "SELECT * FROM document d, activity a WHERE d.activity_id = a.activity_id && a.module_id = $moduleID";
$resultDocument = $conn->query($getDocument) or die(mysqli_error());
?>
<button class="collapsible">Show PDF</button>
<div class="content">
    <?php
    if ($resultDocument->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultDocument)) {
            ?>
            <button class="collapsible"><?php echo $row ['document_name'] ?></button>
            <div class="content">
                <iframe src="pdf/<?php echo $row ['file_path'] ?>#zoom=100" width="100%" height="500px">
                </iframe>
            </div>

            <?php
        }
    } else {
        ?><p>There are no documents yet</p>
        <?php
    }
    ?></div>