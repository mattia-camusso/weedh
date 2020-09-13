<?php
require_once ("shared.php");
session_unset();
session_destroy();
redirect("index.php", "Logout successful");