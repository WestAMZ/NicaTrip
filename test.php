<?php
    include('controllers/core.php');
    include(MODELS_DIR . 'user.php');
    echo("Prueba <br>");
    $user = User::getUserByUserName('west');
    echo($user->getCoverPicture());
?>