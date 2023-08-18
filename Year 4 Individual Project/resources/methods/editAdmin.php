<?php
   
    if(isset($_POST['Password'])){
        include_once '../../settings/dbconnect.php';
        $studentID = mysqli_real_escape_string($connect, $_POST['studentID']);
        $name = mysqli_real_escape_string($connect, $_POST['Name']);
        $password = mysqli_real_escape_string($connect, $_POST['Password']);
        $id = mysqli_real_escape_string($connect, $_POST['id']);
        
        $sql = mysqli_query($connect, "UPDATE studentlogin SET studentID = '{$studentID}', Name = '{$name}', Password = '{$password}' WHERE id = '{$id}'");
        if($sql){
            echo 'data updated';
        }else{
            echo'something went wrong';
        }
        
        if(isset($_FILES['profilePicture'])){
            echo 'file';
        }else{
            echo 'no file';
        }
    }



?>