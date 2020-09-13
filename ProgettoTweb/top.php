<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/top.css">
    <link rel="icon" href="img/logo1.svg">
    <title>Document</title>
</head>
<body>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<header>
    <a href="home.php" class="logo">
        <img class="logo" src="img/logo.svg" alt="W">
    </a>
    <nav>
        <ul class="nav-list">
            <li>
                <a class="nav-links" href="artGallery.php">Art Gallery</a>
            </li>
            <li>
                <a class="nav-links" href="cardSearch.php">Search by Name</a>
            </li>
            <li>
                <a class="nav-links" href="counter.php">Life Counter</a>
            </li>
        </ul>
    </nav>
    <div id="menu">
            <span class="nav-links">Menu</span>
        <div class="dropdown">
            <a href="home.php">Home</a>
            <a href="favourites.php">Favourites</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>

    <div id="burg-bar">
        <div id="burg">
            <div id="bar1" class="bar"></div>
            <div id="bar2" class="bar"></div>
            <div id="bar3" class="bar"></div>
        </div>
        <ul class="bnav" id="bnav">
            <li><a href="home.php">Home</a></li>
            <li><a href="artGallery.php">Art Gallery</a></li>
            <li><a href="cardSearch.php">Search</a></li>
            <li><a href="counter.php">Life Counter</a></li>
            <li><a href="favourites.php">Favourites</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="burg-bg" id="burg-bg"></div>
</header>



<?php
if (isset($_SESSION["flash"])) {
    ?>
    <div id="flash"> <?= $_SESSION["flash"] ?> </div>
    <?php
    unset($_SESSION["flash"]);
}
?>
<div id="errMsg" hidden="hidden"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/top.js"></script>