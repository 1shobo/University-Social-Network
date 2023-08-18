<?php 
require_once "../settings/dbconnect.php";
require_once "templates/editHeader.php";
include "methods/discussion.inc.php";

if(!isset($_SESSION['studentID'])){
    header("location:index.php");
}

$session = $_SESSION['studentID'];
$sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '$session'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

?>

    <div class="wrapper">
        <section class="form edit">
            <form method="post" enctype="multipart/form-data">
            <h3 class="mb-0">Change Password or Profile Picture</h3>
                <div class="error-text"></div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input class="input-field" type="text" name="password" id="password" required>
                </div>
                <div class="field image">
                    <label for="password">Profile Picture</label>
                    <input type="file" name="profilep" id="profilep" required>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </section>
    </div>

<script src="javascript/edits.js"></script>

</body>
</html>
