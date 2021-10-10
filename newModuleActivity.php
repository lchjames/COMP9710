<?php
include 'uploadModuleActivity.php';
?>
<form method="post" name="newModule" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>New Module</h2>
    <hr>
    Course:
    <select name="course" id="course">
        <?php
        include 'DBconnect.php';
        $getCourse = "SELECT * FROM course";
        $result = $conn->query($getCourse) or die(mysqli_error());
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row ['course_id'] ?>"><?php echo $row ['course_name'] ?></option>
                <?php
            }
        }
        $conn->close();
        ?>
    </select><br>
    Module name:
    <input type="text" name="moduleName" id="moduleName"><br>
    <span class="error"><?php echo $dateErr; ?></span><br>
    Start date:
    <input type='date' name='start_date'><br>
    End date:
    <input type='date' name='end_date'><br>
    <hr>
    <input type="submit" value="Submit module" name="module_submit">
</form>

<form method="post" name="newActivity" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>New ACtivity</h2>
    <hr>
    Module:
    <select name="module" id="module">
        <?php
        include 'DBconnect.php';
        $getModule = "SELECT * FROM module";
        $result = $conn->query($getModule) or die(mysqli_error());
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row ['module_id'] ?>"><?php echo $row ['module_name'] ?></option>
                <?php
            }
        }
        $conn->close();
        ?>
    </select><br>
    Activity Name:
    <input type="text" name="activityName" id="activityName"><br>
    Description:
    <input type="text" name="description" id="description"><br>
    <span class="error"><?php echo $dateErr; ?></span><br>
    Start date:
    <input type='date' name='start_date'><br>
    End date:
    <input type='date' name='end_date'><br>
    <hr>
    <input type="submit" value="Submit activity" name="activity_submit">
</form>