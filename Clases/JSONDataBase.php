<?php

Class JSONDataBase extends DataBase
{

    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function dbConnect()
    {
        $usersArray = [];
        $db = file_get_contents($this->file);
        $arr = explode(PHP_EOL, $db);
        array_pop($arr);

        foreach($arr as $user) {
            $usersArray[] = json_decode($user, true);
        }

        return $usersArray;
    }

    public function emailDbSearch($email)
    {
        $users = $this->dbConnect();
        foreach($users as $user) {
            if($user['email'] === $email) {
                return $user;
            }
        }
        return null;
    }

    public function saveUser($usuarioArray)
    {
        $file = $this->file;
        $jsonUser = json_encode($usuarioArray);
        file_put_contents($file, $jsonUser . PHP_EOL, FILE_APPEND);
    }


    public function idGenerate()
    {
        $arr = $this->dbConnect();

        if($arr == []) {
            return 1;
        }

        $lastUser = count($arr);

        return $lastUser + 1;

    }

    public function createUser(Usuario $usuario)
    {
        $usuario = [
            'usuario' => $usuario->getUsuario(),
            'email' => $usuario->getEmail(),
            'password' => password_hash($usuario->getPassword(), PASSWORD_DEFAULT),
            'avatar' => $usuario->getAvatar()
        ];

        $usuario['id'] = $this->idGenerate();

        return $usuario;
    }

}