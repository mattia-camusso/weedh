<?php
include("shared.php");

if (isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $password = filter_input(INPUT_POST, 'password');
    $username = strip_tags($username, "<br>");
    $password = strip_tags($password, "<br>");
    if( password_correct($username, $password)){
        if (isset($_SESSION)){
            session_regenerate_id(TRUE);
        }
        $_SESSION["name"] = $username;
        $_SESSION["userid"] = get_userid($username);
    } else {
        redirect("index.php", "Invalid Username or Password");

    }


}
is_logged();
redirect("home.php");

