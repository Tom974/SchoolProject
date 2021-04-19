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
                    <!-- Dynamic Table Full -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Alle Afspraken</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">#</th>
                                        <th>Naam</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Achternaam</th>
                                        <th class="d-none d-sm-table-cell" style="width: 25%;">Email</th>
                                        <th style="width: 5%;">Leeftijd</th>
                                        <th style="width: 10%;">Afspraak</th>
                                        <th style="width: 15%;">Datum & Tijd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="font-w600">
                                            <a class="text-muted">Tom</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">Hartog</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            tommietom12@gmail.com
                                        </td>
                                        <td>
                                            <a>18</a>
                                        </td>
                                        <td>
                                            <a>kapper</a>
                                        </td>
                                        <td>
                                            <a>16-04-2021 10:54:00</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
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
        
        <script src="http://school/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>

        <!-- Page JS Code -->
        <script src="http://school/assets/js/pages/be_tables_datatables.min.js"></script>

        <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
        <script>jQuery(function(){Dashmix.helpers('sparkline');});</script>
    </body>
</html>
