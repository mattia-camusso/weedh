<?php
include("shared.php");
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
}

function filter_chars($str) {
    return preg_replace("/[^A-Za-z0-9_, ]*/", "", $str);
}

$idN="";
$cardnameN="";
$limit = 12;

if (isset($_REQUEST["name"])) {
    $cardnameN = filter_chars($_REQUEST["name"]);
}

if (isset($_REQUEST["id"])) {
    $idN = filter_chars($_REQUEST["id"]);
}

if(isset($_REQUEST["limit"])){
    $limit = $_REQUEST["limit"];
}

try {
    $db = db_connect();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_REQUEST["id"])){
        $idN = $db->quote($idN);

        $rows = $db->query("SELECT * FROM cards_art  WHERE id = $idN");
    } else {
        $cardname = $cardnameN . "%";
        $cardname = $db->quote($cardname);

        $rows = $db->query("SELECT * FROM cards_art  WHERE name like $cardname LIMIT $limit");
    }
    $total = $db->query("SELECT COUNT(*) FROM cards_art")->fetchColumn();
    $i = 0;

    $count = $rows->rowCount();
    header("Content-type: application/json");
    print "{\n";
    if ($rows == null) {
        $errMsg = "not found";
        print "  \"errMsg\": \"$errMsg\" }\n";
    } else {
        print " \"cards\": [\n";
        foreach ($rows as $row) {
                $id = $row['id'];
                $art = $row['art'];
                $name = $row['name'];
                $artist = $row['artist'];
                    print "    {\"id\": \"$id\", \"art\": \"$art\", \"name\": \"$name\", \"artist\": \"$artist\" }";
                if ($i < ($count - 1)) {
                    print ",";
                }
                $i++;
                print "\n";
        }
            print "],\n \"total\": \"$total\" }\n";
    }
} catch (PDOException $ex) {
    echo "Error: <br>" . $ex->getMessage();
}
