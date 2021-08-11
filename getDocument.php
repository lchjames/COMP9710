<?php
$getDocument = "SELECT * FROM documents WHERE module = $moduleID";
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
                <iframe src="pdf/<?php echo $row ['document_link'] ?>#zoom=100" width="100%" height="500px">
                </iframe>
            </div>

            <?php
        }
    } else {
        ?><p>There are no documents yet</p>
        <?php
    }
    ?></div>