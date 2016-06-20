<?php
/*
    Class Comment
*/
class Comment
{
    var $idComment;
    var $content;
    var $comment_date;
    var $status;
    var $idUser;
    var $idPost;
    //Construct
    function __construct($idComment, $content, $comment_date, $status, $idUser, $idPost)
    {
        $this->idComment = $idComment;
        $this->content = $content;
        $this->comment_date = $comment_date;
        $this->status = $status;
        $this->idUser = $idUser;
        $this->idPost = $idPost;
    }
//Setters Methods 
    function setIdComment($idComment)
    {
        $this->idComment = $idComment;
    }
    function setContent($content)
    {
        $this->content = $content;
    }
    function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
    }
    function setStatus($status)
    {
        $this->status = $status;
    }
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }
//Getters Method
    function getIdComment()
    {
        return $this->idComment;
    }
    function getContent()
    {
        return $this->content;
    }
    function getCommentDate()
    {
        return $this->comment_date;
    }
    function getStatus()
    {
        return $this->status;
    }
    function getIdUser()
    {
        return $this->idUser;
    }
    function getIdPost()
    {
        return $this->idPost;
    }
    
static function getComment()
{
    Connection :: connect();
    $query = "SELECT `idcomment`, `content`, `date`, `user_iduser`, `status`, `post_idpost` FROM `comment`";
    $result = Connection :: getConnection() -> query($query);
    $comments = array();
    while($row = $result->fetch_assoc())
    {
        $comment = new Commet($row['idcomment'], $row['content'], $row['date'], $row['status'], $row['user_iduser'], $row['post_idpost']);
        array_push($comments, comment);
    }
    Connection :: close();
    return $comments;
}
function saveComment()
{
    Connection :: connect();
    $query = "INSERT INTO `comment`(`idcomment`, `content`, `date`, `user_iduser`, `status`, `post_idpost`) VALUES ('$this->idComment', '$this->content', '$this->comment_date', '$this->idUser', '$this->status', '$this->idPost')";
    $result = Connection :: getConnection() -> query($query);
    Connection :: close();
}
}
?>