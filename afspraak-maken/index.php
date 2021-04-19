<!-- Ik ben ontzettend slecht in HTML, vandaar deze template :) Ik doe liever back-end. -->
<!DOCTYPE html>
<html lang="en">
    <?php
        # Zorgen dat ik alle errors zie, wantja dev mode huh.
        error_reporting(E_ALL & ~E_NOTICE);
        ini_set('display_errors', 1);
        # Session starten ivm inloggen.
        session_start();
        require __DIR__."/../assets/classes/School.php";
        # gotta get that dem sweetalert script
        echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        $School = new School(); 
        # Controle of we al ingelogd zijn
        $login = $School->checkIfLoggedIn();
        # Head met script en meta info includen
        $School->includeHead();
    ?>
    <title>Home</title>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="enable-page-overlay side-scroll main-content-boxed">
            <!-- Zorgen dat de header geinclude wordt. -->
            <?= $School->includeHeader() ?>
            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-body-light border-top border-bottom">
                    <div class="content content-full py-1">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-sm text-uppercase font-w700 mt-2 mb-0 mb-sm-2">
                                <i class="fa fa-angle-right fa-fw text-primary"></i> Gebruiker
                            </h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <script>
                    //  Functie definen voor sweetalert.
                    function unknown() {
                        Swal.fire(
                            'Unknown',
                            'Deze button werkt alleen (nog) niet ;)',
                            'question'
                        );
                    }
                </script>
                <!-- Het is mij super onduidelijk wat ze van mij verwachten met de website, dus heb ik alles maar hardcoded erin gezet ipv met een database alles ophalen wantja het gaat om het uiterlijk nu. -->
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
                                    <form class="mb-5" action="be_forms_layouts.html" method="POST" onsubmit="return false;">
                                        <div class="form-group">
                                            <label for="example-ltf-email">Email</label>
                                            <input type="email" placeholder="Uw e-mailadres.." class="form-control" id="example-ltf-email" name="example-ltf-email">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-ltf-password">Naam</label>
                                            <input type="password" placeholder="Uw naam.." class="form-control" id="example-ltf-password" name="example-ltf-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-ltf-email2">Achternaam</label>
                                            <input type="email" placeholder="Uw achternaam.." class="form-control" id="example-ltf-email2" name="example-ltf-email2">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-ltf-password2">Leeftijd</label>
                                            <input type="password" placeholder="Uw leeftijd.." class="form-control" id="example-ltf-password2" name="example-ltf-password2">
                                        </div>
                                        <div class="form-group">
                                            <label for="afspraak">Afspraak</label>
                                            <select class="form-control" id="afspraak" placeholder="Kies uw afspraak..">
                                            <option>Kies uw afspraak..</option>
                                            <option>Kapper</option>
                                            <option>Dokter</option>
                                            <option>Mondhygienist</option>
                                            <option>Tandarts</option>
                                            </select>
                                            </div>
                                        <div class="form-group">
                                                <label for="example-flatpickr-datetime-24">Datum & Tijd</label>
                                                <input type="text" placeholder="Selecteer uw tijd.." class="js-flatpickr form-control bg-white" id="example-flatpickr-datetime-24" name="example-flatpickr-datetime-24" data-enable-time="true" data-time_24hr="true">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Opslaan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- Footer -->  
            <?php
                # Zorgen dat de footer gezien kan worden
                $School->includeFooter(); 
            ?>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <!-- JS Includes -->
        <script src="http://school/assets/js/dashmix.core.min.js"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_js/main/app.js
        -->
        <script src="http://school/assets/js/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="http://school/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="http://school/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="http://school/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="http://school/assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="http://school/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="http://school/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <script src="http://school/assets/js/plugins/dropzone/min/dropzone.min.js"></script>
        <script src="http://school/assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script>
        <script src="http://school/assets/js/plugins/flatpickr/flatpickr.min.js"></script>

        <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
        <script>jQuery(function(){Dashmix.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs', 'pw-strength']);});</script>
    </body>
</html>
