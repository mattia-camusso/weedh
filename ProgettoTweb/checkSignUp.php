<?php
include("shared.php");
//questa pagina riceve in input i dati dal form del signup, filtra gli input e registra l'utente con l'aiuto
//di funzioni definite in shared
if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $email = filter_input(INPUT_POST, 'email',
              FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $username = strip_tags($username, "<br>");
    $password = strip_tags($password, "<br>");
    $email = strip_tags($email, "<br>");
    register_account($username, $email, $password);
    session_start();
    $_SESSION["name"] = $username;
    $_SESSION["userid"] = get_userid($username);

} else {
    redirect("index.php", "Error during sign up process");
}

redirect("home.php");
