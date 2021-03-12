<?php
error_reporting(E_ALL);
require __DIR__."/../classes/sinaloa.php";
$sinaloa = new sinaloa();

try {
    $current = $sinaloa->execute("SELECT * FROM meth_aantallen ORDER BY ID DESC LIMIT 1;", [], "fetch");
    $verwerkt = 5;
    if ($current['aantal_planten'] != 0 && $current['aantal_planten'] >= 28) {
        $aantal_zakjes_totaal = (intval($current['aantal_zakjes']) + 5); 
    } else {
        echo "Er is niet genoeg om te verwerken, Cronjob afkappen. We hoeven namelijk niets meer te doen.\n";
        exit;
    }

    $zakje_rest = $sinaloa->execute("SELECT aantal FROM meth_batch_over", "", "fetch")["aantal"];
    $zakje_rest = number_format($zakje_rest, 1);

    if ($zakje_rest >= 1.0) {
        $aantal_zakjes_totaal = $aantal_zakjes_totaal + 1;
        $verwerkt = $verwerkt + 1;
        $zakje_rest = $zakje_rest - 1.0;
    }

    $zakje_rest = $zakje_rest + 0.4;

    $sinaloa->execute("UPDATE meth_batch_over SET aantal = ?", [$zakje_rest]);

    echo "zakjes verwerkt deze run : " . $verwerkt .PHP_EOL;
    $sinaloa->execute("INSERT INTO meth_aantallen (aantal_planten, aantal_zakjes) VALUES (?, ?)", [($current["aantal_planten"] - 28), $aantal_zakjes_totaal]);
    echo "\nCronjob Done";
    die();
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}