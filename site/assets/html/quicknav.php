                   <!-- Quick Navigation -->
                   <script>
                        let naam = jQuery(function() {
                            $(".welkom-naam").text();
                        });

                        function goToAdminPage() {
                            jQuery(function () {
                               let isAdmin = $('.isAdmin').attr('isAdmin');
                                if (isAdmin == "true") {
                                    window.location.href="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloa/admin";
                                } else {
                                    alert("Je hebt geen admin toegang!");
                                }
                            });
                        }

                        function alert_wiet() {
                            jQuery(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloa/assets/ajax/ajax_wiet.php"
                                });
                            });
                        }

                        function alert_coke() {
                            jQuery(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloa/assets/ajax/ajax_coke.php"
                                });
                            });
                        }

                        function alert_meth() {
                            jQuery(function () {
                                $.ajax({
                                    type: "POST",
                                    url: "<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloa/assets/ajax/ajax_meth.php"
                                });
                            });
                        }

                    </script>
                    <div class="block block-bordered js-classic-nav d-none d-sm-block">
                        <div class="block-content block-content-full">
                            <div class="row no-gutters border">
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="javascript:alert_wiet()" >
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fas fa-cannabis text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Wiet Actief Melden</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="javascript:alert_coke()">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fa-cannabis text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Coke Actief Melden</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="javascript:alert_meth()">
                                        <div class="block-content block-content-full text-center">
                                            <div class="py-2">
                                                <i class="fa fa-2x fa-cannabis text-primary d-none d-sm-inline-block mb-3"></i>
                                                <div>Meth Actief Melden</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3 invisible" data-toggle="appear">
                                    <a class="block block-bordered block-link-pop text-center mb-0" type="submit" href="<?= str_replace("/home/tom/domains/tom974.dev/public_html", "", $_SERVER['DOCUMENT_ROOT']) ?>/sinaloa/uitloggen">
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
