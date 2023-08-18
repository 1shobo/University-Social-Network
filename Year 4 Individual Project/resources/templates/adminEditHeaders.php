<?php 
session_start();
require_once "../settings/dbconnect.php";

if(isset($_POST['submitLog'])){
    session_destroy();
    header("location:index.php");
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

        <title>Admin Home</title>
        <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
        
        <link href="css/adminForm.css" rel="stylesheet">
        <link href="css/userStyles.css" rel="stylesheet">
        <link href="css/userBootstrap.css" rel="stylesheet">
        <link href="css/headerStyle.css" rel="stylesheet">
        
</head>
<body style="display:flex;align-items: center;justify-content:center;">
    <div class="container"> 
        <header>
            <a href="home.php" class="homeLogo"><i class="ri-home-4-line"></i><span>Home</span></a>
            
            <ul class="navbar">
<!--                <li><a href="#" class="active">Home</a></li>-->
                <li><a href="adminCreateAcc.php">Add Student Account</a></li>
                <li><a href="adminEditAccount.php">Edit Student Account</a></li>
                <li><a href="adminMessages.php">Messages</a></li>
            </ul>
            
            <div class="main">
                <form method="post" class="userLogout">
                    <button name="submitLog" class="logoutBtn" value="Logout" type="submit"><i class="ri-logout-box-r-line"></i>Logout</button>
                </form>
                <div class="" id="menu-icon"><a><i class="ri-menu-line"></i></a></div>
            </div>
        </header>
        
    
    <!--js link-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="javascript/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



      