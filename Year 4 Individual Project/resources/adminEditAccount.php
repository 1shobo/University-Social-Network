<?php 
require_once "templates/adminEditHeaders.php";
require_once "../settings/dbconnect.php";
//require_once "methods/createUser.php";
require_once "methods/logout.php";
include "methods/editAdmin.php";


if(isset($_FILES['profilePicture'])){ // if a file is uploaded
                $img_name = $_FILES['profilePicture']['name']; // user uploaded image name
                $img_type = $_FILES['profilePicture']['type']; // user uploaded image type
                $tmp_name = $_FILES['profilePicture']['tmp_name']; // temporary name used to save file
                
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
                        $sql2 = mysqli_query($connect, "UPDATE studentlogin set profilePicture = '{$new_img_name}' WHERE id = '{$id}'");
                        if($sql2){ // if there data inserted
                                echo "Your profile picture and password have been updated!";
                            }
                        }else{
                            echo "Something went wrong!";
                        }
                    }
                    
                }
                
            }

?>

<!--<div class="wrapper">-->
    
    <div class="contain">
        <div class="row">
            <div class="c">
                <div class="card">
                    <div class="card-head">
                        <h2 class="display-6 text-center">Edit Student Accounts</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td> Student ID</td>
                                <td> Name </td>
                                <td> Profile Picture </td>
                                <td> Password </td>
                                <td> Update </td>
                            </tr>
<!--                                <td><a href="#">Update</a></td>-->
                            <?php
                                $table = mysqli_query($connect, "SELECT * FROM studentlogin WHERE NOT studentID = 'UNadmin'");
                                while($row = mysqli_fetch_array($table)){ ?>
                                    <tr id="<?php echo $row['id']; ?>">
                                        <td data-target="studentID"><?php echo $row['studentID']; ?></td>
                                        <td data-target="Name"><?php echo $row['Name']; ?></td>
                                        <td data-target="profilePicture"><?php echo $row['profilePicture']; ?></td>
                                        <td data-target="Password"><?php echo $row['Password']; ?></td>
                                        <td><a href="#" data-role="update" id="upd" data-id="<?php echo $row['id']; ?>">Update</a></td>
                                    </tr>

                                <?php }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <section class="form signup">
            <form method="post" enctype="multipart/form-data">
            <h3 class="mb-0">Update Student Account</h3>
                <div class="error-text"></div>
                <div class="field input">
                    <label for="studentID">Student ID</label>
                    <input type="text" name="studentID" id="studentID" required>
                </div>
                <div class="field input">
                    <label for="studentName">Student Name</label>
                    <input type="text" name="Name" id="Name" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="text" name="Password" id="Password" required>
                </div>
                <div class="field image">
                    <label for="password">Profile Picture</label>
                    <input type="file" name="profilePicture" id="profilePicture" required>
                </div>
                <input type="hidden" id="userId">
    <!--            <div class="field button">-->
    <!--                <input type="submit" name="submit" value="Submit">-->
    <!--            </div>-->
            </form>
        </section>
      </div>
      <div class="modal-footer">
        <button href="adminEditAccount.php" id="savebtn" type="button" class="btn btn-primary" data-dismiss="modal" onClick="refreshPage()">Update</button>
      </div>
    </div>

  </div>
</div>


    <!--jQuery-->

<!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>-->


<!--        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>-->
<!--        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--        <script src="https://code.jquery.com/jquery-3.6.3.js"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    
    <script src="javascript/editAdmin.js"></script>

    <script>
        function refreshPage(){
            window.location.reload();
        }
    </script>
    
    


</body>
</html>
