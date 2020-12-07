<?php
//restituisce un messaggio d'errore in formato JSON
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

if (!isset($_SESSION)) {
    session_start();
}

header("Content-type: application/json");

if (isset($_SESSION["flash"])) {
    print "{\n  \"isSet\": true, \n";
    print "  \"flash\": \"" . $_SESSION["flash"] . "\" \n}\n";
    unset($_SESSION["flash"]);
} else {
    print "{\n  \"isSet\": false \n}\n";
}



