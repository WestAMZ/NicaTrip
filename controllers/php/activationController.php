<?php
    Site::getHead('NicaTrip-Confirm');
    Site::getNav();
    Site::getSocialNav();
    if($_GET)
    {
        $message = 'Sorry , we have been a problem whit your activation';
        if(isset($_GET['key']))
        {
            Connection::connect();
            $key = $_GET['key'];
            Connection::getConnection()->query("UPDATE `user` SET `status`='1' WHERE `activationkey` = '$key' ");
            if(Connection::getConnection()->affected_rows > 0)
            {
                $message = 'Congratulations you had been successfully registered. Now you can enjoy all the content in this website :D !!. Please go to the link below for access to your account.';    
            }
            Connection::close();
        }
    }
?>
    <div id="fondoconfirm">
    <div id="containerconfirm" class="container">
        <div id="confirmdialog" class="card z-depth-2 ">
            <div class="col s11 m11" style=" border-top-left-radius:10px; border-top-right-radius:10px ">
                <div class="col s11 m8">
                    <div class="center">
                        <img src="views/img/logo.svg" class="responsive-img">
                    </div>
                </div>
                <div class="col s11 m3">
                    <h3 class="center" >Welcome to Nicatrip</h3>
                </div>
            </div>
            <div id="confirmdialog" class="card-action center">
                <p style="text-align: justify"> <?php echo($message)?></p>
                <a href="?view=index" class="menu1" style="cursor:pointer; text-decoration:underline"> Go to website</a>
            </div>
        </div>
    </div>
    </div>
<?php    
    Site::getFooter();
?>