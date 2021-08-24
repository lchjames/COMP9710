<!-- Video -->
<form action="videoUpload.php" method="post" enctype="multipart/form-data">
    Select Video to upload:
    <input type="file" name="videoToUpload" id="videoToUpload">
    Video Name: 
    <input type="text" name="videoName" id="videoName" placeholder="Input the title for the video">
    For Module: 
    <input type="text" name="module" id="module" placeholder="Input module number">
    <input type="submit" value="Upload Video" name="submit">
</form>
<!-- Document -->
<form action="documentUpload.php" method="post" enctype="multipart/form-data">
    Select Document to upload:
    <input type="file" name="docToUpload" id="docToUpload">
    PDF Name: 
    <input type="text" name="pdfName" id="pdfName" placeholder="Input the title for the pdf">
    For Module: 
    <input type="text" name="module" id="module" placeholder="Input module number">
    <input type="submit" value="Upload Document" name="submit">
</form>
