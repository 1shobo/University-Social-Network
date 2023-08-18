<?php 

require_once "templates/userHeader.php";

if(!isset($_SESSION['studentID'])){
    header("location:index.php");
}

?>

    <div class="wrapper">
        <section class="users">
            <div class="header">
                <?php
                    include_once "../settings/dbconnect.php";
                    $session = $_SESSION['studentID'];
                    $sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '$session'");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <img src="images/<?php echo $row['profilePicture'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['Name'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
            </div>
            <div class="search">
                <span class="text"> Select an user to start chat</span>
                <input type="text" placeholder="Search name here...">
                <button><i class="ri-search-line"></i></button>
            </div>
            <div class="user-list">
                
            </div>
        </section>
    </div>

<script src="javascript/userMessage.js"></script>

  </body>
</html>