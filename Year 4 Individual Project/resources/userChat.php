<?php 
require_once "../settings/dbconnect.php";
require_once "templates/userHeader.php";

if(!isset($_SESSION['studentID'])){
    header("location:index.php");
}

?>

    <div class="wrapper">
        <section class="chat-area">
            <div class="header">
                <?php
                    include_once "../settings/dbconnect.php";
                    $student_ID = mysqli_real_escape_string($connect, $_GET['studentID']);
                    $sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '$student_ID'");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="userMessages.php" class="back-icon"><i class="ri-arrow-left-s-line"></i></a>
                <img src="images/<?php echo $row['profilePicture'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['Name'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </div>
            <div class="chat-box">

            </div>
            <form method="POST" action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['studentID']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $student_ID; ?>" hidden>
                <input class="input-field" name="message" type="text" placeholder="Type a message here...">
                <button class="msg_btn"><i class="ri-send-plane-fill"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chats.js"></script>

  </body>
</html>