<?php 
require_once "templates/indexHeader.php";
require_once "../settings/dbconnect.php";


?>

    <!-- Header-->
    <header class="bg-primary" style="padding-top:120px;padding-bottom:40px;">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder" style="color:white;">University Student Social Network</h1>
            <p class="lead"></p>
            <a class="btn btn-lg btn-light" href="#logins">Login</a>
        </div>
    </header>

    <!-- About section-->
    <section id="about" style="padding-top:120px;">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>About Us page</h2>
                    <p class="lead">This social network is design for university students to exchange knowledge, files and communicate with one another. </p>

                </div>
            </div>
        </div>
    </section>

        <!-- Login section-->   
    <section id="logins" style="padding-top:120px;">
        <div class="index-login" >
            <form action="" method="post" name="Login_Form" class="form-signin">
                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="error-text"></div>
                
                <label for="inputUsername" >Student ID</label>
                <input name="stdntID" type="username" id="inputUsername" class="form-control" placeholder="Student ID">
                <label for="inputPassword">Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <div class="button">
                <button name="submit" value="Login" class="button" type="submit">Sign in</button>
            </div>
            </form>
        </div>
    </section>

        <!-- Contact section-->
    <section id="contact" style="padding-top:120px;">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Contact us</h2>
                    <p class="lead">Contact us via email or phone number: </p>
                    <ul>
                        <li>Email: universitystudent@sn.com</li>
                        <li>Telephone: 01 800 6994</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; University Student Socail Network 2022</p></div>
        </footer>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="javascript/logins.js"></script>

    </body>
</html>
