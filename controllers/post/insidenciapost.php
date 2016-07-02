<?php

    include(MODELS_DIR . 'insidencia.php');

    //if($_POST)
    //{
            echo('post');

            if(!isset($_GET['mod']))
            {
                echo('no hay mod');
                $insidencia = new Insidencia(null,null,$_POST['descripcion'],0,1,$_SESSION['id_usuario'],$_POST['fileToUpload']);
                if($insidencia->saveInsidencia())
                {
                    echo ('1');
                }
                    else
                {
                    echo ($insidencia->add_error());
                }
            }
            //modificar
            else if($_GET['mod']==1)
            {

            }
            //cambiar estado
            else if($_GET['mod']==2)
            {
                echo('get');
                $id = $_GET['id'];
                $estado = $_GET['estado'];
                Insidencia::cambiarEstado($id,$estado);
            }

    //}
?>
