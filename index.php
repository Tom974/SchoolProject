





<html lang="en">
    <?php
        # Session starten ivm logins.
        session_start();
        require __DIR__."/assets/classes/School.php";
        $School = new School(); 
        # Head met script en meta info includen
        $School->includeHead();
    ?>
    <title>Inloggen</title>
    <body>
        <!-- Page Container -->
        <div id="page-container">
            <!-- Main Container -->
            <main id="main-container">
            <div class="bg-image" style="background-image: url('https://tekenhuis.nl/wp-content/uploads/2017/02/1920x1200Medium_3.jpg');">
                    <div class="row no-gutters bg-primary-op">
                        <!-- Main Section -->
                        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                            <div class="p-3 w-100">
                                <div class="warning-box-here"></div>
                                <!-- Header -->    
                                <div class="mb-3 text-center">
                                        <strong>Gebruikersnaam: admin</strong><br>
                                        <strong>Wachtwoord: admin</strong><br>
                                        <strong>Of maak gewoon een account aan :)</strong><br>
                                    <a class="link-fx font-w700 font-size-h1">
                                        <span class="text-dark">School </span><span class="text-primary">Project</span>
                                    </a>   
                                    <p class="text-uppercase font-w700 font-size-sm text-muted">inloggen</p>
                                </div>
                                <!-- Sign In Form -->
                                <div class="row no-gutters justify-content-center">
                                    <div class="col-sm-8 col-xl-6">
                                        <form class="js-validation-signin" method="POST">
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-lg form-control-alt" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-lg form-control-alt" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-hero-lg btn-hero-primary" name="submit-login" id="submit-login">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Log In
                                                </button>
                                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="http://school/register.php">
                                                        <i class="fa fa-plus text-muted mr-1"></i> Account Aanmaken
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            # Login versturen
                            if(isset($_POST['submit-login'])) {
                                $gebruikersnaam = $_POST['gebruikersnaam'];
                                $email = $_POST['gebruikersnaam'];
                                $wachtwoord = $_POST['wachtwoord'];
                                # Login validaten via School class
                                echo $School->validateLogin($gebruikersnaam, $email, $wachtwoord);
                                $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
                                $_SESSION['naam'] = $_POST['gebruikersnaam'];
                            }
                            # Footer includen
                            $School->includeFooter();
                        ?>
                    </div>
                <!-- END Page Content -->
                </div>
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <!-- Page JS Plugins -->
        <script src="http://school//assets/js/dashmix.core.min.js"></script>
        <script src="http://school//assets/js/dashmix.app.min.js"></script>
        <script src="http://school//assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="http://school//assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="http://school//assets/js/pages/op_auth_signin.min.js"></script>
        <!-- END Page JS Code -->
    </body>
</html>