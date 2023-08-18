<?php
    include_once '../../settings/dbconnect.php';
    $addstudentID = mysqli_real_escape_string($connect, $_POST['addstudentID']);
    $studentname = mysqli_real_escape_string($connect, $_POST['studentname']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if(!empty($addstudentID) && !empty($studentname) && !empty($password)){
        
        // checking if student ID is valid
        $sql = mysqli_query($connect, "SELECT studentID FROM studentlogin WHERE studentID = '{$addstudentID}'");
        if(mysqli_num_rows($sql) > 0){ // if studentID exists
            echo "$addstudentID - This Student ID already exists!";
        }else{
            
            // checking if user upload file or not
            if(isset($_FILES['profilep'])){ // if a file is uploaded
                $img_name = $_FILES['profilep']['name']; // user uploaded image name
                $img_type = $_FILES['profilep']['type']; // user uploaded image type
                $tmp_name = $_FILES['profilep']['tmp_name']; // temporary name used to save file
                
                // explode img and get last extension like jpg or png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // get the extension of an user uploaded img file
                
                $extensions = ['png', 'jpeg', 'jpg']; // some valid image extensions in an array 
                if(in_array($img_ext, $extensions) === true){ // if user uploaded image ext is valid
                    $time = time(); // this will record the time, so all img have unique name
                    
                    // add uploaded image to image folder
                    $new_img_name = $time.$img_name;
                    
                    if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){ // if uploaded file has moved to foleder successfully
                        $status = "Active now"; // user status ones signed up
                        $random_id = rand(time(), 10000000); // random id for user
                        
                        // insert all data into database tables
                        $sql2 = mysqli_query($connect, "INSERT INTO studentlogin (studentID, Name, Password, profilePicture, status)
                                            VALUES ('{$addstudentID}', '{$studentname}', '{$password}', '{$new_img_name}', '{$status}')");
                        if($sql2){ // if there data inserted
                            $sql3 = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '{$addstudentID}'");
                            if(mysqli_num_rows($sql3) > 0){
                                echo "success";
                            }
                        }else{
                            echo "Something went wrong!";
                        }
                    }
                    
                }else{
                    echo "Please select a valid image - jpeg, jpg, png";
                }
                
            }else{
                echo "Please select an image!";
            }
        }
    }else{
        echo "All input fields are required!";
    }
?>