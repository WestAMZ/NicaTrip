<?php
	/*
		Usuarios
	*/
    
	class User
	{
		var $iduser;
		var $name;
		var $last_name;
		var $email;
		var $password;
        var $url;
        var $activationkey;
        var $username;
        var $status;
        var $add_error;
        var $aboutme;
        var $coverpicture;
        var $profilepicture;
        var $birthday;
        var $live;

        //contructor full
        function __construct($iduser,$name,$last_name,$email,
                           $password,$url,$activationkey,$username,$status,$aboutme,$coverpicture,$profilepicture,$live,$birthday)
        {
            $this->iduser = $iduser;
            $this->name = $name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = Connection :: codify($password);
            $this->url = $url;
            $this->activationkey = $activationkey;
            $this->username = $username;
            $this->status = $status;
            $this->aboutme = $aboutme;
            $this->coverpicture=$coverpicture;
            $this->birthday=$birthday;
            $this->live=$live;
        }
        //contructor sin id y status
        /*
        function __construct($name,$last_name,$email,
                           $password,$url,$activationkey,$username,$status)
        {
            $this->name = $name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->password = $password;
            $this->url = $url;
            $this->activationkey = $activationkey;
            $this->username = $username;
        }*/
		//Seters
		function setIdUser($iduser)
		{
			$this->iduser = $iduser;
		}
		function setName($name)
		{
			$this->name = $name;
		}
		function setLastName($last_name)
		{
			$this->last_name = $last_name;
		}
		function setEmail($email)
		{
			$this->email = $email;
		}
		function setPassword($password)
		{
			$this->password = Connection :: codify($password);
		}
        function setUrl($url)
		{
			$this->url = $url;
		}
        function setActivationKey($activationkey)
		{
			$this->activationkey = $activationkey;
		}
        function setUserName($user_name)
		{
			$this->user_name = $user_name;
		}
        function setStatus($activationkey)
		{
			$this->activationkey = $activationkey;
		}
		function setAboutme($aboutme)
        {
            $this->aboutme = $aboutme;
        }
        function setCoverPicture($coverpicture)
        {
            $this->coverpicture=$coverpicture;
        }
        function setProfilePicture($profilepicture)
        {
            $this->profilepicture=$profilepicture;
        }
        function setBirthday($birthday)
        {
            $this->birthday=$birthday;
        }
        function setLive($live)
        {
            $this->live = $live;
        }
        
        
		//geters
		function getIdUser()
		{
			return $this->id;	
		}
		function getName()
		{
			return $this->name;	
		}
		function getLastName()
		{
			return $this->last_name;	
		}
		function getEmail()
		{
			return $this->email;	
		}
		function getPassword()
		{
			return $this->password;	
		}
        function getActivationkey()
		{
			return $this->activationkey;	
		}
        function getUserName()
		{
			return $this->username;	
		}
        function getStatus()
		{
			return $this->status;	
		}
        function add_error()
		{
			return $this->add_error;	
		}
        function getAboutme()
        {
            return $this->aboutme;
        }
        function getCoverPicture()
        {
            if($this->coverpicture == null)
            {
                return 'default.png';
            }
            else
            {
                return $this->coverpicture;   
            }
        }
        function getProfilePicture()
        {
            return $this->profilepicture;
        }
        function getBirthDay()
        {
            return $this->birthday;
        }
        function getLive()
        {
            return $this->live;
        }
        /*
            funciones estaticas
        */
        static function getUsers()
        {
            Connection :: connect();
            $query = "SELECT `iduser`, `name`, `last_name`, `email`, `password`, `url`, `activationkey`, `username`, `status`, `aboutme`, `coverpicture`, `profilepicture`, `birthday`, `live` FROM `user` ";
            $result = Connection :: getConnection() -> query($query);
            $users = array();
            while($row = $result->fetch_assoc())
            {
                $user = new User($row['iduser'],$row['name'],$row['last_name'],$row['email'],$row['password'],$row['url'],$row['activationkey'],$row['username'],$row['status'],$row['aboutme'],$row['coverpicture'],$row['profilepicture'],$row['birthday'],$row['live']); 
                array_push($users,$user);
            }
            Connection :: close();
            return $users;
        }
        function saveUser()
        {
            $added = false;
            Connection :: connect();
            $returned = Connection :: getConnection() -> query("SELECT `email`, `username`, `status` FROM `user` WHERE `username` = '$this->username' OR `email` = '$this->email' LIMIT 1");
            if(!($returned->num_rows >0))
            {
                $query = "INSERT INTO `user`(`name`, `last_name`, `email`, `password`, `url`, `activationkey`, `username`) VALUES ('$this->name','$this->last_name','$this->email','$this->password','$this->url','$this->activationkey','$this->username')";
                $result = Connection :: getConnection() -> query($query);
                $added = true;
            }
            else
            {
                //menajes de error en caso de no haberse guardado
                $obj = $returned->fetch_assoc();
                if(strtolower($obj['email']) == strtolower($this->email)) 
                {
                    $this->add_error = '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Ya existe un usuario registrado con el email: ' . $this->email .' </div>';
                }
                if(strtolower($obj['username']) == strtolower($this->username))
                {
                    $this->add_error = '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Ya existe un usuario registrado con el nombre de: ' . $this->username .' </div>';
                }
            }
            Connection :: close();
            return $added;
        }
        function updateUser()
        {
            
            Connection::connect();
            $query = "UPDATE `user` SET `name`= '$this->name',`last_name`='$this->last_name',`email`='$this->email',`password`='$this->password',`url`='$this->url',`activationkey`='$this->activationkey',`username`='$this->username',`status`='$this->status' WHERE `iduser` = '$this->iduser' ";
            $result = Connection::getConnection()->query($query);
            
            Connection::close();
            
        }
        
        static function getUserByUserName($username)
        {
            $user = null;
            Connection::connect();
            $query = "SELECT `iduser`, `name`, `last_name`, `email`, `password`, `url`, `activationkey`, `username`, `status`, `aboutme`, `coverpicture`, `profilepicture`, `birthday`, `live` FROM `user` WHERE `username` = '$username' LIMIT 1";
            $result = Connection::getConnection()->query($query);
            if( $result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $user = new User($row['iduser'],$row['name'],$row['last_name'],$row['email'],$row['password'],$row['url'],$row['activationkey'],$row['username'],$row['status'],$row['aboutme'],$row['coverpicture'],$row['profilepicture'],$row['birthday'],$row['live']);   
            }
            Connection::close();
            return $user;
        }
        static function getUserByIdUser($iduser)
        {
            $user = null;
            Connection::connect();
            $query = "SELECT `iduser`, `name`, `last_name`, `email`, `password`, `url`, `activationkey`, `username`, `status`, `aboutme`, `coverpicture`, `profilepicture`, `birthday`, `live` FROM `user` WHERE `iduser` = '$iduser' LIMIT 1";
            $result = Connection::getConnection()->query($query);
            if( $result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $user = new User($row['iduser'],$row['name'],$row['last_name'],$row['email'],$row['password'],$row['url'],$row['activationkey'],$row['username'],$row['status'],$row['aboutme'],$row['coverpicture'],$row['profilepicture'],$row['birthday'],$row['live']);   
            }
            Connection::close();
            return $user;
        }
        
	}
?>