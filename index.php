<?php
    require('controllers/core.php');
    Connection::sessionStart();
    if(isset($_GET['view']))
    {
        if(file_exists(PHP_DIR . strtolower($_GET['view']) . 'Controller.php'))
        {
            include(PHP_DIR . strtolower($_GET['view']) . 'Controller.php');
        }
        else
        {
            include(PHP_DIR . 'indexController.php');
        }
    }
    else if(isset($_GET['post']))
    {
        if(file_exists(POST_DIR . strtolower($_GET['post']) . 'Post.php'))
        {
            include(POST_DIR . strtolower($_GET['post']) . 'Post.php');
        }
        else
        {
            include(PHP_DIR . 'indexController.php');
        }
    }
    else if ( !isset($_GET['view']) && !isset($_GET['post']) )
    {
        include(PHP_DIR . 'indexController.php');
    }
?>