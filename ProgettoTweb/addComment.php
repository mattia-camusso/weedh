<?php
include ('shared.php');

//in caso di richiesta POST vengono inseriti i commenti nel db dalla funzione set_comments definita in shared.php
if(isset($_POST['c_id']) && isset($_POST['message'])){
    $c_id = $_POST['c_id'];
    $message = strip_tags($_POST['message'], '<br>');
    $u_id  = $_SESSION["userid"];
    if($message != "") {
        set_comments($u_id, $c_id, $message);
    }
}
//in caso di richiesta GET viene fatta una query per restituire i commenti
// degli utenti sotto forma di JSON
if (isset($_GET['c_id'])) {
    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $c_id = $_GET['c_id'];
        $c_id = $db->quote($c_id);
        $rows = $db->query("SELECT u.username, c.date, c.message 
                                      FROM comments c JOIN users u ON c.u_id = u.id 
                                      WHERE  c.c_id = $c_id");
        $i = 0;

        $count = $rows->rowCount();
        header("Content-type: application/json");
        print "{\n";
        if ($rows == null) {
            $errMsg = "content not found";
            print "  \"errMsg\": \"" . $errMsg . "\" }\n";
        } else {
            print "  \"comments\": [\n";
            foreach ($rows as $row) {
                    $username = $row['username'];
                    $date = $row['date'];
                    $message = $row['message'];
                    print "    {\"username\": \"$username\",  \"date\": \"$date\", \"message\": \"$message\" }";
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