<!doctype html>
<html lang="en">
<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
session_start();
require $_SERVER['DOCUMENT_ROOT']."/sinaloa/assets/classes/sinaloa.php";
$sinaloa = new sinaloa(); 
# Controle of we al ingelogd zijn
$login = $sinaloa->checkIfLoggedIn();
# Head met script en meta info includen
$sinaloa->includeHead();
?>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="enable-page-overlay side-scroll main-content-boxed">
            <?php $sinaloa->includeHeader(); ?>
            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-body-light border-top border-bottom">
                    <div class="content content-full py-1">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-sm text-uppercase font-w700 mt-2 mb-0 mb-sm-2">
                                <i class="fa fa-angle-right fa-fw text-primary isAdmin" isAdmin="<?= $login['admin'] ?>"></i> <?= $login['naam'] ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content">
                    <div class="block block-bordered js-classic-nav d-none d-sm-block">
                        <div class="block-content block-content-full">
                            <div class="row no-gutters border">
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/kalasv2/wiet">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fas fa-cannabis text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Naar Wiet</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/kalasv2/coke">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fa-cannabis text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Naar Coke</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloav2/meth">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fa-cannabis text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Naar Meth</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloav2/uitloggen">
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
                    <!-- END Quick Navigation -->

                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            <!-- BEGIN Footer -->  
            <?php
                    $sinaloa->includeFooter(); ?>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <script src="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloav2/assets/js/dashmix.core.min.js"></script>
        <script src="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloav2/assets/js/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloav2/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        <!-- Page JS Helpers (jQuery Sparkline Plugin) -->
        <script>jQuery(function () {
                Dashmix.helpers('sparkline');
            });</script>
    </body>
</html>
