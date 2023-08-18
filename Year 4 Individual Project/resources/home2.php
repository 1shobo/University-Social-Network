<?php 
    require_once "../settings/dbconnect.php";
    require_once "templates/homeHeader.php";
    include "methods/discussion.inc.php";
    include "methods/announcement.php";

    if(!isset($_SESSION['studentID'])){
        header("location:index.php");
    }

    $session = $_SESSION['studentID'];
    $sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE studentID = '$session'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }
    date_default_timezone_set('Europe/Dublin');

?>

    <div class="banner"></div>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <h1 class="display-4 font-italic">University Student Social Network</h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold"></a></p>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom"> </h3>
            <article class="blog-post">
                <h2 class="blog-post-title mb-1">Discussion Feed</h2>
                <p class="blog-post-meta"> <a href="#"></a></p>
                <p>Students can post messages and questions on the feed to be answered by others.</p>
            
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
                <div class="" style="top: 2rem;">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">Welcome <?php echo $row['Name'] ?>, to your Student Portal!</strong>
                            <h2 class="mb-0">  </h2>
                            <p class="card-text mb-auto"></p>
                        </div>
                        <div class="col-auto d-none d-lg-block"></div>
                    </div>
                    <div class="p-4">
                        <h4 class="fst-italic">Latest Announcements</h4>
                        <?php  showAnnou($connect); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="blog-footer">
      <p><a href="https://getbootstrap.com/"></a> by <a href="https://twitter.com/mdo"></a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>

  </body>
</html>