<?php include("top.php");
include("shared.php");
is_logged();
?>

<section class="grid-container">
    <div class="card wide">
        <h6>NEW GAME</h6>
        <span>
            <p>Starting Health:</p>
            <form>
                <label>
                    <input type="radio" name="lt" value="20">20
                </label>
                <label>
                    <input type="radio" name="lt" value="30" >30
                </label>
                <label>
                    <input type="radio" name="lt" value="40" checked="checked">40
                </label>
            </form>

        </span>
        <span>
            <p>Number of players:</p>
            <form id="select">
                <select name="players">
                    <option>2</option>
                    <option>3</option>
                    <option selected="selected">4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </form>
        </span>
        <button class="button">Start</button>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/counter.js" type="text/javascript"></script>
</body>
</html>
