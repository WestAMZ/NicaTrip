<?php
    class Connection
    {
        private static $mysqli = null;
        //validacion de acceso
        public static function login($user,$pass)
        {
            //error_reporting(~E_WARNING);
            //datos del host
            self :: connect();
            $conn = self :: getConnection();

            $user = self :: codify($user);
            $pass = self :: codify($pass);
            $query = "select c_o_d_e from adm where a_c_c_e_s_s = '$user'";
            $result = $conn ->query($query);
            if($result->num_rows > 0)
            {
                $row = $result -> fetch_assoc();

                if (!($row['c_o_d_e'] == $pass))
                {
                    echo "<script>";
                    echo "alert('No se a podido conectar verifique los datos!!');";
                    echo "</script>";
                    $conn->close();
                }
                else
                {
                    session_start();
                    $_SESSION['session'] = 'active';
                    header('Location: views/home.php');
                    $conn->close();
                }
            }
            else
            {
                echo "<script>";
                echo "alert('No se a podido conectar verifique los datos 0 datos!!');";
                echo "</script>";
                $conn->close();
            }

        }
        //conecction

        public static function connect()
        {
            //error_reporting(~E_NOTICE);                                                                                                       //nombre del host

            $host ="localhost";
            $db = "mobileguide";
            $user = 'root';
            $pass = '12345';

        /*    $host ="mysql4.000webhost.com";
            $db = "a7588566_guide";
            $user = 'a7588566_west';
            $pass = 'sistemas123';
        */
            self:: $mysqli =new mysqli($host, $user, $pass,$db);
            if( self :: $mysqli -> connect_error)
            {
                 self :: $mysqli -> close();
                 self :: $mysqli = null;
            }

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
            header('Location: ../index.php');
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

        public static function filterInput($conn,$string)
        {
            $string = htmlspecialchars($string);
            $string = $conn -> real_escape_string($user);

        }

    }
?>
