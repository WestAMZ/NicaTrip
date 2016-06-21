<?php
    include(MODELS_DIR . 'user.php');
    $user = null;
    if(isset($_GET['user']))
    {
        $user = User::getUserByUserName(Connection::cleanInput($_GET['user']));
    }
    else
    {
        if(isset($_SESSION['username']))
        {
            $user = User::getUserByUserName($_SESSION['username']);
        }
        else
        {
            header('Location: ?view=login');
        }
    }
    if($user == null)
    {
        Site::getHead('profile not found');
    }
    else
    {
        Site::getHead($user->getName() .' '. $user->getLastName());
    }


    Site::getNav();



    Site::getProfile();
    Site::getFooter();
?>
