<?php

Class Usuario
{

    private $usuario;
    private $email;
    private $password;
    private $avatar;

    public function __construct($usuario, $email, $password, $avatar = "")
    {
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
        $this->avatar = $avatar;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }

}