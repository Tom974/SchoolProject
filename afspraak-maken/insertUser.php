<?php
if(!empty($_POST['naam'])) {
    include(__DIR__ . "/../assets/classes/School.php");
    $school = new School();

    if ($_POST['datum'] < date('Y-m-d H:i:s')) {
        echo "de datum mag niet in het verleden liggen!"; 
    } else {
        $School->insertNewAfspraak($_POST['email'], $_POST['naam'], $_POST['achternaam'], $_POST['leeftijd'], $_POST['afspraak'], $_POST['datum']);
        echo "Afspraak succesvol toegevoegd!"
    }
           
}