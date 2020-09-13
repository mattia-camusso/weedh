<?php
include("shared.php");
if (!isset($_SERVER["REQUEST_METHOD"]) || $_SERVER["REQUEST_METHOD"] != "GET") {
    header("HTTP/1.1 400 Invalid Request");
    die("ERROR 400: Invalid request - This service accepts only GET requests.");
} else {

    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_SESSION["userid"];
        $rows = $db->query("SELECT c.art, c.name, c.artist, c.id FROM fav_art f
                                      JOIN cards_art c ON f.c_id = c.id
                                      WHERE f.u_id = $id");
        $i = 0;

        $count = $rows->rowCount();
        header("Content-type: application/json");
        print "{\n";
        if ($rows == null) {
            $errMsg = "Item not found";
            print "  \"errMsg\": \"" . $errMsg . "\" }\n";
        } else {
            print "  \"cards\": [\n";
            foreach ($rows as $row) {
                $art = $row['art'];
                $name = $row['name'];
                $artist = $row['artist'];
                $id = $row['id'];
                print "    {\"art\": \"$art\", \"name\": \"$name\", \"artist\": \"$artist\", \"id\": \"$id\" }";
                if ($i < ($count - 1)) {
                    print ",";
                }
                $i++;
                print "\n";

            }
            print "  ]\n}\n";
        }
    } catch (PDOException $ex) {
        echo "Error: <br>" . $ex->getMessage();
    }
}