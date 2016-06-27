<?php
    class Connection
    {
        private static $mysqli = null;
        //validacion de acceso

        public static function connect()
        {
            //error_reporting(~E_NOTICE);                                                                 //nombre del host

            $host ="localhost";
            $db = "nicatrip";
            $user = 'root';
            $pass = '';
            //datos del host

  /*
            $host ="localhost";
            $db = "nicatrip_datos";
            $user = 'nicatrip_datos';
            $pass = 'sistemas123';
             */

            self:: $mysqli =new mysqli($host, $user, $pass,$db);
            if( self :: $mysqli -> connect_error)
            {
                 self :: $mysqli -> close();
                 self :: $mysqli = null;
            }
            return self :: $mysqli -> connect_error;
        }

        public static function close()
        {
            self :: $mysqli->close();
            self :: $mysqli = null;
        }

        public static function logout()
        {
            session_start();
            $_SESSION['session'] = null;
            session_unset();
            session_destroy();
            header('Location: ?view=index');
            self :: close();
        }

        public static function getConnection()
        {
            return self :: $mysqli;
        }

        public static function codify($string)
        {
            for($cont = 0; $cont < 1000; $cont++)
            {
                $string = sha1(md5($string));
            }
            return $string;
        }

        public static function filterAuthorization()
        {
            #$isSessionActive = (session_status() == PHP_SESSION_ACTIVE);
            $isSessionActive = isset($_SESSION);
            if( ! $isSessionActive)
            {
                session_start();
            }
            if( isset($_SESSION['session'] ))
            {
                if($_SESSION['session']!='active')
                {
                    header('Location: ../index.php');
                }
            }
            else
            {
                header('Location: ../index.php');
            }
        }

        public static function sessionStart()
        {
            #$isSessionActive = (session_status() == PHP_SESSION_ACTIVE);
            $isSessionActive = isset($_SESSION);
            if( ! $isSessionActive)
            {
                session_start();
            }
        }

        public static function cleanInput($string)
        {
            $string = htmlspecialchars($string);
            self::connect();
            $string = self::getConnection() -> real_escape_string($string);
            self::close();
            return $string;
        }

    }
?>
