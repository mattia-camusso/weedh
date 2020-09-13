<?php
include("shared.php");

if (isset($_POST['id'])) {

    $u_id = $_SESSION["userid"];;
    $c_id = $_POST['id'];
    set_favourites($u_id, $c_id);

} else if (isset($_GET['id'])){

    $u_id = $_SESSION["userid"];
    $c_id = $_GET['id'];

    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $rows = $db->query("SELECT * FROM fav_art WHERE u_id = $u_id AND c_id = $c_id");
        $i = 0;

        $count = $rows->rowCount();
        header("Content-type: application/json");
        print "{\n";
        if ($rows == null) {
            $errMsg = "Item not found";
            print "  \"errMsg\": \"" . $errMsg . "\" }\n";
        } else {
            print "  \"fav\": [\n";
            foreach ($rows as $row) {
                $user = $row['u_id'];
                $card = $row['c_id'];
                print "    {\"user\": \"$user\", \"card\": \"$card\" }";
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