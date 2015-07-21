<?php
    require_once 'functions.php';
    
    if(isset($_POST['q'])){
        connect();
        $results = getActors($_POST['q']);
        //print_r($results);
    }
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <h1>Search actors by last name</h1>
        <form action="index.php" method="post" id="actor-form">
            <select name="q" id="q">
                <?php
                   $a = str_split("abcdefghijklmnopqrstuvwxyz");
                    foreach ($a as $a1) {
                        echo "<option value='$a1'>$a1</option>";
                    }
                ?>
            </select>
            <button>Go</button>
        </form>
        <?php if(isset($results)):?>
         <ul class="actors">
                <?php
                    foreach ($results as $a) {
                        echo "<li><a href='actor.php?id={$a->actor_id}'>{$a->first_name} {$a->last_name}</a></li>";
                    }
                ?>
            </ul>
        <?php endif;?>
        <script src="../jquery/jquery-1.11.3.js"></script>
        <script src="scripts.js"></script>
    </body>
</html>


