<?php

    if(!empty($_POST['submit'])){
    $stdntid = $_POST['addstudentID'];
    $stdntname = $_POST['studentname'];
    $passw = $_POST['password'];

    if (isset($_FILES['profilep']['addstudentID']))  {

     print(isset($_FILES['profilep']));   
    }  
    else{
        $stmt = $connect->prepare("insert into studentlogin(studentID, Name, Password) values(?, ?, ?)");
        $stmt->bind_param("sss",$stdntid, $stdntname, $passw);
        $stmt->execute();
        $alert = "<script>alert('Student Account has been added.');</script>";
        echo $alert;
        $stmt->close();
        $connect->close();
        }

    }   

?>