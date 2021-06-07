
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
            <!-- Main Container -->
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
                <div id="display" class="content">
                    
                </div>
                <script>
                $(document).ready(function(){
                    $('.search-box input[type="text"]').on("keyup input", function(){
                        /* Get input value on change */
                        var inputVal = $(this).val();
                        var resultDropdown = $("#result");
                        if(inputVal.length){
                            jQuery(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "search.php",
                                    data: "search="+inputVal,
                                    success: function(msg) {
                                        resultDropdown.html(msg);
                                    }
                                });
                            });
                        } else { 
                            resultDropdown.empty();
                        }
                    });
                    
                    // Set search input value on click of result item
                    $(document).on("click", "#result p", function(){
                        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                        $(this).parent("#result").empty();
                    });
                });
                </script>
                </head>
                <body>
                    <div id="result">
                        <p></p>
                    </div>
                </body>
            </main>

            <?php
                # Zorgen dat de footer gezien kan worden
                $School->includeFooter(); 
            ?>
        </div>
        <!-- END Page Container -->
        <script src="http://school//assets/js/dashmix.core.min.js"></script>
        <script src="http://school//assets/js/dashmix.app.min.js"></script>
        <script src="http://school//assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="http://school//assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="http://school//assets/js/pages/op_auth_signin.min.js"></script>

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
