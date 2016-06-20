<?php
    /*---   Nucleo del web site    ---*/

    //error_reporting(~E_WARNING);

    /*
        Directoríos
    */
    
    define('HTML_DIR','views/html/');
    define('CSS_DIR','views/css/');
    define('PHP_DIR','controllers/php/');
    define('MODELS_DIR','models/');
    define('DB_DIR','db/');
    define('JS_DIR','views/js/');
    define('LIBS_DIR','controllers/libs/');
    define('AJAX_DIR','controllers/ajax/');
    define('POST_DIR','controllers/post/');
    define('IMG_DIR','views/img/');
    
    /*
        Directorio de archivos alojados
    */

    define('PROFILE_DIR','hosted/profile/');
    define('COVER_DIR','hosted/cover/');
    define('PHOTO_DIR','hosted/photos/');

    /*
        Información de correo
    */
    define('SENDER_NAME','NicaTrip');
    define('MAIL_ADDRESS','nicatriplblog@gmail.com');
    define('MAIL_PASS','admin2016');

    /*
        Informacion del sitio
    */

    define('SITE_NAME','NicaTrip');
    define('SITE_URL','http://localhost/NicaTrip/');
    define('COPY_LIC','All rights reserved  '. date('Y',time()));
    
    /*
        Carga de librerías externas php
    */
    include(LIBS_DIR . 'libs_loader.php');
    /*
        Carga de clases propias
    */
    require_once(PHP_DIR . 'site.php');
    require_once(DB_DIR . 'connection.php');
?>