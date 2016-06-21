<?php
/*
    Class Post
*/
include(MODELS_DIR . 'user.php');
include(MODELS_DIR . 'picture.php');
class Post
{
    var $idPost;
    var $titulo;
    var $post_date;
    var $content;
    var $status;
    var $url;
    var $idUser;
    //Construct
    function __construct($idPost, $titulo, $post_date, $content, $status, $url, $idUser)
    {
        $this->idPost = $idPost;
        $this->titulo = $titulo;
        $this->post_date = $post_date;
        $this->content = $content;
        $this->status = $status;
        $this->url = $url;
        $this->idUser = $idUser;
    }
    //Setters Methods
    function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }
    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    function setPostDate($post_date)
    {
        $this->post_date = $post_date;
    }
    function setContent($content)
    {
        $this->content = $content;
    }
    function setStatus($status)
    {
        $this->status = $status;
    }
    function setUrl($url)
    {
        $this->url = $url;
    }
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
    //Getters Methods
    function getIdPost()
    {
        return $this->idPost;
    }
    function getTitulo()
    {
        return $this->titulo;
    }
    function getPostDate()
    {
        return $this->post_date;
    }
    function getContent()
    {
        return $this->content;
    }
    function getStatus()
    {
        return $this->status;
    }
    function getUrl()
    {
        return $this->url;
    }
    function getIdUser()
    {
        return $this->idUser;
    }
static function getPosts()
        {
            Connection :: connect();
            $query = "SELECT `idpost`, `titulo`, `date`, `content`, `user_iduser`, `status`, `url` FROM `post`";
            $result = Connection :: getConnection() -> query($query);
            $posts = array();
            while($row = $result->fetch_assoc())
            {
                //$idPost, $titulo, $post_date, $content, $status, $url, $idUser
                $post = new Post($row['idpost'],$row['titulo'],$row['date'],$row['content'],$row['status'],$row['url'],$row['id_user']);
                array_push($posts,$post);
            }
            Connection :: close();
            return $posts;
        }
        function savePost()
        {
            Connection :: connect();
            $query = "INSERT INTO `post`(`idpost`, `titulo`, `date`, `content`, `user_iduser`, `status`, `url`) VALUES ('$this->idPost', '$this->titulo', '$this->post_date', '$this->content', '$this->idUser', '$this->status', '$this->url')";
            $result = Connection :: getConnection() -> query($query);
            Connection :: close();
        }
        function getUser()
        {
            return getUserByIdUser($this->idUser);
        }
        function getPicture()
        {
            return getPictureByPostId($this->$id_post);
        }
}
?>
