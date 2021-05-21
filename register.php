<!doctype html>
<html lang="en">
    <?php
        # Session starten
        session_start();
        require __DIR__."/assets/classes/School.php";
        $School = new School(); 
        # Head met script en meta info includen
        $School->includeHead();
    ?>
    <title>Registreren</title>
    <body>
        <div id="page-container">
            <main id="main-container">
                <div class="bg-image" style="background-image: url('https://tekenhuis.nl/wp-content/uploads/2017/02/1920x1200Medium_3.jpg');">
                    <div class="hero-static bg-black-75">
                        <div class="content content-full">
                            <div class="px-3 py-5">
                                <div class="text-center">
                                    <div class="mb-3">
                                        <a class="link-fx font-w700 font-size-h1" href="javascript:void()">
                                            <span class="text-white">School </span><span class="text-primary">Project</span>
                                        </a>
                                        <p class="text-uppercase font-w700 font-size-sm text-muted">Registreren</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <form class="js-validation-installation" method="POST">
                                            <div class="block block-rounded block-transparent bg-white">
                                                <div class="block-content block-content-full">
                                                    <h2 class="content-heading">Account Aanmaken</h2>
                                                    <div class="row items-push">
                                                        <div class="col-lg-4">
                                                            <p class="text-muted">
                                                                Vul hier de informatie in waarmee je wilt inloggen op de website. 
                                                            </p>
                                                            <p class="text-muted">
                                                                Alles met een * is VERPLICHT.
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-6 offset-lg-1">
                                                            <div class="form-group">
                                                                <label for="email">E-Mail Adres</label>
                                                                <input type="text" class="form-control form-control-alt" id="email" name="email" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gebruikersnaam">Gebruikersnaam*</label>
                                                                <input type="text" class="form-control form-control-alt" id="gebruikersnaam" name="gebruikersnaam" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="wachtwoord">Wachtwoord*</label>
                                                                <input type="password" class="form-control form-control-alt" id="wachtwoord" name="wachtwoord" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="wachtwoord-bevestig">Wachtwoord Bevestigen*</label>
                                                                <input type="password" class="form-control form-control-alt" id="wachtwoord-bevestig" name="wachtwoord-bevestig" required>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="block-content block-content-full">
                                                    <h2 class="content-heading">Persoonlijke Informatie</h2>
                                                    <div class="row items-push">
                                                        <div class="col-lg-4">
                                                            <p class="text-muted">
                                                                Vul hier jouw persoonlijke informatie in.
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-6 offset-lg-1">
                                                            <div class="form-group">
                                                                <label for="naam">Naam*</label>
                                                                <input type="text" class="form-control form-control-alt" id="naam" name="naam" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bsn-nummer">BSN Nummer*</label>
                                                                <input type="text" class="form-control form-control-alt" id="bsn-nummer" name="bsn-nummer" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="geboortedatum">Geboortedatum*</label>
                                                                <input type="text" class="form-control form-control-alt" id="geboortedatum" name="geboortedatum" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="achternaam">Achternaam*</label>
                                                                <input type="text" class="form-control form-control-alt" id="achternaam" name="achternaam" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telefoonnummer">Telefoonnummer*</label>
                                                                <input type="tel" class="form-control form-control-alt" id="telefoonnummer" name="telefoonnummer" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Account Aanmaken -->

                                                <div class="block-content">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6 offset-lg-5">
                                                            <button type="submit" class="btn btn-primary mb-1" name="opslaan" id="opslaan">
                                                                <i class="fa fa-check mr-1"></i> Opslaan
                                                            </button>
                                                            <button type="reset" class="btn btn-alt-primary mb-1">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                    if (isset($_POST['opslaan'])) {
                                        # Database definen
                                        $School = new School();
                                        # Nieuwe user inserten
                                        if ($_POST['wachtwoord'] == $_POST['wachtwoord-bevestig']) {
                                            echo $School->insertNewuser($_POST['email'], $_POST['gebruikersnaam'], password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT), $_POST['naam'], $_POST['achternaam'], $_POST['telefoonnummer'], $_POST['bsn-nummer'], $_POST['geboortedatum']);
                                    
                                        } else {
                                            echo "<script>nietGelijk();</script>";
                                        }
                                    }
                                ?>
                                <div class="text-center">
                                    <a class="btn btn-sm btn-dark" href="index.php">
                                        <i class="fa fa-arrow-left mr-1"></i> Ga Terug
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script>
            function nietGelijk() {
                Swal.fire(
                    'Er is iets fout gegaan!',
                    'Het wachtwoord was niet gelijk aan het bevestigde wachtwoord!',
                    'warning'
                );
            }
            // Zorgen dat form submits niet opnieuw gebeuren indien je refreshed. Niet dat er nu al een form inzit ofzo maarja altijd handig.
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }

            // Gekke jquery van de template
            jQuery(function () {
                Dashmix.helpers('sparkline');
            });
        </script>
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