<!-- Video -->
<form action="videoUpload.php" method="post" enctype="multipart/form-data">
    Select Video to upload:
    <input type="file" name="videoToUpload" id="videoToUpload">
    or input a Youtube link:
    <input type="text" name="linkToUpload" id="linkToUpload">
    Video Name: 
    <input type="text" name="videoName" id="videoName" placeholder="Input the title for the video">
    For Activity: 
    <select name="activity" id="activity">
        <?php
        include_once 'DBconnect.php';
        $getActivity = "SELECT * FROM activity";
        $resultActivity = $conn->query($getActivity) or die(mysqli_error());
        if ($resultActivity->num_rows > 0) {
            while ($row = mysqli_fetch_array($resultActivity)) {
                ?>
                <option value="<?php echo $row ['activity_id'] ?>"><?php echo $row ['activity_name'] ?></option>
                <?php
            }
        }
        ?>
    </select>
    Description:
    <input type="text" name="description" id="description" placeholder="Input description">
    <input type="submit" value="Upload Video" name="submit">
</form>
<!-- Document -->
<form action="documentUpload.php" method="post" enctype="multipart/form-data">
    Select Document to upload:
    <input type="file" name="docToUpload" id="docToUpload">
    PDF Name: 
    <input type="text" name="pdfName" id="pdfName" placeholder="Input the title for the pdf">
    For Activity: 
    <select name="activity" id="activity">
        <?php
        include_once 'DBconnect.php';
        $getActivity = "SELECT * FROM activity";
        $resultActivity = $conn->query($getActivity) or die(mysqli_error());
        if ($resultActivity->num_rows > 0) {
            while ($row = mysqli_fetch_array($resultActivity)) {
                ?>
                <option value="<?php echo $row ['activity_id'] ?>"><?php echo $row ['activity_name'] ?></option>
                <?php
            }
        }
        ?>
    </select>
    Description:
    <input type="text" name="description" id="description" placeholder="Input description">
    <input type="submit" value="Upload Document" name="submit">
</form>
