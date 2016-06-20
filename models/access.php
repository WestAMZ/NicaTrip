<?php
/* 
    Class Access
*/
class Acces
{
        var $idAccess;
        var $ipAddress;
        var $serverName;
        var $dateStart;
        var $dateEnd;
        var $idUser;

// Construct for the class Access
    function __construct($idAccess, $ipAddress, $serverName, $dateStart, $dateEnd, $idUser)
    {
        $this->idAccess = $idAccess;
        $this->ipAddress = $ipAddress;
        $this->serverName = $serverName;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->idUser = $idUser;
    }
// Setters Methods 
    function setIdAccess($idAcess)
    {
        $this->idAccess = $idAccess;
    }
    function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }
    function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }
    function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }
    function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }
    function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
// Getters Methods 
    function getIdAccess()
    {
        return $this->idAccess;
    }
    function getIpAddress()
    {
        return $this->ipAddress;
    }
    function getServerName()
    {
        return $this->serverName;
    }
    function getDateStart()
    {
        return $this->dateStart;
    }
    function getDateEnd()
    {
        return $this->dateEnd;
    }
    function getIdUser()
    {
        return $this->idUser;
    }
static function getAccesses()
{
    Connection :: connect();
    $query = "SELECT `idaccess`, `ipaddress`, `servername`, `datestart`, `dateend`, `user_iduser` FROM `acceso`";
    $result = Connection :: getConnection() -> query($query);
    $accesses = array();
    while($row = $result->fetch_assoc())
    {
        $access = new Access($row['idaccess'], $row['ipaddress'], $row['servername'], $row['datestart'], $row['dateend'], $row['user_iduser']);
        array_push($accesses, access);
    }
    Connection :: close();
    return $accesses;
}
function saveAccess()
        {
            Connection :: connect();
            $query = "INSERT INTO `acceso`(`idaccess`, `ipaddress`, `servername`, `datestart`, `dateend`, `user_iduser`) VALUES ('$this->idAccess', '$this->ipAddress', '$this->serverName', '$this->dateStart', '$this->dateEnd', '$this->idUser')";
            $result = Connection :: getConnection() -> query($query);
            Connection :: close();
        }
}   
?>