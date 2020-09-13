<?php
# main program
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

if (!isset($_SESSION)) {
    session_start();
}

header("Content-type: application/json");

if (isset($_SESSION["name"])) {
    print "{\n  \"isSet\": true, \n";
    print "  \"name\": \"" . $_SESSION["name"] . "\" \n}\n";
} else {
    print "{\n  \"isSet\": false \n}\n";
}
