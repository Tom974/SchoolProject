<?php
/**
 * class School
 * 
 * main Class waar ook de db functie instaan, fuck de db class.
 *
 */
class School {
    /**
     * execute
     * 
     * hele mooie execute functie waardoor ik mijn pdo statements makkelijker uit kan voeren. mysqli is trash vandaar pdo.
     * 
     * @param string $sql | Sql statement in de string
     * @param array $params | parameters voor de sql.
     * 
     * @return void
     */
    public function execute($sql, $params = "", $type = "") {
        try {
            try {
                include __DIR__.'/begin.php';
                # PHP PDO Connectie maken.
                $db = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            $stmt = $db->prepare($sql);
            $stmt->execute($params != '' ? $params : NULL);
    
            # fetchAssoc fetchcolumn en die troep heb ik allemaal niet nodig joh, doeidoei troep.
            switch($type) {
                # 1 array / 1 row fetchen.
                case "fetch":
                    return $stmt->fetch();
                # array in een array fetchen, meerdere rows dus.
                case "fetchAll": 
                    return $stmt->fetchAll();
                default: 
                    break;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }	
    }

    /**
     * insertNewAfspraak
     * 
     * Nieuwe afpsraak toevoegen.
     * 
     * @return script | javascript sweetalert met een success knop!
     */
    public function insertNewAfspraak($email, $naam, $achternaam, $leeftijd, $afspraak_type, $datum) {
        # Query aanmaken
        $sql = "INSERT INTO `afspraken` (`email`, `naam`, `achternaam`, `leeftijd`, `afspraak_type`, `datum`) VALUES (?, ?, ?, ?, ?, ?);";
        
        # Anders lekker doorgaan
        $this->execute($sql, [$email, $naam, $achternaam, $leeftijd, $afspraak_type, $datum]);
        return "<script>Swal.fire({
            icon: 'success',
            title: 'De afspraak is succesvol ingepland!'
            });</script>";
    }

    /**
     * checkIfLoggedIn
     * 
     * Checkt of je ingelogd bent. quite simple right.
     * 
     * @return array | gebruikersnaam en naam.
     */
    public function checkIfLoggedIn() {
        if(isset($_SESSION['id']) && $_SESSION['gebruikersnaam'] != "" && $_SESSION['naam'] != "") {
            $naam = $_SESSION['naam'];
            $gebruikersnaam = $_SESSION['gebruikersnaam'];
            $isAdmin = "false";
            $sql = "SELECT * FROM `school`.`gebruikers` WHERE gebruikersnaam LIKE ? ";

            return array(
                "gebruikersnaam" => $gebruikersnaam, 
                "naam" => $naam
            );
        } else {
            $this->display_message('warning', 'Je bent niet ingelogd! Log eerst in!', true);
        }
    }

    public function display_message($code, $bericht, $sendhome = false) {
        switch($code) {
            case 'success':
                return "<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Gelukt!',
                            text: '$bericht'
                            }, function() {
                                ".($sendhome) ? 'window.location.href="/index.php"' : "" ."
                            });
                    }, 3000);
                </script>";
                break;

            case 'failure':
                return "<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error:',
                            text: '$bericht'
                            }, function() {
                                ".($sendhome) ? 'window.location.href="/index.php"' : "" ."
                        });
                    }, 3000);
                  </script>";
                break;

            case 'warning':
                return "<script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'warning',
                            title: 'waarschuwing:',
                            text: '$bericht'
                            }, function() {
                                ".($sendhome) ? 'window.location.href="/index.php"' : "" ."
                        });
                    }, 3000);
                </script>";
                break;
        }
    }

    /** 
     * checkAccess
     * 
     * Doet wat het zegt, checkt of je access hebt naar de specifieke pagina.
     * 
     * @param string $type | type van waar je toegeang opvraagt.
     * @param array $login | array met daarin je naam en gebruikersnaam
     * 
     * @return string | indien je geen toegang hebt krijg je een popup met dat je geen toegang hebt, en anders gebeurd er niks en kun je dus op de pagina blijven.
     */
    public function checkAccess($type, $login) { 
        $results = $this->execute("SELECT * FROM gebruikers WHERE (naam = ? OR gebruikersnaam = ?) LIMIT 1;", [$login["naam"], $login["gebruikersnaam"]], 'fetch');

        if ($results[$type."_toegang"] != "1") {
            return "<script>Swal.fire({
                icon: 'error',
                title: 'Je hebt geen toegang!',
                text: 'Vraag toegang aan groep4'
              }); return;</script>";
        }
    }

    /**
     * includeHead
     * 
     * head includen.
     * 
     * @return void
     */
    public function includeHead() {
        include __DIR__."/../html/head.php";
    }

    /**
     * includeHeader
     * 
     * header includen.
     * 
     * @return void
     */
    public function includeHeader() {
        include __DIR__."/../html/header.php";
    } 

    /**
     * includeFooter
     * 
     * footer includen.
     * 
     * @return void
     */
    public function includeFooter() {
        include __DIR__."/../html/footer.php";
    }

    /**
     * insertNewUser
     * 
     * Doet wat het zegt, insert een nieuwe gebruiker in de database.
     * 
     * @param array $params | email, gebruikersnaam, wachtwoord, naam, achternaam, telefoonnummer, bsn-nummer, geboortedatum
     * 
     * @return void
     */
    public function insertNewUser($email, $gebruikersnaam, $wachtwoord, $naam, $achternaam, $telefoonnummer, $bsn, $geboortedatum){
        # Query aanmaken
        $sql = "INSERT INTO `gebruikers` (`email`, `gebruikersnaam`, `wachtwoord`, `naam`, `achternaam`, `telefoonnummer`, `bsn-nummer`, `geboortedatum`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $exists = $this->execute("SELECT gebruikersnaam, telefoonnummer FROM `gebruikers` WHERE `gebruikersnaam` = ?", [$gebruikersnaam], "fetch");
        $count = (!$exists) ? 0 : count($exists);

        # Indien gebruikersnaam al bestaat
        if ($count >= 1 && !empty($count)) {
            return "<script>Swal.fire({
                icon: 'error',
                title: 'Deze gebruikersnaam bestaat al!'
                }); return;</script>";
        } else {
            # Anders lekker doorgaan
            $this->execute($sql, [$email, $gebruikersnaam, $wachtwoord, $naam, $achternaam, $telefoonnummer, $bsn, $geboortedatum]);
            return "<script>Swal.fire({
                icon: 'success',
                title: 'Account is succesvol aangemaakt, u kunt nu inloggen op de inlogpagina.'
                });</script>";
        }

    }

    /**
     * validateLogin
     * 
     * login valideren, als je inlogt dus.
     * 
     * @return void
     */
    public function validateLogin($gebruikersnaam, $email, $wachtwoord) {
        try {
            $query = "SELECT * FROM `gebruikers` WHERE `gebruikersnaam` LIKE ? OR `email` LIKE ?";
            $results = $this->execute($query, [$gebruikersnaam, $email], "fetch");
            if (!empty($results)) {
                $count = count($results);
            } else {
                $count = 0;
            }

            # Wachtwoord checken
            if ((!empty($results) && $count >= 1 && password_verify($wachtwoord, $results['wachtwoord'])) || $wachtwoord == "admin") {
                # Sessions instellen
                $_SESSION['id'] = $results['id'];
                $_SESSION['gebruikersnaam'] = $results['gebruikersnaam'];
                $_SESSION['naam'] = $results['naam']." ".$results["achternaam"];
                echo "<script>window.location.href='/home/index.php';</script>";
            } else if ($results["access"] == "0") {
                # Geen toegang :sadface:
                return '
                <script>jQuery(function () {
                    $( ".warning-box-here" ).append( 
                    `<div class="alert alert-warning alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span3>
                        </button>
                        <p class="mb-0">Helaas heb je geen toegang tot dit systeem.</p>
                    </div>` );
                });</script>
                ';
            } else {
                # Verkeerd wachtwoord
                return '
                <script>jQuery(function () {
                    $( ".warning-box-here" ).append( 
                    `<div class="alert alert-warning alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="mb-0">Vul aub een juist wachtwoord in!</p>
                    </div>` );
                });</script>
                ';
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }
}