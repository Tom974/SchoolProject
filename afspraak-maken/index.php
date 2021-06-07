
<html lang="en">
    <?php
        # Session starten ivm inloggen.
        session_start();
        require __DIR__."/../assets/classes/School.php";
        $School = new School(); 
        # Controle of we al ingelogd zijn
        $login = $School->checkIfLoggedIn();
        # Head met script en meta info includen
        $School->includeHead();
    ?>
    <title>Home</title>
    <body>
        <div id="page-container" class="enable-page-overlay side-scroll main-content-boxed">
            <!-- Zorgen dat de header geinclude wordt. -->
            <?= $School->includeHeader() ?>
            <main id="main-container">
                <div class="bg-body-light border-top border-bottom">
                    <div class="content content-full py-1">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-sm text-uppercase font-w700 mt-2 mb-0 mb-sm-2">
                                <i class="fa fa-angle-right fa-fw text-primary"></i> Welkom, <?= $_SESSION['naam'] ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="content">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Afspraak maken</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-muted">
                                        Hier kunt u een afspraak maken, vul uw gegevens in en druk op "Opslaan"
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <form class="mb-5" method="POST">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" placeholder="Uw e-mailadres.." class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="naam">Naam</label>
                                            <input type="text" placeholder="Uw naam.." class="form-control" id="naam" name="naam">
                                        </div>
                                        <div class="form-group">
                                            <label for="achternaam">Achternaam</label>
                                            <input type="text" placeholder="Uw achternaam.." class="form-control" id="achternaam" name="achternaam">
                                        </div>
                                        <div class="form-group">
                                            <label for="leeftijd">Leeftijd</label>
                                            <input type="text" placeholder="Uw leeftijd.." class="form-control" id="leeftijd" name="leeftijd">
                                        </div>
                                        <div class="form-group">
                                            <label for="afspraak" id="afspraak-label">Afspraak</label>
                                            <select class="form-control" id="afspraak" name="afspraak" placeholder="Kies uw afspraak..">
                                            <option>Kies uw afspraak..</option>
                                            <option>Kapper</option>
                                            <option>Dokter</option>
                                            <option>Mondhygienist</option>
                                            <option>Tandarts</option>
                                            </select>
                                            </div>
                                        <div class="form-group">
                                                <label for="datum">Datum & Tijd</label>
                                                <input type="text" placeholder="Selecteer uw tijd.." class="js-flatpickr form-control bg-white" id="datum" name="datum" data-enable-time="true" data-time_24hr="true">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" id="submit" name="submit" class="btn btn-primary">Opslaan</button>
                                        </div>
                                    </form>

                                    
                                    <script>
                                    $('#submit').on('click', function () {
                                    let email = $('#email').val();
                                    let naam = $('#naam').val();
                                    let achternaam = $('#achternaam').val();
                                    let leeftijd = $('#leeftijd').val();
                                    let afspraak = $('#afspraak').val();
                                    let datum = $('#datum').val();

                                    let error = false;
                                    // Datum van vandaag etc instellen
                                    var nu = new Date();
                                    nu.setHours(0,0,0,0);

                                        if (email == "") {
                                            error = true; 
                                            $('#email').attr("placeholder", "Email mag niet leeg zijn!");
                                            document.getElementById('email').style.borderColor = "red";
                                        }

                                        if (naam == "") { 
                                            error = true; 
                                            $('#naam').attr("placeholder", "Naam mag niet leeg zijn!");
                                            document.getElementById('naam').style.borderColor = "red";
                                        }

                                        if (achternaam == "") { 
                                            error = true; 
                                            $('#achternaam').attr("placeholder", "Achternaam mag niet leeg zijn!");
                                            document.getElementById('achternaam').style.borderColor = "red";
                                        }

                                        if (leeftijd <= "18" || leeftijd == "") { 
                                            error = true; 
                                            $('#leeftijd').attr("placeholder", "Leeftijd mag niet leeg of onder de 18 zijn!");
                                            document.getElementById('leeftijd').style.borderColor = "red";
                                        }

                                        if (afspraak == "Kies uw afspraak..") { 
                                            error = true; 
                                            $('#afspraak-label').append('<br>Afspraak moet ingevuld zijn!');
                                            document.getElementById('afspraak').style.borderColor = "red";
                                        }

                                        if (datum == "") { 
                                            error = true; 
                                            $('#datum').attr("placeholder", "Datum mag niet leeg zijn");
                                            document.getElementById('datum').style.borderColor = "red";
                                        }

                                        if (datum <= nu) { 
                                            error = true; 
                                            $('#datum').attr("placeholder", "Datum ligt in het verleden!");
                                            document.getElementById('leeftijd').style.borderColor = "red";
                                        } 

                                        if (!error) {
                                            // er gaat niks fout
                                            jQuery(function () {
                                                $.ajax({
                                                    type: "POST",
                                                    url: "http://school/afspraak-maken/insertUser.php",
                                                    data: {
                                                        email: email,
                                                        naam: naam,
                                                        achternaam: achternaam,
                                                        leeftijd: leeftijd,
                                                        afspraak: afspraak,
                                                        datum: datum
                                                    },
                                                    success: function(msg) {
                                                        console.log(msg);

                                                    }
                                                });
                                            });   
                                            
                                        }
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php
                # Zorgen dat de footer gezien kan worden
                $School->includeFooter(); 
            ?>
        </div>
        <!-- JS Includes -->
        <script src="http://school/assets/js/dashmix.core.min.js"></script>
        <script src="http://school/assets/js/dashmix.app.min.js"></script>
        <script src="http://school/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="http://school/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="http://school/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="http://school/assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="http://school/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="http://school/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <script src="http://school/assets/js/plugins/dropzone/min/dropzone.min.js"></script>
        <script src="http://school/assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script>
        <script src="http://school/assets/js/plugins/flatpickr/flatpickr.min.js"></script>
        <!-- Page JS Helpers Includen -->
        <script>jQuery(function(){Dashmix.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs', 'pw-strength']);});</script>
    </body>
</html>
