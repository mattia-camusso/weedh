<?php
include("top.php");
include("shared.php");
is_logged();
?>
<div class="wrapper">
    <div class="container left">
        <h3 id="info">Fetching info...</h3>
        <img src="" id="display">
    </div>
<div class="container right">
    <div class="up">
        <h3>Search Cards</h3>
        <form>
            <dl>
                <dt></dt>
                <dd><input type="text" name="name" id="search" placeholder="Search an artwork..." autofocus="autofocus"/></dd>
                <dt></dt>
            </dl>
        </form>
        <span>
        <button id="add" hidden="hidden">Open</button>
        <button id="fav" hidden="hidden">Favourite</button>
        <span>
    </div>
    <div class="down">
    <ul id="list" class="suggestion">
        <li id="errMsg"></li>
    </ul>
    </div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/cardSearch.js" type="text/javascript"></script>
</body>
</html>
