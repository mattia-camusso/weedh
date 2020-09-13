<?php
include("top.php");
include("shared.php");
is_logged();
?>

<div class="pimg1">
    <div class="ptext">
        <span class="border">
            Welcome <span id="username"></span>
        </span>
    </div>
</div>

<section class="section">
    <div class="subsection">
    <h2>Online Art Gallery</h2>
    <p>
        There's a lot of great art in the history of Magic.
        So much, in fact, that it's worth looking at even if you don't know what cards they're attached to.
        Welcome to weEDH, the online platform dedicated to the artwork and the artist of Mtg.
    </p>
    </div>
</section>
<div class="pimg2">
    <div class="ptext">
        <span class="border">
            <a href="artGallery.php">Art Gallery</a>
        </span>
    </div>
</div>

<section class="section">
    <div class="subsection">
    <h2>Find the Arworks</h2>
    <p>
        If you're looking for a picture in particular our card search engine is going to
        help you in your quest to find the ultimate masterpiece.
    </p>
    </div>
</section>
<div class="pimg3">
    <div class="ptext">
        <span class="border">
            <a href="cardSearch.php">Search by Name</a>
        </span>
    </div>
</div>

<section class="section">
    <div class="subsection">
    <h2>Play Time</h2>
    <p>
        We love the arts behind the game, but we also love to play the game.<br/>
        Our Life Counter is here to help you with your games, keeping track of the
        life total of every player.
    </p>
    </div>
</section>

<div class="pimg1">
    <div class="ptext">
        <span class="border">
            <a href="counter.php">Life Counter</a>
        </span>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/home.js" type="text/javascript"></script>
</body>
</html>
