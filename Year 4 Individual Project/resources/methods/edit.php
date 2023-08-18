<?php
    include_once '../../settings/dbconnect.php';
    session_start();
    $studentID = $_SESSION['studentID'];
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if(!empty($password)){
        $sql = mysqli_query($connect, "UPDATE studentlogin SET password = '{$password}' WHERE studentID = '{$studentID}'");
        
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
                    
                    if(in_array($img_ext, $extensions) === true){ // if user uploaded image ext is valid
                    $time = time(); // this will record the time, so all img have unique name
                    
                    // add uploaded image to image folder
                    $new_img_name = $time.$img_name;
                    
                    if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){ // if uploaded file has moved to foleder successfully
                        $status = "Active now"; // user status ones signed up
                        $random_id = rand(time(), 10000000); // random id for user
                        
                        // insert all data into database tables
                        $sql2 = mysqli_query($connect, "UPDATE studentlogin set profilePicture = '{$new_img_name}' WHERE studentID = '{$studentID}'");
                        if($sql2){ // if there data inserted
                                echo "Your profile picture and password have been updated!";
                            }
                        }else{
                            echo "Something went wrong!";
                        }
                    }
                    
                }
                
            }
        
        if(!empty($password) && isset($_FILES['profilep'])){
            echo "Your password has been updated!";
        }
    }else{
        
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
                    
                    if(in_array($img_ext, $extensions) === true){ // if user uploaded image ext is valid
                    $time = time(); // this will record the time, so all img have unique name
                    
                    // add uploaded image to image folder
                    $new_img_name = $time.$img_name;
                    
                    if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){ // if uploaded file has moved to foleder successfully
                        $status = "Active now"; // user status ones signed up
                        $random_id = rand(time(), 10000000); // random id for user
                        
                        // insert all data into database tables
                        $sql2 = mysqli_query($connect, "UPDATE studentlogin set profilePicture = '{$new_img_name}' WHERE studentID = '{$studentID}'");
                        if($sql2){ // if there data inserted
                                echo "Your Profile Picture has been updated!";
                            }
                        }else{
                            echo "Something went wrong!";
                        }
                    }
                    
                }else{
                    echo "To edit your profile please enter in a new password or upload a valid image file";
                }
                
            }

    }




?>