<?php 
require_once "templates/homeHeader.php";
require_once "../settings/dbconnect.php";

?>


 
  <body>
    
    <div class="container">
      <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="p-2 link-secondary" href="index.php">Home</a>
            <a class="p-2 link-secondary" href="#">About</a>
            <a class="p-2 link-secondary" href="#">Contact Us</a>
            <form method="post">
                <button name="submitLog" value="Logout" class="button" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </header>
    </div>

    <main class="container">
      <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">University Student Social Network</h1>
        </div>
      </div>
        <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 link-secondary" href="#">Add Student Account</a>
          <a class="p-2 link-secondary" href="#">Edit Student Account</a>
            <a class="p-2 link-secondary" href="discussionFeedAdmin.php"> Discussion Feed Comments</a>
        </nav>
      </div>



    
  </body>
</html>
