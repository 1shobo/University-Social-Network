<?php 
require_once "templates/adminHeader.php";
require_once "../settings/dbconnect.php";
//require_once "methods/createUser.php";
require_once "methods/logout.php"
?>

<div class="wrapper">
    <section class="form signup">
        <form method="post" enctype="multipart/form-data">
        <h3 class="mb-0">Add Student Account</h3>
            <div class="error-text"></div>
              
            <div class="field input">
                <label for="studentID">Student ID</label>
                <input type="text" name="addstudentID" id="addstdntid" required>
            </div>
            <div class="field input">
                <label for="studentName">Student Name</label>
                <input type="text" name="studentname" id="studentname" required>
            </div>
            <div class="field input">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" required>
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

<script src="javascript/signup.js"></script>


</body>
</html>
