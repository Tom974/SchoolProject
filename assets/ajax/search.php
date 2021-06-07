<?php
//Including Database configuration file.
include __DIR__."/../classes/School.php";
$School = new School();
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $search = $_POST['search'];
//Search query.
   $sql = "SELECT Name FROM search WHERE Name LIKE '%$search% OR achternaam LIKE '%$search%'' LIMIT 5";
//Query execution    
   $res = $School->execute($sql, [], "fetchAll");
//Creating unordered list to display result.
foreach($res as $result) {
    echo $result['naam'];
}
}

?>