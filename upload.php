<!-- Video -->
<form action="videoUpload.php" method="post" enctype="multipart/form-data">
    Select Video to upload:
    <input type="file" name="videoToUpload" id="videoToUpload">
    or input a Youtube link:
    <input type="text" name="linkToUpload" id="linkToUpload">
    Video Name: 
    <input type="text" name="videoName" id="videoName" placeholder="Input the title for the video">
    For Activity: 
    <input type="text" name="activity" id="activity" placeholder="Input activity number">
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
    <input type="text" name="activity" id="activity" placeholder="Input activity number">
     Description:
    <input type="text" name="description" id="description" placeholder="Input description">
    <input type="submit" value="Upload Document" name="submit">
</form>
