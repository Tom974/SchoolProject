<?php
//Including Database configuration file.
include __DIR__."/../assets/classes/School.php";
$School = new School();
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
    # Zoek onderwerp in variabele zetten.
    $search = $_POST['search'];
    # Query / SQL aanmaken
    $sql = "SELECT * FROM `contacten` WHERE `naam` LIKE '%$search%' OR `achternaam` LIKE '%$search%' OR `telefoonnummer` LIKE '%$search%'";
    # SQL uitvoeren en resultaat in $res zetten.    
    $res = $School->execute($sql, [], "fetchAll");
    # voor elk resultaat alles weergeven
    foreach($res as $result) {
        echo "<br><strong>Contact -></strong><br />Naam: ". $result['naam'] .  " " . $result['achternaam'] . " <br>  Telefoonnummer: " . $result['telefoonnummer'] . "<br>";
    }
}

?>