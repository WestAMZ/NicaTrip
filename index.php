<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    echo('directorio actual ');
    echo getcwd();
    require('controllers/core.php');
    Connection::initSession();
    //Verficamos existencia de la variable view
    if(isset($_GET['view']))
    {
        if(file_exists(PHP_DIR . strtolower($_GET['view']) . 'controller.php'))
        {
            if(strtolower($_GET['view'])!='index')
            {
                Connection::filterAccess();
                include(PHP_DIR . strtolower($_GET['view']) . 'controller.php');
            }
            else
            {
                include(PHP_DIR . strtolower($_GET['view']) . 'controller.php');
            }
        }
        else
        {
            include(PHP_DIR . '404controller.php');
        }
    }
    //Verficamos existencia de la variable post
    else if(isset($_GET['post']))
    {
        if(file_exists(POST_DIR . strtolower($_GET['post']) . 'post.php'))
        {
            include(POST_DIR . strtolower($_GET['post']) . 'post.php');
        }
        else
        {
            include(PHP_DIR . '404controller.php');
        }
    }
    //Verficamos existencia de la variable get
    else if(isset($_GET['get']))
    {
        if(file_exists(GET_DIR . strtolower($_GET['get']) . 'get.php'))
        {
            include(GET_DIR . strtolower($_GET['get']) . 'get.php');
        }
        else
        {
            include(PHP_DIR . '404Controller.php');
        }
    }
    //en este punto verificamos que no existe ni una de las tres variables anteriores
    else if ( !isset($_GET['view']) && !isset($_GET['post']) && !isset($_GET['get']) )
    {
        include(PHP_DIR . 'indexcontroller.php');
    }
    //echo "Today is " . date("Y/m/d h:i:sa ") . "<br>";
?>
