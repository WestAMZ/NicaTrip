<?php
    include(MODELS_DIR . 'user.php');
    
    
    if($_POST)
    {
        
        $username = Connection :: cleanInput($_POST['username']);
        $password = Connection::codify(Connection :: cleanInput($_POST['password']));
        Connection::connect();
        $result = Connection::getConnection()->query("SELECT iduser,password,name,last_name FROM user WHERE username ='$username' ");
        $flag = false;
        while($row = $result-> fetch_assoc() )
        {
            if($row['password'] == $password )
            {
                $isSessionActive = isset($_SESSION);
                if( ! $isSessionActive)
                {
                    session_start();
                }
                $_SESSION['id'] = $row['iduser'] ;
                $_SESSION['username'] = $username ;
                $flag = true;
            }
        }
        Connection::close();
        if($flag)
        {
            //logueado correctamente 
            echo('1');
        }
        else
        {
            //error en los datos ingresados
            echo('0');
        }
    }
?>