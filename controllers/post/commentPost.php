<?php
if($_POST)
{
    $content = Connection:: cleanInput($_POST['content']);
    $id_post = Connection:: cleanInput($_POST['id_post']);

    //$idComment, $content, $comment_date, $status, $idUser, $idPost
    $comment = new Comment(null , $content , date("Y/m/d") , 1 ,$_SESSION['id'] ,$id_post);
    $comment.saveComment();
}
?>
