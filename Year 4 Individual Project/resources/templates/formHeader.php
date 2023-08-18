<?php 
session_start();
require_once "../settings/dbconnect.php";
$session = $_SESSION['studentID'];
$sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '$session'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

        <title>Messages</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

        <link href="css/messageStyle.css" rel="stylesheet">
        <link href="css/userStyles.css" rel="stylesheet">
        <link href="css/adminForms.css" rel="stylesheet">
        <link href="css/userBootstrap.css" rel="stylesheet">
        <link href="css/headersStyle.css" rel="stylesheet">
        
</head>
<body>

    <div class="container"> 
        <header>
            <a href="home2.php" class="homeLogo"><img src="images/<?php echo $row['profilePicture'] ?>" alt=""></i><span><?php echo $row['Name'] ?></span></a>
            
            <ul class="navbar">
                <li><a href="home2.php">Home</a></li>
                <li><a href="editProfile.php">Edit Profile</a></li>
                <li><a href="userMessages.php">Messages</a></li>        
            </ul>
            
            <div class="main">
                <form method="post" class="userLogout">
                    <a name="submitLog" href="methods/logout.php?logout_id=<?php echo $row['studentID'] ?>" class="logoutBtn" value="Logout" type="submit"><i class="ri-logout-box-r-line"></i>Logout</a>
                </form>
                <div class="bx bx-menu" id="menu-icon"><a><i class="ri-menu-line"></i></a></div>
            </div>
        </header>
        
    
    <!--js link-->
    <script type="text/javascript" src="javascript/script.js"></script>


      