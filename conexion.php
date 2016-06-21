<?php
    require('db/connection.php');
    error_reporting(E_ALL);
    if(Connection::connect())
    {
        echo('NOOOOOO  se conecto' . Connection::getConnection()->connect_error);
    }
    else
    {
        echo('se conecto' . Connection::getConnection()->connect_error);
    }
?>
