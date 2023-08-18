<?php 
require_once "templates/adminHeader.php";
require_once "../settings/dbconnect.php";
require_once "methods/createUser.php";
require_once "methods/logout.php";
include "methods/adminDiscussion.inc.php";
include "methods/announcement.php";

$session = $_SESSION['studentID'];
$sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '$session'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

date_default_timezone_set('Europe/Dublin');
?>
 
    <body>
        <main class="container">
            <div class="banner"></div>
            <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                <h1 class="display-4 font-italic">University Student Social Network</h1>
                <p class="lead my-3"></p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"></a></p>
            </div>

            <div class="row mb-2"></div>

        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom"></h3>

                <article class="blog-post">
                    <h2 class="blog-post-title mb-1">Student Discussion</h2>
                    <p class="blog-post-meta"><a href="#"></a></p>
                    <p>Post and questions asked by students.</p>
                    <div class="discForm">
                        <?php
                            echo "<form method='POST' action='".commentsToDB($connect)."'>
                                <input type='hidden' name='studentID' value='". $row['studentID'] ."'>
                                <input type='hidden' name='name' value='". $row['Name'] ."'>
                                <input type='hidden' name='profilePicture' value='". $row['profilePicture'] ."'>
                                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                                <textarea name='message' placeholder='Start a discussion...'></textarea><br>
                                <button class='submbtn' name='discussionSubmit' type='submit'>Comment</button>
                            </form>";

                            echo "<div class='disc-box'>";
                            showComments($connect);
                            echo "</div>";
                        ?>    
                    </div> 
                </article>
            </div>

            <div class="col-md-4">
              <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                  <h4 class="fst-italic">Student Announcements</h4>
                    <?php
                        echo "<form method='POST' action='".annouToDB($connect)."' class='annouForm'>
                            <input type='hidden' name='dateA' value='".date('Y-m-d')."'>
                            <textarea name='announcement' placeholder='Make an announcement to students...'></textarea><br>
                            <button class='submbtn' name='annouSubmit' type='submit'>Send Announcement</button>
                        </form>";
                    ?>


                </div>

                <div class="p-4">
                  <h4 class="fst-italic">Elsewhere</h4>
                  <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                  </ol>
                </div>
              </div>
            </div>
        </div>

        </main>

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>

    
    </body>
</html>
