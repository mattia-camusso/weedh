<?php

if (!isset($_SESSION)) {
    session_start();
}

function is_logged()
{
    if (!isset($_SESSION["name"])) {
        redirect("index.php", "Please log in to use the website");
    }
}

function redirect($url, $flash_message = NULL)
{
    if ($flash_message) {
        $_SESSION["flash"] = $flash_message;
    }
    header("Location: $url");
    die;
}

function db_connect()
{
    $dsn = "mysql:dbname=allcards;host=localhost:3306";
    if($dsn){
    return new PDO($dsn, 'root', '');
  } else {
    die("Connection failed");
  }
}

function password_correct($username, $password){
    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $db->quote($username);
        $password = hash('sha512', $password);
        $rows = $db->query("SELECT * FROM users WHERE username = $username ");
        if ($rows) {
            foreach ($rows as $row) {
                $pwd = $row["password"];
                return $password === $pwd;
            }
        } else return false;
    } catch (PDOException $ex) {
        echo "Error: <br>" . $ex->getMessage();
    }
}

function register_account($username, $email, $password)
{
    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $db->quote($username);
        $email = $db->quote($email);
        $password = hash('sha512', $password);
        $password = $db->quote($password);

        $rows = $db->query("SELECT * FROM users WHERE username = $username");
        if ($rows->rowCount() > 0) {
            redirect("index.php", "Username already taken");
        }
        $rows = $db->query("SELECT * FROM users WHERE email = $email");
        if ($rows->rowCount() > 0) {
            redirect("index.php", "Email already in use");
        }

        $sql = "INSERT INTO users (id, username, email, password) VALUES (0, $username, $email, $password)";
        $db->exec($sql);
    } catch (PDOException $ex) {
        echo "Error: <br>" . $ex->getMessage();
    }

}

function get_userid($username){
    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $db->quote($username);
        $userid =0;
        $rows = $db->query("SELECT id FROM users WHERE username = $username ");
        foreach ($rows as $row) {
            $userid = $row['id'];
        }

        return $userid;

    } catch (PDOException $ex) {
        echo "Error: <br>" . $ex->getMessage();
    }
}

function set_comments($u_id, $c_id, $message){

    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $u_id = $db->quote($u_id);
        $c_id = $db->quote($c_id);
        $message = $db->quote($message);

        $sql = "INSERT INTO comments (u_id,c_id, message)
      VALUES ($u_id, $c_id, $message)";
        $db->exec($sql);
    } catch (PDOException $ex) {
        echo "Error: <br>" . $ex->getMessage();
    }
}
/*
function getComments(){
  try {
      $db = db_connect();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $rows = $db->query("SELECT * FROM comments");
      if ($rows) {
          foreach ($rows as $row) {
            echo $row['u_id'];
            echo $row['message'];
          }
      } else return false;
  } catch (PDOException $ex) {
      echo "Error: <br>" . $ex->getMessage();
  }
}
*/

function set_favourites($u_id, $c_id){

    try {
        $db = db_connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $u_id = $db->quote($u_id);
        $c_id = $db->quote($c_id);


        $sql = "INSERT INTO fav_art (u_id,c_id)
      VALUES ($u_id, $c_id)";
        $db->exec($sql);
    } catch (PDOException $ex) {
        echo "Error: <br>" . $ex->getMessage();
    }
}
