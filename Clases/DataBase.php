<?php

Abstract Class DataBase
{

    abstract public function dbConnect();
    abstract public function emailDbSearch($email);
    abstract public function saveUser(Usuario $usuario);

    public function photoPath($data)
    {

        $username = $data['nombre'];
        $nombre = $_FILES['avatar']['name'];
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);
        $miArchivo = "perfil" . $username . "." . $ext;

        return $miArchivo;
    }

    
    public function saveAvatar($data)
    {
        $errores = [];
        $username = $data['nombre']; 
        if($_FILES['avatar']['error'] == UPLOAD_ERR_OK)
        {
            $origen = $_FILES['avatar']['tmp_name'];
            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION); 
            if($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                $errores['avatar'] = "Sólo acepto formato JPG, PNG ó JPEG.";
                return $errores;
            }
            $destino = dirname(__DIR__);
            $destino = $destino . "/img/" . "/foto-perfiles/";
            $destino = $destino . "perfil" . $username . "." . $ext; 
            move_uploaded_file($origen, $destino);
        } else {
            $errores['avatar'] = "Hubo un error al procesar el archivo";
        }
        return $errores;

    }

}
