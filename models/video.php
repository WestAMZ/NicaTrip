<?php
/*
    Class video
*/
class Video
{
    var $idVideo;
    var $url;
    var $video_date;
    var $status;
    var $idUser;
// Construct
    function __construct($idVideo, $url, $video_date, $status, $idUser)
    {
        $this->idVideo = $idVideo;
        $this->url = $url;
        $this->video_date = $video_date;
        $this->status = $status;
        $this->idUser = $idUser;
    }
// Setters Methods
    function setIdVideo($idVideo)
    {
        $this->idVideo = $idVideo;
    }
    function setUrl($url)
    {
        $this->url = $url;
    }
    function setVideoDate($video_date)
    {
        $this->video_date = $video_date;
    }
    function setStatus($status)
    {
        $this->status = $status;
    }
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
//Getters Methods
    function getIdVideo()
    {
        return $this->idVideo;
    }
    function getUrl()
    {
        return $this->url;
    }
    function getVideoDate()
    {
        return $this->video_date;
    }
    function getStatus()
    {
        return $this->status;
    }
    function getIdUser()
    {
        return $this->idUser;
    }
static function getVideos()
        {
            Connection :: connect();
            $query = "SELECT `idvideo`, `date`, `url`, `user_iduser`, `status`, `Post_idpost` FROM `video`";
            $result = Connection :: getConnection() -> query($query);
            $videos = array();
            while($row = $result->fetch_assoc())
            {
                $video = new User($row['idvideo'],$row['daste'],$row['url'],$row['user_iduser'],$row['status'],$row['Post_idpost']);
                array_push($videos,$video);
            }
            Connection :: close();
            return $videos;
        }
        function saveVideo()
        {
            Connection :: connect();
            $query = "INSERT INTO `video`(`idvideo`, `date`, `url`, `user_iduser`, `status`, `Post_idpost`) VALUES ('$this->idVideo', '$this->video_date', '$this->url', '$this->idUser', '$this->status', '$this->idPost')";
            $result = Connection :: getConnection() -> query($query);
            Connection :: close();
        }
}
?>
