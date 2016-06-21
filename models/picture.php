<?php
/*
    Class Picture
*/
class Picture
{
    var $idPicture;
    var $url;
    var $picture_date;
    var $status;
    var $idUser;
//Construct
    function __construct($idPicture, $url, $picture_date, $status, $idUser)
    {
        $this->idPicture = $idPicture;
        $this->url = $url;
        $this->picture_date = $picture_date;
        $this->status = $status;
        $this->idUser = $idUser;
    }
// Setters Methods
    function setIdPicture($idPicture)
    {
        $this->idPicture = $idPicture;
    }
    function setUrl($url)
    {
        $this->url = $url;
    }
    function setPicture_date($picture_date)
    {
        $this->picture_date = $picture_date;
    }
    function setStatus($status)
    {
        $this->status = $status;
    }
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
// Getters Methods
    function getIdPicture()
    {
        return $this->idPicture;
    }
    function getUrl()
    {
        return $this->url;
    }
    function getPictureDate($picture_date)
    {
        return $this->picture_date;
    }
    function getStatus()
    {
        return $this->status;
    }
    function getIdUser()
    {
        return $this->idUser;
    }
static function getPictures()
        {
            Connection :: connect();
            $query = "SELECT `idpicture`, `url`, `date`, `user_idUser`, `status`, `Post_idpost` FROM `picture`";
            $result = Connection :: getConnection() -> query($query);
            $pictures = array();
            while($row = $result->fetch_assoc())
            {
                $picture = new Picture($row['idpicture'],$row['url'],$row['date'],$row['user_idUser'],$row['status'],$row['Post_idpost']);
                array_push($pictures,$picture);
            }
            Connection :: close();
            return $pictures;
        }
        function savePicture()
        {
            Connection :: connect();
            $query = "INSERT INTO `picture`(`idpicture`, `url`, `date`, `user_idUser`, `status`, `Post_idpost`) VALUES ('$this->idPicture', '$this->url', '$this->picture_date', '$this->idUser', '$this->status', '$this->idPost')";
            $result = Connection :: getConnection() -> query($query);
            Connection :: close();
        }
}
?>
