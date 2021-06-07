
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
                            <h3 class="block-title">Alle Afspraken</h3>
                        </div>
                        <div class="block-content block-content-full">
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
                                    <?php
                                        # alle afspraken ophalen en weergeven
                                        $afspraken = $School->execute('SELECT * FROM `afspraken` ORDER BY ID DESC', [], 'fetchAll');
                                        foreach($afspraken as $afspraak) {
                                            echo '                                   
                                            <tr>
                                                <td class="text-center">'.$afspraak['id'].'</td>
                                                <td class="font-w600">
                                                    <a class="text-muted">'.$afspraak['naam'].'</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="text-muted">'.$afspraak['achternaam'].'</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell">
                                                    <a>'.$afspraak['email'].'</a>
                                                </td>
                                                <td>
                                                    <a>'.$afspraak['leeftijd'].'</a>
                                                </td>
                                                <td>
                                                    <a>'.$afspraak['afspraak_type'].'</a>
                                                </td>
                                                <td>
                                                    <a>'.$afspraak['datum'].'</a>
                                                </td>
                                            <tr>';
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </main>
            <?php
                # Zorgen dat de footer gezien kan worden
                $School->includeFooter(); 
            ?>
        </div>
        <script src="http://school/assets/js/dashmix.core.min.js"></script>
        <script src="http://school/assets/js/dashmix.app.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
        <script src="http://school/assets/js/pages/be_tables_datatables.min.js"></script>
        <!-- Page JS Helpers -->
        <script>jQuery(function(){Dashmix.helpers('sparkline');});</script>
    </body>
</html>
