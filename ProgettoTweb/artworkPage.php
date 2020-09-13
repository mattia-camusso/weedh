<?php
include ('top.php');
include ('shared.php');
is_logged();
?>
<div class="wrapper">
<div class="container left">
<h3 id="cname"></h3>


    <div class="slideshow">
        <div class="slide">
            <img  src="">
        </div>
    </div>
</div>

<div class="container right">

<from id="test" class="comment">
    <input id="c_id" type='hidden' name="c_id" value="">
    <textarea name='message' placeholder='Add a comment...' rows="8" cols="80"></textarea>
    <br/>
    <button id="comment" >Comment</button>
    <button id="fav" hidden="hidden">Add to favourites</button>
</from>
    <div id="comment-section"></div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/artworkPage.js" type="text/javascript"></script>
</body>
</html>
