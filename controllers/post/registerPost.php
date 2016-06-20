<?php
    include(MODELS_DIR . 'user.php');
    require(PHP_DIR . 'mail_sender.php');
    if($_POST)
    {
        //valores nulos : id,url,activationkey
        $user = new User(null,$_POST['name'],$_POST['last_name'],$_POST['email'],$_POST['password'],null,null,$_POST['username'],0,null,null,null,$_POST['birthday'],$_POST['live']);
        //validacion de si se agrego (caso contrario exitia usuario con username o email)
        if($user->saveUser())
        {
            $key = generateKey($user->getUserName());
            $id = getIdOf($user->getUserName());
            $user->setIdUser($id);
            $user->setActivationKey($key);
            $user->updateUser();
            //correo destino , nombre de usuario , password , link de activacion 
            $activation_url = SITE_URL . "?view=activation&key=" . $user->getActivationKey();
            MailSender::sendCountInfo($user->getEmail(),$user->getUserName(),$_POST['password'], $activation_url);
            echo('1');
        }
        else
        {
            echo($user->add_error());
        }
        
    }
    function generateKey($username)
    {
        $id = getIdOf($username);
        $key = Connection::codify( $id . $username);    
        return $key;
    }
    //obtiene Id de user dado un username
    function getIdOf($username)
    {
        Connection::connect();
        $result = Connection::getConnection()->query("select iduser from user where username ='$username' ");
        $id = $result->fetch_assoc()['iduser'];
        Connection::close();
        return $id;
    }
?>