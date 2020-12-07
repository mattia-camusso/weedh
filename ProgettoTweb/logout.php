<?php
//funzione di logout utente e reindirizzamento alla homepage
require_once ("shared.php");
session_unset();
session_destroy();
redirect("index.php", "Logout successful");