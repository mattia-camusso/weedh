<?php
include ("top.php");
include ("shared.php");
is_logged();
?>

<div class="wrapper">
<div class="container left">
<div id="info"></div>
<div class="slideshow">
    <div class="slide">
        <img src="">
    </div>
</div>
</div>

<div class="container right">
    <h2>List of your favourite artworks, <span id="username"></span>:</h2>
    <ul id="list">
        <li id="errMsg" hidden="hidden"></li>
    </ul>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/favourites.js" type="text/javascript"></script>
</body>
</html>
