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
                    <div class="block block-bordered js-classic-nav d-none d-sm-block">
                        <div class="block-content block-content-full">
                            <div class="row no-gutters border">
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="javascript:unknown()">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fas fab fa-accessible-icon text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Noodknop</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="javascript:unknown()">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fas far fa-lightbulb text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Zet alle lichten uit</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="javascript:unknown()">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fas fa-door-open text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Doe alle deuren dicht</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="https://school.tom974.dev/uitloggen.php">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class=" fa-2x fas fa-sign-out-alt text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Uitloggen</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-4 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex justify-content-between">
                                    <div class="mr-3">
                                        <p class="font-size-h3 font-w300 mb-0">
                                            Gas Verbruik
                                        </p>
                                        <p class="text-muted mb-0">
                                            € 150,21
                                        </p>
                                    </div>
                                    <div>
                                        <i class="fa fa-2x fas fa-burn"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full overflow-hidden">
                                    <span class="js-sparkline" data-type="line" data-points="[340,330,360,340,360,350,370,360]" data-width="100%" data-height="120px" data-fill-color="transparent" data-spot-color="transparent" data-min-spot-color="transparent" data-max-spot-color="transparent" data-tooltip-suffix="L"><canvas style="display: inline-block; width: 429.583px; height: 120px; vertical-align: top;" width="429" height="120"></canvas></span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-4 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex justify-content-between">
                                    <div class="mr-3">
                                        <p class="font-size-h3 font-w300 mb-0">
                                            Water Verbruik
                                        </p>
                                        <p class="text-muted mb-0">
                                            € 49,21
                                        </p>
                                    </div>
                                    <div>
                                        <i class="fa fa-2x fas fa-faucet"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full overflow-hidden">
                                    <span class="js-sparkline" data-type="line" data-points="[35,120,370,190,480,390,500,400]" data-width="100%" data-height="120px" data-line-color="#689550" data-fill-color="transparent" data-spot-color="transparent" data-min-spot-color="transparent" data-max-spot-color="transparent" data-tooltip-suffix="L"><canvas style="display: inline-block; width: 429.583px; height: 120px; vertical-align: top;" width="429" height="120"></canvas></span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-xl-4 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full d-flex justify-content-between">
                                    <div class="mr-3">
                                        <p class="font-size-h3 font-w300 mb-0">
                                            Energie Verbruik
                                        </p>
                                        <p class="text-muted mb-0">
                                            € 30,40
                                        </p>
                                    </div>
                                    <div>
                                    <i class="fa fa-2x far fa-lightbulb"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full overflow-hidden">
                                    <span class="js-sparkline" data-type="line" data-points="[69,14,23,18,98,62,72,36]" data-width="100%" data-height="120px" data-line-color="#3b5998" data-fill-color="transparent" data-spot-color="transparent" data-min-spot-color="transparent" data-max-spot-color="transparent" data-tooltip-suffix="kW"><canvas style="display: inline-block; width: 429.583px; height: 120px; vertical-align: top;" width="429" height="120"></canvas></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- In principe is het het idee om dit later met een database te laten werken -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block">
                            <div class="block-header block-header-default">
                                    <h3 class="block-title">Hoofd Lichten</h3>
                                </div>
                                <div class="block-content">
                                <div class="form-group">
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg1" name="example-sw-custom-inline-lg1" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg1">Slaapkamer</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg2" name="example-sw-custom-inline-lg2">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg2">Badkamer</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg3" name="example-sw-custom-inline-lg3">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg3">Keuken</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Deuren</h3>
                                </div>
                                <div class="block-content">
                                <div class="form-group">
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg4" name="example-sw-custom-inline-lg4" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg4">Slaapkamer</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg5" name="example-sw-custom-inline-lg5" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg5">Badkamer</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg6" name="example-sw-custom-inline-lg6">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg6">Keuken</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-bordered">
                            <div class="block-header block-header-default">
                                    <h3 class="block-title">Extra Lichten</h3>
                                </div>
                                <div class="block-content">
                                <div class="form-group">
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg7" name="example-sw-custom-inline-lg7" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg7">Toilet</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg8" name="example-sw-custom-inline-lg8">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg8">Achtertuin</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg9" name="example-sw-custom-inline-lg9" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg9">Voortuin</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Extra</h3>
                                </div>
                                <div class="block-content">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg10" name="example-sw-custom-inline-lg10" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg10">Gasfornuis</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg11" name="example-sw-custom-inline-lg11" checked="">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg11">Droger</label>
                                        </div>
                                        <div class="custom-control custom-switch custom-control-lg custom-control-inline mb-2">
                                            <input type="checkbox" class="custom-control-input" id="example-sw-custom-inline-lg12" name="example-sw-custom-inline-lg12">
                                            <label class="custom-control-label" for="example-sw-custom-inline-lg12">Wasmachine</label>
                                        </div>
                                    </div>
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
        <script src="https://school.tom974.dev/assets/js/dashmix.core.min.js"></script>
        <script src="https://school.tom974.dev/assets/js/dashmix.app.min.js"></script>
        <script src="https://school.tom974.dev/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="https://school.tom974.dev/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="https://school.tom974.dev/assets/js/pages/op_auth_signin.min.js"></script>
        <!-- END JS Includes -->

        <script>
            // Zorgen dat form submits niet opnieuw gebeuren indien je refreshed. Niet dat er nu al een form inzit ofzo maarja altijd handig.
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }

            // Gekke jquery van de template
            jQuery(function () {
                Dashmix.helpers('sparkline');
            });
        </script>
    </body>
</html>
