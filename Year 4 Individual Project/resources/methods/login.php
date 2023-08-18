<?php
    session_start();
    include_once '../../settings/dbconnect.php';
    $stdntID = mysqli_real_escape_string($connect, $_POST['stdntID']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if(!empty($stdntID) && !empty($password)){
        // checking if user entered student ID and password that matches to db
        $sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '{$stdntID}' AND Password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){ // if corrected credentials entered
            $row = mysqli_fetch_assoc($sql);
            $status = "Active now";
            $sql2 = mysqli_query($connect, "UPDATE studentlogin SET status = '{$status}' WHERE studentID = '{$row['studentID']}'");
            $_SESSION['studentID'] = $row['studentID'];
            
            if($stdntID == "UNadmin" && $password == "Admin"){ // if admin credentials are entered
                echo "success admin";
            }else{ // if student credentials are entered
                echo "success";
            }
        }else{
            echo "Student ID or Password is incorrect!";
        }
    }else{
        echo "All input fields are required!";
    }
?>